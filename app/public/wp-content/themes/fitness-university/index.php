<?php  
echo 'index';
 get_header();
 get_template_part('partials/site-header');
 banner_archive();

while(have_posts()){
    the_post();
    get_template_part('partials/index-content');
}
echo paginate_links();
get_footer();

