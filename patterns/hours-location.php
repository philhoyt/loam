<?php
/**
 * Title: Hours and location
 * Slug: loam/hours-location
 * Categories: contact, columns
 * Viewport Width: 1400
 * Description: Three columns: opening hours, address with a directions button, and ways to get in touch.
 *
 * @package loam
 */

?>
<!-- wp:group {"align":"full","className":"is-style-section-tint","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-tint" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"l"} -->
			<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Hours', 'loam' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"className":"is-style-plain-list"} -->
			<ul class="wp-block-list is-style-plain-list">
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Monday and Tuesday: closed', 'Hours placeholder', 'loam' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Wednesday to Friday: 5 pm to 1 am', 'Hours placeholder', 'loam' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Saturday: noon to 2 am', 'Hours placeholder', 'loam' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Sunday: noon to 10 pm', 'Hours placeholder', 'loam' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"l"} -->
			<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Find us', 'loam' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html_x( '123 Main Street', 'Address placeholder, line 1', 'loam' ); ?><br><?php echo esc_html_x( 'Hometown, OH 44107', 'Address placeholder, line 2', 'loam' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"s"} -->
			<p class="has-s-font-size"><?php echo esc_html_x( 'Free lot behind the building. Street parking on the side streets.', 'Parking placeholder', 'loam' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Get directions', 'loam' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"l"} -->
			<h2 class="wp-block-heading has-l-font-size"><?php esc_html_e( 'Get in touch', 'loam' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><a href="mailto:hello@example.com"><?php echo esc_html_x( 'hello@example.com', 'Email placeholder', 'loam' ); ?></a><br><a href="tel:+15555550123"><?php echo esc_html_x( '(555) 555-0123', 'Phone placeholder', 'loam' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"s"} -->
			<p class="has-s-font-size"><?php echo esc_html_x( 'For bookings and private events, email is fastest. We answer within a day.', 'Contact note placeholder', 'loam' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
