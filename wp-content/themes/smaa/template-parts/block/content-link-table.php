<?php 
/*

//  Block Link grid
//  Title, links

*/

// background gray or white
if( get_field('bakgrunds_farg') == 'white' ) {
   $class_bg = 'bg-white';
} else {
   $class_bg = 'bg-gray';
}
?>
 <section class="link-table <?php echo $class_bg; ?>" >
    <div class="container">
        <div class=" table-row">   
            <h1 ><?php the_field('table_title'); ?></h1>
            <div class="link-wrapper">
                <div class='row'>
                <?php if(have_rows('lank_grid')): ?>
                    <?php while (have_rows('lank_grid')): the_row();
                    $target = get_sub_field('lank_target');
                    if($target == 'new'){
                        $target = 'target = _blank';
                    } else {
                        $target = '';
                    }
                    ?>
                    <div class='column'>
                        <div class="grid-link">
                            <a href="<?php the_sub_field('lank_url'); ?>" <?php echo $target; ?>><?php the_sub_field('lank_text'); ?> <?php the_sub_field('lank_ikon'); ?></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
            <!-- table notes -->
            <?php if(have_rows('table_notes')): ?>
                    <div class="table-notes   ">
                    <?php while (have_rows('table_notes')): the_row();
                    $note = get_sub_field('table_note');
                 ?>
                   <div class="table-note"> <?php echo $note; ?></div>
              <?php endwhile; ?>
                    </div> 
                <?php endif; ?>       
        </div>
    </div>
</section>