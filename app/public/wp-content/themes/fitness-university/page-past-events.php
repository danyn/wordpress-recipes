<?php  
// require 'args/events-query-past.php';

get_header();
get_template_part('partials/site-header');
banner_page([
  "title"      => '',
  "intro"      => '',
  "background" => theme_image("crowd-of-people.jpg")
]);
?>
<div class="container container--narrow">
  <?php $max_num = query_events(archive_past_events()); ?>
  <p><?php echo paginate_links(['total' => $max_num ]); ?></p>
  <a href="<?php echo site_url('events') ?>">Check Out Our Upcoming Events</a>
</div>

<?php 
get_footer();
