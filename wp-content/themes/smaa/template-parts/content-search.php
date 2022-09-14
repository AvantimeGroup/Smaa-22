<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SMÅA
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php smaa_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
	</header><!-- .entry-header -->



	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->



	<footer class="border-top border-bottom pl-3 pt-2 pb-2 mt-2 text-small d-block">
		<small><?php smaa_posted_on(); ?></small>
	</footer>

</article><!-- #post-<?php the_ID(); ?> -->