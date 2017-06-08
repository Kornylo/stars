<?php
/**
 * Theme Functions Page
 * @Mikos WP Theme
 * @Mikos WP Theme 1.0
 **/
// Load all scripts and stylesheets
function mikos_load_styles() {
    wp_enqueue_style( 'main' , get_template_directory_uri()."/css/main.css");
    wp_enqueue_style( 'style' , get_template_directory_uri()."/style.css");
    wp_enqueue_style( 'style2' , get_template_directory_uri()."/css/style.css");
    wp_enqueue_style( 'responsive' , get_template_directory_uri()."/css/responsive.css");
    wp_enqueue_style( 'custom-style' , get_template_directory_uri()."/css/custom.css");
    wp_enqueue_style( 'mikos_dynamic_css', admin_url('admin-ajax.php').'?action=dynamic_css', '', '1.2');
}
add_action('wp_enqueue_scripts', 'mikos_load_styles');
function mikos_load_scripts_footer() {
    wp_enqueue_script('wow.min', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '', true  );
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true  );
    wp_enqueue_script('counter', get_template_directory_uri() . '/js/counter.js', array('jquery'), '', true  );
    wp_enqueue_script('jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '', true  );
    wp_enqueue_script('waypoints.min', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '', true  );
    wp_enqueue_script('jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '', true  );
    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '', true  );
    wp_enqueue_script('packery', get_template_directory_uri() . '/js/packery-mode.pkgd.min.js', array('jquery','isotope'), '', true  );

    wp_enqueue_script('mikos_jquery.stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array('jquery'), '', true  );

    if ( is_page_template( 'page-home.php' )  ) {
      wp_enqueue_script('jquery.superslides', get_template_directory_uri() . '/js/jquery.superslides.js', array('jquery'), '', true  );
    }

    wp_enqueue_script('jquery.magnific-popup.min', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '', true  );
    wp_enqueue_script('modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '', true  );
    wp_enqueue_script('classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '', true  );
    
    if( mikos_option(toggle_preloader_site) ) {
        wp_enqueue_script('jpreloader2', get_template_directory_uri() . '/js/jpreloader2.js', array('jquery'), '', true  );
    }

    wp_enqueue_script('bootstrap-hover-dropdown.min', get_template_directory_uri() . '/js/bootstrap-hover-dropdown.min.js', array('jquery'), '', true  );
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true  );

    if ( !is_singular( 'portfolio' ) ):
    	wp_enqueue_script('googleMap', "//maps.googleapis.com/maps/api/js?key=AIzaSyAdylwfoV4oC-JndECJX0tP4_hwunM8Lgk", array('jquery'), '', true);
    	wp_enqueue_script('mikosMap', get_template_directory_uri() . '/js/mikosMap.js', array('jquery', 'googleMap'), '', true );
    endif;

  	wp_enqueue_script('transit', '//cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js', array('jquery'), '', true );
    if(is_front_page()){
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true  );
    }
}

// Load scripts in footer
add_action('wp_enqueue_scripts', 'mikos_load_scripts_footer');

// integration custom css
add_action('wp_ajax_dynamic_css', 'mikos_dynamic_css');
add_action('wp_ajax_nopriv_dynamic_css', 'mikos_dynamic_css');
function mikos_dynamic_css() {
    require_once get_template_directory().'/css/mikos-styles.php';
    exit;
} 

// add_custom_theme_styles

if ( ! function_exists( 'mikos_custom_styles' ) ) {

    function mikos_custom_styles() {
      $custom_css = mikos_option("custom_css");
      $styles = '';
      if(!empty($custom_css)) {
        $styles = $custom_css;
      }
      if ( is_admin_bar_showing() ) {
      	$styles .= '.is-sticky header {top:32px !important;}'
                 . '.right_line {top:32px !important;}'
                 . '.top_line {top:32px !important;}'    
                 . '.left_line {top:32px !important;}';
      }
      if( ! empty( $styles ) ) {
        wp_add_inline_style( 'custom-style', $styles );
      }
    }
}
add_action('wp_enqueue_scripts', 'mikos_custom_styles');

// add_custom_theme_scripts
if ( ! function_exists( 'mikos_custom_scripts' ) ) {
    function mikos_custom_scripts() {
      $custom_js = mikos_option("custom_js");
      if(!empty($custom_js)){
        $scripts = esc_js( $custom_js );
      }
      if( ! empty( $scripts ) ) {
        wp_add_inline_script( 'custom', $scripts );
      }
    }
}    
add_action('wp_enqueue_scripts', 'mikos_custom_scripts');

/*
Register Fonts
*/
if ( ! function_exists( 'mikos_fonts_url' ) ) {
    function mikos_fonts_url() {
        $fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Lato, translate this to 'off'. Do not translate
        * into your own language.
        */
        $lato = _x( 'on', 'Lato font: on or off', 'mikos' );

        /* Translators: If there are characters in your language that are not
        * supported by Playfair Display, translate this to 'off'. Do not translate
        * into your own language.
        */
        $playfair = _x( 'on', 'Playfair Display font: on or off', 'mikos' );

        if ( 'off' !== $lato || 'off' !== $playfair ) {
            $font_families = array();

            if ( 'off' !== $lato ) {
                $font_families[] = 'Lato:100,200,300,400,700,900,300italic,400italic,700italic,900italic';
            }

            if ( 'off' !== $playfair ) {
                $font_families[] = 'Playfair Display:400,400italic';
            }

            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }
} 

// add TinyMCE style
add_editor_style( array( 'css/editor-style.css' , mikos_fonts_url() ) );

/*
Enqueue scripts and styles.
*/
if ( ! function_exists( 'mikos_fonts_register' ) ) {
    function mikos_fonts_register() {
        wp_enqueue_style( 'mikos-google-fonts', mikos_fonts_url(), array(), null );
    }
}
add_action( 'wp_enqueue_scripts', 'mikos_fonts_register' );

if ( ! function_exists( 'mikos_head' ) ) {
    function mikos_head() {
      echo '<meta name="description" content="' . get_bloginfo('description') . '" >'."\n";
      echo '<meta name="author" content="' . get_the_author() . '">'."\n";
    }
}    
add_action('wp_head', 'mikos_head');

// Custom Fields
define( 'ACF_LITE', true );
include_once( get_template_directory() . "/includes/advanced-custom-fields/acf.php" );
include_once( get_template_directory() . "/includes/advanced-custom-fields/custom-fields.php" );

// Theme Title
if ( ! function_exists( 'mikos_wp_title' ) ) {
    function mikos_wp_title( $title, $sep ) {
        global $mikos_paged, $mikos_page;
        if ( is_feed() ) {
            return $title;
        }
        // Add the site name.
        $title .= get_bloginfo( 'name', 'display' );
        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title = "$title $sep $site_description";
        }
        // Add a page number if necessary.
        if ( ( $mikos_paged >= 2 || $mikos_page >= 2 ) && ! is_404() ) {
            $title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'mikos' ), max( $mikos_paged, $mikos_page ) );
        }
        return $title;
    }
}    
add_filter( 'wp_title', 'mikos_wp_title', 10, 2 );
// After Theme Setup
if ( ! function_exists( 'mikos_theme_setup' ) ) {
    function mikos_theme_setup() {
    	// Title Tag Support
    	add_theme_support( 'title-tag' );
    	// Add custom backgroud support
    	add_theme_support( 'custom-background' );
    	// Adds RSS feed links to <head> for posts and comments.
    	add_theme_support( 'automatic-feed-links' );
    }
}    
add_action( 'after_setup_theme', 'mikos_theme_setup' );

