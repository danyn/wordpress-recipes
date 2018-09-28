<?php 
function parent_child_menu($pg){
  //To get a list of children pages when (filetered by child_of) call wp_list_pages below.
  if($pg['parent']){
    //if this page has a parent us that to filter
    $child_of = $pg['parent']['id'];
  }else{
    //else filter on this page becuase it is the parent 
    $child_of = $pg['id'];
  }

  $args_pages = array(
    'depth'        => 0,
    'child_of'     => $child_of,
    'title_li'     => NULL
  );

  //just to see if this page is a parent query here.
  $args_is_parent = array(
    'post_parent' => $pg['id'],
    'post_type'   => 'any', 
    'numberposts' => 1,
    'post_status' => 'publish',
    'output' => 'ARRAY_A,' 
    );
    
    $is_parent = get_children($args_is_parent);
  
//only continue if this page has children or has a parent ie. is a child.
  if($is_parent || $pg['parent']): 
 ?>
    <div class="page-links">
      <h2 class="page-links__title">
      <?php if($pg['parent']): ?>
      <!-- has a parent -->
        <a href="<?php echo $pg['parent']['url'] ?>"><?php echo $pg['parent']['title'] ?></a>
      <?php else: ?>
      <!-- is a parent -->
        <a href="<?php echo $pg['url'] ?>"><?php echo $pg['title'] ?></a>
      <?php endif ?>
      </h2>
      <ul class="min-list">
        <?php wp_list_pages($args_pages) ?>
      </ul>
    </div>
<?php 
  endif;
}


