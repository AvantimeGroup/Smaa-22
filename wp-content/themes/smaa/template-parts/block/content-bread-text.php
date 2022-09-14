<?php 
/**
 *  Block Template: Page Bread text fullwidth
 *
 */
if( get_field('anchor_lank')){
    $anchor_link = get_field('anchor_lank');
} else {
    $anchor_link ='';
}
?>
<div class="anchor-link" >  </div>
 <section id="<?php echo $anchor_link; ?>" class="bread-text"  >
    <div class="container">
        <div class="row-bread">
        <?php if( get_field('bread_text')): ?>          
                <div class="bread-bag"> <?php the_field('bread_text'); ?></div>    
        <?php  
            endif;  
            if(have_rows('text_links')): 
        ?>
                <div class="block-buttons  <?php #echo $class_flex_align; ?> ">
                    <?php while (have_rows('text_links')): the_row(); 

                        $lank_text = get_sub_field('lank_text');
                        $lank_url = get_sub_field('lank_url');
                        if(get_sub_field('lank_ikon')){
                            $lank_icon = get_sub_field('lank_ikon');
                        } else {
                            $lank_icon = '';
                        }
                        ?>
                            <div class="block-button">
                                <a class=""  href="<?php echo $lank_url; ?>" ><?php echo $lank_text; ?><?php echo $lank_icon; ?></a>
                            </div>
                    <?php endwhile; ?>
                </div> 
            <?php endif; ?>
        </div> 
    </div>
</section>