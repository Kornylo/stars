<?php
header("Content-type: text/css; charset: UTF-8");
    // Styling Options
    $heading_h1 = mikos_option("heading_h1");
    $heading_h2 = mikos_option("heading_h2");
    $heading_h3 = mikos_option("heading_h3");
    $heading_h4 = mikos_option("heading_h4");
    $heading_h5 = mikos_option("heading_h5");
    $heading_h6 = mikos_option("heading_h6");
    $menu_normal = mikos_option("menu_normal");
    $menu_active = mikos_option("menu_active");
    $header_bg = mikos_option("header_bg");
    $primary_logo_color = mikos_option("primary_logo_color");
    $secondary_logo_color = mikos_option("secondary_logo_color");
    $body_bg = mikos_option("body_bg");
    $body_color = mikos_option("body_color");
    $body_border_color = mikos_option("body_border_color");
    $footer_bg = mikos_option("footer_bg");
    $footer_color = mikos_option("footer_color");
    $page_title = mikos_option("page_title");
    $page_sub_title = mikos_option("page_sub_title");
    $parallax_color = mikos_option("parallax_color");
    $slides_color = mikos_option("slides_color");
    $single_post = mikos_option("single_post");
    $links_normal = mikos_option("links_normal");
    $links_hover = mikos_option("links_hover");
    $widget_title = mikos_option("widget_title");
    $theme_color = mikos_option("theme_color");
    $background_right_menu = mikos_option("background_right_menu");
    $preloader_color = mikos_option("preloader_color");
    ?>
    
    <?php if(!empty($heading_h1)){ ?>
        h1 {color: <?php echo esc_attr($heading_h1); ?>;}
    <?php } if(!empty($heading_h2)){ ?>
        h2 {color: <?php echo esc_attr($heading_h2); ?>;}
        .port-inner h2 {color: <?php echo esc_attr($heading_h2); ?>;}
    <?php } if(!empty($heading_h3)){ ?>
        h3 {color: <?php echo esc_attr($heading_h3); ?>;}
    <?php } if(!empty($heading_h4)){ ?>
        h4 {color: <?php echo esc_attr($heading_h4); ?>;}
    <?php } if(!empty($heading_h5)){ ?>
        h5 {color: <?php echo esc_attr($heading_h5); ?>;}
    <?php } if(!empty($heading_h6)){ ?>
        h6 { color: <?php echo esc_attr($heading_h6); ?>;}
    <?php } if(!empty($menu_normal)){ ?>
        header .navbar-nav > li > a {color: <?php echo esc_attr($menu_normal); ?>;}
    <?php } if(!empty($menu_active)){ ?>
        header .nav > li > a:hover, .nav > li > a:focus {color: <?php echo esc_attr($menu_active); ?>;}
    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {color: <?php echo esc_attr($menu_active); ?>;}
    <?php } if(!empty($header_bg)){ ?>
    header { background: <?php echo esc_attr($header_bg); ?>;}
    <?php } if(!empty($primary_logo_color)){ ?>
        .logo a > h2 { color: <?php echo esc_attr($primary_logo_color); ?>;}
    <?php } if(!empty($secondary_logo_color)){ ?>
        .logo-left a > h2{ color: <?php echo esc_attr($secondary_logo_color); ?>;}
    <?php } if(!empty($body_bg)){ ?>
        body { background: <?php echo esc_attr($body_bg); ?>;}
        #portfolio { background: <?php echo esc_attr($body_bg); ?>;}
        #team { background: <?php echo esc_attr($body_bg); ?>;}
        .white-popup { background: <?php echo esc_attr($body_bg); ?>;}
        .sub-banner { background: <?php echo esc_attr($body_bg); ?>;}
        .body-bg { background: <?php echo esc_attr($body_bg); ?>;}
        .content { background: <?php echo esc_attr($body_bg); ?>;}
    <?php } if(!empty($body_color)){ ?>
        p { color: <?php echo esc_attr($body_color); ?>;}
        .services li p { color: <?php echo esc_attr($body_color); ?>;}
        .blog .b-detail p { color: <?php echo esc_attr($body_color); ?>;}
        .port-inner p { color: <?php echo esc_attr($body_color); ?>;}
    <?php } if(!empty($body_border_color)){ ?>
        .left_line,
        .top_line,
        header,
        .right_line { background-color: <?php echo esc_attr($body_border_color); ?>;}
    <?php } if(!empty($footer_bg)){ ?>
        #contact>.container-fluid { background: <?php echo esc_attr($footer_bg); ?> !important;}
        .overlay-pop { background: <?php echo esc_attr($footer_bg); ?> !important;}
        #rights { background: <?php echo esc_attr($footer_bg); ?>;}
    <?php } if(!empty($footer_color)){ ?>
        #rights p { color: <?php echo esc_attr($footer_color); ?>;}
        #contact li p { color: <?php echo esc_attr($footer_color); ?>;}
    <?php } if(!empty($page_title)){ ?>
        .tittle h2 {color: <?php echo esc_attr($page_title); ?>;}
    <?php } if(!empty($page_sub_title)){ ?>
        .tittle p { color: <?php echo esc_attr($page_sub_title); ?>;}
    <?php } if(!empty($parallax_color)){ ?>
        .parallax p { color: <?php echo esc_attr($parallax_color); ?>;}
        .parallax .tittle h2 { color: <?php echo esc_attr($parallax_color); ?>;}
        .parallax .tittle p { color: <?php echo esc_attr($parallax_color); ?>;}
    <?php } if(!empty($slides_color)){ ?>
        .bnr-text h1 { color: <?php echo esc_attr($slides_color); ?>;}
        .bnr-text p { color: <?php echo esc_attr($slides_color); ?>;}
    <?php } if(!empty($single_post)){ ?>
        .sub-banner h2 { color: <?php echo esc_attr($single_post); ?>;}
        .sub-banner p { color: <?php echo esc_attr($single_post); ?>;}
    <?php } if(!empty($links_normal)){ ?>
        a { color: <?php echo esc_attr($links_normal); ?>;}
    <?php } if(!empty($links_hover)){ ?>
        a:hover { color: <?php echo esc_attr($links_hover); ?>;}
    <?php } if(!empty($widget_title)){ ?>
        .sider-bar h5 { color: <?php echo esc_attr($widget_title); ?>;}
    <?php } if(!empty($background_right_menu)){ ?>
        .site-menu { background: <?php echo esc_attr($background_right_menu); ?>;}
    <?php } if(!empty($preloader_color)){ ?>
        #jpreBar { background: <?php echo esc_attr($preloader_color); ?> !important;}
    <?php } if(!empty($theme_color)){ ?>
        .projects .project-detail .btn:hover { background: <?php echo esc_attr($theme_color); ?>;}
        .team .designation { background: <?php echo esc_attr($theme_color); ?>;}
        .team .info { background: <?php echo esc_attr($theme_color); ?>;}
        .team .line { background: <?php echo esc_attr($theme_color); ?>;}
        .team .social_icons { background: <?php echo esc_attr($theme_color); ?>;}
        .team .social_icons li { background: <?php echo esc_attr($theme_color); ?>;}
        .team .social_icons li { background: <?php echo esc_attr($theme_color); ?>;}
        .pricing li>div { background: <?php echo esc_attr($theme_color); ?>;}
        .about { background: <?php echo esc_attr($theme_color); ?>;}
        .flex-control-paging li a.flex-active { background: <?php echo esc_attr($theme_color); ?>;}
        .counter-line { background: <?php echo esc_attr($theme_color); ?>;}
        .tittle hr,
        .bnr-text hr,
        .services hr { background: <?php echo esc_attr($theme_color); ?>;}
        #blog .b_links a,
        #contact .drop-line a:hover { color: <?php echo esc_attr($theme_color); ?>;}
        .menu nav ul a.active { color: <?php echo esc_attr($theme_color); ?>;}
        .portfolio-nav-inner a { color: <?php echo esc_attr($theme_color); ?>;}
        .work-info i { color: <?php echo esc_attr($theme_color); ?>;}
        .arrow-right i, .arrow-left i { color: <?php echo esc_attr($theme_color); ?>;}
        .filter li a.active,
        .filter li a:hover { color: <?php echo esc_attr($theme_color); ?>;}
        .pricing li>div:hover .btn { color: <?php echo esc_attr($theme_color); ?>;}
        #contact>.container-fluid { background: <?php echo esc_attr($theme_color); ?>;}
        .overlay-pop { background: <?php echo esc_attr($theme_color); ?>;}
        .over { background: <?php echo esc_attr($theme_color); ?>;}
        .projects .ltxt { border-color: <?php echo esc_attr($theme_color); ?>;}
        .projects .rtxt { border-color: <?php echo esc_attr($theme_color); ?>;}
        .pricing li:hover { border-color: <?php echo esc_attr($theme_color); ?>;}
        .parallax .btn:hover { background: <?php echo esc_attr($theme_color); ?>;}
        .parallax .btn:hover { border-color: <?php echo esc_attr($theme_color); ?>;}
        #contact .form-up input.wpcf7-submit:hover { border-color: <?php echo esc_attr($theme_color); ?>;}
        #contact .form-up input.wpcf7-submit:hover { background: <?php echo esc_attr($theme_color); ?>;}
        .bnr-text .btn:hover { background: <?php echo esc_attr($theme_color); ?>;}
        .bnr-text .btn:hover,.projects .project-detail .btn:hover { border-color: <?php echo esc_attr($theme_color); ?>;}
    <?php } ?>
  
    <?php
    // Typography
    $heading_font = mikos_option("headings_font_face");
    $heading_weight = mikos_option("headings_font_weight");
    $meta_font = mikos_option("meta_font_face");
    $meta_weight = mikos_option("meta_font_weight");
    $body_font = mikos_option("body_font_face");
    $body_weight = mikos_option("body_font_weight");
    $body_size = intval(mikos_option("body_font_size"));
    $h1_size = intval(mikos_option("h1_font_size"));
    $h2_size = intval(mikos_option("h2_font_size"));
    $h3_size = intval(mikos_option("h3_font_size"));
    $h4_size = intval(mikos_option("h4_font_size"));
    $h5_size = intval(mikos_option("h5_font_size"));
    $h6_size = intval(mikos_option("h6_font_size"));
    $logo_size = intval(mikos_option("text_logo_font_size"));
    $menu_size = intval(mikos_option("menu_font_size"));
    $page_title_size = intval(mikos_option("page_title_font_size"));
    $post_title_size = intval(mikos_option("post_title_font_size"));
    $widget_size = intval(mikos_option("widget_title_font_size"));
    $slides_heading_font_size = intval(mikos_option("slides_heading_font_size"));
    $header_letter_spacing = intval(mikos_option("header_letter_spacing"));

    ?>

