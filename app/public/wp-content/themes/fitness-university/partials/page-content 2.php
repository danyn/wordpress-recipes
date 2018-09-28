<div class="container container--narrow page-section">

<?php 
  $parent_page_id = wp_get_post_parent_id(get_the_ID());
  if($parent_page_id):
?>

  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link" href="<?php the_permalink($parent_page_id)?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent_page_id) ?></a> <span class="metabox__main"><?php the_title() ?></span></p>
  </div>

<?php 
  endif 
?>
  
  <div class="page-links">
    <h2 class="page-links__title"><a href="#">About Us</a></h2>
    <ul class="min-list">
      <li class="current_page_item"><a href="#">Our History</a></li>
      <li><a href="#">Our Goals</a></li>
    </ul>
  </div>

  <div class="generic-content">
    <?php the_content() ?>
  </div>
</div>
