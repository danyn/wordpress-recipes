<?php 
/*
*
 theme_meta__relationship([
  "field" : " ",
  "title" : " "
  ])
* 
*/ 

function theme_meta__relationship($args=NULL){
  if($args===NULL){
    echo 'please enter ["field": " ", "title": " "]';
  }

  $array_of_post_objects = get_field($args["field"]);
  // var_dump($array_of_post_objects);
  if ($array_of_post_objects):
?>
    <hr class="section-break">
    <h2 class="headline headline--medium"><?php echo $args["title"] ?></h2>
    <ul class="link-list min-list">
    <?php 
    foreach($array_of_post_objects as $post_object):
    ?>
      <li><a href="<?php echo get_the_permalink($post_object) ?>"><?php echo get_the_title($post_object) ?></a></li>
    <?php endforeach ?>
    </ul>
<?php 
  endif;   
  }
