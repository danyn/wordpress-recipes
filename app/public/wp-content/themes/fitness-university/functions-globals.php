<?php 
 $theme_today = date('Ymd');

 $event_query_args = [
  'posts_per_page' => 2,
  'post_type' => 'event',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_key' => 'event_date',
  'meta_query' => [[
    'key' => 'event_date',
    'compare' => '>=',
    'value' => $theme_today,
    'type' => 'numeric'
  ]]
  ];
