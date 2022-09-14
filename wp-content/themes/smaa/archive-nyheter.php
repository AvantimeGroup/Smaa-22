<?php
/* 
Template Name:  Nyheter Archiv
*/
get_header();
	
$getdate = getdate();
$thisyear = $getdate["year"];
if( isset($_GET['newsyear'])){
    $newsyear =  $_GET['newsyear'];
}else{
    $newsyear = $thisyear;
}
$antal_4 = 10;
?>
<?php  if (get_post_thumbnail_id(5050)):
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(5050), 'full' ); ?>
<div class="page-banner" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); ">
  <header class="entry-header">
     <h1 class="page-banner-title">Nyheter</h1>
  </header>  
</div>
<?php endif; ?>
<div class="container mt-md-5 mt-4">
	<div class="news-row">
        <div id="#primary" class="archive-22">
            <main id="main" class="site-main">
            <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
            ?>
                <section class="news-archive"  >
                    <div class="news-container">
                        <h1 class="mobile-h1"> Nyheter </h1>
                        <div class="row-archive">
                        <div class="archive-year">
                            <ul class="year-list">
                            <?php foreach(posts_by_year() as $year => $posts) : ?>
                                <li id="" class="">
                                <?php if ($newsyear == $year){ ?>
                                    <a href="<?php echo site_url('/nyheter/?newsyear=') . $year ; ?>" class="current-year"><?php echo $year; ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo site_url('/nyheter/?newsyear=') . $year ; ?>" class=""><?php echo $year; ?></a>
                                <?php }  ?>
                                </li>
                            <?php 
                            endforeach; 
                            wp_reset_postdata(); 
                            ?>    
                            </ul>
                        </div> 
                    
                        <?php
                        wp_reset_postdata();
                          
                        $args = array(
                            'posts_per_page' => $antal_4,
                            'pages' => 1,
                            'post_status' => 'publish',
                            'post_type' => 'nyheter',
                            'date_query' => array(
                                    array(
                                        'year'  => $newsyear
                                        ),
                                    ),
                                ); 
                        $blog_posts = new WP_Query( $args );  	
                        $count_year_news =$blog_posts->post_count;
                        
                        if ( $blog_posts->have_posts() ) : ?> 
                            <ul class="blog-posts">
                            <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>  
                                <li >
                                    <div class="post-wrapper" onclick="location.href='<?php echo get_permalink() .'?newsyear='. $newsyear ;; ?>'" style="cursor:pointer;">
                                        <?php if( has_post_thumbnail() ) { ?>
                                        <div class="post-img"><?php the_post_thumbnail('medium');?></div>
                                        <?php } ?>
      
                                        <div class="post-text">
                                            <h2 class="post-title"><?php the_title(); ?></h2>
                                            <div class="post-date"><?php echo get_the_date('d F, Y'); ?></div>
                                            <div class="post-utdrag"><?php the_excerpt(); ?></div>
                                        </div>
                                    </div>
                                    <div class="post-link">
                                        <a href="<?php echo get_permalink() .'?newsyear='. $newsyear ; ?>"> Läs mer <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </li>
                            <?php
                                endwhile; 
                                wp_reset_postdata();                      
                            ?>
                            </ul>
                            <?php if($count_year_news >= 10){
                            ?>
                            <div data-role="<?php echo $newsyear; ?>"  data-antal="<?php echo $antal_4; ?>" class="loadmore">
                                Visa fler nyheter  <div class="cv-spinner is-hide"> <span class="spinner"></span></div>
                            </div>
                            <?php } 
                             endif; 
                            ?>

                        </div>
                    </div>
                </section>
            </main>
        </div><!-- end archive -22 -->
    </div>
</div>

<?php get_footer(); ?>
