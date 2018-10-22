$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});
   
   $('#user-dropdown').on('click', function(event) {
		var status = $(this).attr('data-status')
      //alert(status)
      if(status=="false"){
         $(this).attr("data-status","true")
         $('.user-menu').fadeIn();
      }
      if(status=="true"){
         $(this).attr("data-status","false")
         $('.user-menu').fadeOut();
      }
	});
   
   $('#notification').on('click', function(event) {
		var status = $(this).attr('data-status')
      //alert(status)
      if(status=="false"){
         $(this).attr("data-status","true")
         $('.notification-div').fadeIn();
      }
      if(status=="true"){
         $(this).attr("data-status","false")
         $('.notification-div').fadeOut();
      }
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });

	$('.nome_menu').on('click', function(event) {
			var menu = $(this).text().trim();
			localStorage.setItem('menu', menu);
	});

	var local_menu = localStorage.getItem('menu');

	$.map($(".nome_menu"), function(item){
		if ($(item).hasClass(local_menu))
			$(item).addClass('active');
	})
});
