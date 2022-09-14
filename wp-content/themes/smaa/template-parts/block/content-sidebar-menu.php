<?php 
/**
 *  Block Template: sidebar menu
 *
 */
 if( get_field('menu_title') ){
    $menu_title = get_field('menu_title'); 
    }
?>
<script>
    jQuery(document).ready(function () {

        var fonster = jQuery(window).height();
        var klister = jQuery('#sticker').outerHeight();

        function make_sticky() {
            jQuery("#sticker").stick_in_parent({
                offset_top: 150,
                spacer: false, 
                recalc_every: 1,
                // parent: ".sticky-wrapper",
            });
         }
         if(fonster > klister){
            make_sticky();
            // alert('sticky engaged');
         } else {
            // alert(' nooo sticky ');
         }

        // sticky kit for menu 
/*         jQuery("#sticker").stick_in_parent({
             offset_top: 150,
            spacer: false, 
            recalc_every: 1,
            // parent: ".sticky-wrapper",
        }); */

        // sidebar menu 
        jQuery('#sidenav-wrapper ul.sidenav-menu li:first-child a').addClass('sidenav-active');
        jQuery('.sticky-wrapper .wp-block-column.sticky-main .chapter').hide();

        // direct link to chapters
        if (location.href.indexOf('#') != -1) {
            var hash = '#' + window.location.hash.substr(1);
            //  alert(hash);
            jQuery('html, body').animate({ scrollTop: 440 }, 'slow');
            jQuery('.sticky-wrapper .wp-block-column .chapter' + hash).fadeIn(300); 
			jQuery('#sidenav-wrapper a').removeClass('sidenav-active');
            jQuery('a[href='+ hash +']').addClass('sidenav-active');
            
        } else {
            jQuery('.sticky-wrapper .wp-block-column.sticky-main .chapter').first().fadeIn();
        }

       
        jQuery('#sidenav-wrapper a ').click(function(e){  
            e.preventDefault();
            var get = jQuery(this).attr('href');
            jQuery('#sidenav-wrapper a').removeClass('sidenav-active');
            jQuery(this).addClass('sidenav-active');
            jQuery('.sticky-wrapper .wp-block-column.sticky-main .chapter').hide(300);
            jQuery('.sticky-wrapper .wp-block-column .chapter' + get).fadeIn(300);  
            jQuery('html, body').animate({ scrollTop:440 }, 300) ;
            setTimeout(function() { 
                var chapterHeight  = jQuery(get).outerHeight();  
                if(klister >= chapterHeight){
                    jQuery("#sticker").trigger("sticky_kit:detach");
                    // alert('sticky detached');
                } else {
                    make_sticky();
                    // alert('sticky engaged');
                }                
            }, 306);
        }); 

        //  for mobile 
        // if(jQuery(window).width() < 980){
            
        if(jQuery(window).width() < 1201){

            jQuery("#sticker").trigger("sticky_kit:detach");  

            jQuery('#mob-sidenav-wrapper ul.sidenav-menu li:first-child a').addClass('sidenav-active');
    
            jQuery('.head').click(function(){
                jQuery(this).toggleClass('active');
                jQuery(this).parent().find('.arrow').toggleClass('arrow-animate');
                jQuery(this).parent().find('.menu-dropdown').slideToggle(280);
            }); 

            jQuery('#mob-sidenav-wrapper a ').click(function(e){  
                e.preventDefault();
                var mobget = jQuery(this).attr('href');
                jQuery('#mob-sidenav-wrapper ul.sidenav-menu li:first-child a').removeClass('sidenav-active');
                jQuery('#mob-sidenav-wrapper a').removeClass('sidenav-active');
                jQuery(this).addClass('sidenav-active');
                jQuery('.sticky-wrapper .wp-block-column.sticky-main .chapter').hide(300);
                jQuery('.sticky-wrapper .wp-block-column .chapter' + mobget).fadeIn(300);
                // close the drop down
                jQuery('html, body').animate({ scrollTop:0 }, 300) ;
                jQuery('.head').toggleClass('active');
                jQuery('.head').parent().find('.arrow').toggleClass('arrow-animate');
                jQuery('.head').parent().find('.menu-dropdown').slideToggle(280);
            });        
    
        } 

    }); 
</script>

<section class="sidebar-menu" id="sticker">
    <div id="#sidenav" class="col-md-324 ">
        <nav class="sidenav sticky-sidebar" >
            <div class="sticky-title"><?php echo $menu_title; ?></div>
            <div id="sidenav-wrapper" class="">
                <ul class="sidenav-menu">
                <?php 
                if( get_field('sticky_meny_slug') ){
                    $menu_slug = get_field('sticky_meny_slug'); 
                    do_shortcode('[addmenu name="'.  $menu_slug  .'"]'); 
                }
                ?>
                </ul>       
            </div>
        </nav>
    </div>
</section>

<section class="mobile-menu" id="rolly">
    <div id="#sidenav" class="col-md-324 ">
        <nav class="sidenav sticky-sidebar" >
            <div class="head">
                <div class="sticky-title"><?php echo $menu_title; ?> </div><i class="fas fa-angle-down arrow"></i> 
            </div>
            <div id="mob-sidenav-wrapper" class="menu-dropdown">
                <ul class="sidenav-menu">
                <?php 
                if( get_field('sticky_meny_slug') ){
                    $menu_slug = get_field('sticky_meny_slug'); 
                    do_shortcode('[addmenu name="'.  $menu_slug  .'"]'); 
                }
                ?>
                </ul>       
            </div>
        </nav>
    </div>
</section>