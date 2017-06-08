<?php
return array(
    // All Shortcodes
    'General Shortcodes' => array(
        'elements' => array(
            // Testimonials
            'testimonials'  => array(
                'title' => 'Testimonials',
                'code'  => '[testimonials]',
                'attributes' => array(
                    // Animations Duration
                    array(
                        'name'  => 'number',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Number Of Testimonials', 'mikos'),
                        'min'   => 1,
                        'max'   => 15,
                        'default'   => 3,
                    ),
                ),
            ),
            // Team
            'team'  => array(
                'title' => 'Team',
                'code'  => '[team]',
                'attributes' => array(
                    // Animations Duration
                    array(
                        'name'  => 'members',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Number Of Members', 'mikos'),
                        'min'   => 1,
                        'max'   => 9,
                        'default'   => 3,
                    ),
                ),
            ),
            // Projects
            'projects'  => array(
                'title' => 'Projects',
                'code'  => '[projects]Your Text Goes Here[/projects]',
                'attributes' => array(
                    // Project Title
                    array(
                        'name'  => 'title',
                        'type'  => 'textbox',
                        'label' => esc_html__('Enter Project Title', 'mikos'),
                    ),
                    // Button Text
                    array(
                        'name'  => 'btn_txt',
                        'type'  => 'textbox',
                        'label' => esc_html__('Button Text', 'mikos'),
                    ),
                    // Button URL
                    array(
                        'name'  => 'btn_url',
                        'type'  => 'textbox',
                        'label' => esc_html__('Button URL', 'mikos'),
                    ),
                    // Animations Duration
                    array(
                        'name'  => 'duration',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Animation Duration', 'mikos'),
                        'min'   => 0.1,
                        'max'   => 10,
                        'step'   => 0.1,
                    ),
                    // Animation Type
                    array(
                        'name'  => 'animation',
                        'type'  => 'select',
                        'label' => esc_html__('Animation Type', 'mikos'),
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
                    ),
                    // Image URL
                    array(
                        'name'  => 'img_url',
                        'type'  => 'upload',
                        'label' => esc_html__('Upload Image', 'mikos'),
                    ),
                    array(
                        'name'  => 'img_position',
                        'type'  => 'select',
                        'label' => esc_html__('Image Position', 'mikos'),
                        'items' => array(
                            array(
                                'value' => 'left',
                                'label' => 'Left'
                            ),
                            array(
                                'value' => 'right',
                                'label' => 'Right'
                            ),
                        ),
                    ),
                ),
            ),
            // Image Shortcode
            'image'  => array(
                'title' => 'Image',
                'code'  => '[image]',
                'attributes' => array(
                    // Animations Duration
                    array(
                        'name'  => 'duration',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Animation Duration', 'mikos'),
                        'min'   => 0.1,
                        'max'   => 10,
                        'step'   => 0.1,
                    ),
                    // Animation Type
                    array(
                        'name'  => 'animation',
                        'type'  => 'select',
                        'label' => esc_html__('Animation Type', 'mikos'),
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
                    ),
                    // Image URL
                    array(
                        'name'  => 'url',
                        'type'  => 'upload',
                        'label' => esc_html__('Upload Image', 'mikos'),
                    ),
                    // Image Column
                    array(
                        'name'  => 'col',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Image Column', 'mikos'),
                        'min'   => 1,
                        'max'   => 12,
                        'default' => 4,
                    ),
                ),
            ),
            // Row Shortcode
            'row'  => array(
                'title' => 'Row',
                'code'  => '[row]Your Content[/row]',
                'attributes' => array(
                    array(
                        'name'  => 'row_class',
                        'type'  => 'textbox',
                        'label' => esc_html__('Enter Row Class', 'mikos'),
                    ),
                ),
            ),
            // Column Shortcode
            'column'  => array(
                'title' => 'Columns',
                'code'  => '[column]Put Your Content..[/column]',
                'attributes' => array(
                    // Column Slider
                    array(
                        'name'  => 'size',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Column Size', 'mikos'),
                        'min'   => 1,
                        'max'   => 12,
                    ),
                    // Column Class
                    array(
                        'name'  => 'col_class',
                        'type'  => 'select',
                        'label' => esc_html__('Select Class', 'mikos'),
                        'items' => array(
                            array(
                                'value' => 'xs',
                                'label' => 'col-xs'
                            ),
                            array(
                                'value' => 'sm',
                                'label' => 'col-sm'
                            ),
                            array(
                                'value' => 'md',
                                'label' => 'col-md'
                            ),
                            array(
                                'value' => 'lg',
                                'label' => 'col-lg'
                            ),
                        ),
                    ),
                ),
            ),
            // Title Shortcode
            'title'  => array(
                'title' => 'Title',
                'code'  => '[title]Your Content[/title]',
                'attributes' => array(
                    // Title Heading
                    array(
                        'name'  => 'heading',
                        'type'  => 'textbox',
                        'label' => esc_html__('Title Heading', 'mikos'),
                    ),
                    // Animations Duration
                    array(
                        'name'  => 'duration_heading',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Heading Animation Duration', 'mikos'),
                        'min'   => 0.1,
                        'max'   => 10,
                        'step'   => 0.1,
                    ),
                    // Animation Type
                    array(
                        'name'  => 'animation_heading',
                        'type'  => 'select',
                        'label' => esc_html__('Heading Animation Type', 'mikos'),
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
                    ),
                    // Btn
                    array(
                        'name'  => 'btn_txt',
                        'type'  => 'textbox',
                        'label' => esc_html__('Button Text', 'mikos'),
                    ),
                    array(
                        'name'  => 'btn_link',
                        'type'  => 'textbox',
                        'label' => esc_html__('Button Link', 'mikos'),
                    ),
                    // Animations Duration
                    array(
                        'name'  => 'duration_btn',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Button Animation Duration', 'mikos'),
                        'min'   => 0.1,
                        'max'   => 10,
                        'step'   => 0.1,
                    ),
                    // Animation Type
                    array(
                        'name'  => 'animation_btn',
                        'type'  => 'select',
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
                    )
                ),
            ),
            // Social Icons
            'social_icons'  => array(
                'title' => 'Social Icons',
                'code'  => '[social]',
                'attributes' => array(
                    // Facebook
                    array(
                        'name'  => 'facebook',
                        'type'  => 'textbox',
                        'label' => esc_html__('Facebook', 'mikos'),
                        'default' => '#'
                    ),
                    // Dribble
                    array(
                        'name'  => 'dribble',
                        'type'  => 'textbox',
                        'label' => esc_html__('Dribble', 'mikos'),
                        'default' => '#'
                    ),
                    // Twitter
                    array(
                        'name'  => 'twitter',
                        'type'  => 'textbox',
                        'label' => esc_html__('Twitter', 'mikos'),
                        'default' => '#'
                    ),
                    // Linkedin
                    array(
                        'name'  => 'linkedin',
                        'type'  => 'textbox',
                        'label' => esc_html__('Linkedin', 'mikos'),
                        'default' => '#'
                    ),
                    // Youtube
                    array(
                        'name'  => 'pinterest',
                        'type'  => 'textbox',
                        'label' => esc_html__('Pinterest', 'mikos'),
                        'default' => '#'
                    ),
                    // Google
                    array(
                        'name'  => 'google',
                        'type'  => 'textbox',
                        'label' => esc_html__('Google +', 'mikos'),
                        'default' => '#'
                    ),
                    // New Window
                    array(
                        'name'  => 'link_type',
                        'type'  => 'select',
                        'label' => esc_html__('Open in new window', 'mikos'),
                        'items' => array(
                            array(
                                'value' => 'yes',
                                'label' => 'Yes'
                            ),
                            array(
                                'value' => 'no',
                                'label' => 'No'
                            ),
                        ),
                    ),
                ),
            ),
            // Button Shortcode
            'button'  => array(
                'title' => 'Buttons',
                'code'  => '[button]',
                'attributes' => array(
                    array(
                        'name'  => 'button_text',
                        'type'  => 'textbox',
                        'label' => esc_html__('Button Text', 'mikos'),
                    ),
                    // Button Link
                    array(
                        'name'  => 'button_link',
                        'type'  => 'textbox',
                        'label' => esc_html__('Button Link', 'mikos'),
                    ),
                    // Button Style
                    array(
                        'name'  => 'button_style',
                        'type'  => 'select',
                        'label' => esc_html__('Button Style', 'mikos'),
                        'items' => array(
                            array(
                                'value' => 'light_red',
                                'label' => 'Light Red'
                            ),
                            array(
                                'value' => 'dark_red',
                                'label' => 'Dark Red'
                            ),
                            array(
                                'value' => 'yellow',
                                'label' => 'Yellow'
                            ),
                            array(
                                'value' => 'green',
                                'label' => 'Green'
                            ),
                            array(
                                'value' => 'turquoise',
                                'label' => 'Turquoise'
                            ),
                            array(
                                'value' => 'blue',
                                'label' => 'Blue'
                            ),
                            array(
                                'value' => 'black',
                                'label' => 'Black'
                            ),
                            array(
                                'value' => 'purple',
                                'label' => 'Purple'
                            ),
                            array(
                                'value' => 'brown',
                                'label' => 'Brown'
                            ),
                            array(
                                'value' => 'darkgray',
                                'label' => 'Dark Grey'
                            ),
                        ),
                    ),
                ),
            ),
            // Tabs
            'tabs'  => array(
                'title' => 'Tabs',
                'code'  => '[tabs tab1="Tab 1" tab2="Tab 2" tab3="Tab 3"][tab id=1]Tab content 1[/tab][tab id=2]Tab content 2[/tab][tab id=3]Tab content 3[/tab][/tabs]',
            ),
            // Image Shortcode
            'space'  => array(
                'title' => 'Space',
                'code'  => '[space]',
                'attributes' => array(
                    // Image Column
                    array(
                        'name'  => 'space',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Space', 'mikos'),
                        'min'   => 1,
                        'max'   => 200,
                    ),
                ),
            ),

            // About
            'about'  => array(
                'title' => 'about',
                'code'  => '[about]Your Text Goes Here[/about]',
                'attributes' => array(
                    // about Title
                    array(
                        'name'  => 'title',
                        'type'  => 'textbox',
                        'label' => esc_html__('Enter Project Title', 'mikos'),
                    ),

                    // Animations Duration
                    array(
                        'name'  => 'duration',
                        'type'  => 'slider',
                        'label' => esc_html__('Select Animation Duration', 'mikos'),
                        'min'   => 0.1,
                        'max'   => 10,
                        'step'   => 0.1,
                    ),
                    // Animation Type
                    array(
                        'name'  => 'animation',
                        'type'  => 'select',
                        'label' => esc_html__('Animation Type', 'mikos'),
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
                    ),
                    // Image URL
                    array(
                        'name'  => 'img_url',
                        'type'  => 'upload',
                        'label' => esc_html__('Upload Image', 'mikos'),
                    ),
                    array(
                        'name'  => 'img_position',
                        'type'  => 'select',
                        'label' => esc_html__('Image Position', 'mikos'),
                        'items' => array(
                            array(
                                'value' => 'left',
                                'label' => 'Left'
                            ),
                            array(
                                'value' => 'right',
                                'label' => 'Right'
                            ),
                        ),
                    ),
                ),
            )
            )
    ),

);
/**
 * EOF
 */
