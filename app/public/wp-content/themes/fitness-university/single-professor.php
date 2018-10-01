<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

  <?php get_template_part('partials/site-header') ?>
  <?php  get_template_part('partials/single-banner') ?>
  <div class="container container--narrow">

    <?php 
      the_post();
      // var_dump($post);
    ?>
    <div class="row group generic-content">
      <div class="one-third">
        <?php the_post_thumbnail('professorPortrait'); ?>
      </div>
      <div class="two-thirds">
        <?php the_content(); ?>
      </div>
    </div>
      
    <?php  
     
      meta_related_programs();
      theme_meta__relationship([
        "field" => "campus",
        "title" => the_title() . 'teaches at the following campuses: '
        ])
      
    ?>

  </div><!-- .container -->

  <?php theme_footer() ?>

</body>
</html>