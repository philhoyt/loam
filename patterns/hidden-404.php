<?php
/**
 * Title: 404
 * Slug: loam/hidden-404
 * Inserter: no
 *
 * @package loam
 */

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'Page not found', '404 error page heading', 'loam' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html_x( 'The page you are looking for doesn\'t exist, or it has been moved. Try searching using the form below.', '404 error page body text', 'loam' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:pattern {"slug":"loam/hidden-search"} /-->
</div>
<!-- /wp:group -->
