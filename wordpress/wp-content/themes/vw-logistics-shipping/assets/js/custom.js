function vw_logistics_shipping_menu_open_nav() {
	window.vw_logistics_shipping_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_logistics_shipping_menu_close_nav() {
	window.vw_logistics_shipping_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed: 'fast'
 	});
	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
});

jQuery(document).ready(function () {
	window.vw_logistics_shipping_currentfocus=null;
  	vw_logistics_shipping_checkfocusdElement();
	var vw_logistics_shipping_body = document.querySelector('body');
	vw_logistics_shipping_body.addEventListener('keyup', vw_logistics_shipping_check_tab_press);
	var vw_logistics_shipping_gotoHome = false;
	var vw_logistics_shipping_gotoClose = false;
	window.vw_logistics_shipping_responsiveMenu=false;
 	function vw_logistics_shipping_checkfocusdElement(){
	 	if(window.vw_logistics_shipping_currentfocus=document.activeElement.className){
		 	window.vw_logistics_shipping_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_logistics_shipping_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_logistics_shipping_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_logistics_shipping_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_logistics_shipping_gotoHome = true;
			} else {
				vw_logistics_shipping_gotoHome = false;
			}

		}else{

			if(window.vw_logistics_shipping_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_logistics_shipping_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_logistics_shipping_responsiveMenu){
				if(vw_logistics_shipping_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_logistics_shipping_gotoClose = true;
				} else {
					vw_logistics_shipping_gotoClose = false;
				}

			}else{

			if(window.vw_logistics_shipping_responsiveMenu){
			}}}}
		}
	 	vw_logistics_shipping_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});






