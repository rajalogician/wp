<?php
/**
 * VW Cleaning Company Theme Customizer
 *
 * @package VW Cleaning Company
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_cleaning_company_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_cleaning_company_custom_controls' );

function vw_cleaning_company_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_cleaning_company_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_cleaning_company_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWCleaningCompanyParentPanel = new VW_Cleaning_Company_WP_Customize_Panel( $wp_customize, 'vw_cleaning_company_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'VW Settings', 'vw-cleaning-company' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_cleaning_company_left_right', array(
    	'title'      => __( 'General Settings', 'vw-cleaning-company' ),
		'panel' => 'vw_cleaning_company_panel_id'
	) );

	$wp_customize->add_setting('vw_cleaning_company_width_option',array(
        'default' => __('Full Width','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Cleaning_Company_Image_Radio_Control($wp_customize, 'vw_cleaning_company_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-cleaning-company'),
        'description' => __('Here you can change the width layout of Website.','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_cleaning_company_theme_options',array(
        'default' => __('Right Sidebar','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control('vw_cleaning_company_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-cleaning-company'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-cleaning-company'),
            'Right Sidebar' => __('Right Sidebar','vw-cleaning-company'),
            'One Column' => __('One Column','vw-cleaning-company'),
            'Three Columns' => __('Three Columns','vw-cleaning-company'),
            'Four Columns' => __('Four Columns','vw-cleaning-company'),
            'Grid Layout' => __('Grid Layout','vw-cleaning-company')
        ),
	) );

	$wp_customize->add_setting('vw_cleaning_company_page_layout',array(
        'default' => __('One Column','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control('vw_cleaning_company_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-cleaning-company'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-cleaning-company'),
            'Right Sidebar' => __('Right Sidebar','vw-cleaning-company'),
            'One Column' => __('One Column','vw-cleaning-company')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_cleaning_company_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-cleaning-company' ),
		'section' => 'vw_cleaning_company_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_cleaning_company_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-cleaning-company' ),
		'section' => 'vw_cleaning_company_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_cleaning_company_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-cleaning-company' ),
        'section' => 'vw_cleaning_company_left_right'
    )));

	$wp_customize->add_setting('vw_cleaning_company_loader_icon',array(
        'default' => __('Two Way','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control('vw_cleaning_company_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-cleaning-company'),
            'Dots' => __('Dots','vw-cleaning-company'),
            'Rotate' => __('Rotate','vw-cleaning-company')
        ),
	) );

	//Top Bar
	$wp_customize->add_section( 'vw_cleaning_company_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'vw-cleaning-company' ),
		'panel' => 'vw_cleaning_company_panel_id'
	) );

	$wp_customize->add_setting( 'vw_cleaning_company_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_topbar'
    )));

    $wp_customize->add_setting('vw_cleaning_company_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_cleaning_company_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-cleaning-company' ),
        'section' => 'vw_cleaning_company_topbar'
    )));

    $wp_customize->add_setting('vw_cleaning_company_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_cleaning_company_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','vw-cleaning-company' ),
      	'section' => 'vw_cleaning_company_topbar'
    )));

    $wp_customize->add_setting('vw_cleaning_company_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_search_font_size',array(
		'label'	=> __('Search Font Size','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_cleaning_company_search_border_radius', array(
		'default'              => "",
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_cleaning_company_location_text', array( 
		'selector' => '.top-bar span', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_location_text', 
	));

    $wp_customize->add_setting('vw_cleaning_company_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_location_icon',array(
		'label'	=> __('Add Location Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_topbar',
		'setting'	=> 'vw_cleaning_company_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_cleaning_company_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_location_text',array(
		'label'	=> __('Add Location Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'ADDRESS', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_location',array(
		'label'	=> __('Add Location','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '123 Dunmmy street lorem ipsum, USA', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_email_icon',array(
		'label'	=> __('Add Email Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_topbar',
		'setting'	=> 'vw_cleaning_company_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_cleaning_company_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_email_text',array(
		'label'	=> __('Add Email Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'MAIL', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_cleaning_company_sanitize_email'
	));
	$wp_customize->add_control('vw_cleaning_company_email',array(
		'label'	=> __('Add Email Address','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_call_icon',array(
		'label'	=> __('Add Phone No. Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_topbar',
		'setting'	=> 'vw_cleaning_company_call_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_cleaning_company_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_call_text',array(
		'label'	=> __('Add Phone Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_cleaning_company_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_cleaning_company_call',array(
		'label'	=> __('Add Phone Number','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1234 567 890', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_appointment_button_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_appointment_button_icon',array(
		'label'	=> __('Add Button Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_topbar',
		'setting'	=> 'vw_cleaning_company_appointment_button_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_cleaning_company_top_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_top_btn_text',array(
		'label'	=> __('Add Button Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'BOOK AN APPOINTMENT', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_top_btn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_cleaning_company_top_btn_url',array(
		'label'	=> __('Add Button URL','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'https://example.com/', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_topbar',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_cleaning_company_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-cleaning-company' ),
		'panel' => 'vw_cleaning_company_panel_id'
	) );

	$wp_customize->add_setting( 'vw_cleaning_company_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-cleaning-company' ),
      	'section' => 'vw_cleaning_company_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_cleaning_company_slider_arrows',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_slider_arrows',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_cleaning_company_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_cleaning_company_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_cleaning_company_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-cleaning-company' ),
			'description' => __('Slider image size (1600 x 600)','vw-cleaning-company'),
			'section'  => 'vw_cleaning_company_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_cleaning_company_slider_btn_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_slider_btn_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_slidersettings',
		'setting'	=> 'vw_cleaning_company_slider_btn_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_cleaning_company_slider_content_option',array(
        'default' => __('Left','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Cleaning_Company_Image_Radio_Control($wp_customize, 'vw_cleaning_company_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_cleaning_company_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_cleaning_company_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_cleaning_company_slider_opacity_color',array(
      'default'              => 0.4,
      'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_cleaning_company_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-cleaning-company' ),
	'section'     => 'vw_cleaning_company_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_cleaning_company_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-cleaning-company'),
      '0.1' =>  esc_attr('0.1','vw-cleaning-company'),
      '0.2' =>  esc_attr('0.2','vw-cleaning-company'),
      '0.3' =>  esc_attr('0.3','vw-cleaning-company'),
      '0.4' =>  esc_attr('0.4','vw-cleaning-company'),
      '0.5' =>  esc_attr('0.5','vw-cleaning-company'),
      '0.6' =>  esc_attr('0.6','vw-cleaning-company'),
      '0.7' =>  esc_attr('0.7','vw-cleaning-company'),
      '0.8' =>  esc_attr('0.8','vw-cleaning-company'),
      '0.9' =>  esc_attr('0.9','vw-cleaning-company')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_cleaning_company_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_slider_height',array(
		'label'	=> __('Slider Height','vw-cleaning-company'),
		'description'	=> __('Specify the slider height (px).','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_slidersettings',
		'type'=> 'text'
	));
 
	//Services
	$wp_customize->add_section('vw_cleaning_company_services',array(
		'title'	=> __('Services Section','vw-cleaning-company'),
		'panel' => 'vw_cleaning_company_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_cleaning_company_services_post1', array( 
		'selector' => '.service-sec h2 a', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_services_post1',
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_cleaning_company_services_post1',array(
		'sanitize_callback' => 'vw_cleaning_company_sanitize_choices',
	));
	$wp_customize->add_control('vw_cleaning_company_services_post1',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-cleaning-company'),
		'section' => 'vw_cleaning_company_services',
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_cleaning_company_services_post2',array(
		'sanitize_callback' => 'vw_cleaning_company_sanitize_choices',
	));
	$wp_customize->add_control('vw_cleaning_company_services_post2',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-cleaning-company'),
		'section' => 'vw_cleaning_company_services',
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_cleaning_company_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_cleaning_company_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','vw-cleaning-company'),
		'description'=> __('Size of image should be 80 x 80 ','vw-cleaning-company'),
		'section' => 'vw_cleaning_company_services',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_cleaning_company_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt Length','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_services',
		'type'        => 'range',
		'settings'    => 'vw_cleaning_company_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWCleaningCompanyParentPanel );

	$BlogPostParentPanel = new VW_Cleaning_Company_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-cleaning-company' ),
		'panel' => 'vw_cleaning_company_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	$wp_customize->add_section('vw_cleaning_company_post_settings',array(
		'title'	=> __('Post Settings','vw-cleaning-company'),
		'panel' => 'blog_post_parent_panel',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_cleaning_company_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_cleaning_company_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-cleaning-company' ),
        'section' => 'vw_cleaning_company_post_settings'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_toggle_author',array(
		'label' => esc_html__( 'Author','vw-cleaning-company' ),
		'section' => 'vw_cleaning_company_post_settings'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-cleaning-company' ),
		'section' => 'vw_cleaning_company_post_settings'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-cleaning-company' ),
		'section' => 'vw_cleaning_company_post_settings'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_cleaning_company_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_cleaning_company_blog_layout_option',array(
        'default' => __('Default','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Cleaning_Company_Image_Radio_Control($wp_customize, 'vw_cleaning_company_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_cleaning_company_excerpt_settings',array(
        'default' => __('Excerpt','vw-cleaning-company'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control('vw_cleaning_company_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-cleaning-company'),
            'Excerpt' => __('Excerpt','vw-cleaning-company'),
            'No Content' => __('No Content','vw-cleaning-company')
        ),
	) );

	$wp_customize->add_setting('vw_cleaning_company_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_post_settings',
		'type'=> 'text'
	));

	// Button Settings
	$wp_customize->add_section( 'vw_cleaning_company_button_settings', array(
		'title' => esc_html__( 'Button Settings','vw-cleaning-company'),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_cleaning_company_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_cleaning_company_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_cleaning_company_blog_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_button_settings',
		'setting'	=> 'vw_cleaning_company_blog_button_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_cleaning_company_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_button_text', 
	));

    $wp_customize->add_setting('vw_cleaning_company_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_button_text',array(
		'label'	=> __('Add Button Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_cleaning_company_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-cleaning-company' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_cleaning_company_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_cleaning_company_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_related_post',array(
		'label' => esc_html__( 'Related Post','vw-cleaning-company' ),
		'section' => 'vw_cleaning_company_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_cleaning_company_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_cleaning_company_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_cleaning_company_404_page',array(
		'title'	=> __('404 Page Settings','vw-cleaning-company'),
		'panel' => 'vw_cleaning_company_panel_id',
	));	

	$wp_customize->add_setting('vw_cleaning_company_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_cleaning_company_404_page_title',array(
		'label'	=> __('Add Title','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_cleaning_company_404_page_content',array(
		'label'	=> __('Add Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_404_page_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_404_page',
		'setting'	=> 'vw_cleaning_company_404_page_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_cleaning_company_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_cleaning_company_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-cleaning-company'),
		'panel' => 'vw_cleaning_company_panel_id',
	));	

	$wp_customize->add_setting('vw_cleaning_company_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_social_icon_width',array(
		'label'	=> __('Icon Width','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_social_icon_height',array(
		'label'	=> __('Icon Height','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_cleaning_company_social_icon_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_cleaning_company_responsive_media',array(
		'title'	=> __('Responsive Media','vw-cleaning-company'),
		'panel' => 'vw_cleaning_company_panel_id',
	));

	$wp_customize->add_setting( 'vw_cleaning_company_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_cleaning_company_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_cleaning_company_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-cleaning-company' ),
      'section' => 'vw_cleaning_company_responsive_media'
    )));

    $wp_customize->add_setting('vw_cleaning_company_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_responsive_media',
		'setting'	=> 'vw_cleaning_company_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_cleaning_company_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_responsive_media',
		'setting'	=> 'vw_cleaning_company_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_cleaning_company_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-cleaning-company' ),
		'priority' => null,
		'panel' => 'vw_cleaning_company_panel_id'
	) );

	$wp_customize->add_setting('vw_cleaning_company_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Cleaning_Company_Content_Creation( $wp_customize, 'vw_cleaning_company_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-cleaning-company' ),
		),
		'section' => 'vw_cleaning_company_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-cleaning-company' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_cleaning_company_footer',array(
		'title'	=> __('Footer Settings','vw-cleaning-company'),
		'panel' => 'vw_cleaning_company_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_cleaning_company_footer_text', array( 
		'selector' => '#footer-2 .copyright p', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_footer_text', 
	));
	
	$wp_customize->add_setting('vw_cleaning_company_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_cleaning_company_footer_text',array(
		'label'	=> __('Copyright Text','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_cleaning_company_copyright_alingment',array(
        'default' => __('center','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Cleaning_Company_Image_Radio_Control($wp_customize, 'vw_cleaning_company_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_footer',
        'settings' => 'vw_cleaning_company_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_cleaning_company_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_cleaning_company_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_cleaning_company_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Cleaning_Company_Toggle_Switch_Custom_Control( $wp_customize, 'vw_cleaning_company_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-cleaning-company' ),
      	'section' => 'vw_cleaning_company_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_cleaning_company_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_cleaning_company_customize_partial_vw_cleaning_company_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_cleaning_company_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Cleaning_Company_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_cleaning_company_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-cleaning-company'),
		'transport' => 'refresh',
		'section'	=> 'vw_cleaning_company_footer',
		'setting'	=> 'vw_cleaning_company_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_cleaning_company_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_cleaning_company_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_cleaning_company_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-cleaning-company'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-cleaning-company'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-cleaning-company' ),
        ),
		'section'=> 'vw_cleaning_company_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_cleaning_company_scroll_to_top_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_cleaning_company_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-cleaning-company' ),
		'section'     => 'vw_cleaning_company_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_cleaning_company_scroll_top_alignment',array(
        'default' => __('Right','vw-cleaning-company'),
        'sanitize_callback' => 'vw_cleaning_company_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Cleaning_Company_Image_Radio_Control($wp_customize, 'vw_cleaning_company_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-cleaning-company'),
        'section' => 'vw_cleaning_company_footer',
        'settings' => 'vw_cleaning_company_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    // new Panel
	$wp_customize->register_panel_type( 'VW_Cleaning_Company_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Cleaning_Company_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_cleaning_company_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Cleaning_Company_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_cleaning_company_panel';
    	public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
 	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Cleaning_Company_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_cleaning_company_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Cleaning_Company_Customize {

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
		$manager->register_section_type( 'VW_Cleaning_Company_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Cleaning_Company_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Cleaning Company Pro', 'vw-cleaning-company' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-cleaning-company' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/cleaning-services-wordpress-theme/'),
		) )	);

		$manager->add_section(new VW_Cleaning_Company_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-cleaning-company' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-cleaning-company' ),
			'pro_url'  => admin_url('themes.php?page=vw_cleaning_company_guide'),
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

		wp_enqueue_script( 'vw-cleaning-company-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-cleaning-company-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Cleaning_Company_Customize::get_instance();