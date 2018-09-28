<?php 
$theme_today = date('Ymd');

$args = [
  'paged' => get_query_var('paged', 1),
  'posts_per_page' => -1,
  'post_type' => 'event',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_key' => 'event_date',
  'meta_query' => [[
    'key' => 'event_date',
    'compare' => '<',
    'value' => $theme_today,
    'type' => 'numeric'
  ]]
];
