<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_transport_cargo_first_color = get_theme_mod('vw_transport_cargo_first_color');

	$vw_transport_cargo_custom_css = '';

	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.logo-inner, .main-header .custom-social-icons i:hover, .top-btn a:hover, .search-box i:hover, .view-more, #contact_us, input[type="submit"], .footer .tagcloud a:hover, .sidebar .custom-social-icons i, .footer .custom-social-icons i, .footer-2, .sidebar .tagcloud a:hover, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_html($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='#comments input[type="submit"].submit{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_html($vw_transport_cargo_first_color).'!important;';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.view-more:hover, .fa-angle-right:before, #about h3 span, #service-sec h4 span, .footer li a:hover, .post-main-box:hover h2, .main-navigation a:hover, #about h2 span, #service-sec h3 span{';
			$vw_transport_cargo_custom_css .='color: '.esc_html($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.view-more:hover{';
			$vw_transport_cargo_custom_css .='border-color: '.esc_html($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.post-info hr{';
			$vw_transport_cargo_custom_css .='border-top-color: '.esc_html($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_first_color != false){
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='border-bottom-color: '.esc_html($vw_transport_cargo_first_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	

	/*---------------------------Second highlight color-------------------*/

	$vw_transport_cargo_second_color = get_theme_mod('vw_transport_cargo_second_color');

	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='.home-page-header, #contact_us i, .scrollup i, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i:hover, #comments input[type="submit"].submit:hover, .sidebar input[type="submit"]:hover, .error-btn a:hover, .content-bttn a:hover, .footer input[type="submit"]:hover, .pagination .current, .pagination a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,#slider, .header-fixed, #comments a.comment-reply-link, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover{';
			$vw_transport_cargo_custom_css .='background-color: '.esc_html($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_transport_cargo_custom_css .='color: '.esc_html($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='#header, p.bold-font, .main-navigation ul ul{';
			$vw_transport_cargo_custom_css .='border-bottom-color: '.esc_html($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}
	if($vw_transport_cargo_second_color != false){
		$vw_transport_cargo_custom_css .='#header, .main-navigation ul ul{';
			$vw_transport_cargo_custom_css .='border-top-color: '.esc_html($vw_transport_cargo_second_color).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_width_option','Full Width');
    if($vw_transport_cargo_theme_lay == 'Boxed'){
		$vw_transport_cargo_custom_css .='body{';
			$vw_transport_cargo_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Wide Width'){
		$vw_transport_cargo_custom_css .='body{';
			$vw_transport_cargo_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Full Width'){
		$vw_transport_cargo_custom_css .='body{';
			$vw_transport_cargo_custom_css .='max-width: 100%;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_slider_opacity_color','0.5');
	if($vw_transport_cargo_theme_lay == '0'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.1'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.1';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.2'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.2';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.3'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.3';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.4'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.4';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.5'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.5';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.6'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.6';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.7'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.7';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.8'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.8';
		$vw_transport_cargo_custom_css .='}';
		}else if($vw_transport_cargo_theme_lay == '0.9'){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='opacity:0.9';
		$vw_transport_cargo_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_slider_content_option','Center');
    if($vw_transport_cargo_theme_lay == 'Left'){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_transport_cargo_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Center'){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_transport_cargo_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Right'){
		$vw_transport_cargo_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_transport_cargo_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_transport_cargo_slider_height = get_theme_mod('vw_transport_cargo_slider_height');
	if($vw_transport_cargo_slider_height != false){
		$vw_transport_cargo_custom_css .='#slider img{';
			$vw_transport_cargo_custom_css .='height: '.esc_html($vw_transport_cargo_slider_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_transport_cargo_slider = get_theme_mod('vw_transport_cargo_slider_hide_show');
	if($vw_transport_cargo_slider == false){
		$vw_transport_cargo_custom_css .='.page-template-custom-home-page #sec_second{';
			$vw_transport_cargo_custom_css .='padding: 0;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_blog_layout_option','Default');
    if($vw_transport_cargo_theme_lay == 'Default'){
		$vw_transport_cargo_custom_css .='.post-main-box{';
			$vw_transport_cargo_custom_css .='';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Center'){
		$vw_transport_cargo_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_transport_cargo_custom_css .='text-align:center;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.post-info{';
			$vw_transport_cargo_custom_css .='margin-top:10px;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.post-info hr{';
			$vw_transport_cargo_custom_css .='margin:15px auto;';
		$vw_transport_cargo_custom_css .='}';
	}else if($vw_transport_cargo_theme_lay == 'Left'){
		$vw_transport_cargo_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_transport_cargo_custom_css .='text-align:Left;';
		$vw_transport_cargo_custom_css .='}';
		$vw_transport_cargo_custom_css .='.post-main-box h2{';
			$vw_transport_cargo_custom_css .='margin-top:10px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_transport_cargo_resp_stickyheader = get_theme_mod( 'vw_transport_cargo_stickyheader_hide_show',false);
    if($vw_transport_cargo_resp_stickyheader == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_stickyheader == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_slider = get_theme_mod( 'vw_transport_cargo_resp_slider_hide_show',false);
    if($vw_transport_cargo_resp_slider == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='#slider{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_slider == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='#slider{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_metabox = get_theme_mod( 'vw_transport_cargo_metabox_hide_show',true);
    if($vw_transport_cargo_resp_metabox == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.post-info{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_metabox == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.post-info{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_sidebar = get_theme_mod( 'vw_transport_cargo_sidebar_hide_show',true);
    if($vw_transport_cargo_resp_sidebar == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.sidebar{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_sidebar == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.sidebar{';
			$vw_transport_cargo_custom_css .='display:none;';
		$vw_transport_cargo_custom_css .='} }';
	}

	$vw_transport_cargo_resp_scroll_top = get_theme_mod( 'vw_transport_cargo_resp_scroll_top_hide_show',true);
    if($vw_transport_cargo_resp_scroll_top == true){
    	$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='display:block;';
		$vw_transport_cargo_custom_css .='} }';
	}else if($vw_transport_cargo_resp_scroll_top == false){
		$vw_transport_cargo_custom_css .='@media screen and (max-width:575px) {';
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='display:none !important;';
		$vw_transport_cargo_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_transport_cargo_sticky_header_padding = get_theme_mod('vw_transport_cargo_sticky_header_padding');
	if($vw_transport_cargo_sticky_header_padding != false){
		$vw_transport_cargo_custom_css .='.header-fixed{';
			$vw_transport_cargo_custom_css .='padding: '.esc_html($vw_transport_cargo_sticky_header_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_transport_cargo_search_padding_top_bottom = get_theme_mod('vw_transport_cargo_search_padding_top_bottom');
	$vw_transport_cargo_search_padding_left_right = get_theme_mod('vw_transport_cargo_search_padding_left_right');
	$vw_transport_cargo_search_font_size = get_theme_mod('vw_transport_cargo_search_font_size');
	$vw_transport_cargo_search_border_radius = get_theme_mod('vw_transport_cargo_search_border_radius');
	if($vw_transport_cargo_search_padding_top_bottom != false || $vw_transport_cargo_search_padding_left_right != false || $vw_transport_cargo_search_font_size != false || $vw_transport_cargo_search_border_radius != false){
		$vw_transport_cargo_custom_css .='.search-box i{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_html($vw_transport_cargo_search_padding_top_bottom).'; padding-bottom: '.esc_html($vw_transport_cargo_search_padding_top_bottom).';padding-left: '.esc_html($vw_transport_cargo_search_padding_left_right).';padding-right: '.esc_html($vw_transport_cargo_search_padding_left_right).';font-size: '.esc_html($vw_transport_cargo_search_font_size).';border-radius: '.esc_html($vw_transport_cargo_search_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_transport_cargo_button_padding_top_bottom = get_theme_mod('vw_transport_cargo_button_padding_top_bottom');
	$vw_transport_cargo_button_padding_left_right = get_theme_mod('vw_transport_cargo_button_padding_left_right');
	if($vw_transport_cargo_button_padding_top_bottom != false || $vw_transport_cargo_button_padding_left_right != false){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_html($vw_transport_cargo_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_transport_cargo_button_padding_top_bottom).';padding-left: '.esc_html($vw_transport_cargo_button_padding_left_right).';padding-right: '.esc_html($vw_transport_cargo_button_padding_left_right).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_button_border_radius = get_theme_mod('vw_transport_cargo_button_border_radius');
	if($vw_transport_cargo_button_border_radius != false){
		$vw_transport_cargo_custom_css .='.post-main-box .view-more{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_html($vw_transport_cargo_button_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_transport_cargo_copyright_alingment = get_theme_mod('vw_transport_cargo_copyright_alingment');
	if($vw_transport_cargo_copyright_alingment != false){
		$vw_transport_cargo_custom_css .='.copyright p{';
			$vw_transport_cargo_custom_css .='text-align: '.esc_html($vw_transport_cargo_copyright_alingment).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_copyright_padding_top_bottom = get_theme_mod('vw_transport_cargo_copyright_padding_top_bottom');
	if($vw_transport_cargo_copyright_padding_top_bottom != false){
		$vw_transport_cargo_custom_css .='.footer-2{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_html($vw_transport_cargo_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_transport_cargo_copyright_padding_top_bottom).';';
		$vw_transport_cargo_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_transport_cargo_scroll_to_top_font_size = get_theme_mod('vw_transport_cargo_scroll_to_top_font_size');
	if($vw_transport_cargo_scroll_to_top_font_size != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_html($vw_transport_cargo_scroll_to_top_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_padding = get_theme_mod('vw_transport_cargo_scroll_to_top_padding');
	$vw_transport_cargo_scroll_to_top_padding = get_theme_mod('vw_transport_cargo_scroll_to_top_padding');
	if($vw_transport_cargo_scroll_to_top_padding != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='padding-top: '.esc_html($vw_transport_cargo_scroll_to_top_padding).';padding-bottom: '.esc_html($vw_transport_cargo_scroll_to_top_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_width = get_theme_mod('vw_transport_cargo_scroll_to_top_width');
	if($vw_transport_cargo_scroll_to_top_width != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='width: '.esc_html($vw_transport_cargo_scroll_to_top_width).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_height = get_theme_mod('vw_transport_cargo_scroll_to_top_height');
	if($vw_transport_cargo_scroll_to_top_height != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='height: '.esc_html($vw_transport_cargo_scroll_to_top_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_scroll_to_top_border_radius = get_theme_mod('vw_transport_cargo_scroll_to_top_border_radius');
	if($vw_transport_cargo_scroll_to_top_border_radius != false){
		$vw_transport_cargo_custom_css .='.scrollup i{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_html($vw_transport_cargo_scroll_to_top_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_transport_cargo_social_icon_font_size = get_theme_mod('vw_transport_cargo_social_icon_font_size');
	if($vw_transport_cargo_social_icon_font_size != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='font-size: '.esc_html($vw_transport_cargo_social_icon_font_size).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_padding = get_theme_mod('vw_transport_cargo_social_icon_padding');
	if($vw_transport_cargo_social_icon_padding != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='padding: '.esc_html($vw_transport_cargo_social_icon_padding).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_width = get_theme_mod('vw_transport_cargo_social_icon_width');
	if($vw_transport_cargo_social_icon_width != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='width: '.esc_html($vw_transport_cargo_social_icon_width).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_height = get_theme_mod('vw_transport_cargo_social_icon_height');
	if($vw_transport_cargo_social_icon_height != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='height: '.esc_html($vw_transport_cargo_social_icon_height).';';
		$vw_transport_cargo_custom_css .='}';
	}

	$vw_transport_cargo_social_icon_border_radius = get_theme_mod('vw_transport_cargo_social_icon_border_radius');
	if($vw_transport_cargo_social_icon_border_radius != false){
		$vw_transport_cargo_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_transport_cargo_custom_css .='border-radius: '.esc_html($vw_transport_cargo_social_icon_border_radius).'px;';
		$vw_transport_cargo_custom_css .='}';
	}