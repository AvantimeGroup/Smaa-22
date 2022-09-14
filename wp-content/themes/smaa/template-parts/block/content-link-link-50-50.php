
 <?php 

// background gray or white
if( get_field('bg_color') == 'white' ) {
    $class_bg = 'bg-white';
 } else {
    $class_bg = 'bg-gray';
 }

if( get_field('link_position') == 'right' ) {
    $class_flex = 'flex-row';
    $class_text = 'text-50-left';
    $class_link = 'link-50-right';
} else {
    $class_text = 'text-50-right';
    $class_flex = 'flex-row-reverse';
    $class_link = 'link-50-left';
 }
 ?>
<section class="link-link-50-50   <?php echo $class_bg; ?>">
    <div class="container wrapper-50-50 <?php echo $class_flex; ?>">

        <div class="column-50 <?php echo $class_text; ?> "> 
            <?php if( get_field('text_title') ): ?>
                    <h1><?php the_field('text_title'); ?></h1>
            <?php endif; ?>
            <div class="bread-text">
                    <?php the_field('bread_text'); ?>
            </div> 
        </div>

        <div class="column-50 <?php echo $class_link; ?>">
            <?php if(have_rows('links')): ?>
                <div class="link-wrapper ">
                        <?php while (have_rows('links')): the_row(); 
                                if( get_sub_field('link_text') ): ?>
                                    <div class="link">
                                        <a href="<?php the_sub_field('link_url'); ?>" target="<?php the_sub_field('link_dest'); ?>">
                                        <?php the_sub_field('link_text'); 
                                            if( get_sub_field('link_icon') ): 
                                                the_sub_field('link_icon'); 
                                            endif; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                        <?php endwhile; ?>
                </div> 
            <?php endif; ?>
        </div>

    </div>
</section>