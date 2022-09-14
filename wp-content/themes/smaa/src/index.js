import 'bootstrap';
import CompensationCalculator from './compensation-calculator';



// Add default init
window.addEventListener('load', () => {


    var compensationCalculators = [...document.getElementsByClassName('compensation-calculator-block')];
    compensationCalculators.forEach(element => {
        var x = new CompensationCalculator(element);
    });

});

// add gradiant to hero image
(function($){
    if($('.wp-block-coblocks-hero__inner').length){
        let hero = $('.wp-block-coblocks-hero__inner');
        let bgImage = hero.css("background-image");
     //   hero.css("background-image", "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))," + bgImage);
    }
})(jQuery);