<?php if(!empty($heading_font)){ ?>
h1,h2,h3,.tittle h2 {
    font-family: <?php echo esc_attr($heading_font); ?>;
    font-weight: <?php echo esc_attr($heading_weight); ?> !important;
}
<?php } if(!empty($meta_font)){ ?>
h4,h5,h6,code, kbd, pre, samp,.dropdown-menu > li > a,.site-menu .navbar-nav > li a,.a-info li a {
    font-family: <?php echo esc_attr($meta_font); ?>;
    font-weight: <?php echo esc_attr($meta_weight); ?>;
}
<?php } if(!empty($body_font)){ ?>
html,body,p,.icon-list h2,.testimonials p,.pricing li p {
    font-family: <?php echo esc_attr($body_font); ?> !important;
    font-weight: <?php echo esc_attr($body_weight); ?>;
}
<?php } if(!empty($body_size)){ ?>
body,p,.services li p,.pricing li p {
    font-size: <?php echo intval($body_size); ?>px;
}
<?php } if(!empty($h1_size)){ ?>
h1 {
    font-size: <?php echo intval($h1_size); ?>px;
}
<?php } if(!empty($h2_size)){ ?>
h2 {
    font-size: <?php echo intval($h2_size); ?>px;
}
<?php } if(!empty($h3_size)){ ?>
h3 {
    font-size: <?php echo intval($h3_size); ?>px;
}
<?php } if(!empty($h4_size)){ ?>
h4 {
    font-size: <?php echo intval($h4_size); ?>px;
}
<?php } if(!empty($h5_size)){ ?>
h5 {
    font-size: <?php echo intval($h5_size); ?>px;
}
<?php } if(!empty($h6_size)){ ?>
h6 {
    font-size: <?php echo intval($h6_size); ?>px;
}
<?php } if(!empty($logo_size)){ ?>
.logo-left h2,.logo h2 {
    font-size: <?php echo intval($logo_size); ?>px;
}
<?php } if(!empty($menu_size)){ ?>
.navbar-default .navbar-nav > li > a {
    font-size: <?php echo intval($menu_size); ?>px;
}
<?php } if(!empty($page_title_size)){ ?>
.tittle h2 {
    font-size: <?php echo intval($page_title_size); ?>px;
}
<?php } if(!empty($post_title_size)){ ?>
.sub-banner h2 {
    font-size: <?php echo intval($post_title_size); ?>px;
}
<?php } if(!empty($widget_size)){ ?>
.sider-bar h5 {
    font-size: <?php echo intval($widget_size); ?>px;
}
<?php } if(!empty($slides_heading_font_size)){ ?>
.bnr-text h1 {
    font-size: <?php echo intval($slides_heading_font_size); ?>px;
}
<?php } if(!empty($header_letter_spacing)){ ?>
.bnr-text h1 {
    letter-spacing: <?php echo intval($header_letter_spacing); ?>px;
}
<?php } ?>


