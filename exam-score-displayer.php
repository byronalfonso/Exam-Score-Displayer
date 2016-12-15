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

$dir = plugin_dir_path(__FILE__);

require_once $dir . 'esd-cpt.php';
require_once $dir . 'esd-custom-fields.php';
require_once $dir . 'esd-shortcodes.php';