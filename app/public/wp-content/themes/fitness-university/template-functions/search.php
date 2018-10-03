<?php 

function theme_search(){
  //.search-overlay--active
  ?>
  <div class="search-overlay">
   
    <div class="search-overlay__top">
      <div class="container">
        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
        <input type="text" class="search-term"  id="search-term" placeholder="What Are You Looking For">
        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
      </div>
    </div>
    <div class="container">
      <div class="search-overlay__results">
   
      </div>
    </div>

  </div>
  
  <?php
}


function vue_search(){
  ?>
  <div id="appSearch">
  </div>

  <?php 
}

add_action('theme_after_footer', 'vue_search');