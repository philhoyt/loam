<?php
/**
 * Title: Menu list
 * Slug: loam/menu-list
 * Categories: text, columns
 * Viewport Width: 1400
 * Description: A food or drink menu: section heading, then two columns of items with a name, a price and a one-line description.
 *
 * @package loam
 */

$loam_menu = array(
	array(
		'heading' => _x( 'Kitchen', 'Menu list section heading placeholder', 'loam' ),
		'items'   => array(
			array( _x( 'Smash burger', 'Menu item placeholder', 'loam' ), '14', _x( 'Two patties, American cheese, pickles, house sauce.', 'Menu item description placeholder', 'loam' ) ),
			array( _x( 'Fried chicken sandwich', 'Menu item placeholder', 'loam' ), '13', _x( 'Buttermilk brined, slaw, hot honey.', 'Menu item description placeholder', 'loam' ) ),
			array( _x( 'Loaded fries', 'Menu item placeholder', 'loam' ), '9', _x( 'Cheese sauce, scallions, pickled jalape&ntilde;o.', 'Menu item description placeholder', 'loam' ) ),
		),
	),
	array(
		'heading' => _x( 'Bar', 'Menu list section heading placeholder', 'loam' ),
		'items'   => array(
			array( _x( 'House lager', 'Menu item placeholder', 'loam' ), '6', _x( 'Pint. Ask about the rotating taps.', 'Menu item description placeholder', 'loam' ) ),
			array( _x( 'Lane special', 'Menu item placeholder', 'loam' ), '8', _x( 'Bourbon, ginger, lime, big ice.', 'Menu item description placeholder', 'loam' ) ),
			array( _x( 'Soda & seltzer', 'Menu item placeholder', 'loam' ), '3', _x( 'Free refills.', 'Menu item description placeholder', 'loam' ) ),
		),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xxl"}}}} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $loam_menu as $loam_section ) : ?>
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|m"}}} -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"border":{"bottom":{"color":"var:preset|color|contrast","style":"solid","width":"3px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|xs"}}}} -->
			<h2 class="wp-block-heading" style="border-bottom-color:var(--wp--preset--color--contrast);border-bottom-style:solid;border-bottom-width:3px;padding-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html( $loam_section['heading'] ); ?></h2>
			<!-- /wp:heading -->

			<?php foreach ( $loam_section['items'] as $loam_item ) : ?>
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|m"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
					<p style="font-weight:700"><?php echo esc_html( $loam_item[0] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
					<p style="font-weight:700"><?php echo esc_html( $loam_item[1] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"fontSize":"s"} -->
				<p class="has-s-font-size"><?php echo wp_kses( $loam_item[2], array() ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
