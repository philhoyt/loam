<?php
/**
 * Title: Alternating media bands
 * Slug: loam/media-bands
 * Categories: featured, columns
 * Viewport Width: 1400
 * Description: Two stacked bands, each an image beside a heading, a paragraph and a button, with the image swapping sides.
 *
 * @package loam
 */

$loam_bands = array(
	array(
		'image'  => get_theme_file_uri( 'assets/images/card-2.svg' ),
		'title'  => _x( 'The lanes', 'Media band heading placeholder', 'loam' ),
		'text'   => _x( 'Two or three sentences about this part of the place: what it is, when it is open and what makes it worth the trip.', 'Media band paragraph placeholder', 'loam' ),
		'button' => _x( 'About us', 'Media band button placeholder', 'loam' ),
	),
	array(
		'image'  => get_theme_file_uri( 'assets/images/card-3.svg' ),
		'title'  => _x( 'The lounge', 'Media band heading placeholder', 'loam' ),
		'text'   => _x( 'A second section with the same shape. Swap the image, the heading and the copy; the layout mirrors on its own.', 'Media band paragraph placeholder', 'loam' ),
		'button' => _x( 'Learn more', 'Media band button placeholder', 'loam' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|xxl"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<?php foreach ( $loam_bands as $loam_i => $loam_band ) : ?>
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|xl"}}}<?php echo 1 === $loam_i ? ',"className":"is-reversed"' : ''; ?>} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center<?php echo 1 === $loam_i ? ' is-reversed' : ''; ?>">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","aspectRatio":"4/3","scale":"cover"} -->
			<figure class="wp-block-image size-large"><img src="<?php echo esc_url( $loam_band['image'] ); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading"><?php echo esc_html( $loam_band['title'] ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $loam_band['text'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--m)">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html( $loam_band['button'] ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
