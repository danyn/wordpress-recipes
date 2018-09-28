<?php
function homepage_blog_section(){
  // the query no_found_rows=true
  $the_query = new WP_Query(['posts-per-page' => 2, 'category_name' => 'pistachio' ]); 
  ?>
  <div class="full-width-split__inner">
  <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
  <?php
  if ( $the_query->have_posts() ) : 


  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="event-summary">
        <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
          <span class="event-summary__month"><?php the_time('M') ?></span>
          <span class="event-summary__day"><?php the_time('d')?></span>
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a href="#"><?php the_title() ?></a></h5>
          <p><?php excerpt() ?> <a href="<?php the_permalink()?>" class="nu gray">Read more</a></p>
        </div>
      </div>
   <?php
    endwhile;
    wp_reset_postdata();
    ?> 
  <p class="t-center no-margin"><a href="<? echo site_url('blog') ?>" class="btn btn--yellow">View All Blog Posts</a></p>
  </div>
  <?php
  else : 
    echo esc_html_e( 'Sorry, no posts matched your criteria.' ); 
  endif; 
}