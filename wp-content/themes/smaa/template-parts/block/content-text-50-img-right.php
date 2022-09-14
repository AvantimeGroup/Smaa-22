
<section class="text-50-img-right">
    <div class="container wrapper-50-50 ">

        <div class="column-50 text-50-left">
            <?php if( get_field('section_title') ): ?>
                    <h1><?php the_field('section_title'); ?></h1>
            <?php endif; ?>

            <h1 class="title-right "><?php the_field('title_1'); ?></h1>
            <div class="bread-right">
                <?php the_field('text_1'); ?>
            </div> 
 
            <?php if( get_field('title_2') ): ?>
                <h1 class="title-right "><?php the_field('title_2'); ?></h1>
                <div class="bread-right">
                    <?php the_field('text_2'); ?>
                </div> 
            <?php endif; ?>

        </div>

        <div class="column-50 ">          
            <div class="left-image">
                <div class="img-wrapper">
                <?php $section_image = get_field('section_image');
                    if( !empty( $section_image ) ): ?>
                        <img src="<?php echo esc_url($section_image['url']); ?>" alt="<?php echo esc_attr($section_image['alt']); ?>" />
                    <?php endif; ?>
            </div>
            </div>  
        </div>

    </div>
</section>