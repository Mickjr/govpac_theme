<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package govpac
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();


				$img = get_the_post_thumbnail_url( $_post->ID, 'full' ); ?>

				<!-- begin:heading -->
				<div class="heads" style="background: url('<?php echo $img ?>') center center;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
					</div>
				</div>
				<!-- end:heading -->


				<div class="container">
					<div class="row">
						<div class="col-md-12">
	
							<?php
								get_template_part( 'template-parts/content', get_post_format() );
					
								the_post_navigation();
					
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						</div>
					</div>
				</div>
				
				
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
