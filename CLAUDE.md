# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Theme

|                           |                                                                                                                                     |
| ------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| Name / slug / text domain | Loam / `loam` / `loam`                                                                                                              |
| PHP namespace             | `Loam\Setup`                                                                                                                        |
| Pattern namespace         | `loam/…`                                                                                                                            |
| Requires                  | WordPress 6.7, PHP 8.2                                                                                                              |
| Tested up to              | 7.1 (`theme.json` `$schema` is pinned to `wp/7.1`; both move together)                                                              |
| Version                   | `style.css` `Version:` is canonical; `package.json` `version` and `readme.txt` `Stable tag` must match it                           |
| Repository                | https://github.com/philhoyt/loam                                                                                                    |
| Distribution              | GitHub release zip built by CI on a `v*` tag (`.github/workflows/release.yml`). `dist/` is built in CI, so it stays in `.gitignore` |

Derived from the `wp-sets` Site Editor theme scaffold; the architecture below is inherited from it.

## Commands

```bash
# Environment (wp-env, Docker)
npx wp-env start       # http://localhost:8894 (tests site :8895), admin / password
npx wp-env stop
bin/wp.sh <args>       # WP-CLI inside the wp-env CLI container, e.g. bin/wp.sh cache flush

# Development
npm run start          # Dev server with hot reload
npm run build          # Production build

# Linting
npm run lint:js        # ESLint
npm run lint:scss      # Stylelint (SCSS)
npm run lint:scss:fix  # Auto-fix SCSS lint issues
npm run lint:php       # PHP CodeSniffer (composer lint)
npm run lint:php:fix   # Auto-fix PHP lint issues (composer lint-fix)
composer analyse       # PHPStan static analysis (level 5, WordPress stubs)

# Formatting
npm run format         # Format JS/JSON/MD via wp-scripts
npm run format:check   # Check formatting without writing

# Utilities
npm run validate:blocks # Parse patterns/templates/parts with the core block registry; fails on any block that would enter recovery mode or be rewritten
npm run screenshot     # Capture screenshot.png of the local site (Puppeteer)
npm run packages-update # Update @wordpress/* packages
```

## Block markup is fixed in files, never in the Site Editor

Patterns, templates and parts are hand-written serialised block HTML. If the HTML does
not match what the block's `save()` would produce, the editor drops the block into
recovery mode or silently rewrites it, and repairing it from the Site Editor inlines the
pattern markup into a `wp_template` post, which breaks i18n and hides the theme file.
**Run `npm run validate:blocks` after touching any of them** and fix the file until the
output ends with `All blocks valid.` The `.claude/settings.json` PostToolUse hook runs the
validator on the edited file automatically.

The validator boots the core block registry under jsdom, reads templates and parts from
disk, and renders patterns through WP-CLI (`bin/wp.sh`, so wp-env must be running) so the
PHP executes. It reports both invalid blocks and blocks that only match a deprecated
save format. Class order and inline-style order do not matter (compared as sets);
missing or extra classes do. `--from=<json>` validates an arbitrary `{"name": "markup"}`
map; a file path argument validates only that file.

Known slips: `has-background-dim-55` (core rounds `dimRatio` to the nearest 10, so 55 →
`-60`); a separator without `has-alpha-channel-opacity` (present whenever no opacity is
set); a cover's `<img>` must come before the overlay `<span>` (span-first matches only a
deprecation).

## Architecture

