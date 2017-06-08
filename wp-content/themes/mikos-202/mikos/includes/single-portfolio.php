<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $favicon = mikos_option("favicon"); ?>
    <link rel="shortcut icon" href="<?php if(!empty($favicon)) { echo esc_url($favicon); }?>">
    <meta name="description" content="<?php bloginfo('description'); ?>" >
    <meta name="author" content="<?php the_author(); ?>">

    <?php
    mikos_custom_styles();
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrap">
<div class="left_line"> </div>
<div class="top_line"> </div>
<div class="right_line"> </div>
    <?php
    while(have_posts()): the_post();
        $date = get_field("portfolio_date");
        $client = get_field("portfolio_client");
        $designer = get_field("portfolio_designer");
        $developer = get_field("portfolio_developer");
        $other_item = get_field("select_other_item");
        $other_images = get_field("other_images");
        ?>
        <div id="<?php echo get_the_ID(); ?>" class="white-popup mfp-with-anim">
            <div class="top-bor">
                <div class="container">
					<a href="<?php echo esc_url(home_url()); ?>" title="Close (Esc)" class="mfp-close closo">Back to Works</a>
                    <div class="pull-left">
                        <?php $nepo = get_next_post();
                        if(!empty($nepo)){
                            $nepoid = $nepo->ID;
                            $next_post_url = get_permalink($nepoid);
                        } else {
                            $next_post_url = "no-posts";
                        }
                        if($next_post_url != "no-posts"){ ?>
                            <a href="<?php echo esc_url($next_post_url); ?>"><i class="port-larrow"></i> &nbsp; <?php esc_html_e('Previous work', 'mikos'); ?></a>
                        <?php } ?>
                    </div>
                    <div class="pull-right">
                        <?php $prpo=get_previous_post();
                        if(!empty($prpo)){
                            $prpoid = $prpo->ID;
                            $prev_post_url = get_permalink($prpoid);
                        } else {
                            $prev_post_url = "no-post"; }
                        if($prev_post_url != "no-post"){ ?>
                            <a href="<?php echo esc_url($prev_post_url); ?>">
                                <?php esc_html_e('Next work', 'mikos'); ?> &nbsp; <i class="port-rarrow"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="port-inner">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2 text-center">
                            <hr>
                            <h2><?php the_title(); ?></h2>
                            <hr>
                            <?php the_content(); ?>
                            <ul class="container-fluid">
								<?php
								$items = 0;
								if(isset($date)) if( !empty($date) ) $items = 1;
								if(isset($client)) if( !empty($client) ) $items++;
								if ($items == 1) $colclass = ' class="col-md-12"';
								if ($items == 2) $colclass = ' class="col-md-6"';
								if ($items == 3) $colclass = ' class="col-md-4"';
								if ($items == 4) $colclass = ' class="col-md-3"';
								?>



                                <?php if(!empty($date)){ ?>
                                    <li<?php echo $colclass; ?>><span><?php esc_html_e('DATE', 'mikos'); ?></span>
                                        <p><span><?php echo esc_attr($date); ?></span></p>
                                    </li>
                                <?php } if(!empty($client)){ ?>
                                    <li<?php echo $colclass; ?>><span><?php esc_html_e('CLIENT', 'mikos'); ?></span>
                                        <p><span><?php echo esc_attr($client); ?></span></p>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="row margin-t-40">
                                <?php
                                if(!empty($other_images)){
                                    foreach( $other_images as $image ){ ?>
                                        <div class="container">
                                            <img class="img-responsive" width="100%" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </div>
                                    <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <!--CONTACT-->
    <?php
    $hide_contact = mikos_option("hide_contact_section");
    $hide_title = mikos_option("hide_contact_title");
    $contact_title = mikos_option("contact_title");
    $contact_sub_title = mikos_option("contact_sub_title");
    $contact_address = mikos_option("contact_address");
    $contact_email = mikos_option("contact_email");
    $contact_number = mikos_option("contact_number");
    $contact_shortcode = mikos_option("contact_shortcode");
    $contact_button_text = mikos_option("contact_button_text");
    if($hide_contact != 1){
        ?>
        <section id="contact" data-stellar-background-ratio="0.5">
            <div class="container">
                <?php if($hide_title != 1){ ?>
                    <div class="tittle">
                        <h2 class="white"><?php if(!empty($contact_title)){ echo esc_attr($contact_title); } ?></h2>
                        <?php if(!empty($contact_sub_title)){ ?>
                            <hr>
                            <p><?php echo esc_attr($contact_sub_title); ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="contact-info">
                    <ul class="row">
                        <?php if(!empty($contact_address)){ ?>
                            <li class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                <p><span aria-hidden="true" class="icon-map"></span> <?php echo esc_attr($contact_address); ?></p>
                            </li>
                        <?php } if(!empty($contact_email)){ ?>
                            <li class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                                <p><span aria-hidden="true" class="icon-envelope"></span> <?php echo sanitize_email($contact_email); ?></p>
                            </li>
                        <?php } if(!empty($contact_number)){ ?>
                            <li class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                                <p><span aria-hidden="true" class="icon-call-end"></span> <?php echo esc_attr($contact_number); ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="drop-line wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <?php if(!empty($contact_button_text)){ ?>
                        <a id="trigger-overlay" href="#."><?php echo esc_attr($contact_button_text); ?></a>
                    <?php } else { ?>
                        <a id="trigger-overlay" href="#."><?php echo esc_attr_e("DROP US A LINE", 'mikos'); ?></a>
                    <?php } ?>
                </div>
                <div class="social_icons">
                    <ul>
                        <?php
                        $facebook = mikos_option("facebook");
                        $twitter = mikos_option("twitter");
                        $dribble = mikos_option("dribble");
                        $google = mikos_option("google");
                        $linkedin = mikos_option("linkedin");
                        $pinterest = mikos_option("pinterest");
                        if(!empty($facebook)){
                            ?>
                            <li class="facebook wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.3s">
                                <a href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook"></i> </a>
                            </li>
                        <?php } if(!empty($twitter)){ ?>
                            <li class="twitter wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.4s">
                                <a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-twitter"></i> </a>
                            </li>
                        <?php } if(!empty($dribble)){ ?>
                            <li class="dribbble wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <a href="<?php echo esc_url($dribble); ?>"><i class="fa fa-dribbble"></i> </a>
                            </li>
                        <?php } if(!empty($google)){ ?>
                            <li class="googleplus wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.6s">
                                <a href="<?php echo esc_url($google); ?>"><i class="fa fa-google"></i> </a>
                            </li>
                        <?php } if(!empty($linkedin)){ ?>
                            <li class="linkedin wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.7s">
                                <a href="<?php echo esc_url($linkedin); ?>"><i class="fa fa-linkedin"></i> </a>
                            </li>
                        <?php } if(!empty($pinterest)){ ?>
                            <li class="pinterest wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.8s">
                                <a href="<?php echo esc_url($pinterest); ?>"><i class="fa fa-pinterest"></i> </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="overlay-pop overlay-scale"> <a href="#." class="overlay-close"></a>
                <div class="container">
                    <div class="form-up">
                        <div id="contact_form">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(!empty($contact_shortcode)){
                                        echo do_shortcode($contact_shortcode);
                                    } else { ?>
                                        <p class="white"><?php esc_attr_e("Enter Your Contact Form 7 Shortcode in Mikos Options!", 'mikos'); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    <?php } ?>
    <section id="rights">
        <?php $copyright = mikos_option("footer_copyright");
        if(!empty($copyright)){ ?>
            <p><?php echo esc_attr( $copyright ); ?></p>
        <?php } ?>
    </section>
</div>
</div>
<?php mikos_custom_scripts(); ?>
<?php wp_footer(); ?>
</body>
</html>
