
<section class=" compensation-calculator-block has-block-shade-background-color" data-pro-insurance="<?php the_field('procent_med_inkomst'); ?>" data-pro-med-akassa="<?php the_field('procent_med_akassa'); ?>" data-pro-utan-akassa="<?php the_field('procent_utan'); ?>" data-salary-limit="<?php the_field('salary_limit'); ?>">
    <div class="container">
 
        <div class="calc-wrapper">
            <div class="decoration-left"><div class="blue-ring-50px"></div></div>

            <div class="col col-sm-12 calc ml-auto mr-auto">

                <h1 class="text-center "><?php the_field('title'); ?></h1>
                <p><?php the_field('text'); ?></p>

                <form class="calculate-compensation">
                    <div class="form-group d-flex">
                        <!-- <img src="/wp-content/themes/smaa/assets/images/pig.svg" alt="" /> -->
                        <i class="fa fa-calculator"></i>
                        <input type="number" name="salary" placeholder="Ange din månadsinkomst" class="form-control-block"    value="" />
                   
                        <!-- <input type="number" name="salary" placeholder="Ange din månadsinkomst" class="form-control-block" data-proInsurance="<?php the_field('procent_med_inkomst'); ?>" data-proMedAkassa="<?php the_field('procent_med_akassa'); ?>" data-proUtanAkassa="<?php the_field('procent_utan'); ?>" data-salaryLimit="<?php the_field('salary_limit'); ?>" value="" /> -->
                
                    </div>
                </form>

                <div class="results collapse">
                 <!--   <strong>Ersättning utan a-kassa per månad</strong>
                    <p class="compensation utan">11 220 kr</p>-->

                    <strong>Ersättning med a-kassa per månad</strong>
                    <!-- <p class="compensation uif">22 000 kr</p> -->
                    <p class="compensation uif med-akassa">22 000 kr</p>

                    <strong>Total ersättning med inkomstförsäkring per månad</strong>
                    <!-- <p class="compensation insurance">21 000 kr</p> -->
                    <p class="compensation insurance med-inkomst">21 000 kr</p>
                </div>

                <div class="disclaimer text-center">
                    <hr>
                    <?php the_field('disclaimer'); ?>
                </div>   
                <?php if( get_field('calc_cta_btn_target') &&  get_field('calc_cta_btn_text')): ?> 
                    <div class="wp-block-buttons is-content-justification-center">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link has-smaa-orange-background-color has-background" href="<?php the_field('calc_cta_btn_target'); ?>/"><?php the_field('calc_cta_btn_text'); ?></a>
                        </div>
                    </div>                    
                <?php endif; ?>
            </div>
            <div class="decoration-right"><div class="orange-ring-89px"></div></div>
            <div class="decoration-right-right"><div class="light-blue-ring-25px"></div></div>
        </div>        
    </div>
</section>