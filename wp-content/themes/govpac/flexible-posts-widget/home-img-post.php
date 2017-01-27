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
			<div class="pXcrt">
				<a class="hpi" href="<?php echo the_permalink(); ?>">
					<?php
						if( $thumbnail == true ) {
							// If the post has a feature image, show it
							if( has_post_thumbnail() ) {
								the_post_thumbnail( $thumbsize );
							// Else if the post has a mime type that starts with "image/" then show the image directly.
							} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) { ?>
									<?php echo wp_get_attachment_image( $post->ID, $thumbsize ); ?>
							<?php }
						}
					?>
				</a>
				<?php
					// get the content without Read More tag
				    $content = get_the_content('',TRUE);
				    echo '<h1>';
				    echo the_title();
				    echo '</h1>';
				    echo the_content();
				?>
			</div>
			<div style="clear: both;"></div>
			<?php /* 
				<a style="width: 40px;" class="cc-button ab-bottom" href="<?php echo the_permalink(); ?>">More</a>
			*/ ?>
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
