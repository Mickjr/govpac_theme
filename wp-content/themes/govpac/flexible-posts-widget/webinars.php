<?php
/**
 * Flexible Posts Widget: webinars
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo '<h4 class="w-t">' . $title . '</h4>';

if( $flexible_posts->have_posts() ):
?>
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<div class="fpw-webinars">
				<div class="pXcrt">
					<?php echo the_content(); ?>
				</div>
				<div style="clear: both;"></div>
		</div><!-- end of container div dpe-flexible-blog-post -->

	<?php endwhile; ?>
<?php else: // We have no posts ?>
		<div class="dpe-flexible-posts no-posts">
			<p><?php //_e( 'No post found', 'flexible-posts-widget' ); ?></p>
		</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
