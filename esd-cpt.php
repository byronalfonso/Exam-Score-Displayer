<?php
/*
	Exam Score Display - Custom Post Types
		- This is where all the custom post types are to be declared
*/

function esd_register_custom_post_types(){

	$singular = 'Skill';
	$plural = 'Skills';
	
	$labels = array(
		'name' 					=> $plural,
		'singular' 				=> $singular,
		'add_name' 				=> 'Add New',
		'add_new_item' 			=> 'Add New ' . $singular,
		'edit' 					=> 'Edit',
		'edit_item'				=> 'Edit ' . $singular ,
		'new_item' 				=> 'New ' . $singular,
		'view' 					=>	'View ' . $singular,
		'view_item' 			=>	'View ' . $singular,
		'search_term' 			=>	'Serach ' . $plural,
		'parent' 				=>	'Parent ' . $singular,
		'not_found' 			=>	'No ' . $plural . ' found',
		'not_found_in_trash' 	=> 'No ' . $plural . ' found'
	);

	$rewrite_options = array(
		'slug' 			=> 'skills',
		'with_front' 	=> true,
		'pages' 		=> true,
		'feeds' 		=> false
	);

	$supports_options = array('title');

	$args = array(
		'labels' 				=> $labels,
		'public'  				=> true,
		'publicly_queryable' 	=> true,
		'exclude_from_search' 	=> false,
		'show_in_nav_menus' 	=> true,
		'show_ui' 				=> true,
		'show_in_menu' 			=> true,
		'show_in_admin_bar' 	=> true,
		'menu_position' 		=> 10,
		'menu_icon' 			=> 'dashicons-welcome-write-blog',
		'can_export' 			=> true,
		'delete_with_user' 		=> false,
		'hierarchical' 			=> false,
		'has_archive' 			=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'map_meta_cap'			=> true,
		// 'capabilities' => array()
		'supports' 				=> $supports_options,
		'rewrite'				=> $rewrite_options		
	);

	register_post_type( 'Skill', $args );
}

add_action('init', 'esd_register_custom_post_types');