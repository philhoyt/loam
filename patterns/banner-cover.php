<?php
/**
 * Title: Photo band with button
 * Slug: loam/banner-cover
 * Categories: banner, call-to-action
 * Viewport Width: 1400
 * Description: Full-width photo with a colour overlay, a large heading and one button.
 *
 * @package loam
 */

$loam_image = get_theme_file_uri( 'assets/images/masthead-2.svg' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $loam_image ); ?>","dimRatio":50,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":60,"minHeightUnit":"vh","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:60vh"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $loam_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"xxxl"} -->
	<h2 class="wp-block-heading has-text-align-center has-xxxl-font-size"><?php echo esc_html_x( 'View all events', 'Photo band heading placeholder', 'loam' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Events', 'Photo band button placeholder', 'loam' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->
