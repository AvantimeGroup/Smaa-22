(function($){

    // Add default init
    $(function(){
        var isDesktop = !window.matchMedia("only screen and (max-width: 4760px)").matches;
        if (isDesktop){  
            $('header [data-toggle=collapse]').each(function(index, element){
        
                var targetName = element.dataset.target;
                var targets = $(targetName);

                document.addEventListener('scroll', function(e){
                    
                    // Hide
                    $(targets).collapse('hide');
                })

                document.addEventListener('click', function(e){

                    targets.each(function(index, dataTarget){
                        
                        if((dataTarget.contains(e.target) || element.contains(e.target)) === false){
                            
                            // Hide
                            $(targets).collapse('hide');
                        }
                    });
                    
                })


            });
        }


        });
    
       

})(jQuery);
