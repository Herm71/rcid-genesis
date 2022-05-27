<?php
// RETURNS A FULL WITH PAGE TEMPLATE
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
//* Remove the post content (requires HTML5 theme support)
remove_action('genesis_entry_content', 'genesis_do_post_content');
add_action('genesis_entry_content', 'rcid_radio_do_post_content');

function rcid_radio_do_post_content() {
    global $post;

    //$custom_field_keys = get_post_custom_keys();
    //print_r($custom_field_keys);
    //This will output the resulting meta value (notice the addition of "echo"):
    $ptitle = get_the_title($post->ID);
    $show_numb = 'Show Number';
    $producer = 'Producer Intro';
    $airdate = 'Show Date';
    $rintro = "Ruthie's Intro";
    $guest_name = 'Guest Name';
    $guest_bio = 'Guest Bio';
    $summary = 'Summary';
    $ask_ruthie = "Ask Ruthie";
    $preview = "Preview of next show";
    echo '<div class ="clear"></div>';
    
    echo '<div class ="form-head">';
    echo '<ul>';
    echo '<li><h2>Show No:&nbsp;</h2><h2>Program Title:&nbsp;</h2><h2>Air Date:&nbsp;</h2></li>';
    echo '<li><p>' . get_post_meta($post->ID, $show_numb, true) . '</p><p>' . $ptitle . '</p><p>' . get_post_meta($post->ID, $airdate, true) . '</p></li>';
    echo '<ul>';
    echo '</div>';
    echo '<div class ="clear"></div>';
    echo '<h2>' . $producer . ':&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $preview, true) . '</p>';
    echo '<h2>' . $rintro . ':&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $rintro, true) . '</p>';
    echo '<h2>Guest Name:&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $guest_name, true) . '</p>';
    echo '<h2>Guest Bio:&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $guest_bio, true) . '</p>';
    echo '<h2>The Interview:&nbsp;</h2>';
    the_content();
    echo '<h2>' . $summary . ':&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $summary, true) . '</p>';
    echo '<h2>' . $ask_ruthie . ':&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $ask_ruthie, true) . '</p>';
    echo '<h2>' . $preview . ':&nbsp;</h2>';
    echo '<p>' . get_post_meta($post->ID, $preview, true) . '</p>';
    //var_dump($test);
    //the_meta();
}

genesis();
