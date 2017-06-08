<?php
    $primary_txt_logo = mikos_option("primary_logo");
    $secondary_txt_logo = mikos_option("secondary_logo");
    $primary_use_logo = mikos_option("primary_use_logo");
    $primary_image_logo = mikos_option("primary_image_logo");
    $secondary_use_logo = mikos_option("secondary_use_logo");
    $secondary_image_logo = mikos_option("secondary_image_logo");
    $hide_top_logo = mikos_option("hide_top_logo");
    $hide_right_menu = mikos_option("hide_right_menu");
?>

            <div class="menu">
                <!--LOGO-->
                <div class="logo">
                    <?php if($primary_use_logo != 1){ ?>
                        <a href="<?php echo esc_url(home_url("/")); ?>#wrap">
                            <h2><?php if(!empty($primary_txt_logo)){ echo esc_attr($primary_txt_logo); }?></h2>
                        </a>
                    <?php } else{ ?>
                        <a href="<?php echo esc_url(home_url("/")); ?>#wrap">
                            <img src="<?php if(!empty($primary_image_logo)){ echo esc_url($primary_image_logo); } ?>" alt="<?php bloginfo("name"); ?>">
                        </a>
                    <?php } ?>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-mikos">
                      <span class="sr-only"><?php esc_attr_e("Toggle navigation", 'mikos'); ?></span>
                      <a class="toggle-sticky-nav menu-button">
                        <div class="artclose">
                          <div class="burgx"></div>
                          <div class="burgx2"></div>
                          <div class="burgx3"></div>
                        </div>
                      </a>
                     </button>

                </div>
                <!--NAV START-->
                <nav class="navbar navbar-default" role="navigation">
                    <div class="collapse navbar-collapse" id="menu-mikos">
                        <ul class="nav navbar-nav">
                            <!--MENU-->
                            <?php
                            if ( has_nav_menu( 'primary-menu' ) ) :
                                wp_nav_menu( array( 'theme_location' => 'primary-menu','container' => '','items_wrap' => '%3$s' ) );
                            else:
                                echo '<li>' . esc_html__( 'Define your site menu', 'mikos' ) . '</li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
