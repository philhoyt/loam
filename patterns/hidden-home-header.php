<?php
/**
 * Title: Blog header
 * Slug: loam/hidden-home-header
 * Inserter: no
 * Description: Secondary band with the posts page title.
 *
 * @package loam
 */

$loam_posts_page = (int) get_option( 'page_for_posts' );
$loam_title      = $loam_posts_page ? get_the_title( $loam_posts_page ) : '';
if ( '' === $loam_title ) {
	$loam_title = _x( 'Blog', 'Posts page heading', 'loam' );
}
?>
<!-- wp:group {"align":"full","className":"is-style-section-contrast","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-contrast" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php echo esc_html( $loam_title ); ?></h1>
	<!-- /wp:heading -->
</div>
<!-- /wp:group -->
