<?php 
/**
 *  Block Template:Recent News 
 *
 */
$getdate = getdate();
$thisyear = $getdate["year"];
$newsyear = $thisyear;


if( get_field('antal_nyheter')){
    $antal_nyheter = get_field('antal_nyheter');
}else {
    $antal_nyheter = 4;
}

wp_reset_query();
$args = array(
    'post_type'=> 'nyheter',
    'posts_per_page' => $antal_nyheter,  
    'paged' => 1,
    'post_status' => 'publish',
);              
$recent_news = new WP_Query( $args );

?>
<section class="recent-news" >
    <div class="container">
        <div class="row-recent news">
            <h2 class="recent-title"><?php the_field('recent_news_title'); ?></h2>
            <div class="recent-wrapper">
            <?php
                if ( $recent_news->have_posts() ): while ( $recent_news->have_posts() ) : $recent_news->the_post();
                
                $text = get_the_excerpt();
                $words = 12;
                $more = ' …';
                $excerpt = wp_trim_words( $text, $words, $more );
           ?>
                <div class="post-wrapper" onclick="location.href='<?php echo get_permalink() .'?newsyear='. $newsyear ;; ?>'" style="cursor:pointer;">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post-img">
                   <?php the_post_thumbnail('medium');?>
                    </div>
                    <?php } ?>
                    <div class="post-text">
                        <div class="post-date"><?php echo get_the_date('d F Y'); ?></div>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                        <div class="post-utdrag"><?php echo $excerpt; ?></div>
                    </div>
                </div>  
            <?php
            endwhile; endif;
            ?>
            </div>  <!--end recent wrapper-->
           <h3 class="more-recent-news"> <a href="/nyheter"> Se alla nyheter</a></h3>
        </div> 
    </div>
</section>