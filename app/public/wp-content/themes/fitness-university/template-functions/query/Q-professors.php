<?php

function meta__professor_related_program(){
  $today = date('Ymd'); 
  return [
    'posts_per_page' => -1,
    'post_type' => 'professor',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => [
      [
      'key' => 'related_program',
      'compare' => 'LIKE',
      'value' => '"' . get_the_ID() . '"',
      ]
    ]
  ];
}


function query_professors($args, $title=NULL){
  $this_query = new WP_Query($args);
  // print_r($this_query);
  // echo 'res: ' . (bool)$this_query->have_posts();
  //false if empty
  if(!$this_query->have_posts()) return false;
  if($title) echo "<h3>$title</h3>";

  while($this_query->have_posts()): 
    $this_query->the_post();
    professor_html();
  endwhile;

  $pages = $this_query->max_num_pages;
  wp_reset_postdata();
  return $pages;

}


function professor_html(){
  ?>
  <ul class="professor-cards">
    <li class="professor-card__list-item">
      <a class="professor-card" href="<?php the_permalink() ?>">
        <img src="<?php the_post_thumbnail_url('professorLandscape') ?>" alt="" class="professor-card__image">
        <span class="professor-card__name"> <?php the_title() ?></span>
      </a>
    </li> 
  </ul>
<?php
}