// Text Domain
load_theme_textdomain( 'mikos', get_template_directory() . '/languages' );

// Add custom backgroud support
require( get_template_directory() . '/lib/custom-header.php' );

// Add Thumbnail Support
add_theme_support( 'post-thumbnails' );

// Content Width
if ( !isset( $content_width ) ) $content_width = 1000;

// Registering sidebars
register_sidebar(array(
    'name' => esc_html__( 'Default Sidebar', 'mikos' ),
    'id' => 'default',
    'description' => esc_html__( 'Widgets in this area will be shown at sidebar of the Page.', 'mikos' ),
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    'after_widget' => '<div class="space50"></div>',
    'before_widget' => ''
));
register_sidebar(array(
    'name' => esc_html__( 'Category Sidebar', 'mikos' ),
    'id' => 'category',
    'description' => esc_html__( 'Widgets in this area will be shown at sidebar of the Category Page.', 'mikos' ),
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    'after_widget' => '<div class="space50"></div>',
    'before_widget' => ''
));
register_sidebar(array(
    'name' => esc_html__( 'Single page Sidebar', 'mikos' ),
    'id' => 'single',
    'description' => esc_html__( 'Widgets in this area will be shown at sidebar of the Single Post Page.', 'mikos' ),
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    'after_widget' => '<div class="space50"></div>',
    'before_widget' => ''
));
// Registering Menus
if ( ! function_exists( 'mikos_register_menu' ) ) {
    function mikos_register_menu() {
        $locations = array(
            'primary-menu' => esc_html__( 'Primary Menu',  'mikos' ),
            'right-menu' => esc_html__( 'Right Menu',  'mikos' )
        );
        register_nav_menus( $locations );
    }
}    
add_action( 'init', 'mikos_register_menu' );
// Changing excerpt 'more' text
if ( ! function_exists( 'mikos_excerpt_more' ) ) {
    function mikos_excerpt_more($more) {
        global $mikos_post;
    }
}
add_filter('excerpt_more', 'mikos_excerpt_more');
//mikos multiple excerpt
if ( ! function_exists( 'mikos_excerpt' ) ) {
    function mikos_excerpt($charlength) {
        $excerpt = get_the_excerpt();
        $charlength++;
        if(strlen($excerpt)>$charlength) {
            $subex = substr($excerpt,0,$charlength-5);
            $exwords = explode(" ",$subex);
            $excut = -(strlen($exwords[count($exwords)-1]));
            if($excut<0) {
                echo substr($subex,0,$excut);
            } else {
                echo $subex;
            }
            echo "..";
        } else {
            echo $excerpt;
        }
    }
}
// Controling excerpt length
function mikos_custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'mikos_custom_excerpt_length', 999 );
// Get Feature Image URL By Post ID
if ( ! function_exists( 'mikos_get_feature_image_url' ) ) {
    function mikos_get_feature_image_url($post_id){
        $image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
        return $image_url;
    }
}
//Page Sections
if ( ! function_exists( 'mikos_sort_sections' ) ){
    function mikos_sort_sections(){
        if(!has_nav_menu( 'primary-menu' )){
            return;
        }
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations['primary-menu'] ) ) {
            $menu = wp_get_nav_menu_object( $locations['primary-menu'] );
            $items  = wp_get_nav_menu_items($menu->term_id);
            $sections = array();
            foreach((array) $items as $key => $menu_items){
                if('page-sections' == $menu_items->object){
                    $sections[] = $menu_items->object_id;
                }
            }
            return $sections;
        }
    }
}
add_filter( 'wp_nav_menu_objects', 'mikos_single_page_nav_links' );
if ( ! function_exists( 'mikos_single_page_nav_links' ) ) {
    function mikos_single_page_nav_links( $items ) {
        foreach ( $items as $item ) {
            if('page-sections' == $item->object){
                $current_post = get_post($item->object_id);
                $menu_title = "#".$current_post->post_name;
                if ( is_front_page() ) {
                    $item->url = $menu_title;
                }else{
                    $item->url = home_url('/').$menu_title;
                }
            }elseif('custom' == $item->type && !is_home()){
                if( 1 === preg_match('/^#([^\/]+)$/', $item->url , $matches)){
                    $item->url = $item->url;
                }
            }
        }
        return $items;
    } 
}
    
