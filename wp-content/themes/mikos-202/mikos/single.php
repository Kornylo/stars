<?php get_header();

$title = '';
$sub_title = '';
$title_bg = '';
$post_layout = '';

if(function_exists("register_field_group")) {
    $title .= get_field("show_title");
    $sub_title .= get_field("sub_title");
    $title_bg .= get_field("title_background_image");
    $post_layout .= get_field("post_layout"); 
}
if($title == 1){
    ?>
    <div class="sub-banner"<?php if(!empty($title_bg)){ ?> style="background: url('<?php echo esc_url($title_bg); ?>')  center center no-repeat; background-size: cover;"<?php } ?>>
        <div class="container"> <hr>
          <ul class="a-info">
              <?php $hide_meta = mikos_option("hide_post_meta");
              if($hide_meta != 1){ ?>
              <!--li> <?php esc_attr_e("By ", 'mikos');  the_author(); ?> </li-->
              <li> <?php echo get_the_time('M jS, Y'); ?> </li>
              <?php }
              $hide_cat = mikos_option("hide_category");
              if($hide_cat != 1){ ?>
              <li> <?php mikos_get_category_by_id3(get_the_ID()); ?></li>
              <?php } ?>
          </ul>
             <h2><?php the_title(); ?></h2>
            <?php posts_nav_link(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'mikos' ), 'after' => '</div>' ) ); ?>
            <?php
            $hide_tags = mikos_option("hide_post_tags");
            if($hide_tags != 1){
            if (has_tag()) {
                $posttags = get_the_tags();
                $count=0;
                if ($posttags) {
                    echo '<ul class="sub-tags">';
                    foreach($posttags as $tag) { ?>
                    <li><a href="<?php the_permalink(); ?>"><?php echo esc_attr($tag->name) . ' '; ?></a></li>
                    <?php }
                    echo '</ul>';
                }
            } } ?>
            <hr>
            <p><?php echo esc_html($sub_title); ?></p>

        </div>

    </div>
<?php } ?>
<div class="content sub-pages">
    <div class="container">
        <div class="single-pst">
            <div class="row">
                <div class="<?php if($post_layout != "fullwidth"){ ?>col-md-8<?php } else{ ?> col-md-12 <?php } ?>">
                    <?php while(have_posts()): the_post(); ?>
                    <div class="blog-post">

                        <?php the_post_thumbnail(); ?>
                        <h2> <?php the_title(); ?></h2>
                        <ul class="a-info">
                            <li> <?php echo get_the_time('M jS, Y'); ?> </li>
                            <li> <?php mikos_get_category_by_id3(get_the_ID()); ?></li>
                        </ul>
                        <?php the_content(); ?>

                        <div class="clear clearfix"></div>

                        <?php posts_nav_link(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'mikos' ), 'after' => '</div>' ) ); ?>
                        <?php
                        
                        $hide_tags = mikos_option("hide_post_tags");
                        if($hide_tags != 1){
                        if (has_tag()) {
                            $posttags = get_the_tags();
                            $count=0;
                            if ($posttags) {
                                echo '<ul class="sub-tags">';
                                foreach($posttags as $tag) { ?>
                                <li><a href="<?php the_permalink(); ?>"><?php echo esc_attr($tag->name) . ' '; ?></a></li>
                                <?php }
                                echo '</ul>';
                            }
                        } } ?>


                        <?php

                        $hide_posts = mikos_option("hide_related_posts");
                        if($hide_posts != 1){
    
                        $categories = get_the_category( get_the_ID() );
                        $f_cat = $categories[0]->cat_ID;
                        $args = array(
                            'category__in' => array( $f_cat ),
                            'post__not_in' => array( get_the_ID() ),
                            'posts_per_page' => 2
                        );

                        ?>

                        <?php } ?>
                        <?php comments_template(); ?>
                    </div>
                    <?php endwhile; ?>
                    <div class="clearfix"></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
                </div>
                <?php if($post_layout != "fullwidth"){ ?>
                <div class="col-md-4">
                    <div class="sider-bar">
                        <?php if ( ! dynamic_sidebar( 'single' ) ) : ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
  </div>
<?php get_footer(); ?>
