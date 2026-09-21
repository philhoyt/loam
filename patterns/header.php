<?php
/**
 * Title: Header
 * Slug: loam/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with logo, site title and navigation. On small screens the menu opens as a full-screen accent-coloured overlay.
 *
 * @package loam
 */

?>
<!-- wp:group {"className":"site-header","style":{"border":{"bottom":{"color":"var:preset|color|contrast","style":"solid","width":"3px"}},"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group site-header has-base-background-color has-background" style="border-bottom-color:var(--wp--preset--color--contrast);border-bottom-style:solid;border-bottom-width:3px;padding-top:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":56} /-->

			<!-- wp:site-title {"level":0} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"overlayMenu":"mobile","icon":"menu","overlayBackgroundColor":"primary","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|m"}}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
