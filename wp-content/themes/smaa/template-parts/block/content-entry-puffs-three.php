<?php 
/**
 *  Block Template: 3 big entry puffs
 *
 */
?>

 <section class="entry-puffs-3" >
    <div class="container">
        <div class="row">           
        <?php if (have_rows('three_big_entry_puffs')): ?>
            <div class="col container-puffs ">
            <?php while (have_rows('three_big_entry_puffs')): the_row(); ?>
                <div class="column-25 puff">
                    <div class="circle-200px">
                    <?php if(get_sub_field('entry_puff_icon')): ?>   
                        <?php the_sub_field('entry_puff_icon'); ?>
                    <?php endif; ?>
                    <?php if(get_sub_field('egen_svg')): ?> 
                        <img src="<?php the_sub_field('egen_svg'); ?>" class="puffer-svg" alt="target" />  
                    <?php endif; ?>     
                    <!-- </div> -->
                    </div>
                    <h3><?php the_sub_field('puff_title'); ?>  </h3>
                    <p ><?php the_sub_field('puff_bread_text'); ?>  </p>

                    <?php if(get_sub_field('optiona_knapp') == 'yes'):  // get the button  ?>
                    <div class="cta-link">
                        <a href="<?php the_sub_field('puff_btn_link'); ?>"  class=" cta-btn <?php the_sub_field('btn_style'); ?> " >     
                            <?php the_sub_field('puff_btn_text'); ?><?php the_sub_field('puff_btn_icon'); ?>
                        </a>
                    </div>
                    <?php endif; ?> 
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>

