<?php
/**
 * In The House functions and definitions
 *
 * @package In The House
 * @since In The House 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since In The House 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'in_the_house_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since In The House 1.0
 */
function in_the_house_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on In The House, use a find and replace
	 * to change 'in_the_house' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'in_the_house', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'in_the_house' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // in_the_house_setup
add_action( 'after_setup_theme', 'in_the_house_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since In The House 1.0
 */
function in_the_house_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'in_the_house' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'in_the_house_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function in_the_house_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'in_the_house_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );



/***
 * Create a shortcode to display the festival info
 */

//[festival-long]
function festivallong_func( $atts ){

// The Query
	query_posts( 'post_type=festival-event' );

	$output = null;

// The Loop
	while ( have_posts() ) : the_post();
	$output .= '<div id="' . str_replace(' ', '', get_field('title')) . '" class="festival_performance"><h3>' . get_field('title') . '</h3>';
	$output .= '<p class="festival_performance_datetime">' . get_field('date_and_time') . '</p>';
	$output .= '<p>' . get_field('description') . '</p>';
	?>
	<?php
	if (get_field('performers')) {
		foreach(get_field('performers') as $performer) {

			$image = get_field('performer_image1', $performer->ID);

			$output .= '<p class="festival-performer-title">' . get_the_title($performer->ID) . '</p>';

			$output .= '<div class="festival_performer_img_container"><img src="' . $image[url] . '" class="festival_performer_img" /></div>';

			$output .= '<div class="festival_performer_bio">' . get_field('performer_bio', $performer->ID) . '</div>';
		}
	}

	$output .= '</div>';

	endwhile;

// Reset Query
	wp_reset_query();


	return $output;
}

add_shortcode( 'festival-long', 'festivallong_func' );


/***
 * Add Date and Time Picker
 ***/

if(function_exists('register_field')) {
     register_field('acf_time_picker', dirname(__File__) . '/acf_time_picker/acf_time_picker.php');
   }

?>