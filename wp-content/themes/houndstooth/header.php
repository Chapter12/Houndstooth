<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!--wordpress head-->
		<?php wp_head(); ?>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery.fancy-scroll.js"></script>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/css/colorbox.css">
    <?php /*<script src="jquery.min.js"></script> */ ?>

    <script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery.colorbox-min.js"></script>
    
    
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		
		<div class="navbar-fixed-top solid-navbar">	
      <div class="container page-container">
        <?php do_action('before'); ?> 
        <header role="banner">
          <div class="row">

              <div class="title-container">
                <h1 class="site-title-heading">
<!--                  <img style='vertical-align:middle' src="<?php echo get_bloginfo('template_url') ?>/img/ht_logo.png" /> -->
                  <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                </h1>
              </div> <!-- title_container -->

              <div class="nav-container">
                <nav class="navbar htnavbar" role="navigation">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
                      <span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  
                  <div class="collapse navbar-collapse navbar-primary-collapse">
                      
                    <?php /* Note, need to create menu through dashboard for WP to take any notice of these parameters.. WTF.. */
                          wp_nav_menu(array('theme_location' => 'primary', 
                                            'container' => 'div',
                                            'container_class' => 'menu', 
                                            'menu_class' => 'nav navbar-nav',
                                            /* DAMC - not sure what the param below does, but it stops the nav showing */
                                          /*  'walker' => new BootstrapBasicMyWalkerNavMenu() */
                                      )); ?>
                  </div><!--.navbar-collapse-->
                </nav>
              </div><!-- nav_container -->
<!-- site_title - was here.. -->
          </div><!-- container page-container -->
          
        </header>
      </div>
      <div class='separator'>
      </div>
    </div> <!-- navbar-fixed-top -->	
	
	
		<div class="container page-container site-content-wrapper">	
			<div id="content" class="row row-with-vspace site-content">

        <div class="breadcrumbs">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>
        
