<?php
if( get_field('readmore_target')){
    $target = get_field('readmore_target');
}
if( get_field('readmore_url')){
    $alerturl = get_field('readmore_url');
}
$class_block_id =  $post->ID;

?>



<section class="alert-21 smaa-block alert-block block-bg-white d-none" id="<?php echo $class_block_id; ?>">
    <div class="alert" role="alert">
        <div class="container">
            <div class="text-shell">
                 <div class="svg-icon"> 
                    <img src="<?php echo 'https://smaa-test.lab.avantime.io/wp-content/themes/smaa/template-parts/block/assets/Warning_2198195.svg';?>" width="22" height="22">    
                </div> 
                <div class="text-wrapper">
                    <?php the_field('text'); ?>
                    <?php if( get_field('readmore') ): ?>
                        <a href="<?php the_field('readmore_url'); ?>" target="<?php the_field('readmore_target'); ?>"><?php the_field('readmore'); ?> </a>              
                    <?php endif; ?>
                    </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</section>
