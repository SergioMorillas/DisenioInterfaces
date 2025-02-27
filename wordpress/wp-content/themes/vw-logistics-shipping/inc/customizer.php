<?php
/**
 * VW Logistics Shipping Theme Customizer
 *
 * @package VW Logistics Shipping
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_logistics_shipping_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_logistics_shipping_custom_controls' );

function vw_logistics_shipping_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_logistics_shipping_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_logistics_shipping_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'vw_logistics_shipping_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'vw-logistics-shipping' ),
		'priority' => 10,
	));

   	// Header Background color
	$wp_customize->add_setting('vw_logistics_shipping_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-logistics-shipping'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-logistics-shipping'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-logistics-shipping' ),
			'center top'   => esc_html__( 'Top', 'vw-logistics-shipping' ),
			'right top'   => esc_html__( 'Top Right', 'vw-logistics-shipping' ),
			'left center'   => esc_html__( 'Left', 'vw-logistics-shipping' ),
			'center center'   => esc_html__( 'Center', 'vw-logistics-shipping' ),
			'right center'   => esc_html__( 'Right', 'vw-logistics-shipping' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-logistics-shipping' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-logistics-shipping' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-logistics-shipping' ),
		),
	));

	//Menus Settings
	$wp_customize->add_section( 'vw_logistics_shipping_menu_section' , array(
  	'title' => __( 'Menus Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_panel_id'
	) );

	$wp_customize->add_setting('vw_logistics_shipping_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_menu_section',
        'choices' => array(
        	'100' => __('100','vw-logistics-shipping'),
            '200' => __('200','vw-logistics-shipping'),
            '300' => __('300','vw-logistics-shipping'),
            '400' => __('400','vw-logistics-shipping'),
            '500' => __('500','vw-logistics-shipping'),
            '600' => __('600','vw-logistics-shipping'),
            '700' => __('700','vw-logistics-shipping'),
            '800' => __('800','vw-logistics-shipping'),
            '900' => __('900','vw-logistics-shipping'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_logistics_shipping_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menu Text Transform','vw-logistics-shipping'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-logistics-shipping'),
            'Capitalize' => __('Capitalize','vw-logistics-shipping'),
            'Lowercase' => __('Lowercase','vw-logistics-shipping'),
        ),
		'section'=> 'vw_logistics_shipping_menu_section',
	));

	$wp_customize->add_setting('vw_logistics_shipping_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_logistics_shipping_menu_section',
		'label' => __('Menu Item Hover Style','vw-logistics-shipping'),
		'choices' => array(
            'None' => __('None','vw-logistics-shipping'),
            'Zoom In' => __('Zoom In','vw-logistics-shipping'),
        ),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_menu_section',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_menu_section',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_menu_section',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_menu_section',
	)));

	//Topbar
	$wp_customize->add_section('vw_logistics_shipping_topbar_section' , array(
		'title' => __( 'Topbar Section', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_panel_id'
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_header_topbar',array(
  	'default' => 1,
  	'transport' => 'refresh',
  	'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_header_topbar',array(
  	'label' => esc_html__( 'Show / Hide Topbar','vw-logistics-shipping' ),
  	'section' => 'vw_logistics_shipping_topbar_section'
  )));

  //Sticky Header
	$wp_customize->add_setting( 'vw_logistics_shipping_sticky_header',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_sticky_header',array(
      'label' => esc_html__( 'Sticky Header','vw-logistics-shipping' ),
      'section' => 'vw_logistics_shipping_topbar_section'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_topbar_section',
		'type'=> 'text'
	));


	$wp_customize->add_setting('vw_logistics_shipping_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_location',array(
		'label'	=> esc_html__('Add Location','vw-logistics-shipping'),
		'input_attrs' => array(
    'placeholder' => esc_html__( '4b, Walse Street , USA', 'vw-logistics-shipping' ),
    ),
		'section'=> 'vw_logistics_shipping_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_location_icon',array(
		'label'	=> __('Add Location Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_topbar_section',
		'setting'	=> 'vw_logistics_shipping_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_lite_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('vw_logistics_shipping_lite_email',array(
		'label' => __('Add Email','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => __( 'xyz123@example.com', 'vw-logistics-shipping' ),
    ),
		'section' => 'vw_logistics_shipping_topbar_section',
		'setting' => 'vw_logistics_shipping_lite_email',
		'type'    => 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_mail_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_mail_icon',array(
		'label'	=> __('Add Mail Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_topbar_section',
		'setting'	=> 'vw_logistics_shipping_mail_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_topbar_timing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_topbar_timing',array(
		'label'	=> esc_html__('Add Timing','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Mon – Sun: 9.00 am – 8.00pm', 'vw-logistics-shipping' ),
      ),
		'section'=> 'vw_logistics_shipping_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_time_icon',array(
		'label'	=> __('Add Time Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_topbar_section',
		'setting'	=> 'vw_logistics_shipping_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_topbar_button_label',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_topbar_button_label',array(
		'label' => __('Button','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Get A Quote', 'vw-logistics-shipping' ),
      ),
		'section' => 'vw_logistics_shipping_topbar_section',
		'setting' => 'vw_logistics_shipping_topbar_button_label',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_topbar_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('vw_logistics_shipping_topbar_button_url',array(
		'label'	=> __('Add Button URL','vw-logistics-shipping'),
		'section'	=> 'vw_logistics_shipping_topbar_section',
		'setting'	=> 'vw_logistics_shipping_topbar_button_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'vw_logistics_shipping_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'vw-logistics-shipping' ),
  	'description' => __('For more options of slider section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/shipping-wordpress-theme">GET PRO</a>','vw-logistics-shipping'),
		'panel' => 'vw_logistics_shipping_panel_id'
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_slider_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
 	$wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_slider_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_slidersettings'
  )));

	$wp_customize->add_setting('vw_logistics_shipping_slider_type',array(
	    'default' => 'Default slider',
	    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	) );
	$wp_customize->add_control('vw_logistics_shipping_slider_type', array(
	    'type' => 'select',
	    'label' => __('Slider Type','vw-logistics-shipping'),
	    'section' => 'vw_logistics_shipping_slidersettings',
	    'choices' => array(
	        'Default slider' => __('Default slider','vw-logistics-shipping'),
	        'Advance slider' => __('Advance slider','vw-logistics-shipping'),
        ),
	));

	// $wp_customize->add_setting('vw_logistics_shipping_advance_slider_shortcode',array(
	// 	'default'=> '',
	// 	'sanitize_callback'	=> 'sanitize_text_field'
	// ));
	// $wp_customize->add_control('vw_logistics_shipping_advance_slider_shortcode',array(
	// 	'label'	=> __('Add Slider Shortcode','vw-logistics-shipping'),
	// 	'section'=> 'vw_logistics_shipping_slidersettings',
	// 	'type'=> 'text',
	// 	'active_callback' => 'vw_logistics_shipping_advance_slider'
	// ));

 	$wp_customize->add_setting( 'vw_logistics_shipping_slider_form_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_slider_form_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider Form','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_slidersettings',
  )));

 	$wp_customize->add_setting('vw_logistics_shipping_advance_slider_form_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_advance_slider_form_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_slidersettings',
		'type'=> 'text',
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_small_slider_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_small_slider_text', array(
		'label'    => __( 'Add Slider Small Text', 'vw-logistics-shipping' ),
		'input_attrs' => array(
    'placeholder' => __( 'Trusted Logistic Service', 'vw-logistics-shipping' ),
    	),
		'section'  => 'vw_logistics_shipping_slidersettings',
		'type'     => 'text',
	) );

   //Selective Refresh
  	$wp_customize->selective_refresh->add_partial('vw_logistics_shipping_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'vw_logistics_shipping_customize_partial_vw_logistics_shipping_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
	$wp_customize->add_setting( 'vw_logistics_shipping_slider_page' . $count, array(
		'default'           => '',
		'sanitize_callback' => 'vw_logistics_shipping_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_slider_page' . $count, array(
		'label'    => __( 'Select Slider Page', 'vw-logistics-shipping' ),
		'description' => __('Slider image size (1400 x 550)','vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_slidersettings',
		'type'     => 'dropdown-pages',
	) );
	}

	//content layout
	$wp_customize->add_setting('vw_logistics_shipping_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Image_Radio_Control($wp_customize, 'vw_logistics_shipping_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'vw_logistics_shipping_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_logistics_shipping_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-logistics-shipping'),
		'description'	=> __('Enter a value in %. Example:20%','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_logistics_shipping_default_slider'
	));

	$wp_customize->add_setting('vw_logistics_shipping_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-logistics-shipping'),
		'description'	=> __('Enter a value in %. Example:20%','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_logistics_shipping_default_slider'
	));

  	//Slider excerpt
	$wp_customize->add_setting( 'vw_logistics_shipping_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_logistics_shipping_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_logistics_shipping_default_slider'
	) );


	$wp_customize->add_setting( 'vw_logistics_shipping_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-logistics-shipping'),
		'section' => 'vw_logistics_shipping_slidersettings',
		'type'  => 'text',
	) );

  	//Slider height
	$wp_customize->add_setting('vw_logistics_shipping_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_slider_height',array(
		'label'	=> __('Slider Height','vw-logistics-shipping'),
		'description'	=> __('Specify the slider height (px).','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => __( '500px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_slidersettings',
		'type'=> 'text',
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_slider_arrow_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_slidersettings',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_slider_button_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_slider_button_text',array(
		'label' => __('Slider Button','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Explore More', 'vw-logistics-shipping' ),
        ),
		'section' => 'vw_logistics_shipping_slidersettings',
		'setting' => 'vw_logistics_shipping_slider_button_text',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_slider_button_link',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('vw_logistics_shipping_slider_button_link',array(
        'label' => esc_html__('Add Button Link','vw-logistics-shipping'),
        'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'vw-logistics-shipping' ),
        ),
        'section'=> 'vw_logistics_shipping_slidersettings',
        'type'=> 'url'
    ));

	//Opacity
	$wp_customize->add_setting('vw_logistics_shipping_slider_opacity_color',array(
      'default'              => '',
      'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_logistics_shipping_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_logistics_shipping_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr(__('0','vw-logistics-shipping')),
	      '0.1' =>  esc_attr(__('0.1','vw-logistics-shipping')),
	      '0.2' =>  esc_attr(__('0.2','vw-logistics-shipping')),
	      '0.3' =>  esc_attr(__('0.3','vw-logistics-shipping')),
	      '0.4' =>  esc_attr(__('0.4','vw-logistics-shipping')),
	      '0.5' =>  esc_attr(__('0.5','vw-logistics-shipping')),
	      '0.6' =>  esc_attr(__('0.6','vw-logistics-shipping')),
	      '0.7' =>  esc_attr(__('0.7','vw-logistics-shipping')),
	      '0.8' =>  esc_attr(__('0.8','vw-logistics-shipping')),
	      '0.9' =>  esc_attr(__('0.9','vw-logistics-shipping'))
	),'active_callback' => 'vw_logistics_shipping_default_slider'
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_slider_image_overlay',array(
    	'default' => '',
    	'transport' => 'refresh',
    	'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
   ));
   $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-logistics-shipping' ),
      	'section' => 'vw_logistics_shipping_slidersettings',
      	'active_callback' => 'vw_logistics_shipping_default_slider'
   )));

   $wp_customize->add_setting('vw_logistics_shipping_slider_image_overlay_color', array(
		'default'           => 1,
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_slidersettings',
		'active_callback' => 'vw_logistics_shipping_default_slider'
	)));

	//services us Section
	$wp_customize->add_section('vw_logistics_shipping_services_us_section', array(
		'title'       => __('Services Us Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_services_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_services_us_text',array(
		'description' => __('<p>1. More options for services us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for services us section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_services_us_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_services_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_services_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_services_us_section',
		'type'=> 'hidden'
	));

	//About Us Section
	$wp_customize->add_section('vw_logistics_shipping_about_us_section',array(
		'title'	=> __('About Us Section','vw-logistics-shipping'),
		'description' => __('For more options of about us section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/shipping-wordpress-theme">GET PRO</a>','vw-logistics-shipping'),
		'panel' => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_section_small_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_logistics_shipping_section_small_title',array(
		'label'	=> esc_html__('Section Small Title','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'About Us', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_about_us_section',
		'type'=> 'text'
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->ID] = $post->post_title;
	}
	
	$wp_customize->add_setting('vw_logistics_shipping_about_setting',array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_logistics_shipping_about_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-logistics-shipping'),
		'section' => 'vw_logistics_shipping_about_us_section',
	));

	for ( $i=1; $i <= 2 ; $i++ ) {
	   
 	$wp_customize->add_setting('vw_logistics_shipping_about_img_list_icon' .$i,array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Logistics_Shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_about_img_list_icon' .$i, array(
		'label'	=> __('Add About List Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_about_us_section',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_about_img_page_list' . $i, array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( 'vw_logistics_shipping_about_img_page_list' . $i, array(
    'label'    => __( 'Add About List Text', 'vw-logistics-shipping' ),
    'section'  => 'vw_logistics_shipping_about_us_section',
    'type'     => 'text'
  ));
	}

	// About List sec
	$wp_customize->add_setting( 'vw_logistics_shipping_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_about_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_about_us_section',
		'type'        => 'range',
		'settings'    => 'vw_logistics_shipping_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	for ( $i=1; $i <= 2 ; $i++ ) {
	    
 	$wp_customize->add_setting('vw_logistics_shipping_about_list_icon' .$i,array(
		'default'	=> 'fas fa-check',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Logistics_Shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_about_list_icon' .$i, array(
		'label'	=> __('Add About List Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_about_us_section',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_about_page_list' . $i, array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( 'vw_logistics_shipping_about_page_list' . $i, array(
    'label'    => __( 'Add About List Text', 'vw-logistics-shipping' ),
    'section'  => 'vw_logistics_shipping_about_us_section',
    'type'     => 'text'
  ));
	}

	$wp_customize->add_setting('vw_logistics_shipping_about_button_text',array(
		'default' => 'Learn More',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_about_button_text',array(
		'label' => __('About Button','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Learn More', 'vw-logistics-shipping' ),
        ),
		'section' => 'vw_logistics_shipping_about_us_section',
		'setting' => 'vw_logistics_shipping_about_button_text',
		'type' => 'text'
	));

	//order tracking us Section
	$wp_customize->add_section('vw_logistics_shipping_order_tracking_us_section', array(
		'title'       => __('Order Tracking Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_order_tracking_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_order_tracking_us_text',array(
		'description' => __('<p>1. More options for order tracking section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for order tracking section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_order_tracking_us_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_order_tracking_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_order_tracking_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_order_tracking_us_section',
		'type'=> 'hidden'
	));

	//steps sec Section
	$wp_customize->add_section('vw_logistics_shipping_steps_section', array(
		'title'       => __('Steps Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_steps_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_steps_text',array(
		'description' => __('<p>1. More options for steps section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for steps section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_steps_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_steps_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_steps_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_steps_section',
		'type'=> 'hidden'
	));

	//pricing Section
	$wp_customize->add_section('vw_logistics_shipping_pricing_section', array(
		'title'       => __('Pricing Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_pricing_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_pricing_text',array(
		'description' => __('<p>1. More options for pricing section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_pricing_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_pricing_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_pricing_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_pricing_section',
		'type'=> 'hidden'
	));

	//whyChooseUs Section
	$wp_customize->add_section('vw_logistics_shipping_whyChooseUs_section', array(
		'title'       => __('Why Choose Us Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_whyChooseUs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_whyChooseUs_text',array(
		'description' => __('<p>1. More options for why choose us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for why choose us section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_whyChooseUs_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_whyChooseUs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_whyChooseUs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_whyChooseUs_section',
		'type'=> 'hidden'
	));


	//testimonials Section
	$wp_customize->add_section('vw_logistics_shipping_testimonials_section', array(
		'title'       => __('Testimonials Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_testimonials_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_testimonials_section',
		'type'=> 'hidden'
	));

	//our team Section
	$wp_customize->add_section('vw_logistics_shipping_our_team_section', array(
		'title'       => __('Our Team Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_our_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_our_team_text',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_our_team_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_our_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_our_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_our_team_section',
		'type'=> 'hidden'
	));

	//get in touch Section
	$wp_customize->add_section('vw_logistics_shipping_getintouch_section', array(
		'title'       => __('Get In Touch Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_getintouch_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_getintouch_text',array(
		'description' => __('<p>1. More options for get in touch section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for get in touch section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_getintouch_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_getintouch_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_getintouch_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_getintouch_section',
		'type'=> 'hidden'
	));

	//faq Section
	$wp_customize->add_section('vw_logistics_shipping_faq_section', array(
		'title'       => __('Faq Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_faq_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_faq_text',array(
		'description' => __('<p>1. More options for faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for faq section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_faq_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_faq_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_faq_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_faq_section',
		'type'=> 'hidden'
	));

	//Blog Section
	$wp_customize->add_section('vw_logistics_shipping_blog_section', array(
		'title'       => __('Blog Section', 'vw-logistics-shipping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-logistics-shipping'),
		'priority'    => null,
		'panel'       => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting('vw_logistics_shipping_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_blog_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_logistics_shipping_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/shipping-wordpress-theme'>More Info</a>",
		'section'=> 'vw_logistics_shipping_blog_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_logistics_shipping_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-logistics-shipping'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/shipping-wordpress-theme">GET PRO</a>','vw-logistics-shipping'),
		'panel' => 'vw_logistics_shipping_panel_id',
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_footer_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
    ));
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_footer'
  )));

	// font size
	$wp_customize->add_setting('vw_logistics_shipping_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','vw-logistics-shipping'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_logistics_shipping_footer',
	));

	$wp_customize->add_setting('vw_logistics_shipping_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','vw-logistics-shipping'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_logistics_shipping_footer',
	));

	// text trasform
	$wp_customize->add_setting('vw_logistics_shipping_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','vw-logistics-shipping'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-logistics-shipping'),
      'Capitalize' => __('Capitalize','vw-logistics-shipping'),
      'Lowercase' => __('Lowercase','vw-logistics-shipping'),
    ),
		'section'=> 'vw_logistics_shipping_footer',
	));

	$wp_customize->add_setting('vw_logistics_shipping_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_footer',
        'choices' => array(
        	'100' => __('100','vw-logistics-shipping'),
            '200' => __('200','vw-logistics-shipping'),
            '300' => __('300','vw-logistics-shipping'),
            '400' => __('400','vw-logistics-shipping'),
            '500' => __('500','vw-logistics-shipping'),
            '600' => __('600','vw-logistics-shipping'),
            '700' => __('700','vw-logistics-shipping'),
            '800' => __('800','vw-logistics-shipping'),
            '900' => __('900','vw-logistics-shipping'),
        ),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_footer_template',array(
	  'default'	=> esc_html('vw_logistics_shipping-footer-one'),
	  'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_template',array(
	  'label'	=> esc_html__('Footer style','vw-logistics-shipping'),
	  'section'	=> 'vw_logistics_shipping_footer',
	  'setting'	=> 'vw_logistics_shipping_footer_template',
	  'type' => 'select',
	  'choices' => array(
	      'vw_logistics_shipping-footer-one' => esc_html__('Style 1', 'vw-logistics-shipping'),
	      'vw_logistics_shipping-footer-two' => esc_html__('Style 2', 'vw-logistics-shipping'),
	      'vw_logistics_shipping-footer-three' => esc_html__('Style 3', 'vw-logistics-shipping'),
	      'vw_logistics_shipping-footer-four' => esc_html__('Style 4', 'vw-logistics-shipping'),
	      'vw_logistics_shipping-footer-five' => esc_html__('Style 5', 'vw-logistics-shipping'),
	      )
	));

	$wp_customize->add_setting('vw_logistics_shipping_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_footer',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_logistics_shipping_footer_background_image',array(
        'label' => __('Footer Background Image','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_footer'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-logistics-shipping'),
		'section' => 'vw_logistics_shipping_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-logistics-shipping' ),
			'center top'   => esc_html__( 'Top', 'vw-logistics-shipping' ),
			'right top'   => esc_html__( 'Top Right', 'vw-logistics-shipping' ),
			'left center'   => esc_html__( 'Left', 'vw-logistics-shipping' ),
			'center center'   => esc_html__( 'Center', 'vw-logistics-shipping' ),
			'right center'   => esc_html__( 'Right', 'vw-logistics-shipping' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-logistics-shipping' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-logistics-shipping' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-logistics-shipping' ),
		),
	));

	// Footer
	$wp_customize->add_setting('vw_logistics_shipping_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-logistics-shipping'),
		'choices' => array(
            'fixed' => __('fixed','vw-logistics-shipping'),
            'scroll' => __('scroll','vw-logistics-shipping'),
        ),
		'section'=> 'vw_logistics_shipping_footer',
	));

	$wp_customize->add_setting('vw_logistics_shipping_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_footer',
        'choices' => array(
        	'Left' => __('Left','vw-logistics-shipping'),
            'Center' => __('Center','vw-logistics-shipping'),
            'Right' => __('Right','vw-logistics-shipping')
        ),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_footer',
        'choices' => array(
        	'Left' => __('Left','vw-logistics-shipping'),
            'Center' => __('Center','vw-logistics-shipping'),
            'Right' => __('Right','vw-logistics-shipping')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('vw_logistics_shipping_footer_padding',array(
		'default'=> '',
		'priority'    => null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-logistics-shipping' ),
    ),
		'section'=> 'vw_logistics_shipping_footer',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_logistics_shipping_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_logistics_shipping_Customize_partial_vw_logistics_shipping_footer_text',
	));

	$wp_customize->add_setting('vw_logistics_shipping_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Copyright 2021, .....', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_footer'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_footer',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_copyright_font_size',array(
		'label' => __('Copyright Font Size','vw-logistics-shipping'),
		'description' => __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
		        'placeholder' => __( '10px', 'vw-logistics-shipping' ),
		    ),
		'section'=> 'vw_logistics_shipping_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_copyright_alingment',array(
    'default' => 'center',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Logistics_Shipping_Image_Radio_Control($wp_customize, 'vw_logistics_shipping_copyright_alingment', array(
		'type' => 'select',
		'label' => esc_html__('Copyright Alignment','vw-logistics-shipping'),
		'section' => 'vw_logistics_shipping_footer',
		'settings' => 'vw_logistics_shipping_copyright_alingment',
		'choices' => array(
		  'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
		  'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
		  'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
  ))));

  $wp_customize->add_setting( 'vw_logistics_shipping_hide_show_scroll',array(
		'default' => 1,
  	'transport' => 'refresh',
  	'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_hide_show_scroll',array(
  	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-logistics-shipping' ),
  	'section' => 'vw_logistics_shipping_footer'
  )));

      $wp_customize->add_setting('vw_logistics_shipping_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser($wp_customize,'vw_logistics_shipping_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','vw-logistics-shipping'),
    'transport' => 'refresh',
    'section' => 'vw_logistics_shipping_footer',
    'setting' => 'vw_logistics_shipping_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_logistics_shipping_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','vw-logistics-shipping'),
    'description' => __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-logistics-shipping' ),
    ),
    'section'=> 'vw_logistics_shipping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_logistics_shipping_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_logistics_shipping_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','vw-logistics-shipping'),
    'description' => __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-logistics-shipping' ),
    ),
    'section'=> 'vw_logistics_shipping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_logistics_shipping_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_logistics_shipping_scroll_to_top_width',array(
    'label' => __('Icon Width','vw-logistics-shipping'),
    'description' => __('Enter a value in pixels Example:20px','vw-logistics-shipping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-logistics-shipping' ),
  ),
  'section'=> 'vw_logistics_shipping_footer',
  'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_logistics_shipping_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_logistics_shipping_scroll_to_top_height',array(
    'label' => __('Icon Height','vw-logistics-shipping'),
    'description' => __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-logistics-shipping' ),
    ),
    'section'=> 'vw_logistics_shipping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_logistics_shipping_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_logistics_shipping_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','vw-logistics-shipping' ),
    'section'     => 'vw_logistics_shipping_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_logistics_shipping_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_logistics_shipping_Customize_partial_vw_logistics_shipping_scroll_to_top_icon',
	));

  $wp_customize->add_setting('vw_logistics_shipping_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Logistics_Shipping_Image_Radio_Control($wp_customize, 'vw_logistics_shipping_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_footer',
    'settings' => 'vw_logistics_shipping_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
  ))));

//Blog Post
	$wp_customize->add_panel( 'vw_logistics_shipping_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_logistics_shipping_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_blog_post_parent_panel',
	));

	//Blog layout
	$wp_customize->add_setting('vw_logistics_shipping_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Image_Radio_Control($wp_customize, 'vw_logistics_shipping_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Layouts','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_post_settings',
    'choices' => array(
          'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
          'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
          'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('vw_logistics_shipping_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-logistics-shipping'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-logistics-shipping'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-logistics-shipping'),
        'One Column' => esc_html__('One Column','vw-logistics-shipping'),
        'Three Columns' => esc_html__('Three Columns','vw-logistics-shipping'),
        'Four Columns' => esc_html__('Four Columns','vw-logistics-shipping'),
        'Grid Layout' => esc_html__('Grid Layout','vw-logistics-shipping')
    ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_logistics_shipping_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_logistics_shipping_Customize_partial_vw_logistics_shipping_toggle_postdate',
	));

	$wp_customize->add_setting('vw_logistics_shipping_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_post_settings',
		'setting'	=> 'vw_logistics_shipping_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_toggle_postdate',array(
      'label' => esc_html__( 'Post Date','vw-logistics-shipping' ),
      'section' => 'vw_logistics_shipping_post_settings'
  )));

 	$wp_customize->add_setting('vw_logistics_shipping_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_post_settings',
		'setting'	=> 'vw_logistics_shipping_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_toggle_author',array(
		'label' => esc_html__( 'Author','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_post_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_post_settings',
		'setting'	=> 'vw_logistics_shipping_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_post_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_toggle_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_post_settings',
		'setting'	=> 'vw_logistics_shipping_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_toggle_time',array(
		'label' => esc_html__( 'Time','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_post_settings'
  )));

  $wp_customize->add_setting( 'vw_logistics_shipping_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_post_settings'
  )));

 	//Featured Image
	$wp_customize->add_setting('vw_logistics_shipping_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
    ));
    $wp_customize->add_control('vw_logistics_shipping_blog_post_featured_image_dimension',array(
       'type' => 'select',
       'label'	=> __('Blog Post Featured Image Dimension','vw-logistics-shipping'),
       'section'	=> 'vw_logistics_shipping_post_settings',
       'choices' => array(
            'default' => __('Default','vw-logistics-shipping'),
            'custom' => __('Custom Image Size','vw-logistics-shipping'),
        ),
    ));

    $wp_customize->add_setting('vw_logistics_shipping_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_logistics_shipping_blog_post_featured_image_dimension'
	));

	$wp_customize->add_setting('vw_logistics_shipping_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_logistics_shipping_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'vw_logistics_shipping_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_logistics_shipping_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_logistics_shipping_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-logistics-shipping'),
            'Without Blocks' => __('Without Blocks','vw-logistics-shipping')
        ),
	) );

  $wp_customize->add_setting( 'vw_logistics_shipping_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_post_settings'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_logistics_shipping_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_featured_image_box_shadow', array(
		'label'       => esc_html__( ' post Image Box Shadow','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-logistics-shipping'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_post_settings',
    'choices' => array(
    		'Content' => esc_html__('Content','vw-logistics-shipping'),
        'Excerpt' => esc_html__('Excerpt','vw-logistics-shipping'),
        'No Content' => esc_html__('No Content','vw-logistics-shipping')
        ),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_post_settings',
		'type'=> 'text'
	));

  // Button Settings
	$wp_customize->add_section( 'vw_logistics_shipping_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_logistics_shipping_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'vw_logistics_shipping_Customize_partial_vw_logistics_shipping_button_text',
	));

  $wp_customize->add_setting('vw_logistics_shipping_button_text',array(
		'default'=> esc_html__('Read More','vw-logistics-shipping'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_logistics_shipping_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_font_size',array(
		'label'	=> __('Button Font Size','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-logistics-shipping' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_logistics_shipping_button_settings',
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','vw-logistics-shipping'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'vw-logistics-shipping' ),
        ),
		'section' => 'vw_logistics_shipping_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','vw-logistics-shipping'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'vw-logistics-shipping' ),
        ),
		'section' => 'vw_logistics_shipping_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-logistics-shipping' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_logistics_shipping_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_logistics_shipping_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-logistics-shipping'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-logistics-shipping'),
            'Capitalize' => __('Capitalize','vw-logistics-shipping'),
            'Lowercase' => __('Lowercase','vw-logistics-shipping'),
        ),
		'section'=> 'vw_logistics_shipping_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_logistics_shipping_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_logistics_shipping_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_logistics_shipping_Customize_partial_vw_logistics_shipping_related_post_title',
	));

  $wp_customize->add_setting( 'vw_logistics_shipping_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_post',array(
		'label' => esc_html__( 'Related Post','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Related Post', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_related_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_logistics_shipping_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => esc_html__( '3', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_logistics_shipping_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_related_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_related_postdate_icon',array(
    'default' => 'fas fa-calendar-alt',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_related_postdate_icon',array(
    'label' => __('Add Post Date Icon','vw-logistics-shipping'),
    'transport' => 'refresh',
    'section' => 'vw_logistics_shipping_related_posts_settings',
    'setting' => 'vw_logistics_shipping_related_postdate_icon',
    'type'    => 'icon'
  )));

	$wp_customize->add_setting( 'vw_logistics_shipping_related_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_related_author_icon',array(
    'default' => 'fas fa-user',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_related_author_icon',array(
    'label' => __('Add Author Icon','vw-logistics-shipping'),
    'transport' => 'refresh',
    'section' => 'vw_logistics_shipping_related_posts_settings',
    'setting' => 'vw_logistics_shipping_related_author_icon',
    'type'    => 'icon'
  )));

	$wp_customize->add_setting( 'vw_logistics_shipping_related_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_related_comments_icon',array(
    'default' => 'fa fa-comments',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_related_comments_icon',array(
    'label' => __('Add Comments Icon','vw-logistics-shipping'),
    'transport' => 'refresh',
    'section' => 'vw_logistics_shipping_related_posts_settings',
    'setting' => 'vw_logistics_shipping_related_comments_icon',
    'type'    => 'icon'
  )));

	$wp_customize->add_setting( 'vw_logistics_shipping_related_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_logistics_shipping_related_time_icon',array(
    'default' => 'fas fa-clock',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_related_time_icon',array(
    'label' => __('Add Time Icon','vw-logistics-shipping'),
    'transport' => 'refresh',
    'section' => 'vw_logistics_shipping_related_posts_settings',
    'setting' => 'vw_logistics_shipping_related_time_icon',
    'type'    => 'icon'
  )));
  
	$wp_customize->add_setting( 'vw_logistics_shipping_related_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_related_posts_settings'
  )));

  $wp_customize->add_setting( 'vw_logistics_shipping_related_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_related_image_box_shadow', array(
		'label'       => esc_html__( 'Related post Image Box Shadow','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_related_posts_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  $wp_customize->add_setting('vw_logistics_shipping_related_button_text',array(
		'default'=> esc_html__('Read More','vw-logistics-shipping'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-logistics-shipping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_related_posts_settings',
		'type'=> 'text'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_logistics_shipping_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_logistics_shipping_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_single_blog_settings',
		'setting'	=> 'vw_logistics_shipping_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	) );
	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_postdate',array(
    'label' => esc_html__( 'Show / Hide Date','vw-logistics-shipping' ),
   	'section' => 'vw_logistics_shipping_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_single_blog_settings',
		'setting'	=> 'vw_logistics_shipping_single_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	) );
	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_author',array(
    'label' => esc_html__( 'Show / Hide Author','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_single_blog_settings'
	)));

 	$wp_customize->add_setting('vw_logistics_shipping_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_single_blog_settings',
		'setting'	=> 'vw_logistics_shipping_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_single_comments',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	) );
	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_comments',array(
    'label' => esc_html__( 'Show / Hide Comments','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_single_blog_settings'
	)));

  $wp_customize->add_setting('vw_logistics_shipping_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_single_blog_settings',
		'setting'	=> 'vw_logistics_shipping_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_single_time',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	) );

	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_time',array(
    'label' => esc_html__( 'Show / Hide Time','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
    $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_single_blog_settings'
  )));

   // Single Posts Category
  $wp_customize->add_setting( 'vw_logistics_shipping_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
    ) );
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_single_blog_settings'
    )));

  $wp_customize->add_setting( 'vw_logistics_shipping_single_blog_post_navigation_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_blog_post_navigation_show_hide', array(
	  'label' => esc_html__( 'Show / Hide Post Navigation','vw-logistics-shipping' ),
	  'section' => 'vw_logistics_shipping_single_blog_settings'
  )));

  $wp_customize->add_setting( 'vw_logistics_shipping_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  $wp_customize->add_setting('vw_logistics_shipping_meta_field_single_separator',array(
    'default'=> '|',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_logistics_shipping_meta_field_single_separator',array(
    'label' => __('Add Meta Separator','vw-logistics-shipping'),
    'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-logistics-shipping'),
    'section'=> 'vw_logistics_shipping_single_blog_settings',
    'type'=> 'text'
  ));

	//navigation text
	$wp_customize->add_setting('vw_logistics_shipping_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-logistics-shipping'),
		'input_attrs' => array(
    'placeholder' => __( 'PREVIOUS', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-logistics-shipping'),
		'input_attrs' => array(
    'placeholder' => __( 'NEXT', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_logistics_shipping_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-logistics-shipping'),
		'input_attrs' => array(
    'placeholder' => __( 'Leave a Reply', 'vw-logistics-shipping' ),
    	),
		'section'=> 'vw_logistics_shipping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_logistics_shipping_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-logistics-shipping'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-logistics-shipping'),
		'description'	=> __('Enter a value in %. Example:50%','vw-logistics-shipping'),
		'input_attrs' => array(
    'placeholder' => __( '100%', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_single_blog_settings',
		'type'=> 'text'
	));

   // Grid layout setting
	$wp_customize->add_section( 'vw_logistics_shipping_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_logistics_shipping_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_logistics_shipping_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_grid_layout_settings',
		'setting'	=> 'vw_logistics_shipping_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_grid_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_grid_layout_settings'
   )));

	$wp_customize->add_setting('vw_logistics_shipping_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_grid_layout_settings',
		'setting'	=> 'vw_logistics_shipping_grid_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_logistics_shipping_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
    ) );
  $wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_grid_layout_settings'
  )));

 	$wp_customize->add_setting('vw_logistics_shipping_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_logistics_shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_grid_layout_settings',
		'setting'	=> 'vw_logistics_shipping_grid_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	) );
	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_grid_layout_settings'
	)));

	$wp_customize->add_setting( 'vw_logistics_shipping_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	));
  	$wp_customize->add_control( new vw_logistics_shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_grid_layout_settings'
  	)));

	$wp_customize->add_setting('vw_logistics_shipping_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-logistics-shipping'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-logistics-shipping'),
		'section'=> 'vw_logistics_shipping_grid_layout_settings',
		'type'=> 'text'
	));

	 $wp_customize->add_setting( 'vw_logistics_shipping_grid_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_grid_layout_settings',
		'type'        => 'range',
		'settings'    => 'vw_logistics_shipping_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

  $wp_customize->add_setting('vw_logistics_shipping_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-logistics-shipping'),
      'Without Blocks' => __('Without Blocks','vw-logistics-shipping')
    ),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-logistics-shipping'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'vw-logistics-shipping' ),
      ),
		'section'=> 'vw_logistics_shipping_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_grid_layout_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_logistics_shipping_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-logistics-shipping'),
            'Excerpt' => esc_html__('Excerpt','vw-logistics-shipping'),
            'No Content' => esc_html__('No Content','vw-logistics-shipping')
        ),
	) );

    $wp_customize->add_setting( 'vw_logistics_shipping_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );


	//Other
	$wp_customize->add_panel( 'vw_logistics_shipping_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'vw-logistics-shipping' ),
		'panel' => 'vw_logistics_shipping_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_logistics_shipping_left_right', array(
  	'title' => esc_html__('General Settings', 'vw-logistics-shipping'),
		'panel' => 'vw_logistics_shipping_other_parent_panel'
	) );

	$wp_customize->add_setting('vw_logistics_shipping_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Logistics_Shipping_Image_Radio_Control($wp_customize, 'vw_logistics_shipping_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','vw-logistics-shipping'),
    'description' => esc_html__('Here you can change the width layout of Website.','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('vw_logistics_shipping_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_page_layout',array(
    'type' => 'select',
    'label' => esc_html__('Page Sidebar Layout','vw-logistics-shipping'),
    'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_left_right',
    'choices' => array(
        'Left_Sidebar' => esc_html__('Left Sidebar','vw-logistics-shipping'),
        'Right_Sidebar' => esc_html__('Right Sidebar','vw-logistics-shipping'),
        'One_Column' => esc_html__('One Column','vw-logistics-shipping')
    ),
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_single_page_breadcrumb1',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_single_page_breadcrumb1',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_left_right'
    )));

  // Pre-Loader
	$wp_customize->add_setting( 'vw_logistics_shipping_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_loader_enable',array(
    'label' => esc_html__( 'Pre-Loader','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_left_right'
  )));

	$wp_customize->add_setting('vw_logistics_shipping_preloader_bg_color', array(
		'default'           => '#FF8800',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_left_right',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_left_right',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_bradcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_bradcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Bradcrumbs Alignment','vw-logistics-shipping'),
        'section' => 'vw_logistics_shipping_left_right',
        'choices' => array(
            'Left' => __('Left','vw-logistics-shipping'),
            'Right' => __('Right','vw-logistics-shipping'),
            'Center' => __('Center','vw-logistics-shipping'),
        ),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_logistics_shipping_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-logistics-shipping'),
		'panel' => 'vw_logistics_shipping_other_parent_panel',
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_responsive_topbar_hide',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_responsive_topbar_hide',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-logistics-shipping' ),
      'section' => 'vw_logistics_shipping_responsive_media'
    )));

  $wp_customize->add_setting( 'vw_logistics_shipping_resp_slider_hide_show',array(
  	'default' => 1,
   	'transport' => 'refresh',
  	'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_resp_slider_hide_show',array(
  	'label' => esc_html__( 'Show / Hide Slider','vw-logistics-shipping' ),
  	'section' => 'vw_logistics_shipping_responsive_media'
  )));

  $wp_customize->add_setting( 'vw_logistics_shipping_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-logistics-shipping' ),
      'section' => 'vw_logistics_shipping_responsive_media'
    )));
  
	$wp_customize->add_setting( 'vw_logistics_shipping_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_resp_scroll_top_hide_show',array(
  	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-logistics-shipping' ),
  	'section' => 'vw_logistics_shipping_responsive_media'
  )));

	$wp_customize->add_setting( 'vw_logistics_shipping_responsive_preloader_hide',array(
	    'default' => false,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_responsive_preloader_hide',array(
	    'label' => esc_html__( 'Show / Hide Preloader','vw-logistics-shipping' ),
	    'section' => 'vw_logistics_shipping_responsive_media'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#FF8800',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_logistics_shipping_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-logistics-shipping'),
		'section'  => 'vw_logistics_shipping_responsive_media',
	)));

	$wp_customize->add_setting('vw_logistics_shipping_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Logistics_Shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_responsive_media',
		'setting'	=> 'vw_logistics_shipping_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_logistics_shipping_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Logistics_Shipping_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_logistics_shipping_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-logistics-shipping'),
		'transport' => 'refresh',
		'section'	=> 'vw_logistics_shipping_responsive_media',
		'setting'	=> 'vw_logistics_shipping_res_close_menu_icon',
		'type'		=> 'icon'
	)));

   //Woocommerce settings
	$wp_customize->add_section('vw_logistics_shipping_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-logistics-shipping'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_logistics_shipping_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_logistics_shipping_customize_partial_vw_logistics_shipping_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_logistics_shipping_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_woocommerce_section'
  )));

   $wp_customize->add_setting('vw_logistics_shipping_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-logistics-shipping'),
        'Right Sidebar' => __('Right Sidebar','vw-logistics-shipping'),
    ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_logistics_shipping_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_logistics_shipping_customize_partial_vw_logistics_shipping_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_logistics_shipping_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
   ) );
 	$wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-logistics-shipping' ),
		'section' => 'vw_logistics_shipping_woocommerce_section'
  )));

   $wp_customize->add_setting('vw_logistics_shipping_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-logistics-shipping'),
        'Right Sidebar' => __('Right Sidebar','vw-logistics-shipping'),
    ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_logistics_shipping_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_float'
	));
	$wp_customize->add_control('vw_logistics_shipping_products_per_page',array(
		'label'	=> __('Products Per Page','vw-logistics-shipping'),
		'description' => __('Display on shop page','vw-logistics-shipping'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_logistics_shipping_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_products_per_row',array(
		'label'	=> __('Products Per Row','vw-logistics-shipping'),
		'description' => __('Display on shop page','vw-logistics-shipping'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_logistics_shipping_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_logistics_shipping_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_logistics_shipping_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_logistics_shipping_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('vw_logistics_shipping_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'vw_logistics_shipping_sanitize_choices'
	));
	$wp_customize->add_control('vw_logistics_shipping_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','vw-logistics-shipping'),
    'section' => 'vw_logistics_shipping_woocommerce_section',
    'choices' => array(
        'left' => __('Left','vw-logistics-shipping'),
        'right' => __('Right','vw-logistics-shipping'),
    ),
	) );

	$wp_customize->add_setting('vw_logistics_shipping_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_logistics_shipping_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_logistics_shipping_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-logistics-shipping'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-logistics-shipping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-logistics-shipping' ),
        ),
		'section'=> 'vw_logistics_shipping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_logistics_shipping_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_logistics_shipping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_logistics_shipping_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-logistics-shipping' ),
		'section'     => 'vw_logistics_shipping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Related Product
  $wp_customize->add_setting( 'vw_logistics_shipping_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_logistics_shipping_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Logistics_Shipping_Toggle_Switch_Custom_Control( $wp_customize, 'vw_logistics_shipping_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related product','vw-logistics-shipping' ),
    'section' => 'vw_logistics_shipping_woocommerce_section'
  )));


}

add_action( 'customize_register', 'vw_logistics_shipping_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Logistics_Shipping_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Logistics_Shipping_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Logistics_Shipping_Customize_Section_Pro( $manager,'vw_logistics_shipping_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'LOGISTICS SHIPPING PRO', 'vw-logistics-shipping' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-logistics-shipping' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/shipping-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section(new VW_Logistics_Shipping_Customize_Section_Pro($manager,'vw_logistics_shipping_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-logistics-shipping' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-logistics-shipping' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-logistics-shipping/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-logistics-shipping-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-logistics-shipping-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Logistics_Shipping_Customize::get_instance();
