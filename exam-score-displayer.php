<?php
/**
* Plugin Name: Exam Score Displayer
* Author: Byron Alfonso
* Plugin URI: 
* Description: This is my first crack on making a wordpress plugin. It is a dummy plugin that is used to display your exam score from a custom post type's (skill) custom fields. It has custom post type, shortcode functionality. It also utilized wp_ajax to fetch the breakdown of hypothetical skill result.
* Author URI:
* Version: 0.0.1 
*/

//Exit if accessed directly

if ( !defined('ABSPATH') ){
	exit;
}

$dir = plugin_dir_path(__FILE__);

require_once $dir . 'esd-cpt.php';
require_once $dir . 'esd-custom-fields.php';
require_once $dir . 'esd-shortcodes.php';