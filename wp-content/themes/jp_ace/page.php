<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

		<div class="page-content" role="main">

			<div class="row">
				
				<div class="col-xs-12">

					<?php
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
						get_template_part( 'template-parts/content', 'page' );
		
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
		
					endwhile; // End of the loop.
					?>

				</div><!-- end Column -->
						
			</div><!-- end of Row -->

		</div><!-- Page Content -->

	</div><!-- main-content-inner -->

</div><!-- #primary -->

<?php
get_footer();
?>
