<?php
/**
 * Block Name: Hero Gray bottom curve.
 *
 * This is the template for hero blocks.
 */
?>
 <section class=" hero-gray-curve ">
    <div class="container banner-wrapper">
        <div class="banner-column">
            <h1 ><?php the_field('title'); ?></h1>
            <p><?php the_field('section_para'); ?>  </p>                
            <ul>
                 <?php if( get_field('punkt_1') ): ?>
                    <li><?php the_field('punkt_1'); ?></li>
                <?php endif; ?> 
                <?php if( get_field('punkt_2') ): ?>
                    <li><?php the_field('punkt_2'); ?></li>
                <?php endif; ?> 
                <?php if( get_field('punkt_3') ): ?>
                    <li><?php the_field('punkt_3'); ?></li>
                <?php endif; ?> 
                <?php if( get_field('punkt_4') ): ?>
                    <li><?php the_field('punkt_4'); ?></li>
                <?php endif; ?> 
                <?php if( get_field('punkt_5') ): ?>
                    <li><?php the_field('punkt_5'); ?></li>
                <?php endif; ?>    
            </ul>
            <?php   if( get_field('hero_cta_btn_target') &&  get_field('hero_cta_btn_text')): ?> 
                <div class="hero-block-button-wrapper">   
                    <a class="btn hero-block-button  " href="<?php the_field('hero_cta_btn_target'); ?>/"><?php the_field('hero_cta_btn_text'); ?></a>                
                </div>
            <?php  endif; ?>
            <?php   if( get_field('hero_bottom_link')): ?> 
                <div class=" hero-bottom-link">
                  <?php the_field('hero_bottom_link_text'); ?> 
                    <a id="log-in" data-toggle="collapse" data-target="#header-login">     
                        <?php the_field('hero_bottom_link'); ?>
                    </a>
                 </div>
            <?php  endif; ?> 
        </div>
        <div class="banner-column-right ">        
            <?php if( get_field('section_image') ): ?>
                    <div class="square-to-round">
                    <?php $section_image = get_field('section_image');
                    if( !empty( $section_image ) ): ?>
                        <img src="<?php echo esc_url($section_image['url']); ?>" alt="<?php echo esc_attr($section_image['alt']); ?>" />
                    <?php endif; ?>  
   
                    </div>
            <?php endif; ?>   
              <div class="decoration-right">
                <div class="circle-315px"></div>
        </div> 
        </div>
    </div>   
</section>

