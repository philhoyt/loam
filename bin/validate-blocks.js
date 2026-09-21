#!/usr/bin/env node
'use strict';
/* eslint-disable no-console -- CLI report for npm run validate:blocks */

/**
 * Validates hand-written block markup the way the editor does.
 *
 * Templates and parts are read from disk. Patterns are PHP, so their rendered
 * content is read from WordPress through WP-CLI (bin/wp.sh, wp-env, or `wp`
 * on PATH, tried in that order). Every document is run through
 * @wordpress/blocks' parse() against the core block registry, and each block
 * is checked two ways:
 *
 *   invalid    — the markup matches no save() version; the editor shows
 *                "This block contains unexpected or invalid content".
 *   deprecated — the markup matches an older save() (a deprecation); the
 *                editor accepts it, rewrites it to the current format, and
 *                marks the theme template as customised when it is saved.
 *
 * Both fail the run. Class order and inline-style order do not matter;
 * missing or extra classes do.
 *
 * Usage:
 *   node bin/validate-blocks.js                      # everything
 *   node bin/validate-blocks.js templates/page.html  # only these files
 *   node bin/validate-blocks.js patterns/hero.php    # one pattern (needs WP-CLI)
 *   node bin/validate-blocks.js --from=docs.json     # {"name": "block markup", …}
 *   node bin/validate-blocks.js --namespace=my-theme # pattern slug prefix
 *
 * The pattern namespace defaults to the style.css Text Domain.
 * Dev dependencies: jsdom, @wordpress/blocks, @wordpress/block-library.
 */

const { execFileSync } = require('child_process');
const fs = require('fs');
const path = require('path');
const { JSDOM, VirtualConsole } = require('jsdom');

const root = process.cwd();
const args = process.argv.slice(2);
const fromArg = args.find((arg) => arg.startsWith('--from='));
const namespaceArg = args.find((arg) => arg.startsWith('--namespace='));
const fileArgs = args.filter((arg) => !arg.startsWith('--'));

// @wordpress/blocks and the core block library expect browser globals. The
// virtual console is silent because jsdom cannot parse the editor UI
// package's modern CSS and would print a stack trace per stylesheet.
const dom = new JSDOM('<!doctype html><html><body></body></html>', {
	url: 'http://localhost/',
	virtualConsole: new VirtualConsole(),
});
for (const key of [
	'window',
	'document',
	'navigator',
	'HTMLElement',
	'Node',
	'Element',
	'DOMParser',
	'MutationObserver',
	'getComputedStyle',
	'CSS',
]) {
	if (!(key in globalThis) && key in dom.window) {
		globalThis[key] = dom.window[key];
	}
}
globalThis.matchMedia =
	globalThis.matchMedia ||
	(() => ({
		matches: false,
		addListener() {},
		removeListener() {},
		addEventListener() {},
		removeEventListener() {},
	}));

const { parse, getBlockType, validateBlock } = require('@wordpress/blocks');
const { registerCoreBlocks } = require('@wordpress/block-library');

// Registration and parsing log through console; keep the report clean.
const original = {
	log: console.log,
	info: console.info,
	warn: console.warn,
	error: console.error,
};
let captured = [];
// Validation messages carry %s/%o placeholders; `%o` is the block type
// object, shown by name. The last two substitutions of a failure are the
// generated and saved markup.
const format = (message, values) => {
	const parts = [...values];
	return message
		.replace(/^Block validation: /, '')
		.replace(/%[so]/g, () => {
			const value = parts.shift();
			return value && typeof value === 'object' && value.name ? value.name : String(value);
		});
};
const capture = (...parts) => {
	if (typeof parts[0] === 'string' && parts[0].startsWith('Block validation')) {
		captured.push(format(parts[0], parts.slice(1)));
	}
};
console.log = () => {};
console.info = () => {};
console.warn = capture;
console.error = capture;

registerCoreBlocks();

// ---------------------------------------------------------------------------
// Collect documents: { name, content }

function themeNamespace() {
	if (namespaceArg) {
		return namespaceArg.slice('--namespace='.length);
	}
	try {
		const header = fs.readFileSync(path.join(root, 'style.css'), 'utf8');
		const match = header.match(/^\s*Text Domain:\s*(\S+)/m);
		if (match) {
			return match[1];
		}
	} catch {
		// No style.css: fall through.
	}
	return null;
}

// Return the WP-CLI command as [file, ...leadingArgs], or null.
function wpCli() {
	const wrapper = path.join(root, 'bin', 'wp.sh');
	if (fs.existsSync(wrapper)) {
		return [wrapper];
	}
	const wpEnv = path.join(root, 'node_modules', '.bin', 'wp-env');
	if (fs.existsSync(path.join(root, '.wp-env.json')) && fs.existsSync(wpEnv)) {
		return [wpEnv, 'run', 'cli', 'wp'];
	}
	try {
		execFileSync('wp', ['--version'], { stdio: 'ignore' });
		return ['wp'];
	} catch {
		return null;
	}
}

