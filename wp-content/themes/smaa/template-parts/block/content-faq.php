<section class="smaa-block faq-block">
    <div class="container col-md-6">

        <h1 class="text-center mb-5"><?php the_field('title'); ?></h1>
        <p class="lead text-center mb-4"><?php the_field('text'); ?></p>

        <div class="row no-gutters">

            <?php
            if (have_rows('featured_faq')) :

                $count = 1;

                while (have_rows('featured_faq')) : the_row();

                    $id = uniqid();

            ?>

                    <div class="col col-12 col-md-6">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#<?php echo $id ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <?php the_sub_field('question') ?><span class="ml-auto">
                                            <ion-icon class="ml-auto" name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </button>
                                </h5>
                            </div>

                            <div id="<?php echo $id ?>" class="collapse" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <?php the_sub_field('answer') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    if ($count % 2 == 0) :
                    ?>
                        <!-- Force next columns to break to new line at md breakpoint and up, should occur after every two cards -->
                        <div class="w-100 d-none d-md-block"></div>
            <?php
                    endif;

                    $count++;

                endwhile;
            endif;
            ?>

        </div>

        <?php
        $link = get_field('link');
        ?>
        <p class="mt-4 text-center"><a class="btn btn-primary" href="<?php echo $link['url'] ?>"><?php echo $link['title']  ?></a></p>

    </div>
</section>