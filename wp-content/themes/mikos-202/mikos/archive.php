<?php get_header();
$queried_object = get_queried_object();
$hide_title = intval(get_field("hide_category_title", $queried_object));
$sub_title = get_field("category_sub_title", $queried_object);
$cat_bg = get_field("category_title_background", $queried_object);
$cat_layout = get_field("category_layout", $queried_object);
if($hide_title != 1){
    ?>
    <div class="sub-banner" <?php if(!empty($cat_bg)){ ?>style="background: url('<?php echo esc_url($cat_bg); ?>') center center no-repeat; background-size: cover;" <?php } ?>>
        <div class="container">
          <?php if ( !is_date() and !is_month() ) { ?>
            <h2><?php echo single_term_title("", false); ?></h2>
            <p><?php echo esc_html($sub_title); ?></p>
          <?php } else { ?>
            <h2><?php echo get_the_date("F Y"); ?></h2>
          <?php }?>
        </div>
    </div>
<?php } ?>
<div class="content sub-pages">
    <?php if($cat_layout == "fullwidth"){ ?>
    <section style='<?php if($cat_layout == "fullwidth"){ echo "padding-top: 10px;"; }?>'>
        <?php
        $count = 1;
        while(have_posts()): the_post();
            if($count % 2 != 0){ ?>
        <ul class="row projects">
            <li class="col-sm-6">
                <div class="project-detail">
                    <h2><?php the_title(); ?></h2>
                    <p><?php mikos_excerpt(120); ?></p>
                    <a class="btn readmore" href="<?php the_permalink(); ?>"><?php esc_attr_e("READ MORE", 'mikos'); ?></a> </div>
            </li>
            <li class="col-sm-6">
                <div class="post-img">
                    <?php the_post_thumbnail(); ?>
                </div>
            </li>
        </ul>
        <?php } else{ ?>
        <ul class="row projects">
            <li class="col-sm-6">
                <div class="post-img">
                    <?php the_post_thumbnail(); ?>
                </div>
            </li>
            <li class="col-sm-6">
                <div class="project-detail">
                    <h2><?php the_title(); ?></h2>
                    <p><?php mikos_excerpt(120); ?></p>
                    <a class="btn readmore" href="<?php the_permalink(); ?>"><?php esc_attr_e("READ MORE", 'mikos'); ?></a> </div>
            </li>
        </ul>
        <?php }
            $count++;
            endwhile;
         ?>
        <div class="load-more">
            <?php mikos_pagination($pages = '', $range = 2); ?>
        </div>
    </section>
    <?php } else { ?>
    <div class="container">
        <div class="single-pst ind-posts">
            <div class="row">
                <div class="col-md-8">
                    <?php while(have_posts()): the_post(); ?>
                        <div class="blog-post">
                            <?php the_post_thumbnail(); ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                            <ul class="a-info">
                                <li> <?php esc_attr_e("By ", 'mikos');  the_author(); ?> </li>
                                <li><?php echo get_the_time('M jS, Y'); ?> </li>
                                <li> <?php mikos_get_category_by_id3(get_the_ID()); ?> </li>
                            </ul>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn readmore"><?php esc_attr_e("READ MORE", 'mikos'); ?></a>
                        </div>
                    <?php endwhile; ?>
                    <div class="load-more">
                        <?php mikos_pagination($pages = '', $range = 2); ?>
                    </div>
                </div>
                <!--======= SIDE BAR=========-->
                <div class="col-md-4">
                    <div class="sider-bar">
                        <?php if ( ! dynamic_sidebar( 'category' ) ) : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<?php get_footer(); ?>
