<?php
/**
 * Flexible Posts Widget: About Us widget template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo '<h3>' . $title . '</h3>';

if( $flexible_posts->have_posts() ):
?>
	<ul class="dpe-flexible-posts">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="fap-img">
					<?php
						if( $thumbnail == true ) {
							// If the post has a feature image, show it
							if( has_post_thumbnail() ) {
								the_post_thumbnail( 'full' );
							// Else if the post has a mime type that starts with "image/" then show the image directly.
							} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) { ?>
								<a class="fbp-a" href="<?php echo the_permalink(); ?>">
									<?php echo wp_get_attachment_image( $post->ID, $thumbsize ); ?>
								</a>
							<?php }
						}
					?>
				</div>
				<?php $excerpt = get_the_excerpt(); ?>
				<div class="fp-ex65">
					<?php echo string_limit_words($excerpt, 65); ?>&nbsp;<a href="<?php echo the_permalink(); ?>">Learn More</a>
				</div>
				<div style="clear: both;"></div>
			</a>
		</li>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
