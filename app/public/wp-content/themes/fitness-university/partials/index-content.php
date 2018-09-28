<div class="container container--narrow page-section">
    <div class="post-item">
        <h2 headline headline--medium headline--post-title> <a href="<?php the_permalink()?>"><?php the_title() ?></a></h2>
        <div class="metabox">
            <p>By: <?php the_author_posts_link()  ?></p> 
            <p>In: <?php echo get_the_category_list(', ') ?></p>
            <p>On: <?php echo the_time('l \t\h\e jS \o\f F, Y \a\t g:i a') ?></p>
        </div>
        <p><?php the_excerpt() ?></p>
        <p><a href="<?php the_permalink() ?>" class="btn btn--blue">Read More</a></p>
    </div>
</div>
