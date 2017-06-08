<?php get_header();
$tp = get_field("page_top_padding");
$bp = get_field("page_bottom_padding");
$page_layout = get_field("page_layout");
$hide_page_title = get_field("hide_page_title");
?>
<section class="body-bg" style="<?php if(!empty($tp)) { echo 'padding-top: '.$tp.'px;'; } if(!empty($bp)) { echo 'padding-bottom: '.$bp.'px;'; }?>">
    <div class="container">
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
        <div <?php if($page_layout != "fullwidth"){ ?>class="col-md-8" <?php } ?>>
        <?php
        while(have_posts()): the_post();
            the_content();
            endwhile;
             if ( comments_open() ): ?>
                <div class="comment">
                    <?php comments_template( '', true ); ?>
                </div>
            <?php endif; ?>

        </div>
        <?php if($page_layout != "fullwidth"){ ?>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php get_footer(); ?>
