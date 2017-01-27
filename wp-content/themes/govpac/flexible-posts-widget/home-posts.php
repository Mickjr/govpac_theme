<?php
/**
 * Flexible Posts Widget: Default widget template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	//echo '<h3>' . $title . '</h3>';
	echo '<div class="row">';
		echo '<div class="col-md-12">';
			echo '<div class="heading-title">';
					echo '<h2>' .$title. '</h2>';
					echo '<p>We are a virtual medium through which various types of skills can be acquired and/or utilized.</p>';
			echo '</div>';
		echo '</div>';
	echo '</div>';



	if( $flexible_posts->have_posts() ):
	?>
		<div class="row">
		<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		
			<div class="col-md-4 col-sm-4">
				<div class="blog-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="blog-date">
						<i class="fa fa-bar-chart-o"></i>
						<?php $day = get_the_date(); ?>
						<!-- <span class="meta-date">26</span>
						<span class="meta-month-year">MAR 2014</span> -->
					</div>
					
					<h3><?php the_title(); ?></h3>
					<?php
						// get the content without Read More tag
						if (strpos($post->post_content,'<!--more-->')) {
							$id = get_the_ID();
						    $mylink = get_permalink($post->ID);
						    $myButton = '<p><a class="btn btn-black" href="' . 
						    	$mylink . '">Learn More</a></p>';
						    echo '<p>' .the_content('', TRUE). '</p>';
						    echo $myButton;
						} else {
							echo the_content();
						}
					?>
				</div>
			</div>

		<?php endwhile; ?>
		</div><!-- .dpe-flexible-posts -->

	<?php else: // We have no posts ?>

		<div class="dpe-flexible-posts no-posts">
			<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
		</div>

	<?php	
	endif; // End have_posts()
	
echo $after_widget;
