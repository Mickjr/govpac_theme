<?php
/**
 * Flexible Posts Widget: webinars
 */

	define( 'PTPATH', $_SERVER['DOCUMENT_ROOT'] . '/' );
	require_once( PTPATH . 'wp-load.php' );

	global $current_user;
	global $wpdb;

	get_currentuserinfo();
	$userID = $current_user->ID;
	$dblang = get_user_meta($userID, 'language', true);

	// Block direct requests
	if ( !defined('ABSPATH') ) {
		die('-1');
	}

	echo $before_widget;

		$mySQL = 'SELECT * FROM jp_webinars WHERE language = "'.$dblang.'" '.
					' OR language = "Both" ORDER BY created_on DESC LIMIT 3';

		$result = $wpdb->get_results( $mySQL, ARRAY_A);

		if ($result) {

			if ( !empty($title) ) {
				if ($dblang == 'English') {
					echo '<h4 class="w-t">' . $title . '</h4>';
				} else {
					echo '<h4 class="w-t">' . 'Si te perdiste alguno ...' . '</h4>';
				}
			}
		?>

			<div id="webinar-widget" class="block-content">
				<div class="row">

					<?php foreach ($result as $row) { ?>

						<div class="col-sm-12">
							<div class="block block-themed">
								<div class="block-title">
									<h4>
									<a href="<?php echo $row['url']; ?>" target="_blank">
										<?php echo $row['title']; ?>
									</a>
									</h4>
								</div>
								<div class="block-content full">
									<?php echo stripslashes( $row['description'] ); ?>
								</div>
							</div>
						</div>

					<?php } ?>

					<div class="col-sm-12">
						<div class="webinar-archive-link">
							<span class="pull-right">
								<i class="gi gi-facetime_video"> </i>
								<?php
								$cLang = get_bloginfo('language');
								if ($cLang == 'en-US') { ?>
									<a href="<?php bloginfo('url'); ?>/webinars-archive/">
										<?php _e( 'Webinar Archive', 'jpbs31' ); ?>
									</a>
								<?php } else { ?>
									<a href="<?php bloginfo('url'); ?>/archivo-de-webinars/">
										<?php _e( 'Webinar Archive', 'jpbs31' ); ?>
									</a>
								<?php } ?>
							</span>
						</div>
					</div>

				</div>
			</div>

		<?php } else { // We have no posts ?>

			<div id="webinar-archive" class="block-content">
				<div class="row">
					<p><?php //_e( 'No post found', 'flexible-posts-widget' ); ?></p>
				</div>
			</div>

		<?php }; // End have_posts()

	echo $after_widget;
