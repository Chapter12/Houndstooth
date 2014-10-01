<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}

define('WALLPAPER_PROJECT_PAGE',"/wordpress/research-studio/wallpaper-project");
define('MATERIALS_PAGE',"/wordpress/research-studio/materials");
define('CO_DESIGN_PAGE',"/wordpress/research-studio/co-design");
define('COLLECTIONS_PAGE',"/wordpress/collections");

define('HOUNDSTOOTH_PAGE_ID', 203);
define('RESEARCH_STUDIO_PAGE_ID', 178);
define('SUBMISSIONS_PAGE_ID', 225);
define('SUBMIT_PAGE_ID', 132);
define('PROFILES_PAGE_ID', 307);
define('PROJECTS_PAGE_ID', 309);
define('SUBMISSION_COMPLETE_PAGE_ID', 336);
define('LOST_PASSWORD_PAGE_ID', 345);

define('NEWS_CATEGORY_ID',16);
define('SUBMISSIONS_CATEGORY_ID',17);

// Requires plugin: http://wordpress.org/support/view/plugin-reviews/page-excerpt
function page_teaser($page_id) {
  $houndstooth_page = get_post($page_id);
  $houndstooth_page_link = get_page_link($page_id);
  return "<p>" 
  . $houndstooth_page->post_excerpt
  . "</p>"
  . "<p><a href='"
  . $houndstooth_page_link
  . "'>About</a>";
}


/**
 * Setup theme and register support wp features.
 */
function bootstrapBasicSetup() 
{
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * 
	 * copy from underscores theme
	 */
	load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');
	
	// add theme support post and comment automatic feed links
	add_theme_support('automatic-feed-links');
	
	// enable support for post thumbnail or feature image on posts and pages
	add_theme_support('post-thumbnails');
	
	// add support menu
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'houndstooth'),
	));
	
	// add post formats support
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
	
	// add support custom background
	add_theme_support(
		'custom-background', 
		apply_filters(
			'bootstrap_basic_custom_background_args', 
			array(
				'default-color' => 'ffffff', 
				'default-image' => ''
			)
		)
	);
}// bootstrapBasicSetup
add_action('after_setup_theme', 'bootstrapBasicSetup');


/**
 * Register widget areas
 */
function bootstrapBasicWidgetsInit() 
{
	register_sidebar(array(
		'name'          => __('Header right', 'bootstrap-basic'),
		'id'            => 'header-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
	
	register_sidebar(array(
		'name'          => __('Navigation bar right', 'bootstrap-basic'),
		'id'            => 'navbar-right',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
	register_sidebar(array(
		'name'          => __('Sidebar left', 'bootstrap-basic'),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
	
	register_sidebar(array(
		'name'          => __('Sidebar right', 'bootstrap-basic'),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
	
	register_sidebar(array(
		'name'          => __('Footer left', 'bootstrap-basic'),
		'id'            => 'footer-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
	
	register_sidebar(array(
		'name'          => __('Footer right', 'bootstrap-basic'),
		'id'            => 'footer-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
}// bootstrapBasicWidgetsInit
add_action('widgets_init', 'bootstrapBasicWidgetsInit');


/**
 * Enqueue scripts & styles
 */
function bootstrapBasicEnqueueScripts() 
{
	wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style('font-style', get_template_directory_uri() . '/css/fonts.css');
	
	wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js');
	wp_enqueue_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js');
	wp_enqueue_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
}// bootstrapBasicEnqueueScripts
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';
