<?php
/*
	Exam Score Display - Custom Fields
		- This is where all the meta boxes and custom fields are to be declared.
*/

function esd_add_custom_metaboxes(){

	add_meta_box(
		'esd_meta_results',
		'Skill Info',
		'esd_meta_skills_cb',
		'skill',
		'advanced',
		'high'
	);
}

add_action('add_meta_boxes', 'esd_add_custom_metaboxes');

// include all the callback functions file for all the meta boxes
require_once plugin_dir_path(__FILE__) . 'esd-custom-fields-cbs.php';

// Saving of custom fields here...
function esd_meta_save($post_id){
	// Check save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['esd_exam_nonce'] ) && wp_verify_nonce( $_POST['esd_exam_nonce'], basename(__FILE__) ) ) ? 'true' : 'false';

	//Exit if save status is unacceptable..
	if ($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}

	// Results metabox saving
	if ( isset($_POST['esd_skill_name']) ) {
		update_post_meta( $post_id, 'esd_skill_name', sanitize_text_field($_POST['esd_skill_name']) );
	}

	if ( isset($_POST['esd_skill_result']) ) {
		update_post_meta( $post_id, 'esd_skill_result', sanitize_text_field($_POST['esd_skill_result']) );
	}	
}

add_action('save_post', 'esd_meta_save');