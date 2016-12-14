<?php
/**
* Plugin Name: Exam Score Displayer
* Author: Byron Alfonso
* Plugin URI: 
* Description: This plugin is used to display your exam score from a custom post type's custom fields.
* Author URI:
* Version: 0.0.1 
*/

//Exit if accessed directly

if ( !defined('ABSPATH') ){
	exit;
}

function esd_register_custom_post_types(){

	$singular = 'Exam';
	$plural = 'Exams';
	
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
		'slug' 			=> 'exams',
		'with_front' 	=> true,
		'pages' 		=> true,
		'feeds' 		=> true
	);

	$supports_options = array(
		'title' 		=> true,
		'editor' 		=> true,
		'author' 		=> true,
		'custom-fields' => true,
	);

	$args = array(
		'labels' 				=> $labels,
		'public'  				=> true,
		'publicly_queryable' 	=> true,
		'exclude_from_search' 	=> false,
		'show_in_nav_menus' 	=> false,
		'menu_position' 		=> 10,
		'menu_icon' 			=> 'dashicons-welcome-write-blog',
		'can_export' 			=> true,
		'delete_with_user' 		=> false,
		'hierarchical' 			=> false,
		'has_archive' 			=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'map_meta_cap'			=> true,
		'rewrite'				=> $rewrite_options,
		'supports' 				=> $supports_options
	);

	register_post_type( 'Exam', $args );
}

add_action('init', 'esd_register_custom_post_types');