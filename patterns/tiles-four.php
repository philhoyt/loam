<?php
/**
 * Title: Four tiles
 * Slug: loam/tiles-four
 * Categories: featured, columns
 * Viewport Width: 1400
 * Description: Four tall linked image tiles, each with a one-word label. A row of signposts to the main sections.
 *
 * @package loam
 */

$loam_tiles = array(
	array(
		'image' => get_theme_file_uri( 'assets/images/tile-1.svg' ),
		'title' => _x( 'Reserve a lane', 'Four tiles label placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/tile-2.svg' ),
		'title' => _x( 'Food & drink', 'Four tiles label placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/tile-3.svg' ),
		'title' => _x( 'Join a league', 'Four tiles label placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/tile-4.svg' ),
		'title' => _x( 'Book a party', 'Four tiles label placeholder', 'loam' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|l","left":"var:preset|spacing|m"}}}} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $loam_tiles as $loam_tile ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"custom","aspectRatio":"4/5","scale":"cover"} -->
			<figure class="wp-block-image size-large"><a href="#"><img src="<?php echo esc_url( $loam_tile['image'] ); ?>" alt="" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":2,"fontSize":"m","style":{"spacing":{"margin":{"top":"var:preset|spacing|s"}}}} -->
			<h2 class="wp-block-heading has-m-font-size" style="margin-top:var(--wp--preset--spacing--s)"><a href="#"><?php echo esc_html( $loam_tile['title'] ); ?></a></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
