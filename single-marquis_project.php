<?php

 // REGISTER STYLES
function project_styles() { 
	  /*wp_register_style( 'project-single', get_stylesheet_directory_uri() . '/css/project-single.css');*/
	  wp_enqueue_style( 'project-single' );
}
//add_action('wp_enqueue_scripts', 'project_styles');


//Force the full width layout layout

//add_filter( 'genesis_pre_get_option_site_layout', 'bb_home_full' );
function rcid_full( ) {
	return 'full-width-content';
}

/** REMOVE POST TITLE **/
//* Remove the entry title (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

/** CUSTOM PROJECT SIDEBAR */

add_action( 'get_header', 'child_single_project_ss_handler', 12);
function child_single_project_ss_handler() {	
	remove_action( 'genesis_sidebar', 'ss_do_sidebar' );
	add_action( 'genesis_sidebar', 'project_sidebar' );
}

	function project_sidebar() {
		$case_study = get_field ('case_study');
		//var_dump($case_study);
		$site_link = get_field ('site');
		echo "<div class='project-details'>";
        //echo "<div class='detail-head'>";
        echo "<h1 class='entry-title'>".get_the_title()."</h1>";           
		echo $case_study;
		echo "<span class='visit-btn'>";
		echo "<a href='".$site_link."' target='blank'>Visit Site</a>";
		echo "</span>";
		
		echo "</div>";
	}

/** Replace the standard loop with our custom loop */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'test_loop' );

function rcid_case_study_loop (){
        global $post;
        $wp_query = new WP_Query ();
	echo '<div id="slider" class="flexslider">';
	echo '<ul class="slides">';
        while ($wp_query->have_posts()):$wp_query->the_post();
        $images = get_field(case_study_images);
        foreach ($images as $image);
	print_r($image);
        $dump = get_queried_object();
        var_dump($dump);
        $content = get_the_content();
        var_dump($content);
	//vars
	 
	//echo '<li><img src="'.$image['url'].'" /></li>';
	endwhile;
        
	echo '</ul>';
	echo '</div>';
        
        wp_reset_query();
}

//secondary test loop
function test_loop () {
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT * FROM wp_postmeta WHERE meta_key = "marquis_project_info_marquis_photos"', OBJECT );
    echo $results;
    echo '<div id="slider" class="flexslider">';
    echo '<ul class="slides">';
    if (have_posts()) :
   while (have_posts()) :
      the_post();
    $images = get_field(case_study_images);
    foreach ($images as $image);
    var_dump($image);
    $i = 0;
         the_content();
   endwhile;
endif;
echo '</ul>';
	echo '</div>';
}


//post meta
add_action ('genesis_before_loop', 'project_meta', 12);
function project_meta () {
    
        echo do_shortcode( '[type2]' );
}

genesis();
