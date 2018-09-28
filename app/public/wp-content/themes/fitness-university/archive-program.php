<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

<?php 
  get_template_part('partials/site-header');
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

<?php do_action('wp_footer') ?>
</body>
</html>

