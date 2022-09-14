<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SMÅA
 */

get_header();

?>
<div class="container mt-md-5 mt-4">
    <div class="row">
        <div id="#sidenav" class="col-md-3">

            <?php

            $parent_id       = get_post()->post_parent;
            $current_page_id = get_post()->ID;
            $ancestors       = get_ancestors($current_page_id, 'page');
            $has_childs      = (bool) sizeof(get_pages(['child_of' => $current_page_id]));
            $excluded_pages  = get_field('nav_exluded_pages', 'option');

            ?>




            <nav class="sidenav">
                <button class="btn btn-link expand d-md-none pull-right" data-toggle="collapse" data-target="#sidenav-wrapper"><i class="fa fa-navicon"></i></button>
                <!--
            <a class="title" href="/"><ion-icon name="home"></ion-icon></a> &rsaquo; <a href="<?php echo get_the_permalink(end($ancestors)); ?>"><?php echo get_the_title(end($ancestors)); ?></a>
-->
                <div id="sidenav-wrapper" class="collapse">
                    <?php

                    // Show 2nd site level if not top level element

                    /*
                wp_list_pages( [
                    'title_li' => false,
                    'child_of' => count($ancestors) > 0 ? end($ancestors) :  $current_page_id, //( $has_childs ) ? $current_page_id : $parent_id,
                    'depth'    => 5
                ] );
                */

                    wp_page_menu([
                        'title_li' => false,
                        //'child_of' => count($ancestors) > 0 ? end($ancestors) :  $current_page_id, //( $has_childs ) ? $current_page_id : $parent_id,
                        'depth'    => 5,
                        'before'   => '<ul class="sidenav-menu"">',
                        'after'    => '</ul>',
                        'exclude'  => join(',', $excluded_pages)
                    ]);
                    ?>


                </div>

            </nav>

        </div>
        <div id="#primary" class="col-md-7">
            <main id="main" class="site-main">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
                ?>
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'page');
                endwhile;
                ?>

                <p class="publish-date border-top border-bottom pl-3 pt-2 pb-2 mt-2 text-small d-block"><small>Uppdaterat: <?php the_modified_date(); ?></small></p>
            </main><!-- #main -->
        </div>
    </div>
</div>
<?php
//get_template_part( 'template-parts/content', 'pre_footer' );
//get_sidebar();
get_footer();
