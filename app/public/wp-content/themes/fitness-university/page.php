<?php
  the_post();
  $p_data = page_data(get_the_id());
?>
<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>
<?php //get_template_part('partials/single-banner') ?>
<?php 
  banner_page([
    "title"      => '',
    "intro"      => "Let's Get Aquanted",
    "background" => ''
  ]);
?>

<div class="container container--narrow page-section">
  <?php 
    if($p_data['parent']) child_breadcrumb($p_data);
    parent_child_menu($p_data);
    the_content();
  ?> 
</div>

<?php get_footer() ?>