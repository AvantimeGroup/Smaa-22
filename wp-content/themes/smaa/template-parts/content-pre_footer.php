<?php

/**
 * Pre footer template
 */
?>
<?php if (!empty(get_theme_mod('smaa_pre_footer_menu'))) : ?>
    <section class="pre-footer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        <?php
                        $custom_menu_content = wp_nav_menu(array(
                            'theme_location' => 'menu-2',
                            'menu_class'     => 'nav-menu-default'
                        ));
                        echo $custom_menu_content;
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>