<?php

/**
 * The template for displaying all single medlemmar posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SMÅA
 */

get_header();
the_post();

$work_title = get_field('work_title');
$name = get_field('bio_namn');
$bio_date = get_field('bio_datum');
$bio_bild = get_field('bio_bild');
$citat = get_field('member_citat');
$bio_whole = get_field('bio_helt');
$ftg_started = get_field('ftg_started');
$antal = get_field('ftg_antal_anstallda');
$owner = get_field('ftg_agare');
$company_name = get_field('ftg_namn');
$company_www = get_field('ftg_www');
$link_text = get_field('lank_text');

if( isset($_GET['antal-m'])){
    $antal_m =  $_GET['antal-m'];
}
$antal_4 = 4;
?>
<div class="container mt-md-5 mt-4">
	<div class="member-row">

		<div id="primary" class="">
			<main id="main" class="site-main">
				<?php
				if (function_exists('yoast_breadcrumb')) {
					yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
				}
				?>
                <div class="member-single"> 
                    <div class="member-img">   
                        <?php # if( $bio_bild ): ?>
                           <!--     <img src="<?php echo $bio_bild ?>"/>-->
                            <?php # endif; ?>
                        <?php if( !empty( $bio_bild ) ): ?>
                            <img src="<?php echo esc_url($bio_bild['url']); ?>" alt="<?php echo esc_attr($bio_bild['alt']); ?>" />
                        <?php endif; ?>

                    </div>
                    <div class="member-quote">
                        <blockquote><?php echo $citat;?></blockquote>
                    </div>
                    <div class="member-name">
                            <?php echo '- ' . $work_title . ', ' . $name; ?>
                    </div>

                    <div class="ftg-info-wrapper">
                        <div class="info-col">
                            <div class="info-name"><span>Grundat:</span> <?php echo $ftg_started; ?></div>
                            <div class="info-name"><span>Antal anställda:</span> <?php echo $antal; ?></div>
                            <div class="info-name"><span>Ägare:</span> <?php echo $owner; ?></div> 
                        </div>
                        <div class="info-col">
                            <div class="info-name"><span><?php echo $company_name; ?></span></div>
                            <div class="info-name"><a href="<?php echo $company_www; ?>"><?php echo $link_text; ?></a></div>
                        </div>
                    </div>
                    <h2 class="work-title"><?php echo $work_title; ?></h2>
                    <div class="bio-bread"><?php echo $bio_whole; ?></div>

                </div>  <!-- end member -->
                <div class="recent-members">
                    <h2 class="recent-rubrik">Våra medlemmar</h2>
                    
                    <?php wp_reset_query();	 

                        $args = array(
                            'posts_per_page' => $antal_4,
                            'post_type'		=> 'medlemmar',
                            'paged' => 1,
                            'post_status' => 'publish',
                        );
                        $recent_query = new WP_Query( $args );
                        if( $recent_query->have_posts() ): ?>
                            <div class="member-card-wrapper">
                        <?php
                            while( $recent_query->have_posts() ) : $recent_query->the_post();

                            $work_title = get_field('work_title');
                            $name = get_field('bio_namn');
                            $bio_date = get_field('bio_datum');
                            $bio_bild = get_field('bio_bild');
                            $bio_utdrag = get_field('bio_utdrag');
                        ?>

                                <div class="member-card" onclick="location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;">
                                    <div class="member-card-img">   
                                    <?php if( $bio_bild ): ?>
                                        <img src="<?php echo $bio_bild ?>"/>
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
                                            <a href="<?php echo get_permalink(). '?antal-m=' . $antal_m ; ?>">Läs mer <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>

                                <?php
                            endwhile; 
                            wp_reset_postdata();  
                            ?>

                            </div> <!--end member card wrapper -->
                        <?php
                            if($recent_query->max_num_pages > 1){
                                echo '<div  data-role="' .  $antal_4 . '" class="member-loadmore">Visa fler medlemmar<div class="cv-spinner is-hide"> <span class="spinner"></span></div></div>';
                            }

                        endif;
                        wp_reset_query();	 
                                ?>
                    </div>
                </div>  <!-- end recent menbers -->
			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div>
<?php
get_footer();
