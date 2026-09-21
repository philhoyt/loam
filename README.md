# Loam

[![Playground Demo](https://img.shields.io/badge/Playground_Demo-blue?logo=wordpress&logoColor=%23fff&labelColor=%233858e9&color=%23386be9)](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/philhoyt/loam/main/_playground/blueprint.json)

A block theme for venues, bars, bowling alleys and clubs: heavy uppercase headings,
chunky buttons, a cream ground with accent-coloured bands, and patterns for upcoming
events, signpost tiles, a food and drink menu, hours and location, and an FAQ. Four
seasonal colour presets (Summer, Spring, Autumn, Winter) and three section styles
restyle every band from Global Styles.

Colors, typography, spacing and layout widths live in `theme.json`. Templates and
template parts are thin block-markup shells; the block markup that matters lives in
PHP patterns under `patterns/`, so user-facing strings are translatable. Page starters
(Home, About, Events, Menu, Contact) compose the building blocks.

## Requirements

- WordPress 6.9 or later
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
`npm run check:contrast` checks every colour preset against the contrast pairs the
bands rely on; `npm run patterns:flush` registers new pattern files on the dev site.

## Release

Push a `v*` tag that matches `Version:` in `style.css`, `version` in `package.json` and
`Stable tag` in `readme.txt`. The GitHub Actions workflow builds the assets, zips the
theme honouring `.distignore` and attaches `loam.zip` to a GitHub release. `dist/` is
committed because neither that zip nor a Theme Directory upload runs a build.

## Credits

Unbounded and Space Grotesk are bundled under the SIL Open Font License; placeholder
artwork in `assets/images` is CC0. See `readme.txt` for the full copyright section.

## License

GPL-2.0-or-later. See https://www.gnu.org/licenses/gpl-2.0.html.
