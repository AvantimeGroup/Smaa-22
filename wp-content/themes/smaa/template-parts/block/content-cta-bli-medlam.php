 
<section class=" cta-bli-medlam" >
    <div class="container">
        <div class="row cta-row">
            <div class="cta-box ">
                <h1 class="text-center "><?php the_field('title'); ?></h1>
                <p><?php the_field('bread_text'); ?></p>
                <div class="block-buttons ">
                    <div class="block-button">
                        <a class="orange" href="<?php the_field('btn_url_1'); ?>" target="_blank"><?php the_field('btn_text_1'); ?></a>
                    </div>
                    <div class="block-button">
                        <a class="white-btn " href="<?php the_field('btn_url_2'); ?>"><?php the_field('btn_text_2'); ?></a>
                    </div>
                </div>              
            </div>
        <?php if( get_field('section_decoration') == 'yes' ): ?> 
        <div class="decoration-right">
            <div class="decoration-cluster">
                <div class="blue-ring-50px"></div>
                <div class="blue-ring-25px"></div>
                <div class="light-blue-ring-25px"></div>
            </div>
        </div> 
        <?php endif; ?>
        </div>

    </div>
</section>