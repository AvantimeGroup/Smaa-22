<?php
/**
 * Template part for displaying page content in fullwidth banner page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SMÅA
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
     the_content();
?>
</article><!-- #post-<?php the_ID(); ?> -->