//Pagination
if ( ! function_exists( 'mikos_pagination' ) ) {
    function mikos_pagination($pages = '', $range = 2){
        $showitems = ($range * 2)+1;
        global $paged;
        if(empty($paged)) $paged = 1;
        if($pages == ''){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages)
            {
                $pages = 1;
            }
        }
        if(1 != $pages){
            echo "<div class='pagination'>";
            if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
            if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
            for ($i=1; $i <= $pages; $i++){
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                    echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
                }
            }
            if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
            if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
            echo "</div>\n";
        }
    }
}
// Registering custom Comments
if ( ! function_exists( 'mikos_comment' ) ) {
    function mikos_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = '';
            $add_below = 'div-comment';
        }
        ?>
        <div class="media">
            <a class="pull-left" href="<?php esc_url( comment_author_url() ); ?>">
                <img class="media-object" src="<?php echo mikos_get_avatar_src(get_avatar( $comment, 55 )); ?>" alt="">
            </a>
            <div class="media-body">
                <h5 class="media-heading"><?php printf(esc_html__('%s', 'mikos'), comment_author()) ?><span>Says</span>
                    <span class="date"><?php printf( esc_html__('%1$s at %2$s', 'mikos'), get_comment_date(),  get_comment_time()); ?></span>
                </h5>
                <?php comment_text(); ?>
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            </div>
        </div>
        <hr>
    <?php
    }
}
// Get avatar URL
if ( ! function_exists( 'mikos_get_avatar_src' ) ) {
    function mikos_get_avatar_src($get_avatar){
        preg_match("/src='(.*?)'/i", $get_avatar, $matches);
        return $matches[1];
    }
}    
if ( ! function_exists( 'mikos_get_category_by_id3' ) ) {
    function mikos_get_category_by_id3($post_id){
        $cato = get_the_category( $post_id );
        $count = 1;
        foreach($cato as $cat){
            if($count == 1){
                echo '<a href="'. esc_url(home_url("/")).'?cat='. intval($cat->cat_ID) .'">'. esc_attr($cat->name) .'</a>';
            }
            $count ++;
        }
    }
}
// Theme Widgets
require_once( get_template_directory() . "/lib/widgets.php");
// Including Theme Options
require_once( get_template_directory() . "/admin/framework/bootstrap.php");
// options
$tmpl_opt  = get_template_directory() . '/admin/option.php';
// Create instance of Options
$theme_options = new VP_Option(array(
    'is_dev_mode'           => false,                                  // dev mode, default to false
    'option_key'            => 'vpt_option',                           // options key in db, required
    'page_slug'             => 'vpt_option',                           // options page slug, required
    'template'              => $tmpl_opt,                              // template file path or array, required
    'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
    'use_auto_group_naming' => true,                                   // default to true
    'use_util_menu'         => true,                                   // default to true, shows utility menu
    'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
    'layout'                => 'fixed',                                // fluid or fixed, default to fixed
    'page_title'            => esc_html__( 'Mikos Options', 'mikos' ), // page title
    'menu_label'            => esc_html__( 'Mikos Options', 'mikos' ), // menu label
));
// shortocode generators
$mikos_sg  = get_template_directory() . '/lib/shortcode_generator/shortcodes.php';
// Create instances of Shortcode Generator
$mikos_sg = array(
    'name'           => 'mikos_sg',                                        // unique name, required
    'template'       => $mikos_sg,                                     // template file or array, required
    'modal_title'    => esc_html__( 'Mikos Shortcodes', 'mikos'), // modal title, default to empty string
    'button_title'   => esc_html__( 'Mikos Shortcodes', 'mikos'),              // button title, default to empty string
    'types'          => array( 'post', 'page' ),                       // at what post types the generator should works, default to post and page
    'included_pages' => array( 'appearance_page_vpt_option' ),         // or to what other admin pages it should appears
);
$sg = new VP_ShortcodeGenerator($mikos_sg);
//Option Hook
function mikos_option( $name ){
    return vp_option( "vpt_option." . $name );
}
//Plugin Activation Class
require_once( get_template_directory() . '/lib/plugin-activation.php');
add_action( 'tgmpa_register', 'mikos_include_required_plugins' );
/**
 * Register the required plugins for this theme.
 * TGM_Plugin_Activation class constructor.
 */

