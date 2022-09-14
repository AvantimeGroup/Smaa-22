jQuery(document).ready(function($){
    $('.slick-container').each(function() {
        var slickInstance = $(this);
        $(this).slick({
            speed: 300,
            autoplay:false,
            dots: true,
            slidesToShow:1,
            slidesToScroll:1,
            appendDots: slickInstance.next().find('.nav-dots'),
            nextArrow: slickInstance.next().find('.next'),
            prevArrow: slickInstance.next().find('.prev')
        })

    });
}); 