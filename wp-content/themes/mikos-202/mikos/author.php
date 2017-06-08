<?php get_header(); ?>
<div class="content sub-pages">
    <div class="container">
        <div class="single-pst ind-posts">
            <div class="row">
                <div class="col-md-8">
                    <?php while(have_posts()): the_post(); ?>
                        <div class="blog-post">
                            <?php the_post_thumbnail(); ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                            <ul class="a-info">
                                <li>  <?php esc_attr_e('By ', 'mikos');  the_author(); ?> </li>
                                <li> <?php echo get_the_time('M jS, Y'); ?> </li>
                                <li> <?php mikos_get_category_by_id3(get_the_ID()); ?></li>
                            </ul>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e('read more..', 'mikos'); ?></a>
                        </div>
                    <?php endwhile; ?>
                    <div class="load-more">
                        <?php mikos_pagination($pages = '', $range = 2); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
