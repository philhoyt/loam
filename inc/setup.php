<?php
/**
 * Theme setup.
 *
 * @package loam
 */

namespace Loam\Setup;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 0.9.0
 * @return void
 */
function setup() {
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'loam', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add support for post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Remove core block patterns if you're providing your own in the patterns directory.
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );


/**
 * Enqueue scripts and styles for the front-end.
 *
 * Loads the main stylesheet with proper versioning from the build process.
 * Falls back to the theme version if the asset file doesn't exist.
 *
 * @since 0.9.0
 * @return void
 */
function enqueue_scripts_and_styles() {
	// Get style asset info.
	$style_asset_path = get_template_directory() . '/dist/css/style.asset.php';
	$style_asset      = array(
		'version' => wp_get_theme()->get( 'Version' ),
	);

	if ( file_exists( $style_asset_path ) ) {
		$style_asset = require $style_asset_path;
	}

	// Enqueue main stylesheet.
	wp_enqueue_style(
		'loam-style',
		get_template_directory_uri() . '/dist/css/style.css',
		array(),
		$style_asset['version']
	);

	// wp-scripts emits dist/css/style-rtl.css alongside; serve it for RTL locales.
	wp_style_add_data( 'loam-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts_and_styles' );

/**
 * Add editor styles support and enqueue editor stylesheet.
 *
 * Enables theme support for editor styles and loads the editor-specific
 * stylesheet for the block editor.
 *
 * @since 0.9.0
 * @return void
 */
function add_editor_styles() {
	// Add theme support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'dist/css/editor.css' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\add_editor_styles' );

/**
 * Register the pattern category used by the full-page starter patterns.
 *
 * Section styles live in styles/blocks/*.json and need no registration.
 *
 * @since 0.9.0
 * @return void
 */
function register_pattern_categories() {
	register_block_pattern_category(
		'loam_page',
		array(
			'label'       => _x( 'Pages', 'Block pattern category', 'loam' ),
			'description' => __( 'Full page layouts: home, about, events and contact.', 'loam' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\register_pattern_categories' );

/**
 * Register block styles that need real CSS rather than theme.json properties.
 *
 * @since 0.9.0
 * @return void
 */
function register_block_styles() {
	register_block_style(
		'core/list',
		array(
			'name'         => 'plain-list',
			'label'        => __( 'Plain', 'loam' ),
			'inline_style' => '.wp-block-list.is-style-plain-list { list-style: none; padding-inline-start: 0; }',
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\register_block_styles' );

/**
 * Unwrap the Page List block inside a Navigation block.
 *
 * When a Navigation block falls back to a Page List (no menu chosen, or a
 * menu that is only a Page List), core renders the list's own <ul> directly
 * inside the navigation's <ul>. A list may only contain list items (WCAG
 * 1.3.1; axe "list"), so the inner <ul> is merged into the outer one.
 *
 * @param string $content Rendered navigation block.
 * @return string
 */
function unwrap_page_list_in_navigation( string $content ): string {
	$opened = preg_replace(
		'#<ul class="wp-block-navigation__container([^"]*)">\s*<ul class="wp-block-page-list">#',
		'<ul class="wp-block-navigation__container$1 wp-block-page-list">',
		$content,
		1,
		$count
	);

	if ( 1 !== $count ) {
		return $content;
	}

	$closed = preg_replace( '#</ul>\s*</ul>#', '</ul>', $opened, 1, $count );

	return 1 === $count ? $closed : $content;
}
add_filter( 'render_block_core/navigation', __NAMESPACE__ . '\\unwrap_page_list_in_navigation' );
