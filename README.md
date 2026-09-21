# Loam

A block theme with an earthy palette and generous type.

Colors, typography, spacing and layout widths live in `theme.json`. Templates and
template parts are thin block-markup shells; the block markup that matters lives in
PHP patterns under `patterns/`, so user-facing strings are translatable.

## Requirements

- WordPress 6.7 or later
- PHP 8.2 or later
- Node.js 22 and Composer for development

## Development

```bash
npm install          # JS tooling, block validator
composer install     # phpcs, PHPStan
npx wp-env start     # local site at http://localhost:8888 with the theme active
npm run start        # compile SCSS from src/ to dist/ on change
npm run build        # production build
```

Lint with `npm run lint:js`, `npm run lint:scss` and `npm run lint:php`; run
`composer analyse` for PHPStan.

## Block markup

Templates, parts and patterns are hand-written block HTML. Markup that does not match
what the block's `save()` produces is rewritten or rejected by the editor. After editing
any of them run:

```bash
npm run validate:blocks
```

Done means the output ends with `All blocks valid.` Fix mismatches in the file; never
repair them from the Site Editor, which inlines the pattern and breaks translation.

## Release

Push a `v*` tag that matches `Version:` in `style.css`, `version` in `package.json` and
`Stable tag` in `readme.txt`. The GitHub Actions workflow builds the assets, zips the
theme honouring `.distignore` and attaches `loam.zip` to a GitHub release.

## License

GPL-2.0-or-later. See https://www.gnu.org/licenses/gpl-2.0.html.
