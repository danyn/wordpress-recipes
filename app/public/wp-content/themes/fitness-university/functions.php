<?php
/*
* custom post types are located in mu-plugins

*/ 

require 'template-functions/templates.php';
require 'loop-modifiers/archive-modifiers.php';
require 'loop-modifiers/index.php';
require 'api/credentials.php';
require 'filters/titles.php';


function include_for_theme(){
    // theme js and global variables needed from the server side of wordpress
    wp_enqueue_script('themeJS', get_theme_file_uri('assets/js/scripts-bundled.js') , NULL, microtime(), true);
    wp_localize_script('themeJS', 'wpData', [
        'siteUrl' => get_site_url(),
        'wpApi' => 'wp-json/wp/v2'
    ]);

    wp_enqueue_style('mainCSS', get_template_directory_uri() . "/assets/css/style.css", NULL, microtime() );
    wp_enqueue_style( 'style', get_stylesheet_uri(), NULL, microtime() );
    //fonts and icons
    wp_enqueue_style('googleFont', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('fontAwesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    if(get_post_type()==='campus'){
        wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyCCJYnbGoVqRXq_j-hV2e6AcDE1wrR3tUs', NULL, '1.0', false);
    }
}

function theme_features(){
    //theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    //navs
    register_nav_menu('mainMenu', 'Header Menu Location');
    register_nav_menu('footer1', 'footer 1');
    register_nav_menu('footer2', 'footer 2');
    //images
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 640, true);
    add_image_size('pageBanner', 1500, 350, true);
}



add_action('wp_enqueue_scripts', 'include_for_theme');
add_action('after_setup_theme', 'theme_features');