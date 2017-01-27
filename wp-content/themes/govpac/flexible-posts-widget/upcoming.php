<?php
/**
 * Flexible Posts Widget: Full Post template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo '<p class="upcoming-title">' . $title . '</p>';

if( $flexible_posts->have_posts() ):
?>
	<div class="dpe-flexible-blog-posts">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
				<span class="wTitle"><?php the_title(); ?></span>
				<div class="fap-img">
					<?php
						if( $thumbnail == true ) {
							// If the post has a feature image, show it
							if( has_post_thumbnail() ) {
								the_post_thumbnail( $thumbsize );
							// Else if the post has a mime type that starts with "image/" then show the image directly.
							} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) { ?>
								<a class="fbp-a" href="<?php echo the_permalink(); ?>">
									<?php echo wp_get_attachment_image( $post->ID, $thumbsize ); ?>
								</a>
							<?php }
						}
					?>
				</div>
				<div class="pXcrt">
					<?php
						// get the content without Read More tag
			        if (strpos($post->post_content,'<!--more-->')) {
						$id = get_the_ID();
						$mylink = get_permalink($post->ID);
						$myButton = '<div class="r-more"><a class="cc-button" href="' . $mylink . '">Learn More</a></div>';
						echo the_content('', TRUE);
						echo $myButton;
					} else {
						echo the_content();
					}
				?>
				</div>
				<div style="clear: both;"></div>
	</div><!-- end of container div dpe-flexible-blog-post -->

	<?php endwhile; ?>
<?php else: // We have no posts ?>
		<div class="dpe-flexible-posts no-posts">
			<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
		</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