// Rendered pattern content, keyed by registered name, read through WP-CLI so
// the PHP runs. Returns null when no WP-CLI entry point works.
function renderedPatterns(namespace) {
	const cli = wpCli();
	if (!cli) {
		return null;
	}
	const prefix = namespace ? `${namespace}/` : '';
	const php =
		'$out = array();' +
		'foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $p ) {' +
		`  if ( '' === '${prefix}' || 0 === strpos( $p['name'], '${prefix}' ) ) { $out[ $p['name'] ] = $p['content']; }` +
		'}' +
		'echo wp_json_encode( $out );';
	try {
		const out = execFileSync(cli[0], [...cli.slice(1), 'eval', php], {
			cwd: root,
			encoding: 'utf8',
			stdio: ['ignore', 'pipe', 'ignore'],
			timeout: 60000,
		});
		return JSON.parse(out.slice(out.indexOf('{')));
	} catch (e) {
		process.stderr.write(`[validate-blocks] WP-CLI failed (${cli[0]}): ${e.message}\n`);
		return null;
	}
}

function patternSlug(file) {
	const source = fs.readFileSync(file, 'utf8');
	const match = source.match(/^\s*\*?\s*Slug:\s*(\S+)/m);
	return match ? match[1] : null;
}

function collect() {
	const docs = [];

	if (fromArg) {
		const data = JSON.parse(fs.readFileSync(fromArg.slice('--from='.length), 'utf8'));
		for (const [name, content] of Object.entries(data)) {
			docs.push({ name, content });
		}
		return docs;
	}

	const namespace = themeNamespace();
	const wantedPatterns = new Set();
	const htmlFiles = [];

	if (fileArgs.length) {
		for (const file of fileArgs) {
			if (file.endsWith('.php')) {
				const slug = patternSlug(path.resolve(root, file));
				if (slug) {
					wantedPatterns.add(slug);
				} else {
					process.stderr.write(`[validate-blocks] ${file}: no Slug: header, skipped\n`);
				}
			} else {
				htmlFiles.push(file);
			}
		}
	} else {
		for (const dir of ['templates', 'parts']) {
			const full = path.join(root, dir);
			if (!fs.existsSync(full)) {
				continue;
			}
			for (const file of fs.readdirSync(full)) {
				if (file.endsWith('.html')) {
					htmlFiles.push(path.join(dir, file));
				}
			}
		}
	}

	for (const file of htmlFiles) {
		docs.push({ name: file, content: fs.readFileSync(path.resolve(root, file), 'utf8') });
	}

	const needPatterns = fileArgs.length ? wantedPatterns.size > 0 : fs.existsSync(path.join(root, 'patterns'));
	if (needPatterns) {
		const patterns = renderedPatterns(namespace);
		if (patterns === null) {
			process.stderr.write(
				'[validate-blocks] No WP-CLI entry point (bin/wp.sh, wp-env, or wp on PATH): patterns not validated.\n'
			);
		} else {
			for (const [name, content] of Object.entries(patterns)) {
				if (!wantedPatterns.size || wantedPatterns.has(name)) {
					docs.push({ name: `pattern ${name}`, content });
				}
			}
			for (const slug of wantedPatterns) {
				if (!(slug in patterns)) {
					process.stderr.write(
						`[validate-blocks] pattern ${slug} is not registered (cache flush or Version bump needed?)\n`
					);
				}
			}
		}
	}

	return docs;
}

// ---------------------------------------------------------------------------
// Validate

let problems = 0;
let checked = 0;

function indent(text) {
	return text
		.replace(/[ \t]+/g, ' ')
		.split('\n')
		.map((line) => `    ${line}`)
		.join('\n')
		.slice(0, 1200);
}

function report(doc, label, verdict, detail) {
	problems++;
	original.error(`\n✖ ${doc.name}\n  ${label}: ${verdict}${detail ? `\n${indent(detail)}` : ''}`);
}

function walk(blocks, doc, trail) {
	for (const block of blocks) {
		checked++;
		const label = [...trail, block.name].join(' > ');
		const blockType = getBlockType(block.name);
		if (!blockType) {
			report(doc, label, 'unknown block type');
		} else if (block.isValid === false) {
			report(doc, label, 'invalid, would enter recovery mode', captured.join('\n'));
		} else if (block.originalContent !== undefined) {
			// isValid is true for a deprecation match too. Re-validate against the
			// current save(): a mismatch here means the editor will rewrite it.
			const [current, items] = validateBlock(block, blockType);
			if (!current) {
				report(
					doc,
					label,
					'matches a deprecated save format; the editor will rewrite it',
					items.map((item) => format(item.args[0], item.args.slice(1))).join('\n')
				);
			}
		}
		captured = [];
		walk(block.innerBlocks, doc, [...trail, block.name]);
	}
}

const documents = collect();
for (const doc of documents) {
	captured = [];
	const blocks = parse(doc.content);
	walk(blocks, doc, []);
}

console.log = original.log;
console.info = original.info;
console.warn = original.warn;
console.error = original.error;

console.log(`\nChecked ${checked} blocks across ${documents.length} documents.`);
if (problems) {
	console.log(`${problems} block(s) need fixing.`);
	process.exit(1);
}
console.log('All blocks valid.');
