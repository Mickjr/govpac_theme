<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <!-- Seo Meta -->
    <meta name="description" content="The current source for your government consulting needs."/>
    <meta name="keywords" content="social, military, twitter, facebook, media, linkedin, instagram, unlimited, consultant, news, property, government, contractor, certification"/>
    <meta property="fb:app_id" content="290969614437361"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Government Property Accountability Consultants Website"/>
    <meta name="description" content="The current source for government consulting needs."/>
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/img04.png"/>
    <meta property="og:site_name" content="govpac"/>
    <meta property="og:url" content="<?php bloginfo('url'); ?>">

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@govpac"/>
    <meta name="twitter:title" content="Government Property Accountability Consultants Website"/>
    <meta name="description" content="The current source for your government consulting needs."/>
    <meta name="twitter:image" content="<?php bloginfo('template_url') ?>/img/img04.png"/>
    <meta name="twitter:url" content="<?php bloginfo('url'); ?>"/>

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png">

    <title>Government Property Accountability Consultants(GPAC)</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
    <![endif]-->
    
    <style>
		.test {
		    display: block;
		    left: 42%;
		    margin-left: -45px !important;
		    margin-top: -60px;
		    position: absolute;
		}
		.navbar {
		    box-shadow: 2px 2px 4px 4px #000000;
		    color: #000000;
		    min-height: 100px;
		    opacity: 0.8;
		    padding: 2px;
		}

    </style>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'govpac' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
<!--
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div>
-->
		<!-- .site-branding -->



<!--
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'govpac' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
-->
		<!-- #site-navigation -->

	<nav id="site-navigation" class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="test2 navbar-brand visible-xs" href="#"><img src="<?php bloginfo('template_url'); ?>/img/logo8.png" alt="Government Property Accountability Consultants"><h6><!-- <bold>Government Property Accountability Consultants</bold> --></h6></a>
          <br>
        </div>
		<a href="#" class="test visible-lg visible-md"><img src="/wp-content/uploads/2017/01/logo7.png" alt="Government Property Accountability Consultants"></a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!--
        	<ul class="nav navbar-nav nav-left">
			  <li class="active"><a href="index.html">Home</a></li>
			  <li><a href="about.html">About</a></li>
			  <li><a href="support.html">Support</a></li>
              <li><a href="certs.html">Certs</a></li>
			</ul>
			<div id="" class="visible-lg visible-md">&nbsp;</div>
			<ul class="nav navbar-nav nav-right">
			  <li><a href="#">Recognition</a></li>
			  <li><a href="contact.html">Contact</a></li>
			</ul>
-->
	
			<?php 
				wp_nav_menu(
					array(
						'menu'    		=> 'primary',
						'container'     => '',
						'menu_class'    => 'nav navbar-nav nav-left',
					)
				);
			 ?>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
