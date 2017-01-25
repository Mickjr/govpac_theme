<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title">
								<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'jpace' ); ?>
							</h1>
						</header><!-- .page-header -->
		
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jpace' ); ?></p>
		
							<?php
								get_search_form();
		
								the_widget( 'WP_Widget_Recent_Posts' );
		
								// Only show the widget if site has multiple categories.
								if ( jpace_categorized_blog() ) :
							?>
		
							<div class="widget widget_categories">
								<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'jpace' ); ?></h2>
								<ul>
								<?php
									wp_list_categories( array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									) );
								?>
								</ul>
							</div><!-- .widget -->
		
							<?php
								endif;
		
								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'jpace' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
		
								the_widget( 'WP_Widget_Tag_Cloud' );
							?>
		
				</div><!-- end Column -->
						
			</div><!-- end of Row -->

		</div><!-- Page Content -->

	</div><!-- main-content-inner -->

</div><!-- #primary -->

<?php
get_footer();
