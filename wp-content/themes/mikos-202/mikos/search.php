<?php get_header(); ?>
<div class="content sub-pages">
    <div class="container">
        <div class="single-pst ind-posts">
            <div class="row">
                <div class="col-md-8">
                <h3 class="category-title text-capitalize"><?php printf( esc_html__( 'Search Results for: %s', 'mikos' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
                    <?php
					if ( have_posts() ) :
					while(have_posts()): the_post(); ?>
                        <div class="blog-post">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                            <ul class="a-info">
                                <li> <?php esc_attr_e("By ",'mikos'); the_author(); ?> </li>
                                <li> <?php echo get_the_time('M jS, Y'); ?> </li>
                            </ul>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e("read more..",'mikos'); ?></a>
                        </div>
                    <?php endwhile;
					else:
					?>
					<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'mikos' ); ?></p>
					<?php endif; ?>
                    <div class="load-more">
                        <?php mikos_pagination($pages = '', $range = 2); ?>
                    </div>
                </div>
                <!--======= SIDE BAR=========-->
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
