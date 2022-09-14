<?php

/**
 * Template Name: Fullbredd
 *
 * @package SMÅA
 */

get_header();
?>
<div id="#primary">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'fullwidth');
        endwhile;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_template_part( 'template-parts/content', 'pre_footer' );
//get_sidebar();
get_footer();
