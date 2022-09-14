
<?php 
/*
//  Block oembed Video
*/
// 


// background gray or white
if( get_field('background') == 'white' ) {
   $class_bg = 'bg-white';
} else {
   $class_bg = 'bg-gray';
}


?>

<section class="oembed-video  <?php echo $class_bg; ?>" >
    <div class="container-video">
        <div class="row video-block-wrapper">

            <div class="text-decor">

                <h1><?php the_field('title_video'); ?></h1>
                <p> <?php the_field('ingress_text'); ?> </p>

                <?php if( get_field('decorations') == 'yes' ):  ?>
                <div class="decoration-right">
                    <div class="decoration-cluster">
                        <!-- <div class="orange-ring-50px"></div> -->
                        <div class="blue-ring-25px"></div>
                        <!-- <div class="blue-ring-14px"></div> -->
                        <div class="blue-ring-50px"></div>
                    </div>  
                </div> 
                <?php endif; ?>
             </div>

            <div class="embed-container">
                <?php 

                    $iframe = get_field('video_embed_link');

                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replcae HTML.
                    $params = array(
                        'controls'  => 1,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $iframe);

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                    echo $iframe;
                            
                ?>
             </div>
        </div>
    </div>
</section>


