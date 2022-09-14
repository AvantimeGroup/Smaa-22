(function($){
    // TODO: Make this code aware of multiple blocks.

    var getCookie = function(name) {
        return ("; "+document.cookie).split("; " + name + "=").pop().split(";").shift();
    }


    $('.smaa-block.alert-block').each(function(index, element){
        // Check if alert has been closed
        if( getCookie('smaa-alert-box') === 'closed' ){

            $('.alert', element).hide();

        }else{
            // Hide until code is run to prevent flicker
            $(element).removeClass('d-none');
        }

        // Grab your button (based on your posted html)
        $('.close', element).click(function( e ){

            // Do not perform default action when button is clicked
            e.preventDefault();

            /* If you just want the cookie for a session don't provide an expires
            Set the path as root, so the cookie will be valid across the whole site */
            document.cookie =  'smaa-alert-box=closed; path=/';

        });

    });       

})(jQuery);
