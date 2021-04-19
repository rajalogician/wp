<?php
/**
 * VW Transport Cargo Theme Customizer
 *
 * @package VW Transport Cargo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_transport_cargo_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_transport_cargo_custom_controls' );

function vw_transport_cargo_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/content-creation/class-customizer-content-creation.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_transport_cargo_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_transport_cargo_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWTransportCargoParentPanel = new VW_Transport_Cargo_WP_Customize_Panel( $wp_customize, 'vw_transport_cargo_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_transport_cargo_left_right', array(
    	'title'      => __( 'General Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_width_option',array(
        'default' => __('Full Width','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-transport-cargo'),
        'description' => __('Here you can change the width layout of Website.','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_transport_cargo_theme_options',array(
        'default' => __('Right Sidebar','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_transport_cargo_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-transport-cargo'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
            'One Column' => __('One Column','vw-transport-cargo'),
            'Three Columns' => __('Three Columns','vw-transport-cargo'),
            'Four Columns' => __('Four Columns','vw-transport-cargo'),
            'Grid Layout' => __('Grid Layout','vw-transport-cargo')
        ),
	));

	$wp_customize->add_setting('vw_transport_cargo_page_layout',array(
        'default' => __('One Column','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-transport-cargo'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
            'One Column' => __('One Column','vw-transport-cargo')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_transport_cargo_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_transport_cargo_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_transport_cargo_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_left_right'
    )));

	$wp_customize->add_setting('vw_transport_cargo_loader_icon',array(
        'default' => __('Two Way','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-transport-cargo'),
            'Dots' => __('Dots','vw-transport-cargo'),
            'Rotate' => __('Rotate','vw-transport-cargo')
        ),
	) );
	
	//Topbar
	$wp_customize->add_section( 'vw_transport_cargo_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

    //Sticky Header
	$wp_customize->add_setting( 'vw_transport_cargo_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_topbar'
    )));

    $wp_customize->add_setting('vw_transport_cargo_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_transport_cargo_search_hide_show',
       array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_topbar'
    )));

    $wp_customize->add_setting('vw_transport_cargo_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_search_font_size',array(
		'label'	=> __('Search Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_search_border_radius', array(
		'default'              => "",
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_button_text', array( 
		'selector' => '.top-btn a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_button_text', 
	));

	$wp_customize->add_setting('vw_transport_cargo_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'REQUEST A QUOTE', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));		

	$wp_customize->add_setting('vw_transport_cargo_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_transport_cargo_button_url',array(
		'label'	=> __('Add Button URL','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'url'
	));	
    
	//Slider
	$wp_customize->add_section( 'vw_transport_cargo_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting( 'vw_transport_cargo_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_transport_cargo_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_transport_cargo_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_transport_cargo_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_transport_cargo_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-transport-cargo' ),
			'description' => __('Slider image size (1500 x 590)','vw-transport-cargo'),
			'section'  => 'vw_transport_cargo_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_transport_cargo_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_slidersettings',
		'setting'	=> 'vw_transport_cargo_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_transport_cargo_slider_content_option',array(
        'default' => __('Center','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_transport_cargo_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_transport_cargo_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_transport_cargo_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-transport-cargo' ),
	'section'     => 'vw_transport_cargo_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_transport_cargo_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-transport-cargo'),
      '0.1' =>  esc_attr('0.1','vw-transport-cargo'),
      '0.2' =>  esc_attr('0.2','vw-transport-cargo'),
      '0.3' =>  esc_attr('0.3','vw-transport-cargo'),
      '0.4' =>  esc_attr('0.4','vw-transport-cargo'),
      '0.5' =>  esc_attr('0.5','vw-transport-cargo'),
      '0.6' =>  esc_attr('0.6','vw-transport-cargo'),
      '0.7' =>  esc_attr('0.7','vw-transport-cargo'),
      '0.8' =>  esc_attr('0.8','vw-transport-cargo'),
      '0.9' =>  esc_attr('0.9','vw-transport-cargo')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_transport_cargo_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_slider_height',array(
		'label'	=> __('Slider Height','vw-transport-cargo'),
		'description'	=> __('Specify the slider height (px).','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_slidersettings',
		'type'=> 'text'
	));

	//Contact Us
	$wp_customize->add_section( 'vw_transport_cargo_contact_section' , array(
    	'title'      => __( 'Contact us Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_call_text', array( 
		'selector' => '#contact_us p', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_call_text',
	));


	$wp_customize->add_setting('vw_transport_cargo_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_phone_number_icon',array(
		'label'	=> __('Add Phone Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_contact_section',
		'setting'	=> 'vw_transport_cargo_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_call_text',array(
		'label'	=> __('Add Phone Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Call us', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_transport_cargo_call',array(
		'label'	=> __('Add Phone Number','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '+123-7896-123', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_email_adres_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_email_adres_icon',array(
		'label'	=> __('Add Email Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_contact_section',
		'setting'	=> 'vw_transport_cargo_email_adres_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_email_text',array(
		'label'	=> __('Add Email Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Drop us Email', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_transport_cargo_sanitize_email'
	));	
	$wp_customize->add_control('vw_transport_cargo_email',array(
		'label'	=> __('Add Email Address','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'transport@gmail.com', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_timings_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_timings_icon',array(
		'label'	=> __('Add Timing Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_contact_section',
		'setting'	=> 'vw_transport_cargo_timings_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_time_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_time_text',array(
		'label'	=> __('Add Time Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Timming', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_time',array(
		'label'	=> __('Add Opening Time','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00am - 9:00pm', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	//About
	$wp_customize->add_section( 'vw_transport_cargo_about_section' , array(
    	'title'      => __( 'About Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_about_page', array( 
		'selector' => '#about h2 a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_about_page',
	));

	$wp_customize->add_setting( 'vw_transport_cargo_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_transport_cargo_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_about_page', array(
		'label'    => __( 'About Page', 'vw-transport-cargo' ),
		'section'  => 'vw_transport_cargo_about_section',
		'type'     => 'dropdown-pages'
	) );

	//About excerpt
	$wp_customize->add_setting( 'vw_transport_cargo_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_about_section',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Services
	$wp_customize->add_section( 'vw_transport_cargo_service_section' , array(
    	'title'      => __( 'Services Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_transport_cargo_services', array( 
		'selector' => '#service-sec h3 a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_services',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_transport_cargo_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_transport_cargo_sanitize_choices',
	));
	$wp_customize->add_control('vw_transport_cargo_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-transport-cargo'),
		'description' => __('Image Size (50 x 45)','vw-transport-cargo'),
		'section' => 'vw_transport_cargo_service_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_transport_cargo_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_service_section',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWTransportCargoParentPanel );

	$BlogPostParentPanel = new VW_Transport_Cargo_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-transport-cargo' ),
		'panel' => 'vw_transport_cargo_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_transport_cargo_post_settings', array(
		'title' => __( 'Post Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_transport_cargo_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-transport-cargo' ),
        'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_author',array(
		'label' => esc_html__( 'Author','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_transport_cargo_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_transport_cargo_blog_layout_option',array(
        'default' => __('Default','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_transport_cargo_excerpt_settings',array(
        'default' => __('Excerpt','vw-transport-cargo'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control('vw_transport_cargo_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-transport-cargo'),
            'Excerpt' => __('Excerpt','vw-transport-cargo'),
            'No Content' => __('No Content','vw-transport-cargo')
        ),
	) );

	$wp_customize->add_setting('vw_transport_cargo_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'vw_transport_cargo_button_settings', array(
		'title' => __( 'Button Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_transport_cargo_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_blog_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_blog_button_text', 
	));

    $wp_customize->add_setting('vw_transport_cargo_blog_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_blog_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_button_settings',
		'setting'	=> 'vw_transport_cargo_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_transport_cargo_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-transport-cargo' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_transport_cargo_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_related_post',array(
		'label' => esc_html__( 'Related Post','vw-transport-cargo' ),
		'section' => 'vw_transport_cargo_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_transport_cargo_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_transport_cargo_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_transport_cargo_404_page',array(
		'title'	=> __('404 Page Settings','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_panel_id',
	));	

	$wp_customize->add_setting('vw_transport_cargo_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_404_page_title',array(
		'label'	=> __('Add Title','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_transport_cargo_404_page_content',array(
		'label'	=> __('Add Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_404_page',
		'setting'	=> 'vw_transport_cargo_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_transport_cargo_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_panel_id',
	));	

	$wp_customize->add_setting('vw_transport_cargo_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_width',array(
		'label'	=> __('Icon Width','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_social_icon_height',array(
		'label'	=> __('Icon Height','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_social_icon_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_transport_cargo_responsive_media',array(
		'title'	=> __('Responsive Media','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_panel_id',
	));

    $wp_customize->add_setting( 'vw_transport_cargo_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_transport_cargo_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
	)));

    $wp_customize->add_setting( 'vw_transport_cargo_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_transport_cargo_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-transport-cargo' ),
      'section' => 'vw_transport_cargo_responsive_media'
    )));

    $wp_customize->add_setting('vw_transport_cargo_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_responsive_media',
		'setting'	=> 'vw_transport_cargo_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_responsive_media',
		'setting'	=> 'vw_transport_cargo_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_transport_cargo_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-transport-cargo' ),
		'priority' => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Transport_Cargo_Content_Creation( $wp_customize, 'vw_transport_cargo_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-transport-cargo' ),
		),
		'section' => 'vw_transport_cargo_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-transport-cargo' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_transport_cargo_footer',array(
		'title'	=> __('Footer','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_footer_text', 
	));
	
	$wp_customize->add_setting('vw_transport_cargo_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_footer_text',array(
		'label'	=> __('Copyright Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_transport_cargo_copyright_alingment',array(
        'default' => __('center','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer',
        'settings' => 'vw_transport_cargo_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_transport_cargo_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_transport_cargo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Transport_Cargo_Toggle_Switch_Custom_Control( $wp_customize, 'vw_transport_cargo_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-transport-cargo' ),
      	'section' => 'vw_transport_cargo_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_transport_cargo_scroll_t_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_transport_cargo_customize_partial_vw_transport_cargo_scroll_t_top_icon', 
	));

    $wp_customize->add_setting('vw_transport_cargo_scroll_t_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Transport_Cargo_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_transport_cargo_scroll_t_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-transport-cargo'),
		'transport' => 'refresh',
		'section'	=> 'vw_transport_cargo_footer',
		'setting'	=> 'vw_transport_cargo_scroll_t_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_transport_cargo_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-transport-cargo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_transport_cargo_scroll_to_top_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_transport_cargo_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-transport-cargo' ),
		'section'     => 'vw_transport_cargo_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_transport_cargo_scroll_top_alignment',array(
        'default' => __('Right','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Transport_Cargo_Image_Radio_Control($wp_customize, 'vw_transport_cargo_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_footer',
        'settings' => 'vw_transport_cargo_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Transport_Cargo_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Transport_Cargo_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_transport_cargo_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Transport_Cargo_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_transport_cargo_panel';
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
  	class VW_Transport_Cargo_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_transport_cargo_section';
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

// Enqueue our scripts and styles
function vw_transport_cargo_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_transport_cargo_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Transport_Cargo_Customize {

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
		$manager->register_section_type( 'VW_Transport_Cargo_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Transport_Cargo_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Transport Cargo', 'vw-transport-cargo' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-transport-cargo' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/transport-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Transport_Cargo_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-transport-cargo' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-transport-cargo' ),
			'pro_url'  => admin_url('themes.php?page=vw_transport_cargo_guide'),
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

		wp_enqueue_script( 'vw-transport-cargo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-transport-cargo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Transport_Cargo_Customize::get_instance();