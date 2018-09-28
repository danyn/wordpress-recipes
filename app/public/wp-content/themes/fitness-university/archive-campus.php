<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

<?php 
  get_template_part('partials/site-header');
  banner_archive([
    "title"      => 'Our Campuses',
    "intro"      => 'Small Highly Focused Efficient',
    "background" => ''
  ]);
?>
<div class="container container--narrow">

  <div class="acf-map">
<?php

  while(have_posts()):
    the_post();
    // https://www.advancedcustomfields.com/resources/google-map/
    $location = get_field('location');
    //show($location);

    if( !empty($location) ):
      ?>
     
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
      </div>
      <!-- <p><a href="<?php the_permalink() ?>"> <?php the_title() ?> </p> -->

<?php 
      endif; 
?>
      
<?php     
    endwhile; 
?>
  </div>
</div>

<?php do_action('wp_footer') ?>
</body>
</html>

