<section class="smaa-block entry-points-block">
    <div class="container">

        <div class="card-deck">
            <?php
            if (have_rows('content')) :
                while (have_rows('content')) : the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
            ?>
                    <div class="card">

                        <?php if ($image) : ?>
                            <img class="card-img-top" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title'] ?>">
                        <?php endif; ?>

                        <div class="card-body">
                            <strong class="card-title"><?php the_sub_field('title') ?></strong>
                            <p class="card-text"><?php the_sub_field('text') ?></p>
                        </div>

                        <?php if ($link) : ?>
                            <div class="card-footer">
                                <a href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
            <?php
                endwhile;
            else :
            // no rows found
            endif;
            ?>
        </div>

        <?php
        if (have_rows('related_links')) :
        ?>
            <ul class="nav mt-5">
                <li class="nav-item">
                    <strong class="nav-link">Andra sökte på:</strong>
                </li>
                <?php
                while (have_rows('related_links')) : the_row();
                    $link = get_sub_field('link');
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        <?php
        endif;
        ?>

    </div>
</section>