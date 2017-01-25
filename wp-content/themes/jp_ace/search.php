<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package jpace
 */

get_header(); 

get_sidebar(); ?>

<div class="main-content">
	<div class="main-content-inner">
	
		<?php get_template_part( 'template-parts/content-breadcrumbs' ); ?>	


		<div class="page-content">

			<div class="row">
				
				<div class="col-xs-12">

					<?php
					if ( have_posts() ) : ?>
			
						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'jpace' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->
			
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
			
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
			
						endwhile;
			
						the_posts_navigation();
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif; ?>

				</div><!-- end Column -->
						
			</div><!-- end of Row -->
									
		</div><!-- Page Content -->

	</div><!-- #main-content-inner -->
</div><!-- #main-content -->

<?php
get_footer();
?>