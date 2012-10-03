<?php

// Add new post type for Recipes
add_action('init', 'cooking_recipes_init');
function cooking_recipes_init() 
{
	$args = array(
		'label' => __('Recipes'),
		'singular_label' => __('Recipe'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','comments')
	); 
	register_post_type('recipes',$args);
}

// Add new post type for Photos
add_action('init', 'cooking_photos_init');
function cooking_Photos_init() 
{
	$args = array(
		'label' => __('Photos'),
		'singular_label' => __('Photo'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','comments')
	); 
	register_post_type('photos',$args);
}

// Add new post type for Videos
add_action('init', 'cooking_videos_init');
function cooking_videos_init() 
{
	$args = array(
		'label' => __('Videos'),
		'singular_label' => __('Video'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','comments')
	); 
	register_post_type('videos',$args);
}

?>