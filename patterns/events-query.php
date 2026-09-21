<?php
/**
 * Title: Events grid
 * Slug: loam/events-query
 * Categories: query, posts
 * Block Types: core/query
 * Viewport Width: 1400
 * Description: Three-column grid of posts with featured image, date, title, excerpt and a read more link. Point it at an events category to make a listing.
 *
 * @package loam
 */

?>
<!-- wp:query {"queryId":20,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|xl"}},"layout":{"type":"grid","columnCount":3}} -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|s"}}}} /-->

		<!-- wp:post-date /-->

		<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"l"} /-->

		<!-- wp:post-excerpt {"moreText":"<?php echo esc_attr_x( 'More info', 'Post excerpt link text.', 'loam' ); ?>","excerptLength":20,"fontSize":"s"} /-->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous /-->

	<!-- wp:query-pagination-numbers /-->

	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
	<!-- wp:paragraph -->
	<p><?php echo esc_html_x( 'Nothing scheduled yet. Check back soon.', 'Events grid, no posts.', 'loam' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
