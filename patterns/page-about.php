<?php
/**
 * Title: About
 * Slug: loam/page-about
 * Categories: loam_page
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport Width: 1400
 * Description: About page: intro paragraph, two media bands, a call to action band and an FAQ. Use with the "Page" template so the page title shows.
 *
 * @package loam
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-bottom:0">
	<!-- wp:paragraph {"fontSize":"l"} -->
	<p class="has-l-font-size"><?php echo esc_html_x( 'Founded in 1924 as a dance hall, then a confectionery, then a barbershop, and for the longest stretch of all a bar and bowling alley. Three generations ran it from the apartment upstairs. Tell your own story here in two or three sentences.', 'About page intro placeholder', 'loam' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"loam/media-bands"} /-->

<!-- wp:pattern {"slug":"loam/cta-band"} /-->

<!-- wp:pattern {"slug":"loam/faq"} /-->
