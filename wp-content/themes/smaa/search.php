<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package SMÅA
 */

get_header();
?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
        <div id="#primary" class="col-md-7">
            <main id="main" class="site-main">

                <h1>Sökresultat </h1>


                <div class="search-form-wrapper mb-2">
                    <?php get_search_form(); ?>
                </div>

                <ul class="nav">
                    <li class="nav-item"> <strong class="nav-link pl-0">Filtrera:</strong></li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (!isset($_GET['post_type'])) ? 'active' : null ?>" href="<?php echo remove_query_arg('post_type', false); ?>">Allt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['post_type']) && $_GET['post_type']) == 'news' ? 'active' : null ?>" href="<?php echo add_query_arg('post_type', 'page'); ?>">Sidor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['post_type'])) && $_GET['post_type'] == 'page' ? 'active' : null ?>" href="<?php echo add_query_arg('post_type', 'news'); ?>">Nyheter</a>
                    </li>
                </ul>


                <hr>

                <?php global $wp_query;    ?>
                <p><?php echo $wp_query->found_posts; ?> sökresultat hittades.</p>

                <hr>

                <?php
                while (have_posts()) :


                    the_post();
                    get_template_part('template-parts/content', 'search');
                endwhile;
                ?>


            </main><!-- #main -->
            </p><!-- #primary -->
        </div>
    </div>
</div>
<?php
get_footer();
