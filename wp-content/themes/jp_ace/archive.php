<?php
/**
 * The template for displaying archive pages.
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
					if ( have_posts() ) : ?>
		
						<div class="page-header">
							<h1>
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									The &amp; Archives
								</small>
							</h1>
						</div><!-- /.page-header -->
			
						<header class="page-header">
		
						</header><!-- .page-header -->
			
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
			
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
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
