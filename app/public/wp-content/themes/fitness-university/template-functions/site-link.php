<?php 

function site_link($id = NULL) {

  if(!$id) $id = get_the_ID();
  echo ('<a href="' . get_the_permalink($id) . '">' .  get_the_title($id) . '</a>');

}