<?php
/**
 * Title: Shop categories
 * Slug: loam/hidden-shop-categories
 * Inserter: no
 * Description: A row of buttons, one per product category with products, plus "All products". The current one is filled.
 *
 * @package loam
 */

if ( ! taxonomy_exists( 'product_cat' ) ) {
	return;
}

$loam_terms = get_terms(
	array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'orderby'    => 'name',
	)
);

// One category is no choice at all, so show nothing.
if ( is_wp_error( $loam_terms ) || count( $loam_terms ) < 2 ) {
	return;
}

$loam_queried = get_queried_object();
$loam_current = ( $loam_queried instanceof WP_Term && 'product_cat' === $loam_queried->taxonomy ) ? $loam_queried->term_id : 0;
$loam_shop    = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );

// The current button carries is-current rather than aria-current, which the
// Button block cannot save; inc/setup.php adds aria-current on output.

$loam_links = array(
	array(
		'label'   => __( 'All products', 'loam' ),
		'url'     => $loam_shop,
		// Only the shop itself: a tag or attribute archive is not "all products".
		'current' => ! ( $loam_queried instanceof WP_Term ),
	),
);
foreach ( $loam_terms as $loam_term ) {
	$loam_url = get_term_link( $loam_term );
	if ( is_wp_error( $loam_url ) ) {
		continue;
	}
	$loam_links[] = array(
		'label'   => $loam_term->name,
		'url'     => $loam_url,
		'current' => $loam_current === $loam_term->term_id,
	);
}
?>
<!-- wp:buttons {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"bottom":"var:preset|spacing|l"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons alignwide" style="margin-bottom:var(--wp--preset--spacing--l)">
	<?php foreach ( $loam_links as $loam_link ) : ?>
		<?php if ( $loam_link['current'] ) : ?>
	<!-- wp:button {"className":"is-current","fontSize":"xs"} -->
	<div class="wp-block-button has-custom-font-size is-current has-xs-font-size"><a class="wp-block-button__link has-xs-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $loam_link['url'] ); ?>"><?php echo esc_html( $loam_link['label'] ); ?></a></div>
	<!-- /wp:button -->
		<?php else : ?>
	<!-- wp:button {"className":"is-style-outline","fontSize":"xs"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-xs-font-size"><a class="wp-block-button__link has-xs-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $loam_link['url'] ); ?>"><?php echo esc_html( $loam_link['label'] ); ?></a></div>
	<!-- /wp:button -->
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<!-- /wp:buttons -->
