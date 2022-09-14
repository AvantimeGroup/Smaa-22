<?php

/**
 * Template Name: Fullwidth Block Banner Design 2021
 *
 * @package SMÅA
 */

get_header();

?>
<?php
if (get_post_thumbnail_id($post->ID)):
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<div class="page-banner" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); ">
  <header class="entry-header">
     <h1 class="page-banner-title"><?php the_title(); ?></h1>
  </header>  
</div>
<?php endif; ?>

        <div id="#primary" class="">
            <main id="main" class="site-main">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'fullwidth-banner');
                endwhile;
                ?>
            </main>
        </div>

<?php
get_footer();
