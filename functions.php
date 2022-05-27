<?php

//*Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define('CHILD_THEME_NAME', 'Ruth Chafin Interior Design');
define('CHILD_THEME_URL', 'http://www.ruthchafininteriordesign.com/');
define('CHILD_THEME_VERSION', '2.0.1');

//* Enqueue Lato Google font
add_action('wp_enqueue_scripts', 'genesis_sample_google_fonts');

function genesis_sample_google_fonts() {
    wp_enqueue_style('google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION);
}

//* Add HTML5 markup structure
add_theme_support('html5');

//* Add viewport meta tag for mobile browsers
add_theme_support('genesis-responsive-viewport');

//* Add support for custom background
add_theme_support('custom-background');

//* Add support for 3-column footer widgets
add_theme_support('genesis-footer-widgets', 4);

//* Add theme support for WooCommerce
add_theme_support('genesis-connect-woocommerce');

//* Unregister secondary sidebar
unregister_sidebar('sidebar-alt');


// REGISTER STYLES
function theme_styles() {
    wp_register_style('home-style', get_stylesheet_directory_uri() . '/css/home-style.css');
    wp_enqueue_style('home-style');
    wp_register_style('global-style', get_stylesheet_directory_uri() . '/css/global.css');
    wp_enqueue_style('global-style');
    wp_register_style('woo-custom', get_stylesheet_directory_uri() . '/css/woo-custom.css');
    wp_enqueue_style('woo-custom');
    wp_register_style('project-archive-style', get_stylesheet_directory_uri() . '/css/project-archive.css');
    wp_register_style('radio-programs-style', get_stylesheet_directory_uri() . '/css/radio-programs.css');
    wp_enqueue_style('radio-programs-style');
    wp_register_style('fontello-style', get_stylesheet_directory_uri() . '/lib/fontello/css/fontello.css');
    wp_enqueue_style('fontello-style');
    wp_register_style('fontello-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_enqueue_style('fontello-awesome');
}
add_action('wp_enqueue_scripts', 'theme_styles');

// ENQUEUE SCRIPTS & STYLES FOR FLEXSLIDER
add_action('wp_enqueue_scripts', 'bb_scripts');

function bb_scripts() {
    //register and enqueue jquery
    wp_register_script('jquery-google', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), false, false); // register the external file  
    wp_enqueue_script('jquery-google'); // enqueue the external file
    //register and enqueue flexslider style
    wp_register_style('flexslider-style', get_stylesheet_directory_uri() . '/lib/FlexSlider/flexslider.css');
    wp_enqueue_style('flexslider-style');
    /* //register and enqueue FlexSlider script
      wp_register_script( 'flexslider-script', get_stylesheet_directory_uri() . '/lib/FlexSlider/jquery.flexslider.js', array('jquery'), false, false );
      wp_enqueue_script( 'flexslider-script' ); */
    
    //register and enqueue Customization Script
    wp_register_script('flex-slider-home', get_stylesheet_directory_uri() . '/lib/FlexSlider/home-slider.js', array('jquery'), false, true);
    wp_enqueue_script('flex-slider-home');
     //COOKIE
        wp_register_script( 'cookie', get_stylesheet_directory_uri() . '/lib/js-cookie-master/src/js.cookie.js', array('jquery'), false, false);
        wp_enqueue_script( 'cookie' );
    
    //SIDR - RESPONSIVE MENU
    // sidr Style Sheet
       wp_register_style( 'sidr-style', get_stylesheet_directory_uri() . '/lib/sidr/dist/stylesheets/jquery.sidr.dark.css');
        wp_enqueue_style( 'sidr-style' );
        
    // sidr plugin
        wp_register_script( 'sidr-script', get_stylesheet_directory_uri() . '/lib/sidr/dist/jquery.sidr.js', array('jquery'), false, false );
        wp_enqueue_script( 'sidr-script' );
    
    // sidr customization script
        wp_register_script( 'blackbird-menu-script', get_stylesheet_directory_uri() . '/lib/scripts/blackbird-menu-script.js', array('jquery'), false, true);
        wp_enqueue_script( 'blackbird-menu-script' );
    // SUBSCRIBE BETTER
    //REGISTER STYLES
        wp_register_style( 'subscribe-better-css', get_stylesheet_directory_uri() . '/lib/newsletter-signup/css/subscribe-better.css');
        wp_enqueue_style( 'subscribe-better-css' );
        
    //REGISTER MAIN SCRIPT
        wp_register_script( 'subscribe-better-script', get_stylesheet_directory_uri() . '/lib/newsletter-signup/js/jquery.subscribe-better.js', array('jquery'), false, false );
       // wp_enqueue_script( 'subscribe-better-script' );
    
   //REGISTER CUSTOMIZATION SCRIPT
   
        wp_register_script( 'subscribe-better-custom', get_stylesheet_directory_uri() . '/lib/scripts/subscribe.js', array('jquery'), false, true);
       // wp_enqueue_script( 'subscribe-better-custom' );
}

add_action('genesis_entry_header', 'single_post_featured_image', 15);

function single_post_featured_image() {

    if (!is_singular('post'))
        return;

    $img = genesis_get_image(array('format' => 'html', 'size' => genesis_get_option('image_size'), 'attr' => array('class' => 'post-image')));
    printf('<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute('echo=0'), $img);
}

/* Move Featured Image to above Post Title and Meta */
//remove_action('genesis_entry_content', 'genesis_do_post_image', 8);
//add_action('genesis_entry_header', 'genesis_do_post_image', 3);

add_action ('wp_head', 'bb_selective_image_remove');

function bb_selective_image_remove () {
  if (is_post_type_archive('business_directory'))  {
      remove_action('genesis_entry_content', 'genesis_do_post_image', 8);
  }
}