/** Include required plugins */
if ( ! function_exists( 'mikos_include_required_plugins' ) ) {
    function mikos_include_required_plugins()
    {
        $plugins = array(
            array(
                'name'                  => esc_html__('Mikos Shortcodes','mikos'), // The plugin name
                'slug'                  => 'mikos-shortcodes', // The plugin slug (typically the folder name)
                'source'                => 'http://upqode.com/clients/mikos/plugins/mikos-shortcodes.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            // CPT's
            array(
                'name'                  => esc_html__('Mikos CPTs','mikos'), // The plugin name
                'slug'                  => 'mikos-cpt', // The plugin slug (typically the folder name)
                'source'                => 'http://upqode.com/clients/mikos/plugins/mikos-cpt.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => esc_html__('Contact Form 7','mikos'),
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
        );

        // Change this to your theme text domain, used for internationalising strings

        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'domain'            => 'mikos',                    // Text domain - likely want to be the same as your theme.
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'menu'              => 'tgmpa-install-plugins',     // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'is_automatic'      => true,                        // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'      => array(
                'page_title'                      => esc_html__( 'Install Required Plugins', 'mikos' ),
                'menu_title'                      => esc_html__( 'Install Plugins', 'mikos' ),
                /* translators: %s: plugin name. */
                'installing'                      => esc_html__( 'Installing Plugin: %s', 'mikos' ),
                /* translators: %s: plugin name. */
                'updating'                        => esc_html__( 'Updating Plugin: %s', 'mikos' ),
                'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'mikos' ),
                'notice_can_install_required'     => _n_noop(
                /* translators: 1: plugin name(s). */
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'mikos'
                ),
                'notice_can_install_recommended'  => _n_noop(
                /* translators: 1: plugin name(s). */
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'mikos'
                ),
                'notice_ask_to_update'            => _n_noop(
                /* translators: 1: plugin name(s). */
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'mikos'
                ),
                'notice_ask_to_update_maybe'      => _n_noop(
                /* translators: 1: plugin name(s). */
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'mikos'
                ),
                'notice_can_activate_required'    => _n_noop(
                /* translators: 1: plugin name(s). */
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'mikos'
                ),
                'notice_can_activate_recommended' => _n_noop(
                /* translators: 1: plugin name(s). */
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'mikos'
                ),
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'mikos'
                ),
                'update_link'                     => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'mikos'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'mikos'
                ),
                'return'                          => esc_html__( 'Return to Required Plugins Installer', 'mikos' ),
                'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'mikos' ),
                'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'mikos' ),
                /* translators: 1: plugin name. */
                'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'mikos' ),
                /* translators: 1: plugin name. */
                'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'mikos' ),
                /* translators: 1: dashboard link. */
                'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'mikos' ),
                'dismiss'                         => esc_html__( 'Dismiss this notice', 'mikos' ),
                'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'mikos' ),
                'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'mikos' ),

                'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
            ),
        );

        tgmpa( $plugins, $config );
    }
}

