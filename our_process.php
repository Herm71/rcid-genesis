<?php
/*
Template Name: Our Process
*/
//ENCUE SCRIPTS
add_action('wp_enqueue_scripts', 'process_header');

function process_header() {
    wp_register_style( 'process-style', get_stylesheet_directory_uri() . '/css/process.css');
    wp_enqueue_style( 'process-style' );
	 }   


     
//REPLACE LOOP
remove_action ('genesis_loop', 'genesis_do_loop');
add_action ('genesis_loop', 'our_process_loop');

    function our_process_loop2() {
       
        $page = get_page_by_title( 'About' );
        $the_excerpt = $page->post_excerpt;
        $page_data = get_page( $page );
        $title = $page_data->post_title;

        ?><header class="entry-header">
            <h1 class="entry-title">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'About' ) ) ); ?>">
                    <?php echo $page_data->post_title; ?>
                </a>
            </h1>
        </header>   
            <div class="entry-content"><?php echo $page->post_excerpt; ?>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'About' ) ) ); ?>">more +</a>
            </div><?php
        
    }

	function our_process_loop() {
        global $wp_query;
        echo '<h1>'.get_the_title().'</h1>';
        echo '<ul class="our-process">
                
                <li>'.get_the_post_thumbnail(3232, 'portfolio', array(
                'class'	=> "alignleft full",
                'alt'	=> trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                'title'	=> trim(strip_tags( $attachment->post_title )),
                )).'<a href="'.get_permalink(3232).'" title="'.get_the_title(3232).' - Ruth Chafin Interior Design"><h2>'.get_the_title(3232).'</h2></a><p>'.get_post_meta(3232, 'processexcerpt', true).'</p><a class="read-more" href="'.get_permalink(3232).'" title="'.get_the_title(3232).' - Ruth Chafin Interior Design" alt="'.get_the_title(3232).' - Ruth Chafin Interior Design"><p>read more</p></a></li>
                
                <li>'.get_the_post_thumbnail(3236, 'portfolio', array(
                'class'	=> "alignleft full",
                'alt'	=> trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                'title'	=> trim(strip_tags( $attachment->post_title )),
                )).'<a href="'.get_permalink(3236).'"title="'.get_the_title(3236).' - Ruth Chafin Interior Design""alt="'.get_the_title(3236).' - Ruth Chafin Interior Design"><h2>'.get_the_title(3236).'</h2></a><p>'.get_post_meta(3236, 'processexcerpt', true).'</p><a class="read-more" href="'.get_permalink(3236).'" title="'.get_the_title(3236).' - Ruth Chafin Interior Design"><p>read more</p></a></li>
                
                <li>'.get_the_post_thumbnail(3241, 'portfolio', array(
                'class'	=> "alignleft full",
                'alt'	=> trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                'title'	=> trim(strip_tags( $attachment->post_title )),
                )).'<a href="'.get_permalink(3241).'" title="'.get_the_title(3241).' - Ruth Chafin Interior Design""alt="'.get_the_title(3241).' - Ruth Chafin Interior Design"><h2>'.get_the_title(3241).'</h2></a><p>'.get_post_meta(3241, 'processexcerpt', true).'</p><a class="read-more" href="'.get_permalink(3241).'"title="'.get_the_title(3241).' - Ruth Chafin Interior Design""alt="'.get_the_title(3241).' - Ruth Chafin Interior Design"><p>read more</p></a></li>
                
                <li>'.get_the_post_thumbnail(3256, 'portfolio', array(
                'class'	=> "alignleft full",
                'alt'	=> trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                'title'	=> trim(strip_tags( $attachment->post_title )),
                )).'<a href="'.get_permalink(3256).'"title="'.get_the_title(3256).' - Ruth Chafin Interior Design""alt="'.get_the_title(3256).' - Ruth Chafin Interior Design"><h2>'.get_the_title(3256).'</h2></a><p>'.get_post_meta(3256, 'processexcerpt', true).'</p><a class="read-more" href="'.get_permalink(3256).'"title="'.get_the_title(3256).' - Ruth Chafin Interior Design""alt="'.get_the_title(3256).' - Ruth Chafin Interior Design"><p>read more</p></a></li>
                
                <li>'.get_the_post_thumbnail(3259, 'portfolio', array(
                'class'	=> "alignleft full",
                'alt'	=> trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                'title'	=> trim(strip_tags( $attachment->post_title )),
                )).'<a href="'.get_permalink(3259).'"title="'.get_the_title(3259).' - Ruth Chafin Interior Design""alt="'.get_the_title(3259).' - Ruth Chafin Interior Design"><h2>'.get_the_title(3259).'</h2></a><p>'.get_post_meta(3259, 'processexcerpt', true).'</p><a class="read-more" href="'.get_permalink(3259).'"title="'.get_the_title(3259).' - Ruth Chafin Interior Design""alt="'.get_the_title(3259).' - Ruth Chafin Interior Design"><p>read more</p></a></li>
                
                <li>'.get_the_post_thumbnail(3380, 'portfolio', array(
                'class'	=> "alignleft full",
                'alt'	=> trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                'title'	=> trim(strip_tags( $attachment->post_title )),
                )).'<a href="'.get_permalink(3380).'"title="'.get_the_title(3380).' - Ruth Chafin Interior Design""alt="'.get_the_title(3380).' - Ruth Chafin Interior Design"><h2>'.get_the_title(3380).'</h2></a><p>'.get_post_meta(3380, 'processexcerpt', true).'</p><a class="read-more" href="'.get_permalink(3380).'"title="'.get_the_title(3380).' - Ruth Chafin Interior Design""alt="'.get_the_title(3380).' - Ruth Chafin Interior Design"><p>read more</p></a></li>
            </ul>';
		
		}

genesis();