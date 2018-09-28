<?php  
/*
banner_page([
  "title"      => '',
  "intro"      => '',
  "background" => ''
]);
*/

function banner_page($args = NULL){

  if(!$args['background']){
    $args['background'] = (bool) get_field('banner_image')['sizes']['pageBanner'] ? get_field('banner_image')['sizes']['pageBanner'] :  get_stylesheet_directory_uri() . '/assets/images/ocean.jpg';
  }

  if(!$args['title']){
    if(get_field('banner_title')){
      $args['title'] = get_field('banner_title');
    }elseif(get_the_title()) {
      $args['title'] = get_the_title();
    }
  }

  if(!$args['intro']){
    if(get_field('banner_subtitle')){
      $args['intro'] = get_field('banner_subtitle');
    }else{
      $args['intro']="";
    }
  }

?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['background']?>")></div>
    <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php echo $args['title'] ?></h2>
      <div class="page-banner__intro">
      <?php echo $args['intro'] ?>
      </div>
    </div>  
</div>

<?php } ?>