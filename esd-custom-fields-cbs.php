<?php
/*
	Exam Score Display - Metabox Callback Functions
		- This is where all the call back functions for meta boxes declaration are stored.
*/

// Call back function for the Results metabox (esd_meta_results)
function esd_meta_skills_cb( $post ){
	wp_nonce_field( basename(__FILE__), 'esd_exam_nonce' );
	$esd_stored_meta = get_post_meta( $post->ID );
	?>
	<div class="esd-meta-box">
		
		<div class="esd-meta-field">
			<p>
				<label for="esd-skill-name">Skill Name: </label>
			</p>
			<p>				
				<input type="text" 
					id="esd-skill-name" 
					name="esd_skill_name" 
					value="<?php if (! empty($esd_stored_meta['esd_skill_name']) ) echo esc_attr($esd_stored_meta['esd_skill_name'][0]) ?>" 
					placeholder="Enter the skill name">
			</p>
		</div>
		<div class="esd-meta-field">
			<p>
				<label for="esd-skill-result">Skill Result: </label>
			</p>
			<p style='position: relative;'>
				<input 
					style="width:100%;max-width:250px;" 
					name="esd_skill_result" type="text" 
					id="esd-skill-result" 
					value="<?php if (! empty($esd_stored_meta['esd_skill_result']) ) echo esc_attr($esd_stored_meta['esd_skill_result'][0]) ?>" 
					placeholder="Enter a number from 1-100">
					<?php
						if ( isset($_GET['field_name']) && isset($_GET['status']) && $_GET['field_name'] == 'esd_skill_result' && $_GET['status'] == '1') {
					?>
						<div style="color:red">Please enter a valid number from 0 - 100 only</div>
					<?php
						}
					?>
			</p>
		</div>

	</div>
	<?php
}