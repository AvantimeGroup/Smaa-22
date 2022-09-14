
<?php

/*     $classes = '';
    if( !empty($block['className']) ) {
        $classes .= sprintf( ' %s', $block['className'] );
    }
    if( !empty($block['align']) ) {
        $classes .= sprintf( ' align%s', $block['align'] );
    } */

?>
<script>
    jQuery(document).ready(function () {



        if(jQuery(window).width() < 810){
    
            jQuery('label.tab').click(function(){

         
                var get = jQuery(this).attr('href');
                var geth = get.outerHeight();
                   alert(geth);
                // jQuery('html, body').animate({ scrollTop: jQuery( get ).offset().top - 100}, 800) ;
                jQuery('body').animate({ scrollTop: 0 }, 100) ;

         
               
 
            }); 

        
        } 
    }); 
</script>

<section class="tabs-21" >
    <div class="container">
    <h1 class="text-center "><?php the_field('tabs_block_title'); ?></h1> 
        <div class="row">

            <div class="responsive-tabs">
                
                    <input class="state" type="radio" title="tab-one" name="tabs-state" id="tab-one" checked />
            
                <?php if( get_field('hidden_tab_and_panel_2') == 'yes' ): ?>
                    <input class="state" type="radio" title="tab-two" name="tabs-state" id="tab-two" />
                <?php endif; ?>
                <?php if( get_field('hidden_tab_and_panel_3') == 'yes' ): ?>
                    <input class="state" type="radio" title="tab-three" name="tabs-state" id="tab-three" />
                <?php endif; ?>
                <?php if( get_field('hidden_tab_and_panel_4') == 'yes' ): ?>
                    <input class="state" type="radio" title="tab-four" name="tabs-state" id="tab-four" />
                <?php endif; ?>
                <?php if( get_field('hidden_tab_and_panel_5') == 'yes' ): ?>
                    <input class="state" type="radio" title="tab-five" name="tabs-state" id="tab-five" />
                <?php endif; ?>

                <div class="tabs flex-tabs">
                   
                        <label for="tab-one" id="tab-one-label" class="tab">
                            <h1><?php the_field('tab_1_title'); ?></h1>
                            <p><?php the_field('tab_1_sub-title'); ?></p>
                        </label>
                  
                    <?php if( get_field('hidden_tab_and_panel_2') == 'yes' ): ?>
                        <label for="tab-two" id="tab-two-label" class="tab">
                            <h1><?php the_field('tab_2_title'); ?></h1>
                            <p><?php the_field('tab_2_sub-title'); ?></p>
                        </label>
                    <?php endif; ?>
                    <?php if( get_field('hidden_tab_and_panel_3') == 'yes' ): ?>
                        <label for="tab-three" id="tab-three-label" class="tab">
                            <h1><?php the_field('tab_3_title'); ?></h1>
                            <p><?php the_field('tab_3_sub-title'); ?></p>
                        </label>
                    <?php endif; ?>
                    <?php if( get_field('hidden_tab_and_panel_4') == 'yes' ): ?>
                        <label for="tab-four" id="tab-four-label" class="tab">
                            <h1><?php the_field('tab_4_title'); ?></h1>
                            <p><?php the_field('tab_4_sub-title'); ?></p>
                        </label>
                    <?php endif; ?>
                    <?php if( get_field('hidden_tab_and_panel_5') == 'yes' ): ?>
                        <label for="tab-five" id="tab-five-label" class="tab">
                            <h1><?php the_field('tab_5_title'); ?></h1>
                            <p><?php the_field('tab_5_sub-title'); ?></p>
                        </label>
                    <?php endif; ?>

                    
                   
                    <div id="tab-one-panel" class="panel active">
                        <?php 
                            if( get_field('panel_1_img_pos') == 'left' ) {
                                $class_flex = 'flex-row';
                                $class_text = 'text-66-right';
                            } else {
                                $class_text = 'text-66-left';
                                $class_flex = 'flex-row-reverse';
                            }
                        ?>
                        <div class="block-image-text-33-66">
                            <div class=" wrapper-33-66 <?php echo $class_flex; ?>">
                            <?php # the_field('panel_1_img_pos'); ?>
                                <div class="column-33">          
                                    <div class="left-image">
                                    <?php if( get_field('panel_1_img') ): ?>
                                        <img src="<?php the_field('panel_1_img'); ?>" />
                                    <?php endif; ?>
                                    </div>  
                                </div>
                                <div class="column-66 <?php echo $class_text; ?>">
                                    <h1 class="title-right "><?php the_field('panel_1_title'); ?></h1>
                                    <div class="bread-right">
                                        <?php the_field('panel_1_bread_text'); ?>
                                    </div> 
                                    <?php if( get_field('panel_1_link_txt') ): ?>
                                    <div class="link-right">
                                       <a href="<?php the_field('panel_1_link_url'); ?>"> 
                                            <?php the_field('panel_1_link_txt'); ?> <i class="fa fa-angle-right"></i>
                                    </a> 
                                    </div>
                                    <?php endif; ?>
                                    <?php if( get_field('panel_1_cta_txt') ): ?>
                                    <div class="link-right">
                                        <p class=" text-left tabs-cta"><a class="btn btn-primary" href="<?php the_field('panel_1_cta_url'); ?>"><?php the_field('panel_1_cta_txt'); ?></a></p>
                                    </div>
                                    <?php endif; ?>



                                </div>
                            </div>
                       </div>
                    </div>
                  
                    <?php if( get_field('hidden_tab_and_panel_2') == 'yes' ): ?>
                        <div id="tab-two-panel" class="panel">     
                        <?php 
                            if( get_field('panel_2_img_pos') == 'left' ) {
                                $class_flex = 'flex-row';
                                $class_text = 'text-66-right';
                            } else {
                                $class_text = 'text-66-left';
                                $class_flex = 'flex-row-reverse';
                            }
                        ?>
                        <div class="block-image-text-33-66">
                            <div class=" wrapper-33-66 <?php echo $class_flex; ?>">
                            <?php # the_field('panel_1_img_pos'); ?>
                                <div class="column-33">          
                                    <div class="left-image">
                                    <?php if( get_field('panel_2_img') ): ?>
                                        <img src="<?php the_field('panel_2_img'); ?>" />
                                    <?php endif; ?>
                                    </div>  
                                </div>
                                <div class="column-66 <?php echo $class_text; ?>">
                                    <h1 class="title-right "><?php the_field('panel_2_title'); ?></h1>
                                    <div class="bread-right">
                                        <?php the_field('panel_2_bread_text'); ?>
                                    </div> 
                                    <?php if( get_field('panel_2_link_txt') ): ?>
                                    <div class="link-right">
                                       <a href="<?php the_field('panel_2_link_url'); ?>"> 
                                            <?php the_field('panel_2_link_txt'); ?> <i class="fa fa-angle-right"></i>
                                    </a> 
                                    </div>
                                    <?php endif; ?>
                                    <?php if( get_field('panel_2_cta_txt') ): ?>
                                    <div class="link-right">
                                    <p class=" text-left tabs-cta"><a class="btn btn-primary " href="<?php the_field('panel_2_cta_url'); ?>"><?php the_field('panel_2_cta_txt'); ?></a></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                       </div>
                    </div>
                    <?php endif; ?>
                    <?php if( get_field('hidden_tab_and_panel_3') == 'yes' ): ?>
                    <div id="tab-three-panel" class="panel">
                        <?php 
                            if( get_field('panel_3_img_pos') == 'left' ) {
                                $class_flex = 'flex-row';
                                $class_text = 'text-66-right';
                            } else {
                                $class_text = 'text-66-left';
                                $class_flex = 'flex-row-reverse';
                            }
                        ?>
                        <div class="block-image-text-33-66">
                            <div class=" wrapper-33-66 <?php echo $class_flex; ?>">
                            <?php # the_field('panel_1_img_pos'); ?>
                                <div class="column-33">          
                                    <div class="left-image">
                                    <?php if( get_field('panel_3_img') ): ?>
                                        <img src="<?php the_field('panel_3_img'); ?>" />
                                    <?php endif; ?>
                                    </div>  
                                </div>
                                <div class="column-66 <?php echo $class_text; ?>">
                                    <h1 class="title-right "><?php the_field('panel_3_title'); ?></h1>
                                    <div class="bread-right">
                                        <?php the_field('panel_3_bread_text'); ?>
                                    </div> 
                                    <?php if( get_field('panel_3_link_txt') ): ?>
                                    <div class="link-right">
                                       <a href="<?php the_field('panel_3_link_url'); ?>"> 
                                            <?php the_field('panel_3_link_txt'); ?> <i class="fa fa-angle-right"></i>
                                    </a> 
                                    </div>
                                    <?php endif; ?>
                                    <?php if( get_field('panel_3_cta_txt') ): ?>
                                    <div class="link-right">
                                         <p class=" text-left tabs-cta"><a class="btn btn-primary" href="<?php the_field('panel_3_cta_url'); ?>"><?php the_field('panel_3_cta_txt'); ?></a></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                       </div>
                    </div>
                    <?php endif; ?>
                    <?php if( get_field('hidden_tab_and_panel_4') == 'yes' ): ?>
                        <div id="tab-four-panel" class="panel">
                        <?php 
                            if( get_field('panel_4_img_pos') == 'left' ) {
                                $class_flex = 'flex-row';
                                $class_text = 'text-66-right';
                            } else {
                                $class_text = 'text-66-left';
                                $class_flex = 'flex-row-reverse';
                            }
                        ?>
                            <div class="block-image-text-33-66">
                                <div class=" wrapper-33-66 <?php echo $class_flex; ?>">
                                <?php # the_field('panel_1_img_pos'); ?>
                                    <div class="column-33">          
                                        <div class="left-image">
                                        <?php if( get_field('panel_4_img') ): ?>
                                            <img src="<?php the_field('panel_4_img'); ?>" />
                                        <?php endif; ?>
                                        </div>  
                                    </div>
                                    <div class="column-66 <?php echo $class_text; ?>">
                                        <h1 class="title-right "><?php the_field('panel_4_title'); ?></h1>
                                        <div class="bread-right">
                                            <?php the_field('panel_4_bread_text'); ?>
                                        </div> 
                                        <?php if( get_field('panel_4_link_txt') ): ?>
                                        <div class="link-right">
                                        <a href="<?php the_field('panel_4_link_url'); ?>"> 
                                                <?php the_field('panel_4_link_txt'); ?> <i class="fa fa-angle-right"></i>
                                        </a> 
                                        </div>
                                        <?php endif; ?>
                                        <?php if( get_field('panel_4_cta_txt') ): ?>
                                    <div class="link-right">
                                    <p class=" text-left tabs-cta"><a class="btn btn-primary " href="<?php the_field('panel_4_cta_url'); ?>"><?php the_field('panel_4_cta_txt'); ?></a></p>

                                    </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('hidden_tab_and_panel_5') == 'yes' ): ?>
                        <div id="tab-five-panel" class="panel">
                            <?php 
                                if( get_field('panel_5_img_pos') == 'left' ) {
                                    $class_flex = 'flex-row';
                                    $class_text = 'text-66-right';
                                } else {
                                    $class_text = 'text-66-left';
                                    $class_flex = 'flex-row-reverse';
                                }
                            ?>
                            <div class="block-image-text-33-66">
                                <div class=" wrapper-33-66 <?php echo $class_flex; ?>">
                                <?php # the_field('panel_1_img_pos'); ?>
                                    <div class="column-33">          
                                        <div class="left-image">
                                        <?php if( get_field('panel_5_img') ): ?>
                                            <img src="<?php the_field('panel_5_img'); ?>" />
                                        <?php endif; ?>
                                        </div>  
                                    </div>
                                    <div class="column-66 <?php echo $class_text; ?>">
                                        <h1 class="title-right "><?php the_field('panel_5_title'); ?></h1>
                                        <div class="bread-right">
                                            <?php the_field('panel_5_bread_text'); ?>
                                        </div> 
                                        <?php if( get_field('panel_5_link_txt') ): ?>
                                        <div class="link-right">
                                        <a href="<?php the_field('panel_5_link_url'); ?>"> 
                                                <?php the_field('panel_5_link_txt'); ?> <i class="fa fa-angle-right"></i>
                                        </a> 
                                        </div>
                                        <?php endif; ?>
                                        <?php if( get_field('panel_5_cta_txt') ): ?>
                                    <div class="link-right">
                                    <p class=" text-left tabs-cta"><a class="btn btn-primary " href="<?php the_field('panel_5_cta_url'); ?>"><?php the_field('panel_5_cta_txt'); ?></a></p>
                                    </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>