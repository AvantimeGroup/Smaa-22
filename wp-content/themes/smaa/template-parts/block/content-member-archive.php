<?php 
/**
 *  Block Template: Member archive
 *
 */
$antal_m = get_field('antal_members');
wp_reset_query();
$args = array(
    'post_type'=> 'medlemmar',
    'posts_per_page' => $antal_m,  
    'paged' => 1,
    'post_status' => 'publish',
);              
$memberposts = new WP_Query( $args );
?>
 <section class="member-archive"  >
    <div class="container">
        <div class="row-archive">
            <?php if($memberposts->have_posts()) : ?>
                <div class="member-card-wrapper">
                <?php while( $memberposts->have_posts()) : $memberposts->the_post();
             
                    $post_id = get_the_ID();
              
                    $work_title = get_field('work_title', $post_id);
                    $name = get_field('bio_namn', $post_id);
                    $bio_date = get_field('bio_datum', $post_id);
                    $bio_bild = get_field('bio_bild', $post_id);
                    $bio_utdrag = get_field('bio_utdrag', $post_id);

                ?>
                    <div class="member-card" onclick="location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;">
                        <div class="member-card-img">   
                        <?php #if( $bio_bild ): ?>
                      <!--      <img src="<?php echo $bio_bild ?>"/>-->
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
                                <a href="<?php echo get_permalink() . '?antal-m=' . $antal_m ; ?>">Läs mer <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                <?php
                endwhile; 
                wp_reset_postdata();  
                ?>
                </div> <!--end member card wrapper -->
            <?php
                if($memberposts->max_num_pages > 1){
                    echo '<div  data-role="' .  $antal_m . '" class="member-loadmore">Visa fler medlemmar<div class="cv-spinner is-hide"> <span class="spinner"></span></div></div>';
                }
            endif;
            wp_reset_query();	 
            ?>
        </div> 
    </div>

</section>
