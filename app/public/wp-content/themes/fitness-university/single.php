<?php the_post();?>
<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>
<?php  get_template_part('partials/single-banner') ?>
<div class="generic-content" style="padding:20px;">
  <div class="metabox">
              <p>By: <?php the_author_posts_link()  ?></p> 
              <p>In: <?php echo get_the_category_list(', ') ?></p>
              <p>On: <?php echo the_time('l \t\h\e jS \o\f F, Y \a\t g:i a') ?></p>
  </div>
  <h2><?php the_title() ?></h2>
  <p><?php the_content() ?></p>
</div>
<?php get_footer() ?>
