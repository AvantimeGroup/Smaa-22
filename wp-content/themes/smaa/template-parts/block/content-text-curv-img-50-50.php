
 <?php 

     // group block
     if( get_field('block_grupp') ) {
        $class_block_grupp = get_field('block_grupp');
  
    } else {
        $class_block_grupp = 'alone';
    }

    // align image
    if( get_field('image_position') == 'left' ) {
        $class_flex = 'flex-row';
        $class_text = 'text-50-right';
    } else {
        $class_text = 'text-50-left';
        $class_flex = 'flex-row-reverse';
    }
    //align text & buttons
    if( get_field('text_align') == 'left' ) {
        $class_text_align = 'align-left';
        $class_flex_align = 'flex-left';
    } else if( get_field('text_align') == 'right' ) {
        $class_text_align = 'align-right';
        $class_flex_align = 'flex-right';
    } else {
        $class_text_align = 'align-center';
        $class_flex_align = 'flex-center';
    }
 
 ?>

<section class="text-curved-img-50-50  <?php echo $class_block_grupp; ?>">
    <div class="container wrapper-50-50 <?php echo $class_flex; ?>">
    <?php if( get_field('section_decoration') == 'yes' ): ?>
            <div class="decoration-left">
                <div class="decoration-cluster">
                    <div class="orange-ring-38px"></div>
                    <div class="light-blue-ring-25px"></div>
                    <div class="blue-ring-14px"></div>
                    <div class="blue-ring-38px"></div>
                 </div>  
            </div> 
        <?php endif; ?>
        <div class="column-50">          
            
            <?php if(get_field('bild_or_logo') == 'image'){  ?> 
                <div class="left-image"> 
                <?php $section_image = get_field('section_image');
                    if( !empty( $section_image ) ): ?>
                        <img src="<?php echo esc_url($section_image['url']); ?>" alt="<?php echo esc_attr($section_image['alt']); ?>" />
                    <?php endif; ?> 
                </div>  
            <?php } else { ?> 
                <div class="left-logo">  
                <?php if( get_field('logo') ): ?>
                    <img src="<?php the_field('logo'); ?>" />
                <?php endif; ?>
                </div> 
            <?php } ?>  
        </div>

        <div class="column-50 <?php echo $class_text; ?> <?php echo $class_text_align; ?>">
            <div class="text-wrapper">
                <h1 ><?php the_field('title_1'); ?></h1>
                <div class="bread-right">
                    <?php the_field('text_1'); ?>
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
            
            <?php if(have_rows('btn_group')): ?>
                    <div class="block-buttons  <?php echo $class_flex_align; ?> ">
                    <?php while (have_rows('btn_group')): the_row(); 

                            if(get_sub_field('btn_stil' )):
                                $btn_type = get_sub_field('btn_stil');
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

                                $btn_text = get_sub_field('btn_text');

                                if(get_sub_field('show_btn_ikon') == 'yes'){
                                    $btn_icon = get_sub_field('btn_icon');
                                } else {
                                    $btn_icon = '';
                                }


                                if ($btn_type == 'orange' || $btn_type == 'white' || $btn_type == 'black' ){
                                   
                            ?>
                                <div class="block-button">
                                    <a class="btn <?php echo $btn_class; ?>"  href="<?php echo $btn_link; ?>" ><?php echo $btn_text; ?><?php echo $btn_icon; ?></a>
                                </div>

                            <?php }else if ($btn_type == 'etjanst'){ ?>
                                    <div class="block-button <?php echo $class_flex_align; ?>">
                                        <a class="white-btn etjanst" id="log-in" data-toggle="collapse" data-target="#header-login">               
                                            <i class="fa fa-lock"></i><span class="mobile-hide">Mina E-tjänster</span>  
                                         </a>
                                        <div id="login-notch" class="container"></div>
                                    </div> 
                                <?php }; ?>


                    
                    <?php   endif;  ?>
                    		

                        <?php if( get_field('choose_e-tjanst_btn') == 'yes' ): ?>
                            <div class="block-button">
                                <a class="white-btn" id="log-in" data-toggle="collapse" data-target="#header-login">               
                                    <i class="fa fa-lock"></i><span class="mobile-hide">Mina E-tjänster</span>  
                                </a>
                                <div id="login-notch" class="container"></div>
                            </div> 
                        <?php endif; ?>   

                     <?php endwhile; ?>
                    </div> 
                <?php endif; ?>
           

        </div>

    </div>
</section>