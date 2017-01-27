<?php
/**
 * Flexible Posts Widget: triple-Color template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo '<h3>' . $title . '</h3>';

if( $flexible_posts->have_posts() ):
?>
	<ul id="tri-color">
	<?php 
		$x = 1;
		$c = ""; 
	?>
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="tp-container">
				<div class="feat">
					<?php 
						switch ($x) {
							case 1:
								$c = "blue";
								break;
							case 2:
								$c = "red";
								break;
							case 3:
								$c = "green";
								break;
						}
					?>
					<?php echo '<span class="' . $c . '">'; ?><?php the_title(); ?></span>
					<?php $excerpt = get_the_excerpt(); ?>
					<?php echo string_limit_words($excerpt, 25); ?><br/>
					<a class="ft-link" href="<?php echo the_permalink(); ?>">Learn more...</a>
				</div>
			</div>
			<div style="clear: both;"></div>
		</li>
		<?php $x++; ?>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
