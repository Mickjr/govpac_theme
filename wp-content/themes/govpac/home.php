<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package govpac
 */

get_header(); ?>


    <!-- begin:slider -->
    <div id="home">
		<?php dynamic_sidebar( 'slider' ); ?> 
    </div>
    <!-- end:slider -->


	<!-- begin:tagline -->
	<?php
		$welcome_title 		= of_get_option('welcome_header','');
		$welcome_content	= of_get_option('welcome_content','');
	?>
	<?php if ($welcome_title) { ?>
		<div id="tagline">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2><?php echo $welcome_title; ?></h2>
						<h4><?php echo $welcome_content; ?></h4>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- end:tagline -->

	<!-- begin:testimoni -->
	<div id="testimoni">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="testimoni-icon"><i class="fa fa-quote-left"></i></div>
					<h3>Recognition</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php dynamic_sidebar( 'testimonials' ); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- end:testimoni -->

	<!-- begin:blog -->
	<div id="blog">
		<div class="container">
			<?php dynamic_sidebar( 'home_posts' ); ?>
		</div>
	</div>
	<!-- end:blog -->

	<!-- begin:footer -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Follow us</h3>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus,<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->

					<?php
						$fb_link = of_get_option('facebook_link','');
						$tw_link = of_get_option('twitter_link','');
						$lk_link = of_get_option('linkedin_link','');
						$ig_link = of_get_option('instagram_link','');
						$gp_link = of_get_option('gplus_link','');
					?>

					<ul class="list-unstyled social-icon">

						<?php 
							if ($fb_link) { 
								$fb_title = of_get_option('facebook_title','default');
								$fb_class = of_get_option('facebook_class','default');
								$fb_icon  = of_get_option('facebook_icon','defaut');
						?>
							<li>
								<a 	href="<?php echo $fb_link; ?>" rel="tooltip" 
									title="<?php echo $fb_title; ?>" 
									class="<?php echo $fb_class; ?>"><span><i class="<?php $fb_icon; ?>"></i></span></a>
								</li>
						<?php } ?>

						<?php 
							if ($tw_link) { 
								$tw_title = of_get_option('twitter_title','default');
								$tw_class = of_get_option('twitter_class','default');
								$tw_icon  = of_get_option('twitter_icon','defaut');
						?>
							<li>
								<a 	href="<?php echo $tw_link; ?>" rel="tooltip" 
									title="<?php echo $tw_title; ?>" 
									class="<?php echo $tw_class; ?>"><span><i class="<?php $tw_icon; ?>"></i></span></a>
								</li>
						<?php } ?>

						<?php 
							if ($lk_link) { 
								$lk_title = of_get_option('linkedin_title','default');
								$lk_class = of_get_option('linkedin_class','default');
								$lk_icon  = of_get_option('linkedin_icon','defaut');
						?>
							<li>
								<a 	href="<?php echo $lk_link; ?>" rel="tooltip" 
									title="<?php echo $lk_title; ?>" 
									class="<?php echo $lk_class; ?>"><span><i class="<?php $lk_icon; ?>"></i></span></a>
								</li>
						<?php } ?>

						<?php 
							if ($ig_link) { 
								$ig_title = of_get_option('instagram_title','default');
								$ig_class = of_get_option('instagram_class','default');
								$ig_icon  = of_get_option('instagram_icon','defaut');
						?>
							<li>
								<a 	href="<?php echo $ig_link; ?>" rel="tooltip" 
									title="<?php echo $ig_title; ?>" 
									class="<?php echo $ig_class; ?>"><span><i class="<?php $ig_icon; ?>"></i></span></a>
								</li>
						<?php } ?>

						<?php 
							if ($gp_link) { 
								$gp_title = of_get_option('gplus_title','default');
								$gp_class = of_get_option('gplus_class','default');
								$gp_icon  = of_get_option('gplus_icon','defaut');
						?>
							<li>
								<a 	href="<?php echo $gp_link; ?>" rel="tooltip" 
									title="<?php echo $gp_title; ?>" 
									class="<?php echo $gp_class; ?>"><span><i class="<?php $gp_icon; ?>"></i></span></a>
								</li>
						<?php } ?>

		            </ul>

					<div class="sitemap">
						
						<?php dynamic_sidebar( 'footer_menu' ); ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:footer -->


<?php get_footer(); ?>
