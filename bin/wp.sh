#!/bin/zsh
# WP-CLI against this theme's wp-env site (see .wp-env.json). Start it with
# `npx wp-env start`; the theme is mounted and activated automatically.
#
# Delegates to the wp-env CLI container so the docs' `bin/wp.sh cache flush`
# style commands work unchanged. Paths passed as arguments are resolved
# inside the container, where the theme lives at
# /var/www/html/wp-content/themes/loam.
cd "$(dirname "$0")/.." || exit 1
exec npx --no-install wp-env run cli wp "$@"
