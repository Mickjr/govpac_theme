<?php
/*
Template Name: MOD-Uploads
*/
?>

<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/sheetjs/vendor/alertify.css" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/chosen/chosen.css" />

<!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/MOD-Uploads/style.css" /> -->

		<!-- SCRIPTS -->
<!--         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jQuery/jquery-1.11.2.js"></script> -->
		<script src="<?php bloginfo('template_url'); ?>/vendors/chosen/chosen.jquery.min.js" ></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/sheetjs/vendor/alertify.js"></script>
		        
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxcore.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxmenu.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.filter.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.selection.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxcheckbox.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxdropdownlist.js"></script>

        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.columnsresize.js"></script>





<?php get_header(); ?>
<?php get_sidebar(); ?>

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
	
	
						MY CONTENT WILL GO HERE
	
	
	
		
					<?php
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
