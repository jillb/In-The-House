<?php

// Add new post type for Recipes
add_action('init', 'cooking_recipes_init');
function cooking_recipes_init() 
{
	$recipe_labels = array(
		'name' => _x('Recipes', 'post type general name'),
		'singular_name' => _x('Recipe', 'post type singular name'),
		'all_items' => __('All Recipes'),
		'add_new' => _x('Add new recipe', 'recipes'),
		'add_new_item' => __('Add new recipe'),
		'edit_item' => __('Edit recipe'),
		'new_item' => __('New recipe'),
		'view_item' => __('View recipe'),
		'search_items' => __('Search in recipes'),
		'not_found' =>  __('No recipes found'),
		'not_found_in_trash' => __('No recipes found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $recipe_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'recipes'
	); 
	register_post_type('recipes',$args);
}

// Add new post type for Photos
add_action('init', 'cooking_photos_init');
function cooking_Photos_init() 
{
	$photo_labels = array(
		'name' => _x('Photos', 'post type general name'),
		'singular_name' => _x('Photo', 'post type singular name'),
		'all_items' => __('All Photos'),
		'add_new' => _x('Add new photo', 'photos'),
		'add_new_item' => __('Add new photo'),
		'edit_item' => __('Edit photo'),
		'new_item' => __('New photo'),
		'view_item' => __('View photo'),
		'search_items' => __('Search in photos'),
		'not_found' =>  __('No photos found'),
		'not_found_in_trash' => __('No photos found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $photo_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'photos'
	); 
	register_post_type('photos',$args);
}

// Add new post type for Videos
add_action('init', 'cooking_videos_init');
function cooking_videos_init() 
{
	$video_labels = array(
		'name' => _x('Videos', 'post type general name'),
		'singular_name' => _x('Video', 'post type singular name'),
		'all_items' => __('All Videos'),
		'add_new' => _x('Add new video', 'videos'),
		'add_new_item' => __('Add new video'),
		'edit_item' => __('Edit video'),
		'new_item' => __('New video'),
		'view_item' => __('View video'),
		'search_items' => __('Search in videos'),
		'not_found' =>  __('No videos found'),
		'not_found_in_trash' => __('No videos found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $video_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'videos'
	); 
	register_post_type('videos',$args);
}


// Add custom taxonomies
add_action( 'init', 'cooking_create_taxonomies', 0 );

function cooking_create_taxonomies() 
{
	// Meal type

		$meal_labels = array(
		'name' => _x( 'Meal type', 'taxonomy general name' ),
		'singular_name' => _x( 'Meal type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in meal type' ),
		'all_items' => __( 'All meal type' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit meal type' ), 
		'update_item' => __( 'Update meal type' ),
		'add_new_item' => __( 'Add new meal type' ),
		'new_item_name' => __( 'New meal type' ),
		'menu_name' => __( 'Meal type' ),
	);
	register_taxonomy('meal-type',array('recipes','photos','videos','post'),array(
		'hierarchical' => true,
		'labels' => $meal_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'meal-type' )
	));
}

?>
