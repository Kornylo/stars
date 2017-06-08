<?php
/*
 * Template Name: Blog Page
 */
get_header();
$tp = get_field("page_top_padding");
$bp = get_field("page_bottom_padding");
$hide_page_title = get_field("hide_page_title");
?>
<section class="body-bg" style="<?php if(!empty($tp)) { echo 'padding-top: '.$tp.'px;'; } if(!empty($bp)) { echo 'padding-bottom: '.$bp.'px;'; }?>">
    <div class="container" id=blog>
        <?php if($hide_page_title != 1){ ?>
        <div class="tittle">
                 <hr>
                <?php $sub_title = get_field("page_sub_title",$page_id); ?>
                  <?php if(!empty($sub_title)){ ?>
                  <p><?php echo esc_html($sub_title); ?></p>
                  <?php } ?>
                  <h2><?php the_title(); ?></h2><hr>
        </div>
        <?php } ?>
        <div class="blog">
            <div class="row">
                <?php
                $blog_cat = get_field("choose_your_blog_categories");
                $number_posts = get_field("number_of_posts_to_display");
                $posts = array(
                    'post_type' => 'post',
                    'cat' => $blog_cat,
                    'posts_per_page' => $number_posts
                );
                $posts_loop = new WP_Query($posts);
                $blog_count = 1;
                while ( $posts_loop->have_posts() ) : $posts_loop->the_post();
                $disable_animation = get_field("disable_animation");
                $animation_type = get_field("select_animation_type");
                $animation_duration = get_field("animation_duration");
                $animation_delay = get_field("animation_delay");
                ?>
                <!--Blog_post-->
                <div class="col-md-4 wow <?php if($disable_animation != 1){ echo esc_attr($animation_type); } ?>" data-wow-duration="<?php echo intval($animation_duration); ?>s" data-wow-delay="<?php echo intval($animation_delay); ?>s">
                    <?php echo get_the_post_thumbnail( get_the_ID(), array( 360, 240) ); ?>
                    <div class="b-detail"><h6><?php echo get_the_time('M jS, Y'); ?></h6>
                        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                        <div class="b_links">
                            <a href="<?php the_permalink(); ?>">&mdash; <?php esc_attr_e( 'READ MORE', 'mikos' ) ?></a>
                        </div>
                    </div>
					<a href="<?php the_permalink(); ?>"></a>
                </div>
                <?php if($blog_count %3 == 0){ ?><div class="clearfix clear margintop30"></div> <?php } ?>
                <?php
                    $blog_count++;
                    endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
