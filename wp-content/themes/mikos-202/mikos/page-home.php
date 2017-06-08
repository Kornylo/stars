<?php
/*
 * Template Name: Home Page
 */
$header_version = get_field("choose_slider_video");
switch($header_version) {
case "slider": get_header("slider"); break;
case "simple": get_header("simple"); break;
case "video": get_header("video"); break;
}
?>
<div class="content">
    <?php
    $page_sort_sections = mikos_sort_sections();
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'page-sections',
        'post__in'  => (array) $page_sort_sections,
        'orderby' => 'post__in',
    );
    $home_query = new WP_Query($args);
    if($home_query->have_posts()):
    while($home_query->have_posts()) : $home_query->the_post();
        $enable_parallax = get_field("enable_parallax_section");
        $parallax_img = get_field("parallax_image");
        $section_fullwidth = get_field("section_full_width");
        $hide_section_title = get_field("hide_section_title");
    // Blog Section
    $padding_top = get_field("section_top_padding");
    $padding_bottom = get_field("section_bottom_padding");
    $section_page = get_field("select_page");
    $page_template = get_post_meta( $section_page->ID, '_wp_page_template', true );
    $page_id = $section_page->ID;


    if($page_template == "page-blog.php"){ ?>

        <section id="<?php echo esc_attr($post->post_name);?>" style="<?php if(!empty($padding_top)){ echo 'padding-top: '.$padding_top.'px;';} if(!empty($padding_bottom)){ echo 'padding-bottom: '.$padding_bottom.'px;';} if($enable_parallax == 1){?> background: url('<?php echo esc_url($parallax_img); ?>') fixed no-repeat; background-size: cover; <?php }?>" <?php if($enable_parallax == 1){ echo 'data-stellar-background-ratio="0.1"'; } ?>>
            <div class="container">
                <?php if($hide_section_title != 1){ ?>
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
                        $blog_cat = get_field("choose_your_blog_categories",$page_id);
                        $number_posts = get_field("number_of_posts_to_display",$page_id);
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
                           <!--BLOG SECTION 1-->

                <div class="col-md-4 wow <?php if($disable_animation != 1){ echo esc_attr($animation_type); } ?>" data-wow-duration="<?php echo intval($animation_duration); ?>s" data-wow-delay="<?php echo intval($animation_delay); ?>s">
                    <?php echo get_the_post_thumbnail( get_the_ID(), array( 360, 240) ); ?>
                    <div class="b-detail"><h6><?php echo get_the_time('M jS, Y'); ?></h6>
                        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                        <div class="b_links">
                            <a href="<?php the_permalink(); ?>">&mdash; <?php esc_attr_e('READ MORE','mikos') ?></a>
                        </div>
                    </div>

                            </div>

                            <?php if($blog_count %3 == 0){ ?><div class="clearfix clear margintop30"></div> <?php } ?>
                            <?php
                            $blog_count++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php }  // End Blog Section


        if($page_template == "page-portfolio.php"){ ?>
        <!--PORTFOLIO-->

        <section id="<?php echo esc_attr($post->post_name);?>" style="<?php echo 'padding-top: '.$padding_top.'px;'; echo ' padding-bottom: '.$padding_bottom.'px;'; if($enable_parallax == 1){?> background: url('<?php echo esc_url($parallax_img); ?>') fixed no-repeat; background-size: cover; <?php }?>" <?php if($enable_parallax == 1){ echo 'data-stellar-background-ratio="0.1"'; } ?>>
            <div class="container">
                <!--TITTLE HEADING-->
                <?php if($hide_section_title != 1){ ?>
                <div class="tittle">
                <hr>
                <?php $sub_title = get_field("page_sub_title",$page_id); ?>
                  <?php if(!empty($sub_title)){ ?>
                  <p><?php echo esc_html($sub_title); ?></p>
                  <?php } ?>
                  <h2><?php the_title(); ?></h2><hr>
                </div>
                <?php } ?>
            </div>


            <div class="portfolio-wrapper">


				<!--PORTFOLIO FILTER-->
                <ul class="filter wow fadeIn" data-wow-delay="500ms">
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


				<!--PORTFOLIO ITEMS-->
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
                                $other_images = get_field("other_images");
                                $disable_animation = get_field("disable_animation");
                                $animation_type = get_field("select_animation_type");
                                $animation_duration = get_field("animation_duration");
                                $animation_delay = get_field("animation_delay");
								$terms = get_the_terms(get_the_ID(), 'mikos_genre');

                                ?>
                                <!--PORTFOLIO ITEM -->
                                <li class="item mitem <?php foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; }; ?> <?php echo esc_attr($size); ?>">
                                    <div class="img wow <?php if($disable_animation != 1){ echo esc_attr($animation_type); } ?>" data-wow-duration="<?php echo intval($animation_duration); ?>s" data-wow-delay="<?php echo intval($animation_delay); ?>s">
                                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { echo "<img src=\"" . get_template_directory_uri() . "/images/no_photo.png\"/>"; } ?>
                                        <div class="over">
											<a href="<?php the_permalink(); ?>"></a>
                                            <div class="detail"><hr>
                                                <h5><?php the_title(); ?> </h5>
                                                <p><?php foreach ($terms as $ter){ echo esc_attr($ter->name). ' '; }; ?></p><hr>
                                            </div>
											<div class="rasporka"></div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            endwhile; ?>
                    </ul>
                </div>
            </div>
        </section>
    <?php } //End Portfolio






        // Template About
        if($page_template == "page-about.php"){ ?>
            <section id="<?php echo esc_attr($post->post_name); ?>" style="padding: 0;">
                <div class="<?php if($section_fullwidth != 1){ ?>container<?php } ?>">
						<?php
						$query = new WP_Query( 'page_id='.$page_id );
						while($query->have_posts()): $query->the_post();
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
						$thumburl = $thumb['0'];
							?>
						<div class="row">
							<div class="col-md-6 class" style="background: url(<?php echo esc_url( $thumburl ); ?>) no-repeat; background-size: cover; ">
							</div>
							<div class="col-md-6">
								<div class="container-fluid"  style="<?php if($enable_parallax == 1){?> background: url('<?php echo esc_url($parallax_img); ?>') fixed no-repeat; background-size: cover; <?php }?>" <?php if($enable_parallax == 1){ echo 'data-stellar-background-ratio="0.1"'; } if($enable_parallax == 1){ echo ' class="parallax"';}?>>
									<?php if($hide_section_title != 1){ ?>
									<div class="row">
										<div class="tittle
															col-lg-8 col-lg-offset-2
															col-md-12 col-md-offset-0
															col-sm-8 col-sm-offset-2
															col-xs-12
													">
											<?php $sub_title = get_field("page_sub_title",$page_id); ?>
											<h2 class="text-left"><?php the_title(); ?></h2>
											<?php if(!empty($sub_title)){ ?>
												<hr>
												<p><?php echo esc_html($sub_title); ?></p>
											<?php } } ?>
										</div>
									</div>
									<div class="row">
										<div class="about-content text-left
															col-lg-8 col-lg-offset-2
															col-md-12 col-md-offset-0
															col-sm-8 col-sm-offset-2
															col-xs-12
										">
											<?php
												the_content();
											?>
										</div>
									</div>
								</div>
								<div class="rasporka"></div>
							</div>
						</div>
						<?php
						endwhile;
						?>

				</div>
            </section>
			<?php
			}// End About


        // Default Template
        if($page_template == "default"){ ?>
            <section id="<?php echo esc_attr($post->post_name); ?>" style="<?php if(!empty($padding_top)){ echo 'padding-top: '.$padding_top.'px;';} if(!empty($padding_bottom)){ echo 'padding-bottom: '.$padding_bottom.'px;';} if($enable_parallax == 1){?> background: url('<?php echo esc_url($parallax_img); ?>') fixed no-repeat; background-size: cover; <?php }?>" <?php if($enable_parallax == 1){ echo 'data-stellar-background-ratio="0.1"'; } if($enable_parallax == 1){ echo ' class="parallax"';}?>>
                <div class="<?php if($section_fullwidth != 1){ ?>container<?php } ?>">
                    <?php if($hide_section_title != 1){ ?>
                    <div class="tittle"><hr>
                        <?php $sub_title = get_field("page_sub_title",$page_id); ?>
                        <?php if(!empty($sub_title)){ ?>
                            <p><?php echo esc_html($sub_title); ?></p>
                        <?php } ?>
                        <h2><?php the_title(); ?></h2><hr>

                    </div>
                <?php }
                    $query = new WP_Query( 'page_id='.$page_id );
                    while($query->have_posts()): $query->the_post();
                        the_content();
                        endwhile;
                    ?>
                </div>
            </section>
       <?php }


    endwhile;
    endif;
    ?>
</div>
<?php get_footer(); ?>
