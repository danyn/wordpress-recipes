<?php  

get_header();
get_template_part('partials/site-header');
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
get_footer();


