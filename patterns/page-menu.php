<?php
/**
 * Title: Menu
 * Slug: loam/page-menu
 * Categories: loam_page
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport Width: 1400
 * Description: Menu page: a short note, the menu list and hours. Use with the "Page" template so the page title shows.
 *
 * @package loam
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-bottom:0">
	<!-- wp:paragraph {"fontSize":"l"} -->
	<p class="has-l-font-size"><?php echo esc_html_x( 'Kitchen open until an hour before close. Ask about allergens; most things can be made without.', 'Menu page intro placeholder', 'loam' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"loam/menu-list"} /-->

<!-- wp:pattern {"slug":"loam/hours-location"} /-->
