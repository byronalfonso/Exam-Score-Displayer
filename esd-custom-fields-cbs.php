<?php

// Call back function for the Results metabox (esd_meta_results)
function esd_meta_results_cb( $post ){
	wp_nonce_field( basename(__FILE__), 'esd_exam_nonce' );
	$esd_stored_meta = get_post_meta( $post->ID );
	?>
	<div class="esd-meta-box">
		
		<div class="esd-meta-field">
			<p>
				<label for="esd-results-status">Status: </label>
			</p>
			<p>				
				<input type="text" 
					id="esd-results-status" 
					name="exam_status" 
					value="<?php if (! empty($esd_stored_meta['exam_status']) ) echo esc_attr($esd_stored_meta['exam_status'][0]) ?>" 
					placeholder="Enter if passed or fail">
			</p>
		</div>
		<div class="esd-meta-field">
			<p>
				<label for="esd-results-time">Time: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="exam_time" type="text" 
					id="esd-results-time" 
					value="<?php if (! empty($esd_stored_meta['exam_time']) ) echo esc_attr($esd_stored_meta['exam_time'][0]) ?>" 
					placeholder="Please enter the correct time">
			</p>
		</div>

	</div>
	<?php
}

// Call back function for the Breakdown metabox (esd_meta_breakdown)
function esd_meta_breakdown_cb( $post ){
	wp_nonce_field( basename(__FILE__), 'esd_exam_nonce' );
	$esd_stored_meta = get_post_meta( $post->ID );
	?>
	<div class="esd-meta-box">
		
		<div class="esd-meta-field">
			<p>
				<label for="esd-breakdown-numerical">Numerical reasoning: </label>
			</p>
			<p>				
				<input type="text" 
					id="esd-breakdown-numerical" 
					name="esd_breakdown_numerical" 
					value="<?php if (! empty($esd_stored_meta['esd_breakdown_numerical']) ) echo esc_attr($esd_stored_meta['esd_breakdown_numerical'][0]) ?>" 
					placeholder="Enter score">
			</p>
		</div>

		<div class="esd-meta-field">
			<p>
				<label for="esd-breakdown-sql">SQL: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="esd_breakdown_sql" type="text" 
					id="esd-breakdown-sql" 
					value="<?php if (! empty($esd_stored_meta['esd_breakdown_sql']) ) echo esc_attr($esd_stored_meta['esd_breakdown_sql'][0]) ?>" 
					placeholder="Enter score">
			</p>
		</div>

		<div class="esd-meta-field">
			<p>
				<label for="esd-breakdown-php">PHP: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="esd_breakdown_php" type="text" 
					id="esd-breakdown-php" 
					value="<?php if (! empty($esd_stored_meta['esd_breakdown_php']) ) echo esc_attr($esd_stored_meta['esd_breakdown_php'][0]) ?>" 
					placeholder="Enter score">
			</p>
		</div>

		<div class="esd-meta-field">
			<p>
				<label for="esd-breakdown-html-css">HTML/CSS: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="esd_breakdown_html_css" type="text" 
					id="esd-breakdown-html-css" 
					value="<?php if (! empty($esd_stored_meta['esd_breakdown_html_css']) ) echo esc_attr($esd_stored_meta['esd_breakdown_html_css'][0]) ?>" 
					placeholder="Enter score">
			</p>
		</div>

		<div class="esd-meta-field">
			<p>
				<label for="esd-breakdown-js">Javascript: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="esd_breakdown_js" type="text" 
					id="esd-breakdown-js" 
					value="<?php if (! empty($esd_stored_meta['esd_breakdown_js']) ) echo esc_attr($esd_stored_meta['esd_breakdown_js'][0]) ?>" 
					placeholder="Enter score">
			</p>
		</div>

		<div class="esd-meta-field">
			<p>
				<label for="esd-breakdown-wp">Wordpress: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="esd_breakdown_wp" type="text" 
					id="esd-breakdown-wp" 
					value="<?php if (! empty($esd_stored_meta['esd_breakdown_wp']) ) echo esc_attr($esd_stored_meta['esd_breakdown_wp'][0]) ?>" 
					placeholder="Enter score">
			</p>
		</div>

	</div>
	<?php
}

// Call back function for the History metabox (esd_meta_history)
function esd_meta_history_cb( $post ){
	wp_nonce_field( basename(__FILE__), 'esd_exam_nonce' );
	$esd_stored_meta = get_post_meta( $post->ID );
	?>
	<div class="esd-meta-box">
		
		<div class="esd-meta-field">
			<p>
				<label for="esd-history-invite-date">Invite Date: </label>
			</p>
			<p>				
				<input type="date" 
					id="esd-history-invite-date" 
					name="exam_invite_date" 
					value="<?php if (! empty($esd_stored_meta['exam_invite_date']) ) echo esc_attr($esd_stored_meta['exam_invite_date'][0]) ?>" 
					placeholder="Enter if passed or fail">
			</p>
		</div>
		<div class="esd-meta-field">
			<p>
				<label for="esd-history-start-date">Start Date: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="exam_start_date" 
					type="date" 
					id="esd-history-start-date" 
					value="<?php if (! empty($esd_stored_meta['exam_start_date']) ) echo esc_attr($esd_stored_meta['exam_start_date'][0]) ?>" 
					placeholder="Please enter the correct time">
			</p>
		</div>

		<div class="esd-meta-field">
			<p>
				<label for="esd-history-completed-date">Completed Date: </label>
			</p>
			<p>
				<input 
					style="width:100%;max-width:210px;" 
					name="exam_completed_date" 
					type="date" 
					id="esd-history-completed-date" 
					value="<?php if (! empty($esd_stored_meta['exam_completed_date']) ) echo esc_attr($esd_stored_meta['exam_completed_date'][0]) ?>" 
					placeholder="Please enter the correct time">
			</p>
		</div>

	</div>
	<?php
}