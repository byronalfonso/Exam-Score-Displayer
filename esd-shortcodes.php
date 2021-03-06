<?php
/*
	Exam Score Display - Short Code
		- Enqueuing of styles and scripts
		- This is where the shortcode [esd_view] is declared and handled.
		- Ajax handler for fetching the breakdown of skill post type data.
*/

// Enqueue styles and scripts for ESD.
function register_esd_scripts () {
    wp_register_style('esd-style', plugins_url('css/style.css', __FILE__));
    wp_register_script('esd-script', plugins_url('js/main.js', __FILE__));

    wp_localize_script( 'esd-script', 'esd_ajax_obj',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('init', 'register_esd_scripts');

// Shortcode handler function
function esd_render_view () {
	
	wp_enqueue_script("esd-script");
	wp_enqueue_style("esd-style");

	$args = array(
		'post_type' => 'skill',
		'post_status' => 'publish'
	);

	$skills = new WP_Query($args);
	$total_score = 0;
	$score_average = 0;

	foreach ($skills->get_posts() as $skill) {
		$total_score += get_post_meta( $skill->ID, 'esd_skill_result', false )[0];
	}

	$score_average = round($total_score / (int) count($skills->get_posts()));
	$score_status = ($score_average > 50) ? 'passed' : 'fail';

	$esd_content = '
		<!-- Start of ESD - Exam Score Displayer section -->
	    <div id="esd-main">
	      
	      <!-- #results -->
	      <div id="esd-results" class="section esd-results">
	        <h1>Results</h1>	        
	        <div class="content">
	          <div class="rounded-graph-container">
	            <div class="rounded-graph">
	              <div class="chart" id="graph" data-percent="'.$score_average.'"></div>
	            </div>
	          </div>

	          <div class="status-container">
	            <div class="status">
	              <h2>STATUS: </h2>
	              <p class="val '.$score_status.'">'.$score_status.'</p>
	              <a href="">Change</a>
	            </div>

	            <div class="time">
	              <h2>TIME: </h2>
	              <p class="val">
	                2h 2min<br/>
	                <span>(of max 1h 50min)</span>
	              </p>
	            </div>
	          </div>
	        </div>
	      </div>
	      
	      <!-- #breakdown -->
	      <div id="esd-breakdown" class="section esd-breakdown">
	        <h1>Breakdown</h1>			
			<div><button id="esd-show-exam-results">Load Exam Breakdown</button></div>
			<div id="esd-loading-icon" style="display:none;text-align:center">
				<img src="'. plugins_url('/images/loading.svg', __FILE__) .'" alt="loading icon" width="40px" height="40px">
			</div>
	        <ul class="skills">
			</ul>
	      </div>
	      
	      <!-- #history -->
	      <div id="esd-history" class="section esd-history">
	        <h1>History</h1>
	        <p>
	          <a href="">Invitation email</a> on Aug 15 <br />
	          Candidate started the test on Aug 15 <br />
	          Candidate completed the test on Aug 15
	        </p>
	      </div>

	    </div>
	    <!-- End of ESD - Exam Score Displayer section -->';
	
    return $esd_content;
}

add_shortcode('esd_view', 'esd_render_view');

/* Ajax Handler for this Shortcode */
function esd_fetch_skills_handler(){

	$args = array(
		'post_type' => 'skill',
		'post_status' => 'publish',
		'order' => 'ASC'
	);

	$skills = new WP_Query($args);
	$skill_meta = array(); 	

	foreach ($skills->get_posts() as $skill) {
		$skill_meta['skills'][] = array(
			'name' => get_post_meta( $skill->ID, 'esd_skill_name', false )[0], 
			'result' => get_post_meta( $skill->ID, 'esd_skill_result', false )[0]
		);
	}

	wp_send_json_success($skill_meta);

	// Don't forget to stop execution afterward.
    wp_die();
}

add_action('wp_ajax_nopriv_esd_fetch_skills', 'esd_fetch_skills_handler');
add_action('wp_ajax_esd_fetch_skills', 'esd_fetch_skills_handler');