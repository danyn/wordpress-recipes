<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

  <?php get_template_part('partials/site-header') ?>
  <?php  get_template_part('partials/single-banner') ?>
  <div class="container container--narrow">
single
    <?php 
      the_post();
      $title = get_the_title();
      the_content();
      query_events(meta__event_related_program(), "Upcoming $title Events: ");
      query_professors(meta__professor_related_program(), "$title Professors: ");
      theme_meta__relationship([
        "field" => "campus",
        "title" => get_the_title() . ' is available at the following campuses: '
        ])
    ?>
  </div>

  <?php theme_footer() ?>

</body>
</html>