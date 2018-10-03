<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

<?php 
    do_action('theme_before_header');
    get_template_part('partials/site-header', theme_title());
    do_action('theme_after_header');
  
  banner_archive(['intro'=> 'Learn More. Do More.']);
?>
<div class="container container--narrow">
  <ul class="link-list min-list">
    <?php
    while(have_posts()):
      the_post();?>
      <li><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></li>
    <?php     
    endwhile ?>
  </ul>
</div>

<?php

do_action('theme_before_footer');
get_template_part('partials/footer', theme_title());
do_action('theme_after_footer');
do_action('wp_footer');

?>

</body>
</html>

