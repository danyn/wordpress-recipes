<?php
// https://www.advancedcustomfields.com/resources/google-map/

/* 

wrapper functions 

*/

function theme_map_inloop($link=TRUE){
  echo '<div class="acf-map">';
  map_html($link);
  echo '</div>';
}

function theme_map_ownloop(){
  rewind_posts();
  echo '<div class="acf-map">';
  while(have_posts()):
    the_post();
    map_html();
  endwhile; 
  echo '</div>';
  rewind_posts();
}


/*
template part functions
*/

function map_html($link = TRUE){
  $location = get_field('location');
  if( !empty($location) ):
  ?>

  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
    <?php 
    if($link){
      site_link();
    }else{
      the_title();
    }
    ?>
    <br>
    <?php echo $location['address'] ?>
  </div>

<?php
  endif;
}
