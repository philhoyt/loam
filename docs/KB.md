# Knowledge base

Non-obvious constraints found while working on Loam, with sources.

## WordPress

- `wp.components.Theme` warns "cannot generate a set of grayscale foreground colors with sufficient contrast" in the Site Editor console for any tinted `base` colour. The check (`checkContrasts` in `packages/components/src/theme/color-algorithms`) darkens the background by fixed HSL steps and requires 3:1 / 4.5:1 against the generated 600/700 grays; only near-zero-saturation backgrounds pass. It concerns the editor chrome, not theme output. Source: `wp-includes/js/dist/components.js` in WordPress 7.1.1 (2026-09-21).
- PHP 8.1 reached end of life on 2025-12-31, so `Requires PHP` floors at 8.2. Source: https://endoflife.date/api/php.json (2026-09-21).
- Cover block: `dimRatio: 50` is the default, so the overlay span carries only `has-background-dim` and no `has-background-dim-50` class; any other multiple of ten adds `has-background-dim-NN`. Found by `npm run validate:blocks` on 2026-09-21.
- Theme pattern cache on WP 7.1 is a **site** transient (`wp_theme_files_patterns-<hash>`); `wp transient delete --all` and `wp option list --search` miss it. Clear with `wp eval 'delete_site_transient("wp_theme_files_patterns-" . <hash>)'` or bump `Version:`. Source: wp-includes/class-wp-theme.php `get_pattern_cache()`.
