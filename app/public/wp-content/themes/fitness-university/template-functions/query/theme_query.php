<?php
/*
*
theme_query();
*
*/ 
function theme_query($args, $template_function, $title = NULL){
  $this_query = new WP_Query($args);
  //false if empty
  if(!$this_query->have_posts()) return false;
  if($title) echo "<h3>$title</h3>";

  while($this_query->have_posts()): 
    $this_query->the_post();
    call_user_func($template_function);
  endwhile;

  $pages = $this_query->max_num_pages;
  wp_reset_postdata();
  return $pages;

}