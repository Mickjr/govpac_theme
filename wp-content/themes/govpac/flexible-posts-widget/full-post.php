<?php
/**
 * Flexible Posts Widget: Full Post template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

    if ( !empty($title) )
	echo $before_title . $title . $after_title;

    if( $flexible_posts->have_posts() ):
        ?>
            <div class="dpe-flexible-blog-posts">
                <?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>

					<?php 
						$currLang = get_bloginfo('language');
						if ($currLang == 'en-US') {
							$dd = get_the_date();
						} else {
							$day = get_the_date('j');
							$mon = get_the_date('F');
							$yea = get_the_date('Y');
							$dd = $day. " de " .$mon. " de " .$yea;
						}
					?>
					<div class="announX">                		
                        <?php echo '<h4>' . get_the_title($post->ID) . '<br />'; ?>
                        <?php
							if ($currLang == 'en-US') { 
								echo "<small>Posted on: " . $dd. "</small></h4>";
							} else {
								echo "<small>Publicado: ". $dd. "</small></h4>"; 
							}
						?>

						<div class="pXcrt">
							<?php
								// get the content without Read More tag
								if (strpos($post->post_content,'<!--more-->')) {
									$id = get_the_ID();
								    $mylink = get_permalink($post->ID);
								    $myButton = '<div class="r-more"><a class="cc-button" href="' . 
								    	$mylink . '">Learn More</a></div>';
								    echo the_content('', TRUE);
								    echo $myButton;
								} else {
									echo the_content();
								}
							?>
						</div>
					</div>					

                <?php endwhile; ?>
            </div><!-- end of container div dpe-flexible-blog-post -->

        <?php else: // We have no posts ?>
        	<?php /*
                <div class="dpe-flexible-posts no-posts">
                        <p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
                </div>
            */ ?>
        <?php	
    endif; // End have_posts()
	
echo $after_widget;
