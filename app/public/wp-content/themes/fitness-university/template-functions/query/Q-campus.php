<?php 

function campus_key__(){

  return [
    'posts_per_page' => -1,
    'post_type' => 'program',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => [
      [
      'key' => 'campus',
      'compare' => 'LIKE',
      'value' => '"' . get_the_ID() . '"',
      ]
    ]
  ];
}

function campus_html(){
  site_link();
  echo ' | ';
}
