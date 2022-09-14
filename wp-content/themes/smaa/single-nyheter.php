<?php

/**
 * The template for displaying all single news posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SMÅA
 */

get_header();
$antal_4 = 4;
if( isset($_GET['newsyear'])){
    $newsyear =  $_GET['newsyear'];
}else{
    $getdate = getdate();
    $newsyear = $getdate["year"];
}
?>
<div class="container mt-md-5 mt-4">
	<div class="news-row">
		<div id="primary" class="">
			<main id="main" class="site-main">
				<?php
				if (function_exists('yoast_breadcrumb')) {
					yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
				}

				while (have_posts()) :
					the_post();

                    $single_id = get_the_ID();
                   
					get_template_part('template-parts/content', get_post_type());

				endwhile; // End of the loop.

                wp_reset_postdata(); 
                wp_reset_query();	
                $args = array(
                    'posts_per_page' => $antal_4,
                    'pages' => 1,
                    'post_status' => 'publish',
                    'post_type'   => 'nyheter',
                    // 'exclude'     => array( $single_id),
                    'post__not_in' => array( $single_id),
                    'date_query'  => array(
                            array(
                                'year'  => $newsyear
                                ),
                            ),
                        );   
                        $blog_posts = new WP_Query( $args );
				?>
                <section class="news-archive"  >
                    <div class="news-container">
                        <div class="row-archive">
                           
                        <?php
                            if ( $blog_posts->have_posts() ) : ?> 
                             <h2 class="more-news"> Fler nyheter </h2>
                                <ul class="blog-posts">
                                <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>  
                                    <li >
                                        <div class="post-wrapper" onclick="location.href='<?php echo get_permalink() .'?newsyear='. $newsyear ;; ?>'" style="cursor:pointer;">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            <div class="post-img"><?php the_post_thumbnail('medium');?></div>
                                            <?php } ?>
                                            <div class="post-text">
                                                <h2 class="post-title"><?php the_title(); ?></h2>
                                                <div class="post-date"><?php echo get_the_date('d F, Y'); ?></div>
                                                <div class="post-utdrag">
                                                <?php if(strlen(get_the_excerpt()) < 10){
                                                                        $more_utdrag = '';
                                                                    }else{
                                                                        $more_utdrag = get_the_excerpt();
                                                                    }
                                                    echo $more_utdrag; 
                                                    
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-link">
                                            <a href="<?php echo get_permalink() .'?newsyear='. $newsyear                                    ; ?>"> Läs mer <i class="fas fa-angle-right"></i></a>
                                        </div>
                                    </li>
                                <?php
                                    endwhile; 
                                    wp_reset_postdata();                      
                                ?>
                                </ul>
                                <?php if($blog_posts->max_num_pages > 1){
                                ?>
                                <div data-role="<?php echo $newsyear; ?>" data-antal="<?php echo $antal_4; ?>" class="loadmore">
                                    Visa fler nyheter  <div class="cv-spinner is-hide"> <span class="spinner"></span></div>
                                </div>
                                <?php } 
                                endif; 
                                ?>
                        
                        </div>
                    </div>
                </section>
			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div>
<?php
get_footer();
