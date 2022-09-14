<?php 
/**
 *  Block Template: Page ingress H2  fullwidth
 *
 */
?>
 <section class="fw-page-ingress-h2" >
    <div class="container">
         <div class="row-bold">
         <?php
            if (have_rows('ingress_text')) :
                while (have_rows('ingress_text')) : the_row();
            ?>

                <?php   if( get_sub_field('bold_text')): ?> 
                    <div class="h2-ingress">  
                <h2> <?php the_sub_field('bold_text'); ?></h2>
                </div>

                <?php 
                     endif;      
                endwhile;
            endif;
            ?>
        </div> 
    </div>
</section>