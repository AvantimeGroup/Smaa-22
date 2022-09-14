<?php 
/**
 *  Block Template: Table
 *
 */
 //align text & buttons

 if( get_field('text_pos') == 2 ) {
    $class_text_align = 'text-center';
 } else if( get_field('text_pos') == 3 ) {
    $class_text_align = 'text-right';
 } else {
    $class_text_align = 'text-left';
 } 
 if( get_field('notes_pos') == 'left' ) {
    $class_notes_align = 'notes-left';
 } else if( get_field('notes_pos') == 'right' ) {
    $class_notes_align = 'notes-right';
 } else {
    $class_notes_align = 'notes-center';
 } 
?>
 <section class="comp-table" >
 <script>
     jQuery(document).ready(function () {
            jQuery('.table-orange td, .table-orange th').hover(function () {
                  jQuery('.table-orange td:nth-child(' + (jQuery(this).index() + 1) + ')').addClass('hover');
                },function () {
                    jQuery('table td:nth-child(' + (jQuery(this).index() + 1) + ')').removeClass('hover');
                });
		 	
		 	// show hide the table

                jQuery(".table-show").click(function(){
                  jQuery(".table-row").toggle('slow');
                  jQuery(".table-show").toggle();
					// inital focus on show
					if(dayFocus >= 0 && dayFocus <= 5){
					//	jQuery('tr').eq(tableRowX).css("background-color", "yellow");

					//	alert(tableRowX +' ' + tableColumnY + ' ' + dayFocus);
					}
				
                  jQuery(".table-hide").toggle();
                }); 
		 
                jQuery(".table-hide").click(function(){
                  jQuery(".table-row").toggle('slow');
                  jQuery(".table-hide").toggle();
                  jQuery(".table-show").toggle('300');
                });
		   // scroll the table in smaller screens
			jQuery(function(){
				jQuery('.scroll-wrapper1').scroll(function(){
					jQuery('.scroll-wrapper2')
					.scrollLeft(jQuery('.scroll-wrapper1').scrollLeft());
				});
				jQuery('.scroll-wrapper2').scroll(function(){
					jQuery('.scroll-wrapper1')
					.scrollLeft(jQuery('.scroll-wrapper2').scrollLeft());
				});
			});

    }); 
</script>
    <div class="container">
    <div class="table-show">Visa tabellform <i class="fa fa-angle-right"></i></div>
    <div class="table-hide ">Göm tabellform <i class="fa fa-angle-down"></i></div>
        <div class=" table-row"> 
            <div class="<?php echo $class_title_align; ?>">  
                <h2 ><?php the_field('table_title'); ?></h2>
                <p><?php the_field('table_ingress'); ?> </p>
                <p class="pdf-link"><a href="<?php the_field('pdf_lank'); ?>">Ladda ner PDF <i class="fa fa-angle-right"></i></a> </p>
				<div class="scroll-wrapper1">
    				<div class="div1">
    				</div>
				</div>
               <div class="scroll-wrapper2">
                <div class="y-axis-text"><?php the_field('tabell_y_axis_text'); ?> <div class="y-text-connect">
					
					</div>
										</div>
                <div class="table-orange">
                    
                    <div class="x-axis-text"> <?php the_field('tabell_x_axis_text'); ?></div>
                   <?php      

                            $table = get_field( 'tabell' );

                    if ( ! empty ( $table ) ) {

                        echo '<table >';

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

                            // echo '<tbody>';
                                foreach ( $table['body'] as $tr ) {

                                    echo '<tr>';
                                        $rowFirst = true;
                                        foreach ( $tr as $td ) {
                                            if($rowFirst){
                                                echo '<th>';
                                                echo $td['c'];
                                                echo '</th>';
                                                $rowFirst = False;
                                            } else { 
                                                echo '<td>';
                                                    echo $td['c'];
                                                echo '</td>';
                                            }
                                        }

                                    echo '</tr>';
                                }

                            // echo '</tbody>';
                            if ( ! empty( $table['header'] ) ) {

                                // echo '<thead>';

                                echo '<tr>';

                                    foreach ( $table['header'] as $th ) {

                                        echo '<th>';
                                            echo $th['c'];
                                        echo '</th>';
                                    }

                                echo '</tr>';

                                // echo '</thead>';
                        }   
                        echo '</table>';
                    }    
                    ?>  
                    <div class="x-axis-text"> <?php the_field('tabell_x_axis_text'); ?></div>
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
        </div>
    </div>
</section>