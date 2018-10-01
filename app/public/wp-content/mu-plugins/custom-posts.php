<?php 

/*
* https://developer.wordpress.org/resource/dashicons/#universal-access
*
*/ 

add_action('init', 'theme_types');

function theme_types(){

  theme_post_type('event', 'dashicons-calendar-alt');
  theme_post_type('program', 'dashicons-clipboard' );
  theme_post_type('campus','dashicons-location-alt', 'campuses');
  theme_post_type('professor', 'dashicons-universal-access');
}

function theme_post_type($name, $icon, $slug=null, $archive=true){
  $rewrite = (bool) $slug ? $slug : $name . 's'; 
  register_post_type($name, [
    'public' => true,
    'labels' => [
      'name' => ucfirst($name) ,
      'add_new_item' => "Add new $name",
      'edit_item' => "Edit existing $name",
      'all_items' => 'All ' . ucfirst($rewrite),
      'singular_name' => $name
    ],
    'menu_icon' => $icon,
    'supports' => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt'],
    'has_archive' => $archive,
    'rewrite' => ['slug'=> $rewrite]
  ]);
}


// dashicons-calendar-alt