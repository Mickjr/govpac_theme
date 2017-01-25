<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/font-awesome/4.2.0/css/font-awesome.min.css" />	
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/chosen.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/datepicker.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/alertify/alertify.css" />
	
	<!-- text fonts -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- ace settings handler -->
	<script src="<?php bloginfo('template_url'); ?>/assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>

			
	<?php 
	
		global $jpbs_options;
	
		wp_head(); 
		
		$current_user = wp_get_current_user();
		
		$usr['ID'] 		= $current_user->ID;
		$usr['FName'] 	= $current_user->first_name;
		$usr['LName'] 	= $current_user->last_name;
		$usr['Email'] 	= $current_user->user_email;
		$usr['Role']  	= $current_user->roles[0];
		$usr['Gender'] 	= get_user_meta( $usr['ID'], 'gender', true);
		
		$usr['Pic']		= get_avatar_url($usr['ID']);

	?>
</head>

<body <?php body_class( $jpbs_options['body-class'] ); ?>>

<div id="page" class="site">

		<?php
			if ($jpbs_options['navbar-fixed']) {
				$navfix = " navbar-fixed-top ";
			} else {
				if ($jpbs_options['breadcrumbs-fixed']) {
					$navfix = " navbar-fixed-top ";
				} else {
					$navfix = "";
				}
			}
		?>

		<div id="navbar" class="navbar navbar-default <?php echo $navfix; ?>">

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<?php if ($jpbs_options['site-logo']['url']) { ?>
								<img src="<?php echo $jpbs_options['site-logo']['url']; ?>" 
									 height="<?php echo $jpbs_options['site-logo']['height']; ?>" 
									 width="<?php echo $jpbs_options['site-logo']['width']; ?>" 
									 alt="Site Logo" />
							<?php } else { ?>
								<?php if ($jpbs_options['site-icon']) { ?>
								<?php echo '<i class="' .$jpbs_options['site-icon']. '"></i>'; ?>
								<?php } else { ?>
									<i class="fa fa-leaf"> </i>
								<?php } ?> 
							<?php } ?>
							<?php if ($jpbs_options['site-title']) { ?>
								<?php echo $jpbs_options['site-title']; ?>
							<?php } else { ?>
								<?php bloginfo( 'name' ); ?>
							<?php } ?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="<?php echo $jpbs_options['userbox-bg']; ?>">
							<a id="propic" data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php 
									if ( is_user_logged_in() ) {
										echo get_avatar( $usr['ID'], 40, 'nav-user-photo' ); 
									}
								?>
								<span class="user-info">
									<small><?php _e('Welcome, ', 'jpace'); ?></small>
									<?php echo $usr['FName']; ?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<?php if ($usr['Role'] == 'administrator' || $usr['Role'] == 'frontend_admin') { ?>
								<li>
									<a href="<?php site_url(); ?>/wp-admin" target="_blank">
										<i class="ace-icon fa fa-cog"></i>
										<?php _e('WP Dashboard', 'jpace'); ?>
									</a>
								</li>
								<?php } ?>

								<li>
									<a href="/account">
										<i class="ace-icon fa fa-user"></i>
										<?php _e('Profile', 'jpace'); ?>
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="/wp-login.php?action=logout">
										<i class="ace-icon fa fa-power-off"></i>
										<?php _e('Logout', 'jpace'); ?>
									</a>
								</li>
							</ul>
						</li><!-- light-blue -->

					</ul>
					
				</div>
			</div><!-- /.navbar-container -->
		</div>
		
		<?php 
			if ($jpbs_options['main-container']) {
				$mcclass = " container ";
			} else {
				$mcclass = "";
			}
		?>


	<div id="main-container" class="main-container <?php echo $mcclass; ?>">
	
		<?php
/*
			echo "<pre>";	
				var_dump($jpbs_options['site-title']);
				bloginfo( 'name' );
			echo "</pre>";
*/
		?>