// Google Web Fonts

if ( ! function_exists( 'mikos_google_fonts' ) ) {
    function mikos_google_fonts(){
        $heading_font = mikos_option("headings_font_face");
        $heading_weight = mikos_option("headings_font_weight");
        $meta_font = mikos_option("meta_font_face");
        $meta_weight = mikos_option("meta_font_weight");
        $body_font = mikos_option("body_font_face");
        $body_weight = mikos_option("body_font_weight");
        if(!empty($heading_weight)) {
            $heading_weight = ":".$heading_weight;
        } else {
            $heading_weight = '';
        }
        if(!empty($heading_font)){
          wp_enqueue_style( 'mikos-font-'.$heading_font, mikos_fonts_url(), array($heading_font . $heading_weight), '1.0.0' );
        }
        if(!empty($meta_weight)) {
            $meta_weight = ":".$meta_weight;
        } else {
            $meta_weight = '';
        }
        if(!empty($meta_font)){
          wp_enqueue_style( 'mikos-font-'.$heading_font, mikos_fonts_url(), array($meta_font . $meta_weight), '1.0.0' );
        }
        if(!empty($body_weight)) {
            $body_weight = ":".$body_weight;
        } else {
            $body_weight = '';
        }
        if(!empty($body_font)){
          wp_enqueue_style( 'mikos-font-'.$heading_font, mikos_fonts_url(), array($body_font . $body_weight), '1.0.0' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'mikos_google_fonts' );

/** Allow load .ico */
if ( ! function_exists( 'mikos_additional_mime_types' ) ) {
    function mikos_additional_mime_types($mimes) {
    	if ( function_exists( 'current_user_can' ) ) {
			if ( !empty( $unfiltered ) ) {
    			$mimes['ico'] = 'image/x-icon';
			}
    	return $mimes;
    	}
    }    
}    
add_filter('upload_mimes','mikos_additional_mime_types');

/* Custom ajax loader */
add_filter('wpcf7_ajax_loader', 'mikos_wpcf7_ajax_loader');
if ( ! function_exists( 'mikos_wpcf7_ajax_loader' ) ) {
    function mikos_wpcf7_ajax_loader () {
    	return  get_template_directory_uri() . '/images/ajax-loader.gif';
    }
}    


/* Add Google fonts */

$heading_font = mikos_option("headings_font_face");
$heading_weight = mikos_option("headings_font_weight");
$meta_font = mikos_option("meta_font_face");
$meta_weight = mikos_option("meta_font_weight");
$body_font = mikos_option("body_font_face");
$body_weight = mikos_option("body_font_weight");

VP_Site_GoogleWebFont::instance()->add($heading_font, $heading_weight);
VP_Site_GoogleWebFont::instance()->add($meta_font, $meta_weight);
VP_Site_GoogleWebFont::instance()->add($body_font, $body_weight);

// embed font function
function mikos_embed_fonts() {
    
    // you can directly enqueue and register
    VP_Site_GoogleWebFont::instance()->register_and_enqueue();

}
add_action('wp_enqueue_scripts', 'mikos_embed_fonts');