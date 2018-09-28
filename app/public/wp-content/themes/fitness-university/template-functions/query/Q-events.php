<?php 
// https://www.billerickson.net/code/wp_query-arguments/
// https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters


// set the args for each use of query_events here. 
function meta__event_related_program(){
  $today = date('Ymd'); 
  return [
    'posts_per_page' => 2,
    'post_type' => 'event',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_key' => 'event_date',
    'meta_query' => [
      [
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'numeric'
      ],
      [
      'key' => 'related_program',
      'compare' => 'LIKE',
      'value' => '"' . get_the_ID() . '"',
      ]
    ]
  ];
}


function homepage_events(){
  $today = date('Ymd'); 
  return [
    'posts_per_page' => 2,
    'post_type' => 'event',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_key' => 'event_date',
    'meta_query' => [[
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'numeric'
    ]]
  ];
}

function archive_past_events(){
  $today = date('Ymd'); 
  return [
    'paged' => get_query_var('paged', 1),
    'posts_per_page' => -1,
    'post_type' => 'event',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_key' => 'event_date',
    'meta_query' => [[
      'key' => 'event_date',
      'compare' => '<',
      'value' => $today,
      'type' => 'numeric'
    ]]
  ];
}

function query_events($args, $title="NULL"){
  $this_query = new WP_Query($args);
  //false if empty
  if(!$this_query->have_posts()) return false;
  if($title) echo "<h3>$title</h3>";

  while($this_query->have_posts()): 
    $this_query->the_post();
    event_html();
  endwhile;

  $pages = $this_query->max_num_pages;
  wp_reset_postdata();
  return $pages;

}

function event_html(){
  $time = event_date();
  ?>
  <div class="event-summary">
    <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
      <span class="event-summary__month"><?php  echo $time['month'] ?></span>
      <span class="event-summary__day"><?php echo $time['day'] ?></span>
    </a>
    <div class="event-summary__content">
      <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
      <p><?php echo wp_trim_words( get_the_content(), 18) ?> <a href="<?php the_permalink() ?>"
          class="nu gray">Learn more</a></p>
    </div>
  </div>
  <?php
}

function event_date(){
  $date = new DateTime(get_field('event_date'));
  $m = $date->format('M');
  $d = $date->format('d');
  return ['month'=> $m, 'day' => $d];
}