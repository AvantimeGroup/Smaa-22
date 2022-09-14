<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SMÅA
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<article>
			<div class="text-center">
				<h1>404</h1>

				<p class="mb-5 mt-3"><img src="/wp-content/themes/smaa/assets/images/404.png" alt="" class="img-fluid" /></p>
				<p class="lead">OPPS, VI KAN INTE HITTA DEN SIDAN</p>
				<p>Antingen gick något fel eller så finns inte den sidan.</p>

				<p class="mt-5"><a class="btn btn-primary btn-lg" href="/">Gå till startsidan</a></p>
			</div>
		</article>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer('empty');
