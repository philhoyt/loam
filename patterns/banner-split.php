<?php
/**
 * Title: Split hero
 * Slug: loam/banner-split
 * Categories: banner, featured
 * Viewport Width: 1400
 * Description: Image on one side, a big heading, a short paragraph and two buttons on the other.
 *
 * @package loam
 */

$loam_image = get_theme_file_uri( 'assets/images/masthead-1.svg' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:image {"sizeSlug":"large","aspectRatio":"4/3","scale":"cover"} -->
			<figure class="wp-block-image size-large"><img src="<?php echo esc_url( $loam_image ); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
			<p class="has-xs-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html_x( 'Since 1924', 'Split hero eyebrow placeholder', 'loam' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php echo esc_html_x( 'Bowling, bands and late nights', 'Split hero heading placeholder', 'loam' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"l"} -->
			<p class="has-l-font-size"><?php echo esc_html_x( 'One sentence about the place and who it is for. Keep it short; the heading and the photo do the work.', 'Split hero paragraph placeholder', 'loam' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'See what&#8217;s on', 'Split hero button placeholder', 'loam' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Book a party', 'Split hero secondary button placeholder', 'loam' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
