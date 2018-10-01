
<?php  

function child_breadcrumb($pg){
?>
<div style="position:relative; width: 100%; height:40px; padding-left: 11px;">
 <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo $pg['parent']['url']?>">
        <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo $pg['parent']['title']?></a>
        <span class="metabox__main"><?php echo $pg['title']?></span>
    </p>
  </div>
</div>
<?php
}
