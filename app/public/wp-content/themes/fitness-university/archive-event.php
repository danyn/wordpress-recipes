<!DOCTYPE html>
<html <?php language_attributes() ?>>
<?php theme_head() ?>
<body <?php body_class() ?>>

<?php 

do_action('theme_before_header');
get_template_part('partials/site-header', theme_title());
do_action('theme_after_header');

banner_archive([
  'background' => theme_image('crowd-of-people.jpg'),
  'intro' => "Let's Get Together"
]);

?>

<div class="container container--narrow page-section">

  <?php
  while(have_posts()):
    the_post();
    event_html();
  endwhile 
  ?>

  <p><?php echo paginate_links() ?></p>
  <p class="past-events"><a href="<?php echo site_url('past-events') ?>">Check Out Our Past Events</a></p>

</div>


<?php
  do_action('theme_after_content');
  do_action('theme_before_footer');
  get_template_part('partials/footer', theme_title());
  do_action('theme_after_footer');
  do_action('wp_footer');
?>

</body>
</html>