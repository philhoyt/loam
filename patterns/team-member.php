<?php
/**
 * Title: Team member
 * Slug: loam/team-member
 * Categories: team, about
 * Viewport Width: 1400
 * Description: Portrait beside a name, role and short bio. Stack several for a staff page.
 *
 * @package loam
 */

$loam_image = get_theme_file_uri( 'assets/images/portrait.svg' );
?>
<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|l"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-top">
	<!-- wp:column {"verticalAlignment":"top","width":"25%"} -->
	<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:25%">
		<!-- wp:image {"sizeSlug":"large","aspectRatio":"1","scale":"cover"} -->
		<figure class="wp-block-image size-large"><img src="<?php echo esc_url( $loam_image ); ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"top"} -->
	<div class="wp-block-column is-vertically-aligned-top">
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
		<h3 class="wp-block-heading" style="margin-bottom:0"><?php echo esc_html_x( 'Jordan Alvarez', 'Team member name placeholder', 'loam' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700","letterSpacing":"0.1em","textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|s"}}}} -->
		<p class="has-xs-font-size" style="margin-top:var(--wp--preset--spacing--xs);margin-bottom:var(--wp--preset--spacing--s);font-weight:700;letter-spacing:0.1em;text-transform:uppercase"><?php echo esc_html_x( 'General manager', 'Team member role placeholder', 'loam' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><?php echo esc_html_x( 'Two or three sentences about this person: how they got here, what they look after, and the thing they would talk about all day if you let them.', 'Team member bio placeholder', 'loam' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
