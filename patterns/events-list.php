<?php
/**
 * Title: Upcoming events
 * Slug: loam/events-list
 * Categories: featured, call-to-action
 * Viewport Width: 1400
 * Description: Accent band with a heading and three event cards: image, date, title, support line and ticket buttons.
 *
 * @package loam
 */

$loam_events = array(
	array(
		'image' => get_theme_file_uri( 'assets/images/card-1.svg' ),
		'date'  => _x( 'Fri 3 Oct &middot; 8 pm', 'Event card date placeholder', 'loam' ),
		'title' => _x( 'The Headliners', 'Event card title placeholder', 'loam' ),
		'with'  => _x( 'with Opening Act', 'Event card support line placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/card-2.svg' ),
		'date'  => _x( 'Sat 4 Oct &middot; 9 pm', 'Event card date placeholder', 'loam' ),
		'title' => _x( 'Late Night Dance Party', 'Event card title placeholder', 'loam' ),
		'with'  => _x( 'with resident DJs', 'Event card support line placeholder', 'loam' ),
	),
	array(
		'image' => get_theme_file_uri( 'assets/images/card-3.svg' ),
		'date'  => _x( 'Sun 5 Oct &middot; 12 pm', 'Event card date placeholder', 'loam' ),
		'title' => _x( 'Drag Brunch', 'Event card title placeholder', 'loam' ),
		'with'  => _x( 'with the house cast', 'Event card support line placeholder', 'loam' ),
	),
);
?>
<!-- wp:group {"align":"full","className":"is-style-section-accent","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"},"blockGap":"var:preset|spacing|xl"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-accent" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2} -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Upcoming events', 'loam' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><a href="#"><?php esc_html_e( 'View all events', 'loam' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|l"}}}} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $loam_events as $loam_event ) : ?>
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"custom","aspectRatio":"4/3","scale":"cover","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|s"}}}} -->
			<figure class="wp-block-image size-large" style="margin-bottom:var(--wp--preset--spacing--s)"><a href="#"><img src="<?php echo esc_url( $loam_event['image'] ); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
			<p class="has-xs-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase"><?php echo wp_kses( $loam_event['date'], array() ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"l"} -->
			<h3 class="wp-block-heading has-l-font-size"><a href="#"><?php echo esc_html( $loam_event['title'] ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"s"} -->
			<p class="has-s-font-size"><?php echo esc_html( $loam_event['with'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|s"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--s)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Buy tickets', 'loam' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'More info', 'loam' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
