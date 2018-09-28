<?php 

/*
banner_archive([
  "title"      => '',
  "intro"      => '',
  "background" => ''
]);
*/

function banner_archive($args = NULL){
  global $cat;
  
  if(!$args['background']){
    $args['background'] =  get_stylesheet_directory_uri() . '/assets/images/ocean.jpg';
  }

  if(!$args['title']){
    if(is_author()){
      $args['title'] ='By ' .  get_the_author();
    }elseif(is_category()) {
      $args['title'] = get_cat_name( $cat );
    }elseif(is_post_type_archive()){
      $args['title'] = ucfirst(get_post_type() . 's');
    }else{
      $args['title'] = 'Blog';
    }
  }

  if(!$args['intro']){
    if(get_the_archive_description()){
      $args['intro'] = get_the_archive_description();
    }else{
      $args['intro']=NULL;
    }
  }
?>
  <div class="page-banner">

    <div class="page-banner__bg-image" 
        style="background-image: url(<?php echo $args['background'] ?>")>
    </div>

    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">
        <?php echo $args['title'] ?>
      </h1>
      <div class="page-banner__intro">
        <?php echo $args['intro'] ?>
      </div>
    </div>

  </div>
<?php
}