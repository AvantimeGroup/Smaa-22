<?php 
/**
 *  Block Template: Block title
 *
 */
if( get_field('title_position')){
    $title_pos = get_field('title_position');
} else {
    $title_pos ='';
}

    // background gray or white
    if( get_field('block_bakgrund') == 'white' ) {
        $class_bg = 'bg-white';
     } else {
        $class_bg = 'bg-gray';
     }
?>
 <section  class="blockblock-title <?php echo $class_bg; ?>">
    <div class="container">
        <div class="row-title">
        <?php if( get_field('title_text')): ?>          
                <div class="<?php echo $title_pos; ?>">
                <h1> <?php the_field('title_text'); ?></h1>
            </div>    
        <?php  
            endif;  
        ?>
        </div> 
    </div>
</section>