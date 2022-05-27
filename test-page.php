<?php
/*
Template Name: Post Deleter
*/
// Get 50 custom post types pages, set the number higher if is not slow.

add_action ('genesis_before_content', 'post_remover');
function post_remover () {
    $mycustomposts = get_pages( array( 'post_type' => 'products', 'number' => 100) );
       foreach( $mycustomposts as $mypost ) {
         // Delete's each post.
         wp_delete_post( $mypost->ID, false);
        // Set to False if you want to send them to Trash.
       }
    // 50 custom post types are being deleted everytime you refresh the page.
}

//add_action ('genesis_before_content', 'tax_remover');
function tax_remover () {

$taxonomy = 'my_taxonomy';

$terms = get_terms($taxonomy);
 $count = count($terms);
 if ( $count > 0 ){

     foreach ( $terms as $term ) {
        wp_delete_term( $term->term_id, $taxonomy );
     }
 }
 }
 genesis();