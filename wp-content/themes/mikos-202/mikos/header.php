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
<div id="wrap">
<div class="left_line"> </div>
<div class="top_line"> </div>
<div class="right_line"> </div>
    <!-- HEADER -->
    <header class="sticky">
		<?php get_sidebar('sticky'); ?>
<div class="top_1"> </div>
    </header>
    <?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php esc_url( header_image() ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
        </a>
    </div>
<?php endif; ?>
