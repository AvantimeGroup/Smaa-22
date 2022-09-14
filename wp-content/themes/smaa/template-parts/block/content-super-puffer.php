<?php


// background gray or white
    if( get_field('block_background') == 'white' ) {
        $class_bg = 'bg-white';
    } else {
        $class_bg = 'bg-gray';
    }
?>

<section class="super-puffer <?php echo $class_bg; ?>">
    <div class="container">
        <div class="puffer-row">
        <!-- <div class="decoration-wrapper"> -->
        <?php if(get_field('decorations') == 'yes') {
                echo'<div class="decoration-left">
                        <div class="decoration-cluster">
                        <div class="light-blue-circle-195px"></div>
                            <div class="orange-ring-41px"></div>
                        </div>  
                    </div>';
            } ?>
           <h2><?php the_field('title'); ?> </h2>
        <p><?php the_field('under_text'); ?> </p>
        <div class="puff-wrapper">
            <?php
            if (have_rows('puffer')) :
                while (have_rows('puffer')) : the_row();
            ?>
                    <div class="puff">
                        <h3><?php the_sub_field('puffer_top_rubrik'); ?> </h3>
                        <?php if(get_sub_field('image_or_cirkel_text') == 'image'){ ?> 
                                <div class="inner-image">
                                     <img src="<?php the_sub_field('puffer_img'); ?>" />
                                </div>
                        <?php } else {  ?>
                            <div class="inner-circle">
                                <h2><?php the_sub_field('puffer_cirkel_rubrik'); ?> </h2>
                                <p><?php the_sub_field('puffer_cirkel_text'); ?> </p>
                            </div>
                        <?php } ?>
                       <p> <?php the_sub_field('puffer_bottom_text'); ?> </p>
                        <h3><?php the_sub_field('puffer_bottom_rubrik'); ?> </h3>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
           
        </div>


        <?php if(get_field('decorations') == 'yes') {
                echo'<div class="decoration-right">
                    <div class="decoration-cluster">
                        <div class="light-blue-ring-25px"></div>
                        <div class="blue-ring-14px"></div>
                        <div class="blue-ring-38px"></div>
                    </div>  
                </div>';
                } ?>
                 <!-- </div> -->
        </div>
        <div class="block-sub-text"><?php the_field('block_sub_text'); ?> </div>
    </div>
</section>