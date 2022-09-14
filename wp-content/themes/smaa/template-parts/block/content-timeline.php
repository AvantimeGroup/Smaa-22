
<?php 
/*

//  Block Timeline
//  Title, timeline

*/

// background gray or white
if( get_field('block_background') == 'white' ) {
   $class_bg = 'bg-white';
} else {
   $class_bg = 'bg-gray';
}
?>

<section class="timeline-orange  <?php echo $class_bg; ?>" >
    <div class="container-timeline">
        <div class="row-timeline ">
            <div class="cta-box  timeline-wrapper " >
                <h1><?php the_field('title'); ?></h1>
                <div class="timeline">
                    <ul>  
                    <?php if (have_rows('timeline_items')) :
                            while (have_rows('timeline_items')) : the_row();
                        ?> 
                                <li>
                                    <div>
                                        <h2> <?php the_sub_field('item_title') ?></h2>
                                        <p><?php the_sub_field('item_text') ?></p>
                                    </div>
                                </li>
                        <?php  
                            endwhile;
                        endif;
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>




