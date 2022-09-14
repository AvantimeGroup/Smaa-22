<?php

/**
 * Template Name: Landing page multi lang 2022
 *
 * @package SMÅA
 */

get_header();


$lang_layout = get_field('lang_layout');
if(!$lang_layout){
	$lang_layout ="LTL";
}

?>
<script type="text/javascript">
jQuery(document).ready(function () {
	
	
	// show current language in rolldown
    var url = window.location.href;
    var localhref = jQuery(location).attr('pathname'); 
    var activePage = localhref;
    //strip the domain and suffixes
    jQuery('.lpl ul li ul li a ').each(function () {
        var linkPage = this.pathname;	
        if (activePage == linkPage) {
		
		 	jQuery(this).parent().addClass('current-menu-ancestor current-menu-parent menu-item-has-children');
			jQuery(this).parent().removeClass('current-menu-item');

			jQuery('.lpl ul li.swe-icon').removeClass('current-menu-ancestor current-menu-parent menu-item-has-children');
			jQuery('.lpl ul li.swe-icon').addClass('current-menu-item');
			jQuery('.lpl ul li.swe-icon a span ').detach().appendTo(jQuery(this));  // move the pil to the new page link
			
            jQuery(this).parent().insertBefore(jQuery(this).parent().parent().parent());   // move the page link to the top level menu
            jQuery('ul.sub-menu').detach().appendTo('.lpl ul.menu li.current-menu-parent');
			jQuery('.lpl ul li.swe-icon').detach().appendTo('ul.sub-menu');
			jQuery('.lpl ul.sub-menu li.swe-icon a').text('Swedish');
			
        }
    });
	
	var currentSida = jQuery('a[aria-current="page"]');
	currentSida.removeAttr('href');
	
    jQuery('.lpl ul.menu').click(function () {
		
        var count=0;
    if (jQuery('.lpl ul li ul' ).hasClass('open')){ 
            jQuery('.lpl ul li ul').slideUp(300);
            jQuery('.lpl ul li ul').removeClass('open');
            jQuery('.lpl ul li').removeClass('open');
            jQuery('.lpl').removeClass('open');
            count=1;
     } 
     if(count != 1){
        jQuery('.lpl ul li ul').slideDown( 300, '' );
        jQuery('.lpl ul li ul').addClass('open');
        jQuery('.lpl ul li').addClass('open');
        jQuery('.lpl').addClass('open');
     }

    });
});
</script>

<?php
if (get_post_thumbnail_id($post->ID)):
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<div class="page-banner" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); ">
  <header class="entry-header">
     <h1 class="page-banner-title"><?php the_title(); ?></h1>
  </header>  
</div>
<?php endif; ?>
        <div id="#primary" class="">
            <main id="main" class="site-main" dir="<?php echo $lang_layout;  ?>">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'fullwidth-banner');
                endwhile;
                ?>
            </main>
        </div>

<?php
get_footer();