<div class="page-banner">
  <?php //show(get_field('banner_image')) 
    $background_image = (bool) get_field('banner_image')['sizes']['pageBanner'] ? get_field('banner_image')['sizes']['pageBanner'] :  get_stylesheet_directory_uri() . '/assets/images/ocean.jpg';
  ?>
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $background_image ?>)"></div>
    <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"> <?php the_title() ?> </h1>
      <div class="page-banner__intro">
        <p><?php the_field('banner_subtitle') ?></p>
      </div>
    </div>  
  </div>