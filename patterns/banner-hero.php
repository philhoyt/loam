<?php
/**
 * Title: Hero with buttons
 * Slug: loam/banner-hero
 * Categories: banner, featured
 * Viewport Width: 1400
 * Description: Full-height photo masthead with a colour overlay, a heading, one line of copy and two buttons.
 *
 * @package loam
 */

$loam_image = get_theme_file_uri( 'assets/images/masthead-3.svg' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $loam_image ); ?>","dimRatio":60,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":72,"minHeightUnit":"vh","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:72vh"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $loam_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxxl"} -->
	<h1 class="wp-block-heading has-text-align-center has-xxxl-font-size"><?php echo esc_html_x( 'Roll in. Stay late.', 'Hero heading placeholder', 'loam' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"l","style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
	<p class="has-text-align-center has-l-font-size" style="margin-top:var(--wp--preset--spacing--m)"><?php echo esc_html_x( 'One confident sentence about the place and who it is for. Two lines at most, so the photo can do the rest.', 'Hero paragraph placeholder', 'loam' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--l)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Reserve a lane', 'Hero button placeholder', 'loam' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'What&#8217;s on', 'Hero secondary button placeholder', 'loam' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->
