function vw_cleaning_company_menu_open_nav() {
	window.vw_cleaning_company_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_cleaning_company_menu_close_nav() {
	window.vw_cleaning_company_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});
});

jQuery(document).ready(function () {
	window.vw_cleaning_company_currentfocus=null;
  	vw_cleaning_company_checkfocusdElement();
	var vw_cleaning_company_body = document.querySelector('body');
	vw_cleaning_company_body.addEventListener('keyup', vw_cleaning_company_check_tab_press);
	var vw_cleaning_company_gotoHome = false;
	var vw_cleaning_company_gotoClose = false;
	window.vw_cleaning_company_responsiveMenu=false;
 	function vw_cleaning_company_checkfocusdElement(){
	 	if(window.vw_cleaning_company_currentfocus=document.activeElement.className){
		 	window.vw_cleaning_company_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_cleaning_company_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_cleaning_company_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_cleaning_company_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_cleaning_company_gotoHome = true;
			} else {
				vw_cleaning_company_gotoHome = false;
			}

		}else{

			if(window.vw_cleaning_company_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_cleaning_company_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_cleaning_company_responsiveMenu){
				if(vw_cleaning_company_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_cleaning_company_gotoClose = true;
				} else {
					vw_cleaning_company_gotoClose = false;
				}
			
			}else{

			if(window.vw_cleaning_company_responsiveMenu){
			}}}}
		}
	 	vw_cleaning_company_checkfocusdElement();
	}
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup').fadeIn();
	    } else {
	        jQuery('.scrollup').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(document).ready(function(){
	jQuery('a[href="#search"]').on('click', function(event) {
		jQuery('#search').addClass('open');
	});            
	jQuery('#search, #search button.close').on('click keyup', function(event) {
		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			jQuery(this).removeClass('open');
		}
	});
});

(function( $ ) {
	jQuery(window).load(function() {
	    jQuery("#status").fadeOut();
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})
	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
})( jQuery );