<?php
function program_key__campus(){

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

function program_html(){
  site_link();
  echo ' | ';
}



