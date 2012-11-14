<?php

// Add new post type for Productions
add_action('init', 'inthehouse_productions_init');
function inthehouse_productions_init() 
{
	$production_labels = array(
		'name' => _x('Productions', 'post type general name'),
		'singular_name' => _x('Production', 'post type singular name'),
		'all_items' => __('All Productions'),
		'add_new' => _x('Add new production', 'productions'),
		'add_new_item' => __('Add new production'),
		'edit_item' => __('Edit production'),
		'new_item' => __('New production'),
		'view_item' => __('View production'),
		'search_items' => __('Search in productions'),
		'not_found' =>  __('No productions found'),
		'not_found_in_trash' => __('No productions found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $production_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title','thumbnail'),
		'has_archive' => 'productions'
	); 
	register_post_type('productions',$args);
}

// Add new post type for Events
add_action('init', 'inthehouse_events_init');
function inthehouse_events_init() 
{
	$event_labels = array(
		'name' => _x('Events', 'post type general name'),
		'singular_name' => _x('Event', 'post type singular name'),
		'all_items' => __('All Events'),
		'add_new' => _x('Add new event', 'events'),
		'add_new_item' => __('Add new event'),
		'edit_item' => __('Edit event'),
		'new_item' => __('New event'),
		'view_item' => __('View event'),
		'search_items' => __('Search in events'),
		'not_found' =>  __('No events found'),
		'not_found_in_trash' => __('No events found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $event_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','thumbnail'),
		'has_archive' => 'events'
	); 
	register_post_type('events',$args);
}

// Add new post type for Performers
add_action('init', 'inthehouse_performers_init');
function inthehouse_performers_init() 
{
	$performer_labels = array(
		'name' => _x('Performers', 'post type general name'),
		'singular_name' => _x('Performer', 'post type singular name'),
		'all_items' => __('All Performers'),
		'add_new' => _x('Add new performer', 'performers'),
		'add_new_item' => __('Add new performer'),
		'edit_item' => __('Edit performer'),
		'new_item' => __('New performer'),
		'view_item' => __('View performer'),
		'search_items' => __('Search in performer'),
		'not_found' =>  __('No performers found'),
		'not_found_in_trash' => __('No performers found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $performer_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title','thumbnail'),
		'has_archive' => 'performers'
	); 
	register_post_type('performers',$args);
}


// Add custom taxonomies
add_action( 'init', 'inthehouse_create_taxonomies', 0 );

function inthehouse_create_taxonomies() 
{
	// Show type

	$show_labels = array(
		'name' => _x( 'Show type', 'taxonomy general name' ),
		'singular_name' => _x( 'Show type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in show type' ),
		'all_items' => __( 'All show type' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit show type' ), 
		'update_item' => __( 'Update show type' ),
		'add_new_item' => __( 'Add new show type' ),
		'new_item_name' => __( 'New show type' ),
		'menu_name' => __( 'Show type' ),
	);

	register_taxonomy('show-type',array('productions'),array(
		'hierarchical' => true,
		'labels' => $show_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'show-type' )
	));


	// Performer type

	$performer_labels = array(
		'name' => _x( 'Performer type', 'taxonomy general name' ),
		'singular_name' => _x( 'Performer type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in performer type' ),
		'all_items' => __( 'All performer type' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit performer type' ), 
		'update_item' => __( 'Update performer type' ),
		'add_new_item' => __( 'Add new performer type' ),
		'new_item_name' => __( 'New performer type' ),
		'menu_name' => __( 'Performer type' ),
	);

	register_taxonomy('performer-type',array('performers'),array(
		'hierarchical' => true,
		'labels' => $performer_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'performer-type' )
	));


	// Audience Size
/*	$audiencesize_labels = array(
		'name' => _x( 'Audience Size', 'taxonomy general name' ),
		'singular_name' => _x( 'Audience Size', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in audience sizes' ),
		'popular_items' => __( 'Popular audience sizes' ),
		'all_items' => __( 'All audience sizes' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit audience size' ), 
		'update_item' => __( 'Update audience size' ),
		'add_new_item' => __( 'Add new audience size' ),
		'new_item_name' => __( 'New audience size name' ),
		'separate_items_with_commas' => __( 'Range of people it can accommodate, i.e. 50-100' ),
		'add_or_remove_items' => __( 'Add or remove audience size' ),
		'choose_from_most_used' => __( 'Choose from the most used audience size' )
	);


	register_taxonomy('audiencesizes',array('productions'),array(
		'hierarchical' => false,
		'labels' => $audiencesize_labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array('slug' => 'audiencesize' )
	));	*/
}

// Add new Custom Post Type icons
add_action( 'admin_head', 'show_icons' );
function show_icons() {
?>
	<style type="text/css" media="screen">
		#menu-posts-productions .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/productionsmall.png) no-repeat 6px !important;
		}
		.icon32-posts-productions {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/production.png) no-repeat !important;
		}
		#menu-posts-events .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/eventsmall.png) no-repeat 6px !important;
		}
		.icon32-posts-events {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/event.png) no-repeat !important;
		}
		#menu-posts-performers .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/performersmall.png) no-repeat 6px !important;
		}
		.icon32-posts-performers {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/performer.png) no-repeat !important;
		}

    </style>
<?php } 

?>
