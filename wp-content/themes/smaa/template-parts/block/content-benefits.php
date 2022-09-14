<section class="smaa-block benefits-block <?php echo $block['className']?>">
    <div class="container">
        <h1 class="text-center mb-5"><?php the_field('title'); ?></h1>
        <div class="row">
            <div class="col col-md-10 ml-auto mr-auto">
                <dl class="benefits">
                    <?php
                    if (have_rows('content')) :
                        while (have_rows('content')) : the_row();
                            $image = get_sub_field('image');
                            $link = get_sub_field('link');
                    ?>
                            <dt><i class="fa fa-check-circle" aria-hidden="true"></i><?php the_sub_field('title') ?></dt>
                            <dd>
                                <p><?php the_sub_field('text') ?></p>
                            </dd>
                    <?php
                        endwhile;
                    endif;
                    ?>

                </dl>
                <?php
                    if(!empty(get_field('additional_content')['rubrik']) && !empty(get_field('additional_content')['text_content'])): 
                ?>
                    <div class="benefit-extra-field">
                        <h1><?php echo get_field('additional_content')['rubrik'];?></h1>
                        <p><?php echo get_field('additional_content')['text_content'];?></p>
                    </div>
                <?php
                    endif;
                ?>
            </div>

        </div>
        <div class="col col-sm-12 text-center mt-5">
            <?php
            $link = get_field('button_link');
            ?>
            <a class="btn btn-primary" href="<?php echo $link['url'] ?>" target="_blank"><?php echo $link['title']  ?></a>
        </div>
    </div>
</section>