This is a **WordPress Full Site Editing (FSE) block theme**. There are no PHP page templates — `templates/` and `parts/` hold thin block-based `.html` shells, while the meaningful block markup lives in PHP patterns under `patterns/` (see [Patterns](#patterns)).

### Build Pipeline

`src/` → webpack (`@wordpress/scripts`) → `dist/`

- `src/styles/style.scss` → `dist/css/style.css` (front-end)
- `src/styles/editor.scss` → `dist/css/editor.css` (editor-only)

Webpack (`webpack.config.js`) extends the default `@wordpress/scripts` config, separating CSS into a `css/` subdirectory and generating `*.asset.php` manifest files used by `inc/setup.php` for versioned asset enqueueing. `src/scripts/` is reserved as the entry point for theme JS — add an entry to `webpack.config.js` when the first script lands.

Blocks live under `src/blocks/<name>/` and are discovered automatically: `wp-scripts` globs `src/` for `block.json` and builds an entry point per script field, so no manual entry is needed. `webpack.config.js` **merges** its two CSS entries into that discovered set rather than replacing it — replacing `entry` silently disables block discovery.

`start` and `build` pass `--experimental-modules`, which is required for the `block.json` `viewScriptModule` field (i.e. any Interactivity API block). That flag makes `@wordpress/scripts` export an **array** of two configs — `[scripts, modules]` — instead of one object, which is why `webpack.config.js` destructures both and customises them separately. The `splitChunks` override is deliberately applied only to the scripts config; the Interactivity router arrives via a dynamic `import()` and needs chunking left alone.

`wp-scripts` copies only PHP files referenced directly from `block.json`, so `webpack.config.js` adds a `CopyWebpackPlugin` pattern for `**/parts/*.php`. Put a block's sub-partials in `src/blocks/<name>/parts/` and they will be copied to `dist/` alongside `render.php`.

### SCSS Structure

```
src/styles/
├── tools/_context.scss     # front/editor separation mixin
├── base/global/            # global resets/base styles
└── modules/                # feature-specific partials
```

The `_context.scss` mixin controls whether styles apply on the front-end or in the editor:

```scss
@use "../tools/context";
@include context.is(front) {
	/* front-end only */
}
@include context.is(editor) {
	/* editor only */
}
```

### Design tokens

- **Colors/spacing/typography**: defined in `theme.json` (not hardcoded CSS). Palette slugs: `base`, `contrast`, `primary`, `secondary`, `tertiary`, `contrast-dark`, `contrast-medium`, `contrast-light`. `tertiary` is the focus-outline colour in `src/styles`; `contrast-medium` is for separators and captions only (3.3:1 on `base`, below body-text contrast).
- **WordPress CSS custom properties**: `--wp--preset--color--*`, `--wp--preset--spacing--*`, `--wp--custom--*`
- Spacing preset slugs must not contain digits. WordPress kebab-cases slugs when it emits
  custom properties, so a `2xl` slug becomes `--wp--preset--spacing--2-xl` and any
  `var(--wp--preset--spacing--2xl)` written in a pattern or SCSS resolves to nothing,
  silently. The scale is `xs s m l xl xxl xxxl`. (The border-radius slugs are already
  written as `2-xl` / `3-xl`, which matches what WordPress emits.)

### Key Files

| File                            | Purpose                                                                                                                                                                                                                                               |
| ------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `style.css`                     | Theme header — name, version, text domain, `Requires`/`Tested up to` metadata                                                                                                                                                                         |
| `readme.txt`                    | WordPress.org-style readme; `Stable tag` must equal `style.css` `Version`                                                                                                                                                                             |
| `theme.json`                    | All theme settings: color palette, typography, layout widths, spacing, border radii                                                                                                                                                                   |
| `inc/setup.php`                 | Theme setup hooks, asset enqueueing using `*.asset.php` manifests                                                                                                                                                                                     |
| `functions.php`                 | Minimal entry point — includes `inc/setup.php`                                                                                                                                                                                                        |
| `patterns/`                     | PHP patterns holding the theme's block markup (the pattern paradigm)                                                                                                                                                                                  |
| `webpack.config.js`             | Build config extending `@wordpress/scripts` defaults                                                                                                                                                                                                  |
| `phpcs.xml`                     | PHP CodeSniffer ruleset (WordPress standard + PHPCompatibilityWP)                                                                                                                                                                                     |
| `phpstan.neon`                  | PHPStan config (level 5, WordPress stubs)                                                                                                                                                                                                             |
| `.wp-env.json`                  | wp-env config: mounts and activates this theme, PHP 8.2, ports 8894/8895 (other projects on this machine hold 8888–8893)                                                                                                                              |
| `bin/wp.sh`                     | WP-CLI wrapper that delegates to `wp-env run cli wp`. Paths in arguments resolve inside the container (`/var/www/html/wp-content/themes/loam`)                                                                                                        |
| `bin/validate-blocks.js`        | Block markup validator, copied from the `wordpress` Claude Code plugin; excluded from ESLint/Prettier so it stays diff-able against the plugin copy                                                                                                   |
| `.distignore`                   | Paths excluded from the theme zip (source, tooling, dotfiles, docs, lockfiles)                                                                                                                                                                        |
| `.github/workflows/release.yml` | On a `v*` tag: builds, checks the tag against `style.css` `Version`, `package.json` and `readme.txt` `Stable tag`, stages through `.distignore`, zips with a single `loam/` root, and publishes a GitHub release with the fixed asset name `loam.zip` |

### Navigation

`src/styles/modules/_navigation.scss` replaces core's dropdown (a 200px white box with a
hard border and no shadow) with a content-sized surface, and fixes the mobile overlay.
All values come from `settings.custom.navigation` in `theme.json`
(`--wp--custom--navigation--submenu--*`); it draws no indicator and sets no hover
colours, so styling layers on top rather than undoing anything.

Three core-markup traps, documented at the top of the module: `__container` is not a
direct child of `.wp-block-navigation`; the open overlay inherits the bar's
`items-justified-*` alignment and needs the three `--navigation-layout-*` custom
properties reset; core marks the open overlay's background and padding `!important`.

### Claude Code hooks

`.claude/settings.json` runs six `PostToolUse` hooks after every Edit/Write, from
`.claude/scripts/hooks/`: phpcs (using the project `phpcs.xml`), ESLint, Stylelint, a
security-pattern warning for PHP, a readme-prose warning, and the block validator for
files under `templates/`, `parts/` or `patterns/`. Each hook only acts on the file type it
covers and feeds its findings back as additional context; none of them block the edit.
The hook scripts are excluded from phpcs (`phpcs.xml`), ESLint (`eslint.config.js`) and
Prettier (`.prettierignore`) so they do not show up as lint targets themselves.

### Conventions

- Tabs for indentation (PHP, JS, SCSS, HTML); spaces for JSON/YAML
- Theme layout uses CSS Grid on `.wp-site-blocks` (header/main/footer)
- Core block patterns are disabled; custom patterns go in `patterns/`
- No custom image sizes are registered. Add `add_image_size()` only once a pattern or template consumes the size — unused sizes bloat every upload and get flagged in a directory review
- `dist/css/style-rtl.css` is served automatically via `wp_style_add_data( …, 'rtl', 'replace' )`; nothing extra is needed for RTL locales
- Admin bar height is exposed as a CSS custom property for layout offset calculations
- readme copy follows the plain-English rules of the `wp-readme-rules` skill (no marketing words, no em dashes)

### Patterns

Templates and template-parts under `templates/` and `parts/` are thin shells; the meaningful block markup lives in PHP patterns under `patterns/` and is composed via `<!-- wp:pattern {"slug":"loam/…"} -->`.

**Why patterns instead of inline block markup in templates?**

- **i18n works.** Pattern files are PHP, so user-facing strings can use `esc_html__()`, `esc_html_e()`, `esc_attr_x()` directly — even inside block JSON attributes like `label` or `ariaLabel`. `make-pot` extracts them with no special handling.
- **Reuse.** The same query-loop / comments / post-nav pattern is referenced from multiple templates instead of duplicated.
- **Inserter UX.** Patterns with `Block Types:` headers surface as starter options when a user inserts the matching block.

**Pattern header conventions used here**

| Header         | Purpose                                                                            |
| -------------- | ---------------------------------------------------------------------------------- |
| `Title:`       | Display name in the inserter                                                       |
| `Slug:`        | `loam/{name}` — must match the namespace                                           |
| `Categories:`  | Inserter grouping (`header`, `footer`, `query`, `text`, `banner`)                  |
| `Block Types:` | Marks the pattern as a starter for that block (e.g. `core/query`, `core/comments`) |
| `Inserter: no` | Suppresses the pattern from the inserter UI                                        |

**Naming conventions**

- `header.php` / `footer.php` — site-wide template-part patterns
- `template-*.php` — full-page or major-region patterns that compose a template (`template-query-loop`)
- `hidden-*.php` — internal building blocks referenced only from templates or other patterns; not shown in the inserter
- Other names (`comments.php`, `post-navigation.php`, `hero.php`) — reusable building blocks that surface in the inserter

### Translations

User-facing strings live in `patterns/*.php` wrapped in `esc_html__()`, `esc_html_e()`, `esc_html_x()`, or `esc_attr_x()` with the `loam` text domain. To regenerate `languages/loam.pot`:

```bash
bin/wp.sh i18n make-pot . languages/loam.pot --include="templates,parts,patterns,inc"
```

## Gotchas

Things that are not derivable from the code:

- **Theme patterns are cached against the theme version.** A new file in `patterns/`
  does not register until `Version:` in `style.css` changes, or you run
  `bin/wp.sh cache flush` and delete the `wp_theme_files_patterns*` options
  (`bin/wp.sh option list --search='wp_theme_files_patterns*' --field=option_name | xargs -n1 bin/wp.sh option delete`).
- **Site Editor customisations override theme files.** If the dev site does not match
  `templates/` or `parts/`, check
  `bin/wp.sh post list --post_type=wp_template,wp_template_part`. `wp_template` posts
  cannot be trashed — export a backup, then `bin/wp.sh post delete <id> --force`.
- **The validator needs the theme active.** With another theme active the pattern
  registry has no `loam/` entries and the run fails with a JSON parse error instead of a
  clear message. `bin/wp.sh theme activate loam` fixes it.
- **`wp.components.Theme` contrast warning in the Site Editor console.** The editor
  derives its UI grays from the theme's `base` colour and warns for any tinted
  background (only near-pure white passes). It is about the editor chrome, not the
  theme; keep the warm `base`.
- **`context.is()` takes one argument.** Styles that apply to both the front-end and
  the editor go outside the mixin entirely.
- **Spacing slugs must not contain digits.** See [Design tokens](#design-tokens).
- **Block markup must match `save()` output.** See
  [Block markup is fixed in files](#block-markup-is-fixed-in-files-never-in-the-site-editor); run `npm run validate:blocks`.

## Releasing

Run `/wp-release`: it bumps `style.css`, `package.json` and `readme.txt` together, writes
the changelog, verifies the zip and tags. A `screenshot.png` (max 1200×900, real theme
output; `npm run screenshot`) must be refreshed before any WordPress.org submission.
