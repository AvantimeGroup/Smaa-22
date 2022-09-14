$(document).ready(function(){
	$('.hamburger').click(function(){
        $(this).find('.menu-hamburger').toggleClass('open');
        $('#' + $(this).data('id')).toggleClass('show');
    });
    
    // Open registration or login modal
    $('span.rg-and-login').click(function(){
        $('#' + $(this).data('id')).show();
	});
    $('.rg-close').click(function(){
        $('#' + $(this).data('id')).hide();
    });
    
    $('.bordering').click(function(){
        $('.bordering').removeClass('active');
        $(this).addClass('active');
    });

    // manipuling navigation menu on mobile
    $('.nav-menu-default > li > a').addClass('header-item');
    $('.nav-menu-default > li').prepend('<span class="spanding fa fa-angle-down"></span>');
    $('body').on('click', 'span.spanding', function(){
        if($(this).hasClass('fa-angle-down')){
            $(this).removeClass('fa-angle-down');
            $(this).addClass('fa-angle-up');  
        }else{
            $(this).removeClass('fa-angle-up');
            $(this).addClass('fa-angle-down');
        }
        $(this).parent().find('ul').toggleClass('show');
    });

    $('body').find('.hero-background .wp-block-coblocks-hero__inner').prepend('<div class="hero-overlay"></div>');
    
});