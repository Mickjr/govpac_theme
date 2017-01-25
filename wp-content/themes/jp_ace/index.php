<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jpace
 */

get_header(); 

get_sidebar(); ?>

<div class="main-content">
	<div class="main-content-inner">
	
		<?php get_template_part( 'template-parts/content', 'breadcrumbs' ); ?>


		<div class="page-content">

			<div class="row">
				
				<div class="col-xs-12">

					<?php
							
					if ( have_posts() ) : 
									
						/* Start the Loop */
						while ( have_posts() ) : the_post(); ?>

							<div class="page-header">
								<h1>
									<?php the_title(); ?>
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										overview &amp; stats
									</small>
								</h1>
							</div><!-- /.page-header -->


						<?php 
							get_template_part( 'template-parts/content', get_post_format() );
				
						endwhile;
			
						the_posts_navigation();
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif; ?>

				</div><!-- end Column -->
						
			</div><!-- end of Row -->
									
		</div><!-- Page Content -->

	</div><!-- main-content-inner -->

</div><!-- #primary -->

<?php
get_footer();
?>