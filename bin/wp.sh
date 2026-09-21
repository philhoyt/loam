#!/bin/zsh
# WP-CLI for this theme's dev site.
#
# Prefers the Local site (SITE below, as under ~/Local Sites) when its MySQL
# socket is reachable; falls back to the wp-env site from .wp-env.json. Local's
# MySQL listens on a socket, not TCP, so mysqli is pointed at it. Create the
# symlink once, and recreate it if Local changes the site id:
#   ln -sfn "$HOME/Library/Application Support/Local/run/<id>/mysql/mysqld.sock" "$HOME/.local-sockets/$SITE.sock"
#
# Paths in arguments resolve on the host for Local and inside the container
# (/var/www/html/wp-content/themes/loam) for wp-env.
SITE=loam
SOCK="$HOME/.local-sockets/$SITE.sock"
PUBLIC="$HOME/Local Sites/$SITE/app/public"

if [ -S "$SOCK" ] && [ -d "$PUBLIC" ]; then
	exec php -d mysqli.default_socket="$SOCK" -d error_reporting="E_ALL & ~E_DEPRECATED" /opt/homebrew/bin/wp --path="$PUBLIC" "$@"
fi

cd "$(dirname "$0")/.." || exit 1
exec npx --no-install wp-env run cli wp "$@"
