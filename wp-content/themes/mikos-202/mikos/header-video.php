<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
      $favicon = mikos_option("favicon");
      if (!empty($favicon)) {
    ?>
    <link rel="shortcut icon" href="<?php echo esc_url($favicon);?>">
    <?php
        };
      };
    ?>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Page Wrap -->
<div id="wrap" class="home-page">
<div class="left_line"> </div>
<div class="top_line"> </div>
<div class="right_line"> </div>
    <!-- LOGO -->
    <?php
    $primary_txt_logo = mikos_option("primary_logo");
    $secondary_txt_logo = mikos_option("secondary_logo");
    $primary_use_logo = mikos_option("primary_use_logo");
    $primary_image_logo = mikos_option("primary_image_logo");
    $secondary_use_logo = mikos_option("secondary_use_logo");
    $secondary_image_logo = mikos_option("secondary_image_logo");
    $hide_top_logo = mikos_option("hide_top_logo");
    $hide_right_menu = mikos_option("hide_right_menu");
    if($hide_top_logo != 1){
		?>
		<div class="logo-left">
			<?php if($secondary_use_logo != 1){ ?>
				<a href="<?php echo esc_url(home_url("/")); ?>">
					<h2><?php if(!empty($secondary_txt_logo)){ echo esc_attr($secondary_txt_logo); } ?></h2>
				</a>
			<?php }else{ ?>
				<a href="<?php echo esc_url(home_url("/")); ?>">
					<img src="<?php if(!empty($secondary_image_logo)){ echo esc_url($secondary_image_logo); }?>" alt="<?php bloginfo("name"); ?>">
				</a>
			<?php } ?>
		</div>
    <?php } if($hide_right_menu != 1){ ?>
		<a class="menu-button toggle-nav">
      <div class="artclose">
        <div class="burgx"></div>
        <div class="burgx2"></div>
        <div class="burgx3"></div>
      </div>
		</a>
    <?php } ?>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div class="site-menu menu">
                <!--NAV START-->
                <nav class="navbar navbar-default" role="navigation">
                    <ul class="nav navbar-nav">
                        <?php
                        if ( has_nav_menu( 'right-menu' ) ) :
                            wp_nav_menu( array( 'theme_location' => 'right-menu','container' => '','items_wrap' => '%3$s' ) );
                        else:
                            echo '<li><a>' . esc_html__( 'Define right side menu', 'mikos' ) . '</a></li>';
                        endif;
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--HOME START-->
    <div id="home" class="video">
        <!--Full Slider-->
        <!--HOME TEXT START-->
        <div id="slides">
			<?php // video ?>
				<?php $video = get_field("upload_video");
				if(!empty($video)){ ?>
					<div id="video-viewport">
						<video class="bgvid" autoplay muted="muted" preload="auto" loop width=1280 height=720>
							<source src="<?php echo esc_url($video); ?>">
						</video>
					</div>
					<div id="debug"></div>
				<?php } ?>
			<?php // end video ?>
            <?php
            // check if the repeater field has rows of data
            if( have_rows('video_version') ):
                ?>
                <div class="slides-container">
                    <?php
                    // loop through the rows of data
                    while ( have_rows('video_version') ) : the_row();
                        $large_heading = get_sub_field('large_heading');
                        $small_text = get_sub_field('small_text');
                        $button_text = get_sub_field('button_text');
                        $button_link = get_sub_field('button_link');
                        //var_dump($small_text);
                        ?>
                        <div>
                            <div class="overlay">
                                <div class="bnr-text"><hr class="wow fadeInUp animated" data-wow-duration="0.8s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInUp;">
                                    <?php
                                    $h1_animate = mikos_option("h1_1");
                                    $h2_animate = mikos_option("h1_2");
                                    $p1_animate = mikos_option("p1_1");
                                    $p2_animate = mikos_option("p1_2");
                                    $btn_animate = mikos_option("btn_animation");
                                    $h1_delay = mikos_option("first_hd");
                                    $h2_delay = mikos_option("second_hd");
                                    $p1_delay = mikos_option("first_cd");
                                    $p2_delay = mikos_option("second_cd");
                                    $btn_delay = mikos_option("btn_delay");
                                    if(!empty($large_heading)){
                                        $animate = 1;
                                        foreach($large_heading as $h1){ ?>
                                            <h1 class="wow <?php if($animate == 1){ echo esc_attr($h1_animate); } else { echo esc_attr($h2_animate); }?>" data-wow-duration="<?php if($animate == 1){ echo esc_attr($h1_delay); } else { echo esc_attr($h2_delay); }?>s" data-wow-delay="0.6s">
                                                <?php echo esc_attr($h1["heading"]); ?>
                                            </h1>
                                            <?php
                                            $animate ++;
                                        }
                                    } if(!empty($small_text)){
                                        $delay = 1;
										?><hr class="wow fadeInUp animated" data-wow-duration="0.8s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInUp;">
										<div>
										<?php
                                        foreach($small_text as $p){ ?>
                                            <p class="wow <?php if($delay == 1) { echo esc_attr($p1_animate); } else { echo esc_attr($p2_animate); }?>" data-wow-duration="<?php if($delay == 1){ echo esc_attr($p1_delay); } else { echo esc_attr($p2_delay); }?>s" data-wow-delay="0.9s">
                                                <?php echo esc_attr($p["small_caption"]); ?>
                                            </p>
                                            <?php
                                            $delay++;
                                        }
										?>
										</div>
										<?php
                                    } if(!empty($button_text)){ ?>
                                        <div class="scroll wow <?php echo esc_attr($btn_animate); ?>" data-wow-duration="<?php echo esc_attr($btn_delay); ?>s" data-wow-delay="1.4s">
                                            <a class="btn" href="<?php echo esc_url($button_link); ?>"><?php echo esc_attr($button_text); ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            <?php
            else :
                // no rows found
            endif;
            ?>
            <!-- GO DOWN -->
            <?php
            $show_scroll_button = mikos_option("show_scroll_button");
            $scroll_link = mikos_option("scroll_link");
            if($show_scroll_button == 1){ ?>
            <div class="scroll"> <a href="#<?php echo esc_attr($scroll_link); ?>" class="go-down"></a> </div>
            <?php } ?>
        </div>
    </div>
    <!-- HEADER -->
    <header class="sticky">
		<?php get_sidebar('sticky'); ?>
    </header>
