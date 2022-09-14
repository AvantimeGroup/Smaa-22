<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SMÅA
 */


if ( ! has_excerpt() ) {
    $single_utdrag = ''; 
}else{
   $single_utdrag = get_the_excerpt();   
}


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post-wrapper">
    <h2 class="post-title"><?php the_title(); ?></h2>
    <div class="post-date"><?php echo get_the_date('j F, Y'); ?>   </div>
    <div class="post-utdrag"><?php echo $single_utdrag; ?></div>
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-img">
            <?php the_post_thumbnail('full');?>
        </div>
    <?php } ?>

    <div class="post-text">
        <?php the_content();?>        
                
        
            </div>
        </div>




	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->