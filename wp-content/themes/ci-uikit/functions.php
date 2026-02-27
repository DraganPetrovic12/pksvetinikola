<?php
/**
 * ci-uikit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ci-uikit
 */

if ( ! function_exists( 'ci_uikit_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ci_uikit_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ci-uikit, use a find and replace
		 * to change 'ci-uikit' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ci-uikit', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ci-uikit' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ci_uikit_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ci_uikit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ci_uikit_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ci_uikit_content_width', 640 );
}
add_action( 'after_setup_theme', 'ci_uikit_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ci_uikit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ci-uikit' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ci-uikit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ci_uikit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ci_uikit_scripts() {
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/libraries/swiper/css/swiper-bundle.min.css');

	wp_enqueue_style( 'ci-uikit-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ci-uikit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215' );

	wp_enqueue_script( 'ci-uikit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215' );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/libraries/swiper/js/swiper-bundle.min.js', array(), '7.2.0' );

	wp_enqueue_script( 'uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array(), '3.1.9' );

	wp_enqueue_script( 'uikit-icons-js', get_template_directory_uri() . '/js/uikit-icons.min.js', array(), '3.1.9' );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '6.5.2' );

	wp_localize_script( 'main-js', 'ajax_data', array( 'ajax_url' => admin_url('admin-ajax.php')) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ci_uikit_scripts' );

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer="defer" src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** option page **/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

/**
 * add custom image sizes
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumb', 410, 410, true );
	add_image_size( 'half-content', 860, 860);
	add_image_size( 'full-hero-size', 1920);
}

/**
 * Add Formats button to the wysiwyg
 */
if ( ! function_exists( 'wysiwyg_styleselect_button' ) ) {
	function wysiwyg_styleselect_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	add_filter( 'mce_buttons_2', 'wysiwyg_styleselect_button' );
}


if ( ! function_exists( 'wysiwyg_style_formats' ) ) {
	function wysiwyg_style_formats( $settings ) {
		$settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr,';
		$style_formats = array(
			array( 'title' => 'Yellow Button', 'selector'=>'a', 'classes' => 'button yellow' ),
			array( 'title' => 'Dark Blue Button', 'selector'=>'a', 'classes' => 'button dark-blue' ),
			array( 'title' => 'Transparent Button', 'selector'=>'a', 'classes' => 'button transparent' ),
		);
		$settings['style_formats'] = json_encode( $style_formats );
		return $settings;
	}
	add_filter( 'tiny_mce_before_init', 'wysiwyg_style_formats' );
}

/** custom colors in wysiwyg **/
function my_mce4_options($init) {

		$custom_colours = '
				"08374f", "Dark Blue",
				"029bf3", "Light Blue",
				"DDDDDD", "Light Gray",
				"2C2C29", "Dark Gray",
				"000000", "Black",
				"B14A32", "Terracot",
				"ffcf03", "Yellow",
				"FFFFFF", "White"
		';

		// build colour grid default+custom colors
		$init['textcolor_map'] = '['.$custom_colours.']';

		// change the number of rows in the grid if the number of colors changes
		// 8 swatches per row
		$init['textcolor_rows'] = 1;

		return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');
