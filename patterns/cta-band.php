<?php
/**
 * Title: Call to action band
 * Slug: loam/cta-band
 * Categories: call-to-action
 * Viewport Width: 1400
 * Description: Accent band with a heading, one line of copy and two buttons.
 *
 * @package loam
 */

?>
<!-- wp:group {"align":"full","className":"is-style-section-accent","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-accent" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'Book your party', 'Call to action band heading placeholder', 'loam' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"l"} -->
	<p class="has-text-align-center has-l-font-size"><?php echo esc_html_x( 'Birthdays, work outings, weddings and whatever else needs a room, a bar and a sound system.', 'Call to action band paragraph placeholder', 'loam' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--l)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Start a booking', 'Call to action band button placeholder', 'loam' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'See the spaces', 'Call to action band secondary button placeholder', 'loam' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
