<?php
$theme_url = get_template_directory_uri();
$url_link = 'http://support.google.com/maps/answer/18539?hl=en';
return array(
	'title' => esc_html__('Mikos - OnePage WP Theme', 'mikos'),
	'logo' => $theme_url. '/admin/logo.png',
	'menus' => array(
		array(
			'title' => esc_html__('General Settings', 'mikos'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:fa-magic',
			'menus' => array(
				array(
					'title' => esc_html__('Header', 'mikos'),
					'name' => 'header',
					'icon' => 'font-awesome:fa-th-large',
					'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Preloader site', 'mikos'),
                            'name' => 'preloader_site',
                            'description' => esc_html__('Preloader site', 'mikos'),
                            'fields' => array(
                                // Preloader site
                                array(
                                    'type' => 'toggle',
                                    'name' => 'toggle_preloader_site',
                                    'label' => esc_html__('Preloader site', 'mikos'),
                                    'description' => esc_html__('Use toggle for On/Off Preloader site.', 'mikos'),
                                    'default' => '1',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Text Logo', 'mikos'),
                            'name' => 'text_logo_section',
                            'description' => esc_html__('Text Logo', 'mikos'),
                            'fields' => array(
                                // Text Logo
                                array(
                                    'type' => 'textbox',
                                    'name' => 'primary_logo',
                                    'label' => esc_html__('Primary Logo', 'mikos'),
                                    'description' => esc_html__('Use text as a Logo image.', 'mikos'),
                                    'default' => 'mikos',
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'secondary_logo',
                                    'label' => esc_html__('Secondary Logo', 'mikos'),
                                    'description' => esc_html__('Use text as a Logo image.', 'mikos'),
                                    'default' => 'mikos',
                                ),
                            ),
                        ),
                        //Logo Image Setion
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Logo Image', 'mikos'),
                            'name' => 'image_logo_section',
                            'fields' => array(
                                // Primary Image Logo
                                array(
                                    'type' => 'toggle',
                                    'name' => 'primary_use_logo',
                                    'label' => esc_html__('Primary Image Logo', 'mikos'),
                                    'description' => esc_html__('Upload Image or not.', 'mikos'),
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'primary_image_logo',
                                    'label' => esc_html__('Primary Image Logo', 'mikos'),
                                    'dependency' => array(
                                        'field' => 'primary_use_logo',
                                        'function' => 'vp_dep_boolean',
                                    ),
                                    'description' => esc_html__('Upload or choose custom logo', 'mikos'),
                                ),
                                // Secondary Image Logo
                                array(
                                    'type' => 'toggle',
                                    'name' => 'secondary_use_logo',
                                    'label' => esc_html__('Secondary Image Logo', 'mikos'),
                                    'description' => esc_html__('Upload Image or not.', 'mikos'),
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'secondary_image_logo',
                                    'label' => esc_html__('Secondary Image Logo', 'mikos'),
                                    'dependency' => array(
                                        'field' => 'secondary_use_logo',
                                        'function' => 'vp_dep_boolean',
                                    ),
                                    'description' => esc_html__('Upload or choose custom logo', 'mikos'),
                                ),
                            ),
                        ),
                        // Favicon Section
						array(
							'type' => 'section',
							'title' => esc_html__('Favicon', 'mikos'),
							'name' => 'favicon_section',
							'description' => esc_html__('Image favicon', 'mikos'),
							'fields' => array(
                                // Favicon
                                array(
                                    'type' => 'upload',
                                    'name' => 'favicon',
                                    'label' => esc_html__('Favicon', 'mikos'),
                                    'description' => esc_html__('Upload 16x16 pixels favicon.', 'mikos'),
                                    'default' => '',
                                ),
                            ),
                        ),
                        // Other Details Section
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Other Details', 'mikos'),
                            'name' => 'other_section',
                            'description' => esc_html__('Other Details', 'mikos'),
                            'fields' => array(
                                // Top Logo
                                array(
                                    'type' => 'toggle',
                                    'name' => 'hide_top_logo',
                                    'label' => esc_html__('Hide Top Left Logo', 'mikos'),
                                    'description' => esc_html__('You can hide the top left logo.', 'mikos'),
                                    'default' => '0',
                                ),
                                // Right Menu
                                array(
                                    'type' => 'toggle',
                                    'name' => 'hide_right_menu',
                                    'label' => esc_html__('Hide Top Right Menu', 'mikos'),
                                    'description' => esc_html__('You can hide the top header right side menu.', 'mikos'),
                                    'default' => '0',
                                ),
                                // Scroll Button
                                array(
                                    'type' => 'toggle',
                                    'name' => 'show_scroll_button',
                                    'label' => esc_html__('Show Scroll Button', 'mikos'),
                                    'description' => esc_html__('You can show & hide your header scroll button.', 'mikos'),
                                    'default' => '1',
                                ),
                                // Scroll Button Link
                                array(
                                    'type' => 'select',
                                    'name' => 'scroll_link',
                                    'label' => esc_html__('Scroll Button Link', 'mikos'),
                                    'dependency' => array(
                                        'field' => 'show_scroll_button',
                                        'function' => 'vp_dep_boolean',
                                    ),
                                    'description' => esc_html__('Select page section which trigger by this button.', 'mikos'),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'vp_get_sections',
                                            ),
                                        ),
                                    ),
                                ),
                                // Custom CSS
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'custom_css',
                                    'label' => esc_html__('Custom CSS', 'mikos'),
                                    'description' => esc_html__('Write your custom css here.', 'mikos'),
                                    'theme' => 'github',
                                    'mode' => 'css',
                                ),
                                // Custom JS
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'custom_js',
                                    'label' => esc_html__('Custom JS', 'mikos'),
                                    'description' => esc_html__('Write your custom js here.', 'mikos'),
                                    'theme' => 'twilight',
                                    'mode' => 'javascript',
                                ),

							),
						),
					),
				),
			),
		),
        // Styling Options
		array(
			'title' => esc_html__('Styling Options', 'mikos'),
			'name' => 'styling_options',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(
                // Heading Section
				array(
					'type' => 'section',
					'title' => esc_html__('Headings', 'mikos'),
                    'fields' => array(
                        // Heading H1
                        array(
                            'type' => 'color',
                            'name' => 'heading_h1',
                            'label' => esc_html__('Heading H1', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'mikos'),
                        ),
                        // Heading H2
                        array(
                            'type' => 'color',
                            'name' => 'heading_h2',
                            'label' => esc_html__('Heading H2', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'mikos'),
                        ),
                        // Heading H3
                        array(
                            'type' => 'color',
                            'name' => 'heading_h3',
                            'label' => esc_html__('Heading H3', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'mikos'),
                        ),
                        // Heading H4
                        array(
                            'type' => 'color',
                            'name' => 'heading_h4',
                            'label' => esc_html__('Heading H4', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'mikos'),
                        ),
                        // Heading H5
                        array(
                            'type' => 'color',
                            'name' => 'heading_h5',
                            'label' => esc_html__('Heading H5', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'mikos'),
                        ),
                        // Heading H6
                        array(
                            'type' => 'color',
                            'name' => 'heading_h6',
                            'label' => esc_html__('Heading H6', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'mikos'),
                        ),
                    ),
                ),
                // Header Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Header', 'mikos'),
                    'fields' => array(
                        // Menu Normal Color
                        array(
                            'type' => 'color',
                            'name' => 'menu_normal',
                            'label' => esc_html__('Menu Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set menu color.', 'mikos'),
                        ),
                        // Menu Active & Hover Color
                        array(
                            'type' => 'color',
                            'name' => 'menu_active',
                            'label' => esc_html__('Menu Active/Hover Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set menu active/hover color.', 'mikos'),
                        ),
                        // Header BG Color
                        array(
                            'type' => 'color',
                            'name' => 'header_bg',
                            'label' => esc_html__('Menu Header Background Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set background color.', 'mikos'),
                        ),
                        // Logo Color
                        array(
                            'type' => 'color',
                            'name' => 'primary_logo_color',
                            'label' => esc_html__('Primary Text Logo Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set text logo color.', 'mikos'),
                        ),
                        array(
                            'type' => 'color',
                            'name' => 'secondary_logo_color',
                            'label' => esc_html__('Secondary Text Logo Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set text logo color.', 'mikos'),
                        ),
                    ),
                ),
                // Body Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Body', 'mikos'),
                    'fields' => array(
                        // Body Background Color
                        array(
                            'type' => 'color',
                            'name' => 'body_bg',
                            'label' => esc_html__('Body Background Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set body background color.', 'mikos'),
                        ),
                        // Body Color
                        array(
                            'type' => 'color',
                            'name' => 'body_color',
                            'label' => esc_html__('Body Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set body color, general p tag.', 'mikos'),
                        ),
                         // Body Border Color
                        array(
                            'type' => 'color',
                            'name' => 'body_border_color',
                            'label' => esc_html__('Body Border Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set body border color.', 'mikos'),
                        ),
                    ),
                ),
                // Footer Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Footer', 'mikos'),
                    'fields' => array(
                        // Footer Background Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_bg',
                            'label' => esc_html__('Footer Background Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set footer background color.', 'mikos'),
                        ),
                        // Footer Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_color',
                            'label' => esc_html__('Footer Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set footer color.', 'mikos'),
                        ),
                    ),
                ),
                // Other Styling
                array(
                    'type' => 'section',
                    'title' => esc_html__('Other Styling', 'mikos'),
                    'fields' => array(
                        // Page title Color
                        array(
                            'type' => 'color',
                            'name' => 'page_title',
                            'label' => esc_html__('Page Title Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set page title color.', 'mikos'),
                        ),
                        // Page sub title
                        array(
                            'type' => 'color',
                            'name' => 'page_sub_title',
                            'label' => esc_html__('Page Sub Title Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set page sub title color.', 'mikos'),
                        ),
                        // Page parallax section
                        array(
                            'type' => 'color',
                            'name' => 'parallax_color',
                            'label' => esc_html__('Sections Parallax Text Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set sections parallax text color.', 'mikos'),
                        ),
                        // Page Slides Color
                        array(
                            'type' => 'color',
                            'name' => 'slides_color',
                            'label' => esc_html__('Header Slides Caption Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set header slides caption color.', 'mikos'),
                        ),
                        // Single Post title Color
                        array(
                            'type' => 'color',
                            'name' => 'single_post',
                            'label' => esc_html__('Single Post Title Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set single post title color.', 'mikos'),
                        ),
                        // Themes Color
                        array(
                            'type' => 'color',
                            'name' => 'theme_color',
                            'label' => esc_html__('Theme Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set theme prominent color.', 'mikos'),
                        ),
                        // Links Color
                        array(
                            'type' => 'color',
                            'name' => 'links_normal',
                            'label' => esc_html__('Links Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set links color.', 'mikos'),
                        ),
                        // Links Color
                        array(
                            'type' => 'color',
                            'name' => 'links_hover',
                            'label' => esc_html__('Links Hover Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set links hover color.', 'mikos'),
                        ),
                        // Widget Title
                        array(
                            'type' => 'color',
                            'name' => 'widget_title',
                            'label' => esc_html__('Widget Title Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set widget title color.', 'mikos'),
                        ),
                        // Header Right Menu BG
                        array(
                            'type' => 'color',
                            'name' => 'background_right_menu',
                            'label' => esc_html__('Right Menu Background Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set right menu background color.', 'mikos'),
                        ),
                        // Preloader site
                        array(
                            'type' => 'color',
                            'name' => 'preloader_color',
                            'label' => esc_html__('Preloader Background Color', 'mikos'),
                            'description' => esc_html__('Color Picker, you can set preloader background color.', 'mikos'),
                        ),
					),
				),
			),
		),
        // Typography Options
        array(
            'title' => esc_html__('Typography Options', 'mikos'),
            'name' => 'typo_options',
            'icon' => 'font-awesome:fa-text-width',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Headings Font Family', 'mikos'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'headings_font_face',
                            'label' => esc_html__('Headings Font Face: h1,h2,h3', 'mikos'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'headings_font_weight',
                            'label' => esc_html__('Headings Font Weight', 'mikos'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'headings_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type'    => 'slider',
                            'name'    => 'header_letter_spacing',
                            'label'   => esc_html__('Header leter spacing (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                    ),
                ),
                // Meta Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Meta Data Font Family', 'mikos'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'meta_font_face',
                            'label' => esc_html__('Meta Data Font Face: h4,h5,h6, widget title etc.', 'mikos'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'meta_font_weight',
                            'label' => esc_html__('Meta Data Font Weight', 'mikos'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'meta_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Body Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Body Font Family', 'mikos'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'body_font_face',
                            'label' => esc_html__('Body Font Face', 'mikos'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'body_font_weight',
                            'label' => esc_html__('Body Font Weight', 'mikos'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'body_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Font Sizes Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Font Sizes', 'mikos'),
                    'fields' => array(
                        // Body Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'body_font_size',
                            'label'   => esc_html__('Body Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H1 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h1_font_size',
                            'label'   => esc_html__('H1 Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H2 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h2_font_size',
                            'label'   => esc_html__('H2 Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H3 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h3_font_size',
                            'label'   => esc_html__('H3 Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H4 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h4_font_size',
                            'label'   => esc_html__('H4 Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H5 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h5_font_size',
                            'label'   => esc_html__('H5 Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H6 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h6_font_size',
                            'label'   => esc_html__('H6 Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Text Logo Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'text_logo_font_size',
                            'label'   => esc_html__('Text Logo Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Menu Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'menu_font_size',
                            'label'   => esc_html__('Menu Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Page Title Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'page_title_font_size',
                            'label'   => esc_html__('Page Title Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Post Title Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'post_title_font_size',
                            'label'   => esc_html__('Post Title Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Widget Title Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'widget_title_font_size',
                            'label'   => esc_html__('Widget Title Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Slides Heading Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'slides_heading_font_size',
                            'label'   => esc_html__('Slides Heading Font Size (px)', 'mikos'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                    ),
                ),
            ),
        ),
        // Single Page Options
        array(
            'title' => esc_html__('Post Page Options', 'mikos'),
            'name' => 'post_options',
            'icon' => 'font-awesome:fa-files-o',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Single Page Details', 'mikos'),
                    'fields' => array(
                        // Hide category
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_category',
                            'label' => esc_html__('Hide Category', 'mikos'),
                            'description' => esc_html__('You can hide the category title.', 'mikos'),
                            'default' => '0',
                        ),
                        // Hide Post Meta
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_post_meta',
                            'label' => esc_html__('Hide Post Meta', 'mikos'),
                            'description' => esc_html__('You can hide the post meta.', 'mikos'),
                            'default' => '0',
                        ),
                        // Hide Social Share
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_social_share',
                            'label' => esc_html__('Hide Social Share Icons', 'mikos'),
                            'description' => esc_html__('You can hide the Social Share Icons.', 'mikos'),
                            'default' => '0',
                        ),
                        // Hide Author box
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_author_box',
                            'label' => esc_html__('Hide Author Box', 'mikos'),
                            'description' => esc_html__('You can hide the author box.', 'mikos'),
                            'default' => '0',
                        ),
                        // Hide Author box
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_related_posts',
                            'label' => esc_html__('Hide Related Posts', 'mikos'),
                            'description' => esc_html__('You can hide the related posts.', 'mikos'),
                            'default' => '0',
                        ),
                        // Hide Post Tags
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_post_tags',
                            'label' => esc_html__('Hide Post Tags', 'mikos'),
                            'description' => esc_html__('You can hide the post tags.', 'mikos'),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
        // 404 Page Options
        array(
            'title' => esc_html__('404 Page Options', 'mikos'),
            'name' => 'page404_options',
            'icon' => 'font-awesome:fa-warning',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('404 Page Details', 'mikos'),
                    'fields' => array(
                        // 404 Editor
                        array(
                            'type' => 'wpeditor',
                            'name' => 'we_404',
                            'use_external_plugins' => '1',
                            'disabled_externals_plugins' => '',
                            'disabled_internals_plugins' => '',
                        ),
                    ),
                ),
            ),
        ),
        // Contact Page
        array(
            'title' => esc_html__('Get Social', 'mikos'),
            'name' => 'contact_options',
            'icon' => 'font-awesome:fa-flag',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Contact Page Details', 'mikos'),
                    'fields' => array(
                        // Hider Contact Area
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_contact_section',
                            'label' => esc_html__('Hide Contact Section', 'mikos'),
                            'description' => esc_html__('You can show & hide your contact area.', 'mikos'),
                            'default' => '0',
                        ),
                        // Hider Contact Title
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_contact_title',
                            'label' => esc_html__('Hide Contact Title', 'mikos'),
                            'description' => esc_html__('You can show & hide your contact title.', 'mikos'),
                            'default' => '0',
                        ),
                        // Contact Title
                        array(
                            'type' => 'textbox',
                            'name' => 'contact_title',
                            'label' => esc_html__('Contact Title', 'mikos'),
                            'default' => 'Contact',
                        ),
                        // Contact Title
                        /*array(
                            'type' => 'textbox',
                            'name' => 'contact_sub_title',
                            'label' => esc_html__('Contact Sub Title', 'mikos'),
                            'default' => 'Feel free to contact us',
                        ),*/
                        // Address
                        array(
                            'type' => 'textbox',
                            'name' => 'contact_address',
                            'label' => esc_html__('Contact Address', 'mikos'),
                            'default' => 'Avenue Saint Pierre, 82',
                        ),
                        // Email
                        array(
                            'type' => 'textbox',
                            'name' => 'contact_email',
                            'label' => esc_html__('Contact Email', 'mikos'),
                            'default' => 'info@yourmail.com',
                        ),
                        // Phone Number
                        array(
                            'type' => 'textbox',
                            'name' => 'contact_number',
                            'label' => esc_html__('Contact Number', 'mikos'),
                            'default' => '+1 (555) 295-5555',
                        ),
                        // Contact Form Shortcode
                        array(
                            'type' => 'toggle',
                            'name' => 'show_contact_form',
                            'label' => esc_html__('On/Off Contact Form', 'mikos'),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'contact_shortcode',
                            'label' => esc_html__('Contact Form 7 Shortcode', 'mikos'),
                            'description' => esc_html__('Add your contact form shortcode here.', 'mikos'),
                        ),
                        // Button Text
                        array(
                            'type' => 'textbox',
                            'name' => 'contact_button_text',
                            'label' => esc_html__('Contact Button Text', 'mikos'),
                            'default' => 'Drop us a line',
                        ),
											),
									),
									// Map Settings
	                array(
	                    'type' => 'section',
	                    'title' => esc_html__('Map Settings', 'mikos'),
	                    'fields' => array(                        // Map Coordinates
	                        array(
	                            'type' => 'textbox',
	                            'name' => 'map_coordinates',
	                            'label' => esc_html__('Map Coordinates', 'mikos'),
								'description' => esc_html__('Decimal degrees as %s', 'mikos'), '<a href="' . $url_link . '">this</a>',
	                            'default' => '56.3961551,61.90786',
	                        ),
							// Map Marker Image
							array(
								'type' => 'toggle',
								'name' => 'map_marker_use',
								'label' => esc_html__('Use Custom Map Marker Image', 'mikos'),
								'description' => esc_html__('Upload Image or not.', 'mikos'),
							),
							array(
								'type' => 'upload',
								'name' => 'map_marker_image',
								'label' => esc_html__('Map Marker Image', 'mikos'),
								'dependency' => array(
									'field' => 'map_marker_use',
									'function' => 'vp_dep_boolean',
								),
								'description' => esc_html__('Upload or choose custom image', 'mikos'),
							),

	                    ),
	                ),
                // Social Connect
                array(
                    'type' => 'section',
                    'title' => esc_html__('Social Connect', 'mikos'),
                    'fields' => array(
                        // Facebook
                        array(
                            'type' => 'textbox',
                            'name' => 'facebook',
                            'label' => esc_html__('Facebook', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                        // Twitter
                        array(
                            'type' => 'textbox',
                            'name' => 'twitter',
                            'label' => esc_html__('Twitter', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                        // Dribble
                        array(
                            'type' => 'textbox',
                            'name' => 'dribble',
                            'label' => esc_html__('Dribble', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                        // Google Plus
                        array(
                            'type' => 'textbox',
                            'name' => 'google',
                            'label' => esc_html__('Google', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                        // Linkedin
                        array(
                            'type' => 'textbox',
                            'name' => 'linkedin',
                            'label' => esc_html__('LinkedIn', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                        // Pinterest
                        array(
                            'type' => 'textbox',
                            'name' => 'pinterest',
                            'label' => esc_html__('Pinterest', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                        // VKontakte
                        array(
                            'type' => 'textbox',
                            'name' => 'vkontakte',
                            'label' => esc_html__('VKontakte', 'mikos'),
                            'description' => esc_html__('Leave empty if not required.', 'mikos'),
                            'default' => '#',
                        ),
                    ),
                ),
            ),
        ),
        // Theme Animations
        array(
            'title' => esc_html__('Slides Animations', 'mikos'),
            'name' => 'slides_animations',
            'icon' => 'font-awesome:fa-bell-o',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Slides Animations & Delay', 'mikos'),
                    'fields' => array(
                        // First Heading Animation Type
                        array(
                            'type' => 'select',
                            'name' => 'h1_1',
                            'label' => esc_html__('First Heading Animation Type', 'mikos'),
                            'items' => array(
                                array(
                                    'value' => 'bounce',
                                    'label' => 'Bounce'
                                ),
                                array(
                                    'value' => 'flash',
                                    'label' => 'Flash'
                                ),
                                array(
                                    'value' => 'fadeIn',
                                    'label' => 'FadeIn'
                                ),
                                array(
                                    'value' => 'fadeInDown',
                                    'label' => 'FadeInDown'
                                ),
                                array(
                                    'value' => 'fadeInLeft',
                                    'label' => 'FadeInLeft'
                                ),
                                array(
                                    'value' => 'fadeInRight',
                                    'label' => 'FadeInRight'
                                ),
                                array(
                                    'value' => 'fadeInUp',
                                    'label' => 'FadeInUp'
                                ),
                                array(
                                    'value' => 'fadeOut',
                                    'label' => 'FadeOut'
                                ),
                                array(
                                    'value' => 'flipInX',
                                    'label' => 'FlipInX'
                                ),
                                array(
                                    'value' => 'flipInY',
                                    'label' => 'FlipInY'
                                ),
                                array(
                                    'value' => 'rotateIn',
                                    'label' => 'RotateIn'
                                ),
                            ),
                            'default' => array(
                                'fadeInUp',
                            ),
                        ),
                        // First Heading Animation Type
                        array(
                            'type' => 'select',
                            'name' => 'h1_2',
                            'label' => esc_html__('Second Heading Animation Type', 'mikos'),
                            'items' => array(
                                array(
                                    'value' => 'bounce',
                                    'label' => 'Bounce'
                                ),
                                array(
                                    'value' => 'flash',
                                    'label' => 'Flash'
                                ),
                                array(
                                    'value' => 'fadeIn',
                                    'label' => 'FadeIn'
                                ),
                                array(
                                    'value' => 'fadeInDown',
                                    'label' => 'FadeInDown'
                                ),
                                array(
                                    'value' => 'fadeInLeft',
                                    'label' => 'FadeInLeft'
                                ),
                                array(
                                    'value' => 'fadeInRight',
                                    'label' => 'FadeInRight'
                                ),
                                array(
                                    'value' => 'fadeInUp',
                                    'label' => 'FadeInUp'
                                ),
                                array(
                                    'value' => 'fadeOut',
                                    'label' => 'FadeOut'
                                ),
                                array(
                                    'value' => 'flipInX',
                                    'label' => 'FlipInX'
                                ),
                                array(
                                    'value' => 'flipInY',
                                    'label' => 'FlipInY'
                                ),
                                array(
                                    'value' => 'rotateIn',
                                    'label' => 'RotateIn'
                                ),
                            ),
                            'default' => array(
                                'fadeInUp',
                            ),
                        ),
                        // First small caption Animation Type
                        array(
                            'type' => 'select',
                            'name' => 'p1_1',
                            'label' => esc_html__('First Small Caption Animation Type', 'mikos'),
                            'items' => array(
                                array(
                                    'value' => 'bounce',
                                    'label' => 'Bounce'
                                ),
                                array(
                                    'value' => 'flash',
                                    'label' => 'Flash'
                                ),
                                array(
                                    'value' => 'fadeIn',
                                    'label' => 'FadeIn'
                                ),
                                array(
                                    'value' => 'fadeInDown',
                                    'label' => 'FadeInDown'
                                ),
                                array(
                                    'value' => 'fadeInLeft',
                                    'label' => 'FadeInLeft'
                                ),
                                array(
                                    'value' => 'fadeInRight',
                                    'label' => 'FadeInRight'
                                ),
                                array(
                                    'value' => 'fadeInUp',
                                    'label' => 'FadeInUp'
                                ),
                                array(
                                    'value' => 'fadeOut',
                                    'label' => 'FadeOut'
                                ),
                                array(
                                    'value' => 'flipInX',
                                    'label' => 'FlipInX'
                                ),
                                array(
                                    'value' => 'flipInY',
                                    'label' => 'FlipInY'
                                ),
                                array(
                                    'value' => 'rotateIn',
                                    'label' => 'RotateIn'
                                ),
                            ),
                            'default' => array(
                                'fadeInUp',
                            ),
                        ),
                        // Small Caption 2 Animation Type
                        array(
                            'type' => 'select',
                            'name' => 'p1_2',
                            'label' => esc_html__('Second Small Caption Animation Type', 'mikos'),
                            'items' => array(
                                array(
                                    'value' => 'bounce',
                                    'label' => 'Bounce'
                                ),
                                array(
                                    'value' => 'flash',
                                    'label' => 'Flash'
                                ),
                                array(
                                    'value' => 'fadeIn',
                                    'label' => 'FadeIn'
                                ),
                                array(
                                    'value' => 'fadeInDown',
                                    'label' => 'FadeInDown'
                                ),
                                array(
                                    'value' => 'fadeInLeft',
                                    'label' => 'FadeInLeft'
                                ),
                                array(
                                    'value' => 'fadeInRight',
                                    'label' => 'FadeInRight'
                                ),
                                array(
                                    'value' => 'fadeInUp',
                                    'label' => 'FadeInUp'
                                ),
                                array(
                                    'value' => 'fadeOut',
                                    'label' => 'FadeOut'
                                ),
                                array(
                                    'value' => 'flipInX',
                                    'label' => 'FlipInX'
                                ),
                                array(
                                    'value' => 'flipInY',
                                    'label' => 'FlipInY'
                                ),
                                array(
                                    'value' => 'rotateIn',
                                    'label' => 'RotateIn'
                                ),
                            ),
                            'default' => array(
                                'fadeInUp',
                            ),
                        ),
                        // Button Animation Type
                        array(
                            'type' => 'select',
                            'name' => 'btn_animation',
                            'label' => esc_html__('Button Animation Type', 'mikos'),
                            'items' => array(
                                array(
                                    'value' => 'bounce',
                                    'label' => 'Bounce'
                                ),
                                array(
                                    'value' => 'flash',
                                    'label' => 'Flash'
                                ),
                                array(
                                    'value' => 'fadeIn',
                                    'label' => 'FadeIn'
                                ),
                                array(
                                    'value' => 'fadeInDown',
                                    'label' => 'FadeInDown'
                                ),
                                array(
                                    'value' => 'fadeInLeft',
                                    'label' => 'FadeInLeft'
                                ),
                                array(
                                    'value' => 'fadeInRight',
                                    'label' => 'FadeInRight'
                                ),
                                array(
                                    'value' => 'fadeInUp',
                                    'label' => 'FadeInUp'
                                ),
                                array(
                                    'value' => 'fadeOut',
                                    'label' => 'FadeOut'
                                ),
                                array(
                                    'value' => 'flipInX',
                                    'label' => 'FlipInX'
                                ),
                                array(
                                    'value' => 'flipInY',
                                    'label' => 'FlipInY'
                                ),
                                array(
                                    'value' => 'rotateIn',
                                    'label' => 'RotateIn'
                                ),
                            ),
                            'default' => array(
                                'fadeInUp',
                            ),
                        ),
                        // First Heading Delays
                        array(
                            'name'  => 'first_hd',
                            'type'  => 'slider',
                            'label' => esc_html__('First Heading Animation Duration', 'mikos'),
                            'min'   => 0.1,
                            'max'   => 10,
                            'step'   => 0.1,
                        ),
                        // Second Heading Delays
                        array(
                            'name'  => 'second_hd',
                            'type'  => 'slider',
                            'label' => esc_html__('Second Heading Animation Duration', 'mikos'),
                            'min'   => 0.1,
                            'max'   => 10,
                            'step'   => 0.1,
                        ),
                        // First small caption Delays
                        array(
                            'name'  => 'first_cd',
                            'type'  => 'slider',
                            'label' => esc_html__('First Small Caption Animation Duration', 'mikos'),
                            'min'   => 0.1,
                            'max'   => 10,
                            'step'   => 0.1,
                        ),
                        // Second small caption Delays
                        array(
                            'name'  => 'second_cd',
                            'type'  => 'slider',
                            'label' => esc_html__('Second Small Caption Animation Duration', 'mikos'),
                            'min'   => 0.1,
                            'max'   => 10,
                            'step'   => 0.1,
                        ),
                        // Button Delays
                        array(
                            'name'  => 'btn_delay',
                            'type'  => 'slider',
                            'label' => esc_html__('Button Animation Duration', 'mikos'),
                            'min'   => 0.1,
                            'max'   => 10,
                            'step'   => 0.1,
                        ),
                    ),
                ),
            ),
        ),
	)
);
/**
 *EOF
 */
