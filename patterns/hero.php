<?php
/**
 * Title: Hero
 * Slug: loam/hero
 * Categories: banner
 * Description: Full-width banner with a heading, a short paragraph and a button.
 *
 * @package loam
 */

declare( strict_types=1 );

?>
<!-- wp:group {"align":"full","backgroundColor":"contrast-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)"><!-- wp:heading {"level":1,"fontSize":"xxxl"} -->
<h1 class="wp-block-heading has-xxxl-font-size"><?php echo esc_html_x( 'Grow something here', 'Hero pattern heading placeholder', 'loam' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"l"} -->
<p class="has-l-font-size"><?php echo esc_html_x( 'Replace this text with a sentence about what the site is for. Keep it short; the heading does most of the work.', 'Hero pattern paragraph placeholder', 'loam' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Get started', 'Hero pattern button label placeholder', 'loam' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
