<?php the_post();?>
<?php get_header() ?>
<?php get_template_part('partials/site-header') ?>
<?php  get_template_part('partials/single-banner') ?>
<div class="container container--narrow" style="padding:20px;">
  
  <?php child_breadcrumb(custom_post_data(get_the_id())) ?>
  <?php// var_dump(post_data(get_the_id())) ?>
  <p><?php the_content() ?></p>

  <?php
  $related = get_field('related_program');
  if($related):
  ?>
    <div class="relate-event-program">
      <h2>Proudly hosted by the following departments:</h2>
      <ul class="link-list min-list">
      <?php 
        foreach($related as $post_object):
      ?>  
        <li><a href="<?php echo get_the_permalink($post_object) ?>" target="_blank" rel="noopener noreferrer"><?php echo get_the_title($post_object) ?></a></li> 
      <?php    
        endforeach;
      ?>
      </ul>
    </div>
  <?php 
  endif;
  ?>

</div>
<?php get_footer() ?>
