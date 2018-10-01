<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

<?php 
  //echo(theme_title());
  do_action('theme_before_header');
  get_template_part('partials/site-header', theme_title());
  do_action('theme_after_header');

  banner_archive([
    "title"      => 'Our Campuses',
    "intro"      => 'Small Highly Focused Efficient',
    "background" => ''
  ]);
?>


<?php do_action('theme_before_content') ?>

<div class="container container--narrow">

  <?php theme_map_ownloop() ?>


  <?php 
    while(have_posts()):
      the_post();
      site_link();
      theme_map_inloop();
    endwhile; 
  ?>

</div><!-- .container -->

<?php do_action('theme_after_content') ?>

<?php

  do_action('theme_before_footer');
  get_template_part('partials/footer', theme_title());
  do_action('theme_after_footer');
  do_action('wp_footer');

?>

</body>
</html>