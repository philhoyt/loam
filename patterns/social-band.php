<?php
/**
 * Title: Follow band
 * Slug: loam/social-band
 * Categories: call-to-action, contact
 * Viewport Width: 1400
 * Description: Quiet tinted band with a heading, one line and large social icons.
 *
 * @package loam
 */

?>
<!-- wp:group {"align":"full","className":"is-style-section-tint","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-tint" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Follow along', 'loam' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Shows, specials and late additions, as they happen.', 'loam' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#141312","size":"has-large-icon-size","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|m"},"margin":{"top":"var:preset|spacing|m"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--m)">
		<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram","label":"<?php echo esc_attr_x( 'Instagram', 'social link label', 'loam' ); ?>"} /-->
		<!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook","label":"<?php echo esc_attr_x( 'Facebook', 'social link label', 'loam' ); ?>"} /-->
		<!-- wp:social-link {"url":"https://www.youtube.com/","service":"youtube","label":"<?php echo esc_attr_x( 'YouTube', 'social link label', 'loam' ); ?>"} /-->
		<!-- wp:social-link {"url":"mailto:hello@example.com","service":"mail","label":"<?php echo esc_attr_x( 'Email', 'social link label', 'loam' ); ?>"} /-->
	</ul>
	<!-- /wp:social-links -->
</div>
<!-- /wp:group -->
