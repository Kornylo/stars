<?php
/*
  * Template Name: Portfolio Page
  */
get_header();
$tp = get_field("page_top_padding");
$bp = get_field("page_bottom_padding");
$hide_page_title = get_field("hide_page_title");
?>
    <!--PORTFOLIO-->
    <section style="<?php if(!empty($tp)) { echo 'padding-top: '.$tp.'px;'; } if(!empty($bp)) { echo 'padding-bottom: '.$bp.'px;'; }?>">
        <div class="container">
            <!--TITTLE HEADING-->
            <?php if($hide_page_title != 1){ ?>
            <div class="tittle">
                <?php $sub_title = get_field("page_sub_title"); ?>
                <h2><?php the_title(); ?></h2>
                <?php if(!empty($sub_title)){ ?>
                    <hr>
                    <p><?php echo esc_attr($sub_title); ?></p>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="portfolio-wrapper">
            <!--PORTFOLIO FILTER-->
            <ul class="filter wow bounceIn" data-wow-delay="500ms">
                <li>
                    <a class="active" href="#" data-filter="*"><?php esc_html_e('ALL', 'mikos'); ?></a>
                </li>
                <?php $categories = get_terms( 'mikos_genre', array(
                    'orderby'    => 'count',
                    'hide_empty' => 1
                ) );
                foreach($categories as $cat) { ?>
                    <li><a href="#" data-filter=".<?php echo esc_attr($cat->slug); ?>"><?php echo esc_attr($cat->name); ?> </a></li>
                <?php } ?>
            </ul>
            <!--PORTFOLIO ITEM-->
            <div class="portfolio" id="popups">
                <ul class="items">
                    <?php
                    	$term_array = array();
							foreach($categories as $cat) {
								$term_array[] = $cat->slug;
								}
                        $portfolio = array(
						'post_type' => 'portfolio',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'date',
						'tax_query' => array(
								array(
										'taxonomy' => 'mikos_genre',
										'field'    => 'slug',
										'terms'    => $term_array,
									),
								),
						 );
                        $portfolio_loop = new WP_Query($portfolio);
                        while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
                            $size = get_field("portfolio_item_size");
                            if($size == "big"){
                                $size = "big";
                            } else {
                                $size = "";
                            }
                            $merge = get_field("merge_other_item");
                            $other_item = get_field("select_other_item");
                            $other_images = get_field("other_images");
                            $disable_animation = get_field("disable_animation");
                            $animation_type = get_field("select_animation_type");
                            $animation_duration = get_field("animation_duration");
                            $animation_delay = get_field("animation_delay");
							$terms = get_the_terms(get_the_ID(), 'mikos_genre');
                            ?>
                            <!--PORTFOLIO ITEM -->
                            <li class="item <?php foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; }; ?> <?php echo esc_attr($size); ?>">
                                <div class="img wow <?php if($disable_animation != 1){ echo esc_attr($animation_type); } ?>" data-wow-duration="<?php echo intval($animation_duration); ?>s" data-wow-delay="<?php echo intval($animation_delay); ?>s">
                                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { echo "<img src=\"" . get_template_directory_uri() . "/images/no_photo.png\"/>"; } ?>
                                    <div class="over">
                                        <div class="detail">
                                            <h5><?php the_title(); ?> </h5><hr>
                                            <p><?php foreach ($terms as $ter){ echo esc_attr($ter->name). ' '; }; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if($merge == "yes"){
                                    $terms = get_the_terms( $other_item->ID, 'mikos_genre' );
                                    ?>
                                    <div class="img wow <?php if($disable_animation != 1){ echo esc_attr($animation_type); } ?>" data-wow-duration="<?php echo intval($animation_duration); ?>s" data-wow-delay="<?php echo intval($animation_delay); ?>s">
                                        <?php echo get_the_post_thumbnail($other_item->ID); ?>
                                        <div class="over">
                                          <a href="<?php the_permalink(); ?>"></a>
                                           <div class="detail"><hr>
                                            <h5><?php the_title(); ?> </h5>
                                            <p><?php foreach ($terms as $ter){ echo esc_attr($ter->name). ' '; }; ?></p><hr>
                                           </div>
                                           <div class="rasporka"></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php
                        endwhile; ?>
                </ul>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
