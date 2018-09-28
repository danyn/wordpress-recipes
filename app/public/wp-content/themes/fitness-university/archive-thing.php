<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

  <?php get_template_part('partials/site-header') ?>
  <?php banner_archive() ?>
  <div class="container container--narrow page-section">

  <?php 
  
    // var_dump($post);
  
    while(have_posts()):
      the_post();
      get_template_part('partials/content', get_post_type());
    endwhile
 ?>
 

  </div><!-- .container -->

  <?php theme_footer() ?>

</body>
</html>