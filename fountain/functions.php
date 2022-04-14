<?php

/**
 * fountain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fountain
 */

if (!defined('FOUNTAIN_VERSION')) {
	// Replace the version number of the theme on each release.
	define('FOUNTAIN_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fountain_setup()
{
	load_theme_textdomain('fountain', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support('html5', array('navigation-widgets'));
	register_nav_menus(array('fountain-menu'=>esc_html__('Primary', 'fountain'),));
    add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption','style','script',));
	add_theme_support('custom-background',apply_filters('fountain_custom_background_args',array('default-color'=>'ffffff','default-image'=>'',)));
	add_theme_support('custom-logo',array('height'=>250,'width'=>250,'flex-width'=>true,'flex-height'=>true,));
}
add_action('after_setup_theme', 'fountain_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fountain_content_width()
{
	$GLOBALS['content_width'] = apply_filters('fountain_content_width', 640);
}
add_action('after_setup_theme', 'fountain_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action('widgets_init', 'fountain_widgets_init');
function fountain_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'fountain'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'fountain'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}


/**
 * Register custom fonts.
 */
add_editor_style(array(fountain_fonts_url()));
function fountain_fonts_url()
{
	$fonts_url = '';
	$font_families = array();
	$font_families[] = 'Roboto:300,300i,400,400i,500,700';
	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);
	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	return esc_url_raw($fonts_url);
}
/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'fountain_scripts');
function fountain_scripts()
{
	wp_enqueue_style('fountain-google-fonts', fountain_fonts_url(), array(), null);
	wp_enqueue_style('fountain-default-block-css', get_template_directory_uri() . '/assets/css/default-block.css', array(), FOUNTAIN_VERSION, 'all');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2', 'all');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
	wp_enqueue_style('slicknav-css', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0.3', 'all');
	wp_enqueue_style('fountain-style', get_template_directory_uri() . '/assets/css/fountain-style.css', array(), '1.0.0', 'all');
	wp_enqueue_style('fountain-style', get_stylesheet_uri(), array(), FOUNTAIN_VERSION);
	wp_style_add_data('fountain-style', 'rtl', 'replace');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.5.0', true);
	wp_enqueue_script('slicknav-js', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '1.0.3', true);
	wp_enqueue_script('fountain-script', get_template_directory_uri() . '/assets/js/fountain-script.js', array('jquery'), FOUNTAIN_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/fountain-hooks.php';
/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
