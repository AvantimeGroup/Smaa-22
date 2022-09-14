<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SMÅA
 */

get_header();
?>
<div class="container mt-md-5 mt-4">
	<div class="row">
		<div id="#sidenav" class="col-md-3">

			<?php
			get_sidebar('sidebar-1');
			?>
		</div>

		<div id="primary" class="col-md-7">
			<main id="main" class="site-main">

				<?php
				if (function_exists('yoast_breadcrumb')) {
					yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
				}
				?>

				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', get_post_type());

				//the_post_navigation();

				/*
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
*/
				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div>
<?php
get_footer();
