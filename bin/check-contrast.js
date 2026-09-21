#!/usr/bin/env node
/* eslint-disable no-console -- CLI report for npm run check:contrast */
/**
 * Checks every colour preset (theme.json and styles/colors/*.json) against the
 * contrast pairs the theme relies on. Text pairs need 4.5:1 (7:1 for body),
 * non-text pairs (focus ring, hairlines, link underline, accent shapes) need 3:1.
 *
 * Usage: node bin/check-contrast.js
 */

const fs = require("fs");
const path = require("path");

const root = path.resolve(__dirname, "..");

const pairs = [
	["contrast", "base", 7, "body text"],
	["contrast", "primary", 4.5, "text and buttons on the accent band"],
	["base", "secondary", 4.5, "text on the dark band"],
	["contrast", "contrast-light", 4.5, "text on the tint band"],
	["contrast-light", "secondary", 4.5, "muted text on the dark band"],
	["base", "contrast-dark", 4.5, "text on contrast-dark"],
	["secondary", "base", 4.5, "eyebrows and dates in secondary"],
	["tertiary", "base", 3, "focus ring"],
	["contrast-medium", "base", 3, "hairlines and captions"],
	["primary", "base", 3, "link underline and accent shapes"],
	["primary", "secondary", 3, "accent button on the dark band"],
];

const luminance = (hex) => {
	const [r, g, b] = [1, 3, 5]
		.map((i) => parseInt(hex.slice(i, i + 2), 16) / 255)
		.map((v) => (v <= 0.03928 ? v / 12.92 : ((v + 0.055) / 1.055) ** 2.4));
	return 0.2126 * r + 0.7152 * g + 0.0722 * b;
};
const ratio = (a, b) =>
	(Math.max(luminance(a), luminance(b)) + 0.05) / (Math.min(luminance(a), luminance(b)) + 0.05);

const presets = [path.join(root, "theme.json")];
const dir = path.join(root, "styles", "colors");
if (fs.existsSync(dir)) {
	for (const file of fs.readdirSync(dir)) {
		if (file.endsWith(".json")) {
			presets.push(path.join(dir, file));
		}
	}
}

let failures = 0;
for (const file of presets) {
	const json = JSON.parse(fs.readFileSync(file, "utf8"));
	const palette = Object.fromEntries(
		(json.settings?.color?.palette || []).map((c) => [c.slug, c.color])
	);
	console.log(`\n${json.title || "theme.json"} (${path.relative(root, file)})`);
	for (const [fg, bg, min, use] of pairs) {
		if (!palette[fg] || !palette[bg]) {
			continue;
		}
		const value = ratio(palette[fg], palette[bg]);
		const ok = value >= min;
		if (!ok) {
			failures++;
		}
		console.log(`  ${ok ? "ok  " : "FAIL"} ${fg} on ${bg}: ${value.toFixed(2)} (min ${min}) ${use}`);
	}
}
console.log(failures ? `\n${failures} pair(s) below minimum.` : "\nAll pairs pass.");
process.exit(failures ? 1 : 0);
