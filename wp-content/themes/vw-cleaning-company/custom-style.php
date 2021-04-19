<?php

	$vw_cleaning_company_first_color = get_theme_mod('vw_cleaning_company_first_color');
	$vw_cleaning_company_second_color = get_theme_mod('vw_cleaning_company_second_color');

	$vw_cleaning_company_custom_css= "";

	/*------------------------------ Global First Color -----------*/
	if($vw_cleaning_company_first_color != false){
		$vw_cleaning_company_custom_css .='.top-btn a,.menu a:before, .menu a::after,.more-btn a:hover,.scrollup i,#sidebar .custom-social-icons i:hover, #footer .custom-social-icons i:hover,.pagination span, .pagination a,#sidebar .tagcloud a:hover,#comments input[type="submit"]:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#header .menu a:before, #header .menu a::after, #sidebar a.custom_read_more:hover, #footer a.custom_read_more:hover, .custom-about-us .more-button i:hover{';
			$vw_cleaning_company_custom_css .='background-color: '.esc_html($vw_cleaning_company_first_color).';';
		$vw_cleaning_company_custom_css .='}';
	}
	if($vw_cleaning_company_first_color != false){
		$vw_cleaning_company_custom_css .='a,.logo h1 a,.middle-header i.fas.fa-phone, .service-sec h3:hover, .service-content h4 a:hover,.post-main-box:hover h3,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title, p.site-title a, .service-sec h3 a:hover, .service-content h4 a:hover, .post-main-box:hover h3 a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .post-main-box:hover h2 a, .post-info span a:hover{';
			$vw_cleaning_company_custom_css .='color: '.esc_html($vw_cleaning_company_first_color).';';
		$vw_cleaning_company_custom_css .='}';
	}	
	if($vw_cleaning_company_first_color != false){
		$vw_cleaning_company_custom_css .='#sidebar .tagcloud a:hover{';
			$vw_cleaning_company_custom_css .='border-color: '.esc_html($vw_cleaning_company_first_color).';';
		$vw_cleaning_company_custom_css .='}';
	}
	if($vw_cleaning_company_first_color != false){
		$vw_cleaning_company_custom_css .='.main-navigation ul ul{';
			$vw_cleaning_company_custom_css .='border-top-color: '.esc_html($vw_cleaning_company_first_color).';';
		$vw_cleaning_company_custom_css .='}';
	}
	if($vw_cleaning_company_first_color != false){
		$vw_cleaning_company_custom_css .='.main-navigation ul ul, .header-fixed{';
			$vw_cleaning_company_custom_css .='border-bottom-color: '.esc_html($vw_cleaning_company_first_color).';';
		$vw_cleaning_company_custom_css .='}';
	}
	if($vw_cleaning_company_first_color != false){
		$vw_cleaning_company_custom_css .='nav.woocommerce-MyAccount-navigation ul li{';
			$vw_cleaning_company_custom_css .='box-shadow: 2px 2px 0 0 '.esc_html($vw_cleaning_company_first_color).';';
		$vw_cleaning_company_custom_css .='}';
	}

	/*------------------------------ Global Second Color -----------*/
	if($vw_cleaning_company_second_color != false){
		$vw_cleaning_company_custom_css .='.middle-header .custom-social-icons i:hover,.search-box i,.top-btn a:hover,.more-btn a,input[type="submit"],#sidebar h3,#sidebar .custom-social-icons i, #footer .custom-social-icons i,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#footer-2,#comments input[type="submit"],nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,.widget_product_search button, #comments a.comment-reply-link, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more{';
			$vw_cleaning_company_custom_css .='background-color: '.esc_html($vw_cleaning_company_second_color).';';
		$vw_cleaning_company_custom_css .='}';
	}
	if($vw_cleaning_company_second_color != false){
		$vw_cleaning_company_custom_css .='.top-bar i,#footer li a:hover,#footer .widget_text a{';
			$vw_cleaning_company_custom_css .='color: '.esc_html($vw_cleaning_company_second_color).';';
		$vw_cleaning_company_custom_css .='}';
	}	
	if($vw_cleaning_company_second_color != false){
		$vw_cleaning_company_custom_css .='.middle-header .custom-social-icons i:hover,.scrollup i,#footer .tagcloud a:hover{';
			$vw_cleaning_company_custom_css .='border-color: '.esc_html($vw_cleaning_company_second_color).';';
		$vw_cleaning_company_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_cleaning_company_theme_lay = get_theme_mod( 'vw_cleaning_company_width_option','Full Width');
    if($vw_cleaning_company_theme_lay == 'Boxed'){
		$vw_cleaning_company_custom_css .='body{';
			$vw_cleaning_company_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_cleaning_company_custom_css .='}';
	}else if($vw_cleaning_company_theme_lay == 'Wide Width'){
		$vw_cleaning_company_custom_css .='body{';
			$vw_cleaning_company_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_cleaning_company_custom_css .='}';
	}else if($vw_cleaning_company_theme_lay == 'Full Width'){
		$vw_cleaning_company_custom_css .='body{';
			$vw_cleaning_company_custom_css .='max-width: 100%;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_cleaning_company_theme_lay = get_theme_mod( 'vw_cleaning_company_slider_opacity_color','0.4');
	if($vw_cleaning_company_theme_lay == '0'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.1'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.1';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.2'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.2';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.3'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.3';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.4'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.4';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.5'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.5';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.6'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.6';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.7'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.7';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.8'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.8';
		$vw_cleaning_company_custom_css .='}';
		}else if($vw_cleaning_company_theme_lay == '0.9'){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='opacity:0.9';
		$vw_cleaning_company_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_cleaning_company_theme_lay = get_theme_mod( 'vw_cleaning_company_slider_content_option','Left');
    if($vw_cleaning_company_theme_lay == 'Left'){
		$vw_cleaning_company_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2, #slider .inner_carousel p, #slider .more-btn{';
			$vw_cleaning_company_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_cleaning_company_custom_css .='}';
	}else if($vw_cleaning_company_theme_lay == 'Center'){
		$vw_cleaning_company_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2, #slider .inner_carousel p, #slider .more-btn{';
			$vw_cleaning_company_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_cleaning_company_custom_css .='}';
	}else if($vw_cleaning_company_theme_lay == 'Right'){
		$vw_cleaning_company_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2, #slider .inner_carousel p, #slider .more-btn{';
			$vw_cleaning_company_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_cleaning_company_slider_height = get_theme_mod('vw_cleaning_company_slider_height');
	if($vw_cleaning_company_slider_height != false){
		$vw_cleaning_company_custom_css .='#slider img{';
			$vw_cleaning_company_custom_css .='height: '.esc_html($vw_cleaning_company_slider_height).';';
		$vw_cleaning_company_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_cleaning_company_slider = get_theme_mod('vw_cleaning_company_slider_arrows');
	if($vw_cleaning_company_slider == false){
		$vw_cleaning_company_custom_css .='.page-template-custom-home-page .main-header-box{';
			$vw_cleaning_company_custom_css .='position: static; margin-top: 0px;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_cleaning_company_theme_lay = get_theme_mod( 'vw_cleaning_company_blog_layout_option','Default');
    if($vw_cleaning_company_theme_lay == 'Default'){
		$vw_cleaning_company_custom_css .='.post-main-box{';
			$vw_cleaning_company_custom_css .='';
		$vw_cleaning_company_custom_css .='}';
	}else if($vw_cleaning_company_theme_lay == 'Center'){
		$vw_cleaning_company_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn{';
			$vw_cleaning_company_custom_css .='text-align:center;';
		$vw_cleaning_company_custom_css .='}';
	}else if($vw_cleaning_company_theme_lay == 'Left'){
		$vw_cleaning_company_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn, #our-services p{';
			$vw_cleaning_company_custom_css .='text-align:Left;';
		$vw_cleaning_company_custom_css .='}';
		$vw_cleaning_company_custom_css .='.box-image{';
			$vw_cleaning_company_custom_css .='padding: 0px;';
		$vw_cleaning_company_custom_css .='}';
		$vw_cleaning_company_custom_css .='.post-main-box h2{';
			$vw_cleaning_company_custom_css .='margin-top:10px;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_cleaning_company_res_topbar = get_theme_mod( 'vw_cleaning_company_resp_topbar_hide_show',false);
    if($vw_cleaning_company_res_topbar == true){
    	$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.top-bar{';
			$vw_cleaning_company_custom_css .='display:block;';
		$vw_cleaning_company_custom_css .='} }';
	}else if($vw_cleaning_company_res_topbar == false){
		$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.top-bar{';
			$vw_cleaning_company_custom_css .='display:none;';
		$vw_cleaning_company_custom_css .='} }';
	}

	$vw_cleaning_company_res_stickyheader = get_theme_mod( 'vw_cleaning_company_stickyheader_hide_show',false);
    if($vw_cleaning_company_res_stickyheader == true){
    	$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.header-fixed{';
			$vw_cleaning_company_custom_css .='display:block;';
		$vw_cleaning_company_custom_css .='} }';
	}else if($vw_cleaning_company_res_stickyheader == false){
		$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.header-fixed{';
			$vw_cleaning_company_custom_css .='display:none;';
		$vw_cleaning_company_custom_css .='} }';
	}

	$vw_cleaning_company_res_slider = get_theme_mod( 'vw_cleaning_company_resp_slider_hide_show',false);
    if($vw_cleaning_company_res_slider == true){
    	$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='#slider{';
			$vw_cleaning_company_custom_css .='display:block;';
		$vw_cleaning_company_custom_css .='} }';
	}else if($vw_cleaning_company_res_slider == false){
		$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='#slider{';
			$vw_cleaning_company_custom_css .='display:none;';
		$vw_cleaning_company_custom_css .='} }';
	}

	$vw_cleaning_company_metabox = get_theme_mod( 'vw_cleaning_company_metabox_hide_show',true);
    if($vw_cleaning_company_metabox == true){
    	$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.post-info{';
			$vw_cleaning_company_custom_css .='display:block;';
		$vw_cleaning_company_custom_css .='} }';
	}else if($vw_cleaning_company_metabox == false){
		$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.post-info{';
			$vw_cleaning_company_custom_css .='display:none;';
		$vw_cleaning_company_custom_css .='} }';
	}

	$vw_cleaning_company_sidebar = get_theme_mod( 'vw_cleaning_company_sidebar_hide_show',true);
    if($vw_cleaning_company_sidebar == true){
    	$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='#sidebar{';
			$vw_cleaning_company_custom_css .='display:block;';
		$vw_cleaning_company_custom_css .='} }';
	}else if($vw_cleaning_company_sidebar == false){
		$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='#sidebar{';
			$vw_cleaning_company_custom_css .='display:none;';
		$vw_cleaning_company_custom_css .='} }';
	}

	$vw_cleaning_company_resp_scroll_top = get_theme_mod( 'vw_cleaning_company_resp_scroll_top_hide_show',true);
    if($vw_cleaning_company_resp_scroll_top == true){
    	$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='display:block;';
		$vw_cleaning_company_custom_css .='} }';
	}else if($vw_cleaning_company_resp_scroll_top == false){
		$vw_cleaning_company_custom_css .='@media screen and (max-width:575px) {';
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='display:none !important;';
		$vw_cleaning_company_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_cleaning_company_topbar_padding_top_bottom = get_theme_mod('vw_cleaning_company_topbar_padding_top_bottom');
	if($vw_cleaning_company_topbar_padding_top_bottom != false){
		$vw_cleaning_company_custom_css .='.top-bar{';
			$vw_cleaning_company_custom_css .='padding-top: '.esc_html($vw_cleaning_company_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_cleaning_company_topbar_padding_top_bottom).';';
		$vw_cleaning_company_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_cleaning_company_sticky_header_padding = get_theme_mod('vw_cleaning_company_sticky_header_padding');
	if($vw_cleaning_company_sticky_header_padding != false){
		$vw_cleaning_company_custom_css .='.header-fixed{';
			$vw_cleaning_company_custom_css .='padding: '.esc_html($vw_cleaning_company_sticky_header_padding).';';
		$vw_cleaning_company_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_cleaning_company_search_padding_top_bottom = get_theme_mod('vw_cleaning_company_search_padding_top_bottom');
	$vw_cleaning_company_search_padding_left_right = get_theme_mod('vw_cleaning_company_search_padding_left_right');
	$vw_cleaning_company_search_font_size = get_theme_mod('vw_cleaning_company_search_font_size');
	$vw_cleaning_company_search_border_radius = get_theme_mod('vw_cleaning_company_search_border_radius');
	if($vw_cleaning_company_search_padding_top_bottom != false || $vw_cleaning_company_search_padding_left_right != false || $vw_cleaning_company_search_font_size != false || $vw_cleaning_company_search_border_radius != false){
		$vw_cleaning_company_custom_css .='.search-box i{';
			$vw_cleaning_company_custom_css .='padding-top: '.esc_html($vw_cleaning_company_search_padding_top_bottom).'; padding-bottom: '.esc_html($vw_cleaning_company_search_padding_top_bottom).';padding-left: '.esc_html($vw_cleaning_company_search_padding_left_right).';padding-right: '.esc_html($vw_cleaning_company_search_padding_left_right).';font-size: '.esc_html($vw_cleaning_company_search_font_size).';border-radius: '.esc_html($vw_cleaning_company_search_border_radius).'px;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_cleaning_company_button_padding_top_bottom = get_theme_mod('vw_cleaning_company_button_padding_top_bottom');
	$vw_cleaning_company_button_padding_left_right = get_theme_mod('vw_cleaning_company_button_padding_left_right');
	if($vw_cleaning_company_button_padding_top_bottom != false || $vw_cleaning_company_button_padding_left_right != false){
		$vw_cleaning_company_custom_css .='.post-main-box .more-btn a{';
			$vw_cleaning_company_custom_css .='padding-top: '.esc_html($vw_cleaning_company_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_cleaning_company_button_padding_top_bottom).';padding-left: '.esc_html($vw_cleaning_company_button_padding_left_right).';padding-right: '.esc_html($vw_cleaning_company_button_padding_left_right).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_button_border_radius = get_theme_mod('vw_cleaning_company_button_border_radius');
	if($vw_cleaning_company_button_border_radius != false){
		$vw_cleaning_company_custom_css .='.post-main-box .more-btn a{';
			$vw_cleaning_company_custom_css .='border-radius: '.esc_html($vw_cleaning_company_button_border_radius).'px;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_cleaning_company_copyright_alingment = get_theme_mod('vw_cleaning_company_copyright_alingment');
	if($vw_cleaning_company_copyright_alingment != false){
		$vw_cleaning_company_custom_css .='.copyright p{';
			$vw_cleaning_company_custom_css .='text-align: '.esc_html($vw_cleaning_company_copyright_alingment).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_copyright_padding_top_bottom = get_theme_mod('vw_cleaning_company_copyright_padding_top_bottom');
	if($vw_cleaning_company_copyright_padding_top_bottom != false){
		$vw_cleaning_company_custom_css .='#footer-2{';
			$vw_cleaning_company_custom_css .='padding-top: '.esc_html($vw_cleaning_company_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_cleaning_company_copyright_padding_top_bottom).';';
		$vw_cleaning_company_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_cleaning_company_scroll_to_top_font_size = get_theme_mod('vw_cleaning_company_scroll_to_top_font_size');
	if($vw_cleaning_company_scroll_to_top_font_size != false){
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='font-size: '.esc_html($vw_cleaning_company_scroll_to_top_font_size).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_scroll_to_top_padding = get_theme_mod('vw_cleaning_company_scroll_to_top_padding');
	$vw_cleaning_company_scroll_to_top_padding = get_theme_mod('vw_cleaning_company_scroll_to_top_padding');
	if($vw_cleaning_company_scroll_to_top_padding != false){
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='padding-top: '.esc_html($vw_cleaning_company_scroll_to_top_padding).';padding-bottom: '.esc_html($vw_cleaning_company_scroll_to_top_padding).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_scroll_to_top_width = get_theme_mod('vw_cleaning_company_scroll_to_top_width');
	if($vw_cleaning_company_scroll_to_top_width != false){
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='width: '.esc_html($vw_cleaning_company_scroll_to_top_width).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_scroll_to_top_height = get_theme_mod('vw_cleaning_company_scroll_to_top_height');
	if($vw_cleaning_company_scroll_to_top_height != false){
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='height: '.esc_html($vw_cleaning_company_scroll_to_top_height).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_scroll_to_top_border_radius = get_theme_mod('vw_cleaning_company_scroll_to_top_border_radius');
	if($vw_cleaning_company_scroll_to_top_border_radius != false){
		$vw_cleaning_company_custom_css .='.scrollup i{';
			$vw_cleaning_company_custom_css .='border-radius: '.esc_html($vw_cleaning_company_scroll_to_top_border_radius).'px;';
		$vw_cleaning_company_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_cleaning_company_social_icon_font_size = get_theme_mod('vw_cleaning_company_social_icon_font_size');
	if($vw_cleaning_company_social_icon_font_size != false){
		$vw_cleaning_company_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_cleaning_company_custom_css .='font-size: '.esc_html($vw_cleaning_company_social_icon_font_size).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_social_icon_padding = get_theme_mod('vw_cleaning_company_social_icon_padding');
	if($vw_cleaning_company_social_icon_padding != false){
		$vw_cleaning_company_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_cleaning_company_custom_css .='padding: '.esc_html($vw_cleaning_company_social_icon_padding).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_social_icon_width = get_theme_mod('vw_cleaning_company_social_icon_width');
	if($vw_cleaning_company_social_icon_width != false){
		$vw_cleaning_company_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_cleaning_company_custom_css .='width: '.esc_html($vw_cleaning_company_social_icon_width).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_social_icon_height = get_theme_mod('vw_cleaning_company_social_icon_height');
	if($vw_cleaning_company_social_icon_height != false){
		$vw_cleaning_company_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_cleaning_company_custom_css .='height: '.esc_html($vw_cleaning_company_social_icon_height).';';
		$vw_cleaning_company_custom_css .='}';
	}

	$vw_cleaning_company_social_icon_border_radius = get_theme_mod('vw_cleaning_company_social_icon_border_radius');
	if($vw_cleaning_company_social_icon_border_radius != false){
		$vw_cleaning_company_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_cleaning_company_custom_css .='border-radius: '.esc_html($vw_cleaning_company_social_icon_border_radius).'px;';
		$vw_cleaning_company_custom_css .='}';
	}