<?php
/**
 * Title: Three signposts
 * Slug: loam/cards-three-up
 * Categories: featured, columns
 * Viewport Width: 1400
 * Description: Three image cards, each with a linked heading and one line of copy.
 *
 * @package loam
 */

$loam_cards = array(
	array(
		'image' => get_theme_file_uri( 'assets/images/card-1.svg' ),
		'title' => _x( 'Reserve a lane', 'Three signposts heading placeholder', 'loam' ),
		'text'  => _x( 'Walk in or book ahead. Shoes are included.', 'Three signposts text placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/card-2.svg' ),
		'title' => _x( 'Food & drink', 'Three signposts heading placeholder', 'loam' ),
		'text'  => _x( 'Burgers, pitchers and a bar that stays open after the lanes close.', 'Three signposts text placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/card-3.svg' ),
		'title' => _x( 'Private events', 'Three signposts heading placeholder', 'loam' ),
		'text'  => _x( 'Birthdays, work nights and the whole place to yourselves.', 'Three signposts text placeholder', 'loam' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $loam_cards as $loam_card ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"large","aspectRatio":"4/3","scale":"cover"} -->
			<figure class="wp-block-image size-large"><img src="<?php echo esc_url( $loam_card['image'] ); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"xl","style":{"spacing":{"margin":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|xs"}}}} -->
			<h2 class="wp-block-heading has-text-align-center has-xl-font-size" style="margin-top:var(--wp--preset--spacing--m);margin-bottom:var(--wp--preset--spacing--xs)"><a href="#"><?php echo esc_html( $loam_card['title'] ); ?></a></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php echo esc_html( $loam_card['text'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
