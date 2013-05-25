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

	register_sidebar( array(
		'name' => __( 'Footer', 'in_the_house' ),
		'id' => 'footer-1',
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

	/*	wp_enqueue_script('rooftops', get_template_directory_uri() . '/js/rooftops.js', false, null);*/
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

	$output = null;

	$festival = new WP_Query( array('post_type' => 'festival-event') );

	if ( $festival->have_posts() ) {
		while ( $festival->have_posts() ) {
			$festival->the_post();

			// title

			$output .= '<div id="' . str_replace(' ', '', get_field('title')) . '" class="festival_performance"><h3>' . get_field('title') . '</h3>';

			// date and time

			$output .= '<p class="festival_performance_datetime">' . get_field('date_and_time') . '</p>';

			// venue

			$thisvenue = get_field('festival-venue');

			$output .= '<p class="festival_performance_venue">' . $thisvenue->post_title . '</p>';

			// description

			$output .= get_field('description');

			// multiple performers

			if (get_field('performers')) {
				foreach(get_field('performers') as $performer) {

					// performer & image divs

					$output .= '<div class="festival_performer_container"><div class="festival_performer_img_container">';

					// image and orientation

					$img_attachment_id = get_field('performer_image1', $performer->ID); // attaching the value of the extra_image field to a variable - we may want to call it multiple times
					$this_image = wp_get_attachment_image_src( $img_attachment_id, "Performer_landscape_200w" );
					$width = $this_image[1];
					$height = $this_image[2];

					if ($width > $height) {
						$output .= wp_get_attachment_image( $img_attachment_id, Performer_landscape_200w);  // output the image
					}
					else {
						$output .= wp_get_attachment_image( $img_attachment_id, Performer_portrait_150w);
						$newimage = wp_get_attachment_image_src($img_attachment_id, Performer_landscape_200w);
						$height = $newimage[2];
					}

					// credits

					$credits = get_field('photo_credits1', $performer->ID);

					if ($credits) {
						$output .= '<p class="festival_performance_imgcredits">' . $credits . '</p>';
						$height += 10;
					}

					$output .= '</div><!-- /festival_performer_img_container -->';

					// performer url

					$performerurl = get_field('artists_website', $performer->ID);

					if ($performerurl) {
						$performerurl = (substr(strtolower($performerurl), 0, 7) == 'http://'?"":"http://").$performerurl;

					// performer title

						$output .= '<p class="festival-performer-title"><a href="' . $performerurl . '" target="_blank">' . get_the_title($performer->ID) . '</a></p>';

					// performer bio

						$output .= '<div class="festival_performer_bio" style="min-height: ' . $height . 'px">' . get_field('performer_bio', $performer->ID);

					// performer url

						$output .= '<a href="' . $performerurl . '" target="_blank" class="artists_site">' . $performerurl . '</a>';

					// edit performer link

						if (current_user_can('edit_others_posts'))
							$output .= '<a href="' . get_edit_post_link($performer->ID) . '" class="performer_edit_link">edit performer</a>';

						$output .= '</div><!-- /festival_performer_bio --> </div><!-- /festival_performer_container -->';
					}
					else {
					// performer title

						$output .= '<p class="festival-performer-title nolink">' . get_the_title($performer->ID) . '</p>';

					// performer bio

						$output .= '<div class="festival_performer_bio" style="min-height: ' . $height . 'px">' . get_field('performer_bio', $performer->ID);

					// edit performer link

						if (current_user_can('edit_others_posts'))
							$output .= '<a href="' . get_edit_post_link($performer->ID) . '" class="performer_edit_link">edit performer</a>';

						$output .= '</div><!-- /festival_performer_bio --> </div><!-- /festival_performer_container -->';
					}
				}
			}

			$output .= '<a href="#top" class="festival_returntotop">Back to top^</a>';

			if (current_user_can('edit_others_posts'))
				$output .= '<a href="' . get_edit_post_link() . '">edit festival show</a>';

			$output .= '</div><!-- /.festival_performance -->';

		}

    	// Reset the post data
		wp_reset_postdata();
	}

	return $output;
}

add_shortcode( 'festival-long', 'festivallong_func' );


/***
 * Add Date and Time Picker
 ***/

if(function_exists('register_field')) {
	register_field('acf_time_picker', dirname(__File__) . '/acf_time_picker/acf_time_picker.php');
}


/***
 * Change admin menu for less than Admin
 ***/

function change_admin_menus() {

	global $menu;

	global $current_user;

	$role_object = get_role( 'editor' );
	$role_object->add_cap( 'edit_theme_options' );

	if ( ! current_user_can( 'update_themes' ) ) {
		remove_menu_page( 'edit.php' ); // Posts
		remove_menu_page( 'link-manager.php' ); // Links	
		remove_menu_page( 'tools.php' ); // Tools

	}

}

add_action('admin_menu', 'change_admin_menus', 11);


function rem_dashboard_widgets() {
    // Globalize the metaboxes array, this holds all the widgets for wp-admin

	global $wp_meta_boxes;

  // Remove most boxes from the admin dashboard to clean it up

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

	remove_meta_box('rg_forms_dashboard', 'dashboard', 'norma;');

} 

add_action('wp_dashboard_setup', 'rem_dashboard_widgets' );

?>