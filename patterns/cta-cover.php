<?php
/**
 * Title: Statement over a photo
 * Slug: loam/cta-cover
 * Categories: call-to-action, banner
 * Viewport Width: 1400
 * Description: Eyebrow, one big statement and an outline button on a photo band with a colour overlay.
 *
 * @package loam
 */

$loam_image = get_theme_file_uri( 'assets/images/masthead-1.svg' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $loam_image ); ?>","dimRatio":60,"overlayColor":"secondary","isUserOverlayColor":true,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $loam_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:paragraph {"align":"center","fontSize":"xs","style":{"typography":{"fontWeight":"700","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
	<p class="has-text-align-center has-xs-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html_x( 'Since 1924', 'Statement over a photo eyebrow placeholder', 'loam' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"xxl"} -->
	<h2 class="wp-block-heading has-text-align-center has-xxl-font-size"><?php echo esc_html_x( 'Still family-run. Still open late.', 'Statement over a photo heading placeholder', 'loam' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|l"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--l)">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Our story', 'Statement over a photo button placeholder', 'loam' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->
