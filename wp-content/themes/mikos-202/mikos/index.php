<?php get_header();
if(is_home()){ ?>
    <div class="content sub-pages">
    <div class="container">
        <div class="single-pst ind-posts">
            <div class="row">
                <div class="col-md-8">
                    <?php while(have_posts()): the_post(); ?>
                        <div class="blog-post <?php if(is_sticky(get_the_ID())) { echo "stickey"; } ?>">
							<?php
                             if(is_sticky(get_the_ID())){ ?>
                             <span class="sticky-bannr"><?php esc_attr_e('Featured', 'mikos'); ?></span>
                             <?php }
                            the_post_thumbnail(); ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                            <ul class="a-info">
                                <li><?php esc_attr_e("By ", 'mikos');  the_author(); ?> </li>
                                <li> <?php echo get_the_time('M jS, Y'); ?> </li>
                                <li> <?php mikos_get_category_by_id3(get_the_ID()); ?></li>
                            </ul>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e("read more..", 'mikos'); ?></a>
                            <div class="clear clearfix"></div>
                            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'mikos' ), 'after' => '</div>' ) ); ?>
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
<?php } else{
    $tp = get_field("page_top_padding");
    $bp = get_field("page_bottom_padding");
    $page_layout = get_field("page_layout"); ?>
    <section style="<?php if(!empty($tp)) { echo 'padding-top: '.$tp.'px;'; } if(!empty($bp)) { echo 'padding-bottom: '.$bp.'px;'; }?>">
        <div class="container">
            <div class="tittle"><hr>
                <?php $sub_title = get_field("page_sub_title"); ?>
                <?php if(!empty($sub_title)){ ?>
                    <p><?php echo esc_attr($sub_title); ?></p>
                    <hr>
                <?php } ?>
                <h2><?php the_title(); ?></h2>

            </div>
            <div <?php if($page_layout != "fullwidth"){ ?>class="col-md-8" <?php } ?>>
                <?php
                while(have_posts()): the_post();
                    the_content();
                endwhile;
                ?>
            </div>
            <?php if($page_layout != "fullwidth"){ ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } get_footer(); ?>
