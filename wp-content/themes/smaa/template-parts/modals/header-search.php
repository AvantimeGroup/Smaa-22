<div id="header-search" class="collapse header-flyout">
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <h1 class="d-none d-md-block">Sök</h1>
                    <?php
                    get_search_form();
                    ?>

                    <?php
                    if (have_rows('popular_search_terms', 'options')) :
                    ?>
                        <ul class="nav mt-3">
                            <li class="nav-item">
                                <strong class="nav-link">Andra sökte på:</strong>
                            </li>
                            <?php
                            while (have_rows('popular_search_terms', 'options')) : the_row();
                                $link = get_sub_field('term');
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
            </div>
        </div>
    </div>
</div>