<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

  <?php get_template_part('partials/site-header') ?>
  <?php  get_template_part('partials/single-banner') ?>
  <?php  child_breadcrumb(custom_post_data()) ?>
  <div class="container container--narrow">

<?php 
      the_post();
      the_content();
      theme_query(program_key__campus(), 'program_html', 'Programs offered at ' . get_the_title() );
      theme_map_inloop(FALSE);
?>

  </div><!-- .container -->

  <?php 
  theme_footer();
  do_action('wp_footer');
  ?>

</body>
</html>