<?php
/* 
Template Name: Medlemmar Arkiv 
*/
get_header();

?>
<?php  if (get_post_thumbnail_id(5050)):
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(5050), 'full' ); ?>
<div class="page-banner" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); ">
  <header class="entry-header">
     <h1 class="page-banner-title">Våra medlemmar</h1>
  </header>  
</div>
<?php endif; ?>
<div class="container mt-md-5 mt-4">
	<div class="member-row">


<div id="#primary" class="archive-22">
    <main id="main" class="site-main">

        <?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			}
		?>
     
        <div class="member-card-wrapper">
            <?php
            if(have_posts()) : while(have_posts()) : the_post();

                $work_title = get_field('work_title');
                $name = get_field('bio_namn');
                $bio_date = get_field('bio_datum');
                $bio_bild = get_field('bio_bild');
                $bio_utdrag = get_field('bio_utdrag');

            ?>

            <div class="member-card" onclick="location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;">
                <div class="member-card-img">   
                <?php # if( $bio_bild ): ?>
                  <!--  <img src="<?php echo $bio_bild ?>"/>-->
                <?php # endif; ?>
			   <?php if( !empty( $bio_bild ) ): ?>
                      <img src="<?php echo esc_url($bio_bild['url']); ?>" alt="<?php echo esc_attr($bio_bild['alt']); ?>" />
                 <?php endif; ?>
                </div>
                <div class="card-date">
                    <?php echo $bio_date ?>
                </div>
                <div class="card-title">
                    <?php echo $work_title ?>
                </div>
                <div class="bio-utdrag">
                    <?php echo $bio_utdrag ?>
                </div>
                <div class="card-read-more">
                        <a href="<?php echo get_permalink(); ?>">Läs mer<i class="fas fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>

        <?php
        endwhile; endif;
        ?>

        </div> <!--end member card wrapper -->

    </main>
</div>
<?php get_footer(); ?>
</div>
</div>