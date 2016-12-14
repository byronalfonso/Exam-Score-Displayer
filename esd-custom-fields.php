<?php
/*
	Exam Score Display - Custom Fields
		- This is where all the meta boxes and custom fields are to be declared.
*/

function esd_add_custom_metaboxes(){

	add_meta_box(
		'esd_meta_results',
		'Results',
		'esd_meta_results_cb',
		'exam',
		'advanced',
		'high'
	);

	add_meta_box(
		'esd_meta_breakdown',
		'Breakdown',
		'esd_meta_breakdown_cb',
		'exam',
		'advanced',
		'high'
	);

	add_meta_box(
		'esd_meta_history',
		'Breakdown',
		'esd_meta_history_cb',
		'exam',
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
	if ( isset($_POST['exam_status']) ) {
		update_post_meta( $post_id, 'exam_status', sanitize_text_field($_POST['exam_status']) );
	}

	if ( isset($_POST['exam_time']) ) {
		update_post_meta( $post_id, 'exam_time', sanitize_text_field($_POST['exam_time']) );
	}

	// Breakdown metabox saving
	if ( isset($_POST['esd_breakdown_numerical']) ) {
		update_post_meta( $post_id, 'esd_breakdown_numerical', sanitize_text_field($_POST['esd_breakdown_numerical']) );
	}
	
	if ( isset($_POST['esd_breakdown_sql']) ) {
		update_post_meta( $post_id, 'esd_breakdown_sql', sanitize_text_field($_POST['esd_breakdown_sql']) );
	}
	
	if ( isset($_POST['esd_breakdown_php']) ) {
		update_post_meta( $post_id, 'esd_breakdown_php', sanitize_text_field($_POST['esd_breakdown_php']) );
	}
	
	if ( isset($_POST['esd_breakdown_html_css']) ) {
		update_post_meta( $post_id, 'esd_breakdown_html_css', sanitize_text_field($_POST['esd_breakdown_html_css']) );
	}

	if ( isset($_POST['esd_breakdown_js']) ) {
		update_post_meta( $post_id, 'esd_breakdown_js', sanitize_text_field($_POST['esd_breakdown_js']) );
	}

	if ( isset($_POST['esd_breakdown_wp']) ) {
		update_post_meta( $post_id, 'esd_breakdown_wp', sanitize_text_field($_POST['esd_breakdown_wp']) );
	}

	// History metabox saving
	if ( isset($_POST['exam_invite_date']) ) {
		update_post_meta( $post_id, 'exam_invite_date', sanitize_text_field($_POST['exam_invite_date']) );
	}

	if ( isset($_POST['exam_start_date']) ) {
		update_post_meta( $post_id, 'exam_start_date', sanitize_text_field($_POST['exam_start_date']) );
	}

	if ( isset($_POST['exam_completed_date']) ) {
		update_post_meta( $post_id, 'exam_completed_date', sanitize_text_field($_POST['exam_completed_date']) );
	}
}

add_action('save_post', 'esd_meta_save');












