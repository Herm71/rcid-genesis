<?php

function flexslider_code(){
// Call Post
    $args = array (
           'post_type' => 'rotator',
           //'posts_per_page' => 1,
           //'orderby' => 'rand',
           );
echo '<!-- FlexSlider Begin-->';
echo '<div class="flexslider">';
echo '<ul class="slides">';
   $slider_query = new WP_Query ($args);
   if($slider_query->have_posts() && !is_paged()): while ($slider_query->have_posts()): $slider_query->the_post();
   $slider_content = get_the_content();
   $slider_title = get_the_title();
   $space = "";
   
   $home_slider = get_the_post_thumbnail($post_id, 'home-carousel');
echo '<li>'.$home_slider.'</li>';
echo '</ul>';
echo '</div>';
wp_reset_postdata();
        endwhile; endif;
echo '<!-- FlexSlider End-->';
 
 /*flexslider*/
echo '<!-- Place somewhere in the <body> of your page -->';
echo '<div class="flexslider">';
echo '      <ul class="slides">';
echo '        <li>';
echo '          <img src="/wp-content/uploads/2014/02/food-q-c-1140-593-1.jpg" />';
echo '        </li>';
echo '        <li>';
echo '          <img src="/wp-content/uploads/2014/02/sports-q-c-1140-593-1.jpg" />';
echo '        </li>';
echo '        <li>';
echo '          <img src="/wp-content/uploads/2014/02/nature-q-c-1140-593-7.jpg" />';
echo '        </li>';
echo '      </ul>';
echo '    </div>';
    /*end flexslider*/
}

add_action ('genesis_after_content', 'testimonials');
 
 function testimonials () {
    
    // Call Post
    $args = array (
           'post_type' => 'testimonials',
           'posts_per_page' => 1,
           'orderby' => 'rand',
           );
   $testimonial_query = new WP_Query ($args);
   if($testimonial_query->have_posts() && !is_paged()): while ($testimonial_query->have_posts()): $testimonial_query->the_post();
   
   $testimonial = get_the_content();
   $title = get_the_title();
   $space = "";
    echo '<aside id="testimonials">';
    print $testimonial;
    echo '<p class="triangle-isosceles">';
    print $testimonial;
    echo '</p>';
    echo '<p class="testimonials">';
    print $title;
    echo '</p>';
    echo '</aside>';
    wp_reset_postdata();
        endwhile; endif;
 }