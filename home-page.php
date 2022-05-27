<?php
/*
Template Name: Front Page
*/

// RETURNS A FULL WITH PAGE TEMPLATE
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//HOME PAGE CONTENT
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'content_loop' );

function content_loop (){
    
    /*flexslider*/


// Call Post
    $args = array (
           'post_type' => 'rotator',
           'posts_per_page' => 6,
           //'orderby' => 'rand',
           );
    echo '<!-- FlexSlider Begin-->';
    echo '<div class="flexslider">';
    echo '<ul class="slides">';
    $slider_query = new WP_Query ($args);
    if($slider_query->have_posts()): while ($slider_query->have_posts()): $slider_query->the_post();

    //$url = get_post_meta( $post->ID, '_cmb_url', true );
    $url = get_post_meta( get_the_id(), '_cmb_url', true );
    $url2 = $url.$url;
//var_dump($url);
   //echo $url;
    $home_slider = '<a href="'.$url.'">'.get_the_post_thumbnail($post_id, 'home-carousel').'</a><div class="flex-caption"><h2><a href="'.$url.'" rel="bookmark" title="Permanent Link to '.the_title_attribute('echo=0').'">'.get_the_title().'</a></h2><p>'.get_the_excerpt().'</p></div>';
    echo '<li>'.$home_slider.'</li>';
    
    wp_reset_postdata();
    endwhile; endif;
    echo '</ul>';
    echo '</div>';
    echo '<!-- FlexSlider End-->';


    /*end flexslider*/


    
    echo '<div id="home-content-wrap">';
    if ( is_active_sidebar( 'recent-posts-home' ) ) {

				dynamic_sidebar( 'recent-posts-home' );
                }
    
    echo '</div>';
}
genesis();
