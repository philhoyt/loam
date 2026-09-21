# Knowledge base

Non-obvious constraints found while working on Loam, with sources.

## WordPress

- `wp.components.Theme` warns "cannot generate a set of grayscale foreground colors with sufficient contrast" in the Site Editor console for any tinted `base` colour. The check (`checkContrasts` in `packages/components/src/theme/color-algorithms`) darkens the background by fixed HSL steps and requires 3:1 / 4.5:1 against the generated 600/700 grays; only near-zero-saturation backgrounds pass. It concerns the editor chrome, not theme output. Source: `wp-includes/js/dist/components.js` in WordPress 7.1.1 (2026-09-21).
- PHP 8.1 reached end of life on 2025-12-31, so `Requires PHP` floors at 8.2. Source: https://endoflife.date/api/php.json (2026-09-21).
