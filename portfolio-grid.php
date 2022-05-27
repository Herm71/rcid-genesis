<?php
/*
	Template Name:  Portfolio Grid
*/

# Force full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
# Remove the breadcrumb
// remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
# Remove the post title
// remove_action( 'genesis_post_title', 'genesis_do_post_title' );

add_filter( 'body_class', 'categories_grid_body_class' );
/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function categories_grid_body_class( $classes ) {
	$classes[] = 'categories-grid';
	return $classes;
}

# Remove the post content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
# Add custom post content
add_action( 'genesis_entry_content', 'bb_do_post_content' );

/**
 * Outputs custom post content
 *
 * @return void
 */
function bb_do_post_content() {

	$i = 0;
	$columns = 4; // Set the number of columns here (2 to 6)

	$column_classes = array( '', '', 'one-half', 'one-third', 'one-fourth', 'one-fifth', 'one-sixth' );
	$class = $column_classes[$columns];

	$taxonomy = 'space';
        
        $args = array(
	  'orderby' => 'name',
	  'parent' => 0
	  );
	$spaces = get_terms( $taxonomy, $args );
	foreach ( $spaces as $space ) {
            
            $space_link = get_term_link($space);
            
		if (z_taxonomy_image_url($space->term_id)) { // if category image exists
			if ($i % $columns == 0) {
				echo '<div class="'. $class . ' first category-item">';
			}
			else {
				echo '<div class="' . $class . ' category-item">';
			}
			// Category title
			echo '<h2 class="category-title"><a href="' . esc_url($space_link) . '">' . $space->name . '</a></h2>';

			// Category image linking to category archive
			echo '<a href="' . esc_url($space_link) . '"><img src="'. z_taxonomy_image_url($space->term_id, 'portfolio') . '" /></a>';

			// Category description
			echo category_description( $space->term_id );

			// Custom 'Read More' link
			echo '<a href="' . esc_url($space_link) . '">More ' . $space->name . ' &raquo;</a>';

			echo '</div>';

			$i++;
		}
	}

}

genesis();