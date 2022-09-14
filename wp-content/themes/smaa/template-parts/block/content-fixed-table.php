<?php 
/**
 *  Block Template: Table
 *
 */
 //align text & buttons

 if( get_field('title_pos') == 2 ) {
    $class_title_align = 'title-center';
 } else if( get_field('title_pos') == 3 ) {
    $class_title_align = 'title-right';
 } else {
    $class_title_align = 'title-left';
 } 
 if( get_field('notes_pos') == 'left' ) {
    $class_notes_align = 'notes-left';
 } else if( get_field('notes_pos') == 'right' ) {
    $class_notes_align = 'notes-right';
 } else {
    $class_notes_align = 'notes-center';
 } 
?>
 <section class="fixed-table" >
    <div class="container">
        <div class=" table-row">   
        <h1 class="<?php echo $class_title_align; ?>"><?php the_field('table_title'); ?></h1>
        <div class="table-orange">
            <?php      

                    $table = get_field( 'tabell' );

            if ( ! empty ( $table ) ) {

                echo '<table border="0">';

                    if ( ! empty( $table['caption'] ) ) {

                        echo '<caption>' . $table['caption'] . '</caption>';
                    }

                    if ( ! empty( $table['header'] ) ) {

                        echo '<thead>';

                            echo '<tr>';

                                foreach ( $table['header'] as $th ) {

                                    echo '<th>';
                                        echo $th['c'];
                                    echo '</th>';
                                }

                            echo '</tr>';

                        echo '</thead>';
                    }

                    echo '<tbody>';

                        foreach ( $table['body'] as $tr ) {

                            echo '<tr>';

                                foreach ( $tr as $td ) {

                                    echo '<td>';
                                        echo $td['c'];
                                    echo '</td>';
                                }

                            echo '</tr>';
                        }

                    echo '</tbody>';

                echo '</table>';
            }    
            ?>  
            </div>
            <?php if(have_rows('table_notes')): ?>
                    <div class="table-notes  <?php echo $class_notes_align; ?> ">
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