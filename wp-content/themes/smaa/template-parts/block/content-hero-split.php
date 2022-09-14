 <?php 
    if( get_field('image_position') == 'left' ) {
        $class_flex = 'flexy-row';
        $class_text = 'text-50-right';
    } else {
        $class_text = 'text-50-left';
        $class_flex = 'flexy-row-reverse';
    }

       // background gray or white
/* if( get_field('block_bakgrund') == 'white' ) {
    $class_bg = 'bg-white';
 } else {
    $class_bg = 'bg-gray';
 } */
 
 ?>
<section class="hero-split  <?php # echo $class_bg; ?>">
<!-- <div class="container"> -->
    <div class=" wrapper-50-50 <?php echo $class_flex; ?>">
        <div class="column-50"> 
            <div class="left-image">
            <?php $split_image = get_field('split_image');
                  if( !empty( $split_image ) ): ?>
                        <img src="<?php echo esc_url($split_image['url']); ?>" alt="<?php echo esc_attr($split_image['alt']); ?>" />
             <?php endif; ?>
            </div> 
        </div>
        <div class="column-50 <?php echo $class_text; ?>">
        <?php if( get_field('text_rubrik') ): ?>
                <h2><?php the_field('text_rubrik'); ?></h2>
         <?php endif; ?>
  
            <div class="bread-right">
                <?php the_field('text_bread'); ?>
            </div> 

            <?php if(have_rows('knappar')): ?>
                    <div class="block-buttons   ">
                    <?php while (have_rows('knappar')): the_row(); 
                 
                        if(get_sub_field('btn_style' )):

                            $btn_type = get_sub_field('btn_style');
        
                            if ($btn_type == 'orange'){
                                $btn_class ='orange';
                            }else if ($btn_type == 'white'){
                                $btn_class ='white-btn';
                            } else if  ($btn_type == 'black'){
                                $btn_class ='black-btn';
                            }

                            if(get_sub_field('btn_url')){
                                $btn_link = get_sub_field('btn_url');
                            } else {
                                $btn_link = get_sub_field('btn_file');
                            }
                            $btn_link_type = get_sub_field('lank_typ');
                            $btn_text = get_sub_field('btn_text');

                            if(get_sub_field('btn_show_icon') == 'yes'){
                                $btn_icon = get_sub_field('btn_icon');
                            } else {
                                $btn_icon = '';
                            }
                            // if ($btn_type == 'orange' || $btn_type == 'white' || $btn_type == 'black'  ){
                             if ($btn_link_type == 'url' || $btn_link_type == 'file' ){
                        ?>
                            <div class="block-button">
                                <a class="btn <?php echo $btn_class; ?>"  href="<?php echo $btn_link; ?>" ><?php echo $btn_text; ?><?php echo $btn_icon; ?></a>
                            </div>
                        <?php } else if ($btn_link_type == 'etjanster'){ ?>
                                <div class="block-button">
                                    <a class=" btn <?php echo $btn_class; ?> etjanst" id="log-in" data-toggle="collapse" data-target="#header-login">               
                                        <i class="fa fa-lock"></i><span class="mobile-hide"><?php echo $btn_text; ?></span>  
                                    </a>
                                    <div id="login-notch" class="container"></div>
                                </div> 
                            <?php
                                }; 
                                endif; 
                            ?>
                     <?php endwhile; ?>
                    </div> 
                <?php endif; ?>
        </div>
     </div>
    <!-- </div> -->
</section>