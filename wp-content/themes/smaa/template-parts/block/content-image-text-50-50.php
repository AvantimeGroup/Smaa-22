 <?php 
    if( get_field('image_position') == 'left' ) {
        $class_flex = 'flex-row';
        $class_text = 'text-50-right';
    } else {
        $class_text = 'text-50-left';
        $class_flex = 'flex-row-reverse';
    }

       // background gray or white
if( get_field('block_bakgrund') == 'white' ) {
    $class_bg = 'bg-white';
 } else {
    $class_bg = 'bg-gray';
 }

 /*  add RTL classes for arabiska och andra right layout languages  */
    if( get_field('ltl_rtl') == 'RTL' ) {
        $class_lang_layout = 'lang_layout_rtl';  
    	if( get_field('image_position') == 'left' ) {
        	$class_flex = '';     
    	} else {   
        	$class_flex = 'flex-row';
    	}
    } else {
        $class_lang_layout = 'lang_layout_ltl';    
    }
 
 ?>
<section class="block-image-text-50-50  <?php echo $class_bg .' '. $class_lang_layout ; ?>">
<div class="container">
    <div class="block-title"><h2><?php the_field('block_rubrik'); ?></h2></div>
    <div class=" wrapper-50-50 <?php echo $class_flex; ?>">
        <div class="column-50"> 
            <div class="left-image">
            <?php if( get_field('section_image') ): ?>
                <img src="<?php the_field('section_image'); ?>" />
            <?php endif; ?>
            </div> 
            <?php if( get_field('section_decoration') == 'yes' ): ?>
            <div class="decoration-left">
            <div class="circle-148px"></div>
                <!-- <div class="circle-174px"></div> -->
            </div> 
            <div class="decoration-right">
                <!-- <div class="circle-148px"></div> -->
                <div class="circle-174px"></div>
            </div> 
        <?php endif; ?>  
        </div>
        <div class="column-50 <?php echo $class_text; ?>">
        <?php if( get_field('section_title') ): ?>
                <h1><?php the_field('section_title'); ?></h1>
         <?php endif; ?>
            <h1 class="title-right "><?php the_field('title_1'); ?></h1>
            <div class="bread-right">
                <?php the_field('text_1'); ?>
            </div> 
            <?php if( get_field('link_text_1') ): ?>
            <div class="link-right">
                <a href="<?php the_field('link_url_1'); ?>">
                     <?php the_field('link_text_1'); ?> <i class="fa fa-angle-right"></i>
            </a>
            </div>
            <?php endif; ?>
            <?php if( get_field('title_2') ): ?>
                <h1 class="title-right "><?php the_field('title_2'); ?></h1>
                <div class="bread-right">
                    <?php the_field('text_2'); ?>
                </div> 
                <?php if( get_field('link_text_2') ): ?>
                    <div class="link-right">
                        <a href="<?php the_field('link_url_2'); ?>">
                            <?php the_field('link_text_2'); ?> <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

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
    </div>
</section>