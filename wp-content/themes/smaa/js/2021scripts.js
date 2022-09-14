/*
 * New js scripts for 2021 redesign
*/

//  toggle hamburger icon to X add  orange notch to dropdown border
jQuery(document).ready(function($){
	$('#hamburger-menu-21').click(function(){
		$('#nav-ham').toggleClass('open');
		$('#notch').toggleClass('menu-arrow_box');
		$('#mob-hamburger-notch').toggleClass('hamburger-notch');
		$('#search-notch').removeClass('mobile-notch');
		$('#login-notch').removeClass('login-notch');
		// close other dropdowns
		$('#header-search').removeClass('show');
		$('#header-login').removeClass('show');
		$('#header-translate').removeClass('show');
	});
// mobile notch toggles search
	$('.search-btn').click(function(){
		$('#search-notch').toggleClass('mobile-notch');
		$('#login-notch').removeClass('login-notch');
		$('#notch').removeClass('mobile-notch');
		$('#notch').removeClass('menu-arrow_box');
		$('#nav-ham').removeClass('open');
		$('#mob-hamburger-notch').removeClass('hamburger-notch');
		// close other dropdowns
		$('#main-nav').removeClass('show');
		$('#header-login').removeClass('show');
		$('#header-translate').removeClass('show');
	});
	$('.menu-login').click(function(){
		$('#login-notch').toggleClass('login-notch');
		$('#notch').removeClass('mobile-notch');
		$('#search-notch').removeClass('mobile-notch');
		$('#nav-ham').removeClass('open');
		$('#mob-hamburger-notch').removeClass('hamburger-notch');
		// close other dropdowns
		$('#main-nav').removeClass('show');
		$('#header-search').removeClass('show');
		$('#header-translate').removeClass('show');
	});
	$('.menu-translate').click(function(){
		$('#login-notch').removeClass('login-notch');
		$('#notch').removeClass('mobile-notch');
		$('#search-notch').removeClass('mobile-notch');
		$('#nav-ham').removeClass('open');
		$('#mob-hamburger-notch').removeClass('hamburger-notch');
		// close other dropdowns
		$('#main-nav').removeClass('show');
		$('#header-search').removeClass('show');
		$('#header-login').removeClass('show');
	});
/* 	$('.nav-bar block-nav li a ').click(function(){
		$('#mob-hamburger-notch').toggleClass('mobile-notch');
		$('#notch').removeClass('mobile-notch');
		$('#search-notch').removeClass('mobile-notch');
		$('#login-notch').removeClass('login-notch');
	}); */
        var coBlocksHeroGradient = 'rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)';
        var coBlocksHeroStyle = $('.wp-block-coblocks-hero .wp-block-coblocks-hero__inner').css('background-image');
	  coBlocksHeroStyle = coBlocksHeroStyle.replace('rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)', coBlocksHeroGradient )
	 $('.wp-block-coblocks-hero .wp-block-coblocks-hero__inner').css("background-image",  coBlocksHeroStyle   );

});