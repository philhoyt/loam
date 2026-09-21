<?php
/**
 * Title: FAQ
 * Slug: loam/faq
 * Categories: text, about
 * Viewport Width: 1400
 * Description: A heading and a stack of expandable questions and answers.
 *
 * @package loam
 */

$loam_faqs = array(
	array(
		_x( 'Do I need a reservation?', 'FAQ question placeholder', 'loam' ),
		_x( 'Walk-ins are welcome every day. On Friday and Saturday nights a reservation is the only way to be sure of a lane.', 'FAQ answer placeholder', 'loam' ),
	),
	array(
		_x( 'Are shows all ages?', 'FAQ question placeholder', 'loam' ),
		_x( 'Most are. Each event listing says whether it is all ages, 18+ or 21+.', 'FAQ answer placeholder', 'loam' ),
	),
	array(
		_x( 'Where do I park?', 'FAQ question placeholder', 'loam' ),
		_x( 'There is a free lot behind the building and street parking on the side streets.', 'FAQ answer placeholder', 'loam' ),
	),
	array(
		_x( 'Can I bring my own cake?', 'FAQ question placeholder', 'loam' ),
		_x( 'Yes, for booked parties. Let us know when you book and we will keep it cold until it is time.', 'FAQ answer placeholder', 'loam' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|l"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Good to know', 'loam' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<?php foreach ( $loam_faqs as $loam_faq ) : ?>
		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php echo esc_html( $loam_faq[0] ); ?></summary><!-- wp:paragraph -->
		<p><?php echo esc_html( $loam_faq[1] ); ?></p>
		<!-- /wp:paragraph --></details>
		<!-- /wp:details -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
