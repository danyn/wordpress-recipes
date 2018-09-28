<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg') ?>")></div>
    <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">
      <?php if(is_author()): ?>
        <?php echo 'By ' .  get_the_author()  ?>
      </h1> 
      <?php elseif(is_category()): ?>
        <?php echo get_cat_name( $cat ) ?>
      </h1>
      <?php elseif(is_post_type_archive()): ?>
        <p> <?php echo ucfirst(get_post_type() . 's') ?></p>
      <?php else: ?>
        Blog
      </h1>
      <?php endif ?>
      <div class="page-banner__intro">
        <p><?php the_archive_title('s ', ' d') ?></p>
        <p><?php the_archive_description() ?></p>
      </div>
    </div>  
  </div>
  