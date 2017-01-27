<?php
/**
 * Flexible Posts Widget: Default widget template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

if ( !empty($title) ) echo '<h4>' . $title . '</h4><hr/>';

if( $flexible_posts->have_posts() ):
?>
	<div id="cal-fpw">
		<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
			<div class="cal-post">
				<?php //$day = get_the_date(); ?>
				<?php $day = get_post_meta(get_the_ID(),'event_start_date',true); ?>
				<div class="fpwc-content">
					<div class="fpwc-date">
						<span class="fpwc-dow"><?php echo date('l', strtotime($day)); ?></span>
						<span class="fpwc-m"><?php echo strtoupper(date('M', strtotime($day))); ?></span>
						<span class="fpwc-d"><?php echo date('d', strtotime($day)); ?></span>
					</div>
					<div class="fpwc-ex30">
						<?php echo the_content(); ?>
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>
		<?php endwhile; ?>
	</div><!-- .dpe-flexible-posts -->

<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
	</div>
<?php	
endif; // End have_posts()
	
