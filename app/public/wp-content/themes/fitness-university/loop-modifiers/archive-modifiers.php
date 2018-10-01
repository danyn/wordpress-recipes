<?php 
// https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts#Code_Documentation
// https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters

function events_archive_modifier($query){
  if(!is_admin() && is_post_type_archive('event') && $query->is_main_query() ){
    $today = date('Ymd');
    $query->set('posts_per_page', '-1');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'DESC');
    $query->set('meta_key', 'event_date');
    $query->set('meta_query', [[
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'numeric'
    ]]);
  }
  
}

function programs_archive_modifier($query){
  if(!is_admin() && is_post_type_archive('program') && $query->is_main_query() ){
    $query->set('posts_per_page', '-1');
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
}

function campus_archive_modifier($query){
  if(!is_admin() && is_post_type_archive('campus') && $query->is_main_query() ){
    $query->set('posts_per_page', -1);
  }
}



add_action('pre_get_posts', 'events_archive_modifier');
add_action('pre_get_posts', 'programs_archive_modifier');
add_action('pre_get_posts', 'campus_archive_modifier');