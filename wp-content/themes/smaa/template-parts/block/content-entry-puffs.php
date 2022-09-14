<section class="entry-puffs" >
    <div class="container">
    <h1 class="text-center "><?php the_field('title'); ?></h1> 
        <div class="row">
            <div class="col container-puffs ">
                <div class="column-25 puff">
                    <div class="circle-127px">
                    <?php if(get_field('puff_ikon_1')): ?>   
                        <i><?php the_field('puff_ikon_1'); ?></i>
                    <?php endif; ?>
                    <?php if(get_field('egen_svg_1')): ?> 
                        <img src="<?php the_field('egen_svg_1'); ?>" class="puffer-svg" alt="target" />  
                    <?php endif; ?>     
                    </div>
                    <p class="puff-text"><?php the_field('puff_text_1'); ?>  </p>
                    <a href="<?php the_field('puff_link_1'); ?>" class="puff-link">Läs mer <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="column-25 puff">
                    <div class="circle-127px">
                    <?php if(get_field('puff_ikon_2')): ?>   
                        <i><?php the_field('puff_ikon_2'); ?></i>
                    <?php endif; ?>
                    <?php if(get_field('egen_svg_2')): ?> 
                        <img src="<?php the_field('egen_svg_2'); ?>" class="puffer-svg" alt="target" />  
                    <?php endif; ?>
                    </div>   
                    <p class="puff-text"><?php the_field('puff_text_2'); ?>   </p>
                    <a href="<?php the_field('puff_link_2'); ?>" class="puff-link">Läs mer <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="column-25 puff">
                    <div class="circle-127px">
                    <?php if(get_field('puff_ikon_3')): ?>   
                        <i><?php the_field('puff_ikon_3'); ?></i>
                    <?php endif; ?>
                    <?php if(get_field('egen_svg_3')): ?> 
                        <img src="<?php the_field('egen_svg_3'); ?>" class="puffer-svg" alt="target" />  
                    <?php endif; ?>
                    </div> 
                    <p class="puff-text"><?php the_field('puff_text_3'); ?>   </p>
                    <a href="<?php the_field('puff_link_3'); ?>" class="puff-link">Läs mer <i class="fa fa-angle-right"></i></a>  
                </div>
                <div class="column-25 puff">
                    <div class="circle-127px">
                    <?php if(get_field('puff_ikon_4')): ?>   
                        <i><?php the_field('puff_ikon_4'); ?></i>
                    <?php endif; ?>
                    <?php if(get_field('egen_svg_4')): ?> 
                        <img src="<?php the_field('egen_svg_4'); ?>" class="puffer-svg" alt="target" />  
                    <?php endif; ?>
                    </div> 
                    <p class="puff-text"><?php the_field('puff_text_4'); ?>   </p>
                    <a href="<?php the_field('puff_link_4'); ?>" class="puff-link">Läs mer <i class="fa fa-angle-right"></i></a>  
                </div>   
            </div>
        </div>
    </div>
</section>