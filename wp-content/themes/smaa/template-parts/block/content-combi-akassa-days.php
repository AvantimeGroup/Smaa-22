<?php 
     if( get_field('section_position') == 'left' ) {
        $class_h2 = 'text-left';
        $class_p = 'text-left';
        $class_wrapper_align = 'faq-left';
        $class_container_adjust = 'container-adjust-left ';
        
    } else if( get_field('section_position') == 'right' ){
        $class_h2 = 'text-right';
        $class_p = 'text-right';
        $class_wrapper_align = 'faq-right';
        $class_container_adjust = 'container-adjust-right ';
    } else {   // standard center
        $class_h2 = 'text-center';
        $class_p = 'text-center';
        $class_wrapper_align = 'faq-center';
        $class_container_adjust = 'col-md-6 container-adjust-center';
    }   
    if( get_field('anchor_lank')){
        $anchor_link = get_field('anchor_lank');
    }else {
        $anchor_link = '';
    } 
?>
<script>
     jQuery(document).ready(function () {
		 
        jQuery(function() {
            var $document = jQuery(document);
            var selector = '[data-rangeslider]';
            var $element = jQuery(selector);

            // For ie8 support
            var textContent = ('textContent' in document) ? 'textContent' : 'innerText';

            function valueOutput(element) {
                var value = element.value;
                var output = element.parentNode.getElementsByTagName('output')[0] || element.parentNode.parentNode.getElementsByTagName('output')[0];
                output[textContent] = value;
            }

            $document.on('input', 'input[type="range"], ' + selector, function(e) {
                valueOutput(e.target);
            });

            $element.rangeslider({
                polyfill: false,
                onInit: function() {
                    valueOutput(this.$element[0]);
                },
                onSlide: function(position, value) {
                    console.log('onSlide');
                    console.log('position: ' + position, 'value: ' + value);
                },
                onSlideEnd: function(position, value) {
                    console.log('onSlideEnd');
                    console.log('position: ' + position, 'value: ' + value);
                },
            });

        });  // end jQuery function for rangeslider
        const formatday = (num, decimals) => num.toLocaleString('en-US', {
        minimumFractionDigits: 2,      
        maximumFractionDigits: 2,
		});
		 
        // calculater the days
    function brettRounds(targetNumber){

        int_part = parseInt(targetNumber); 
        float_part = targetNumber - parseInt(targetNumber);
        if(float_part > 0.75){
            tailRider = 1.00;
        }
        if(float_part == 0.75){
            tailRider = 0.50;
        }
        if(float_part > 0.50 && float_part < 0.75){
            tailRider = 0.50;
        }
        if(float_part == 0.50){
            tailRider = 0.50;
        }
        if(float_part > 0.25 && float_part < 0.50){
            tailRider = 0.50;
        }
        if(float_part <= 0.25){
            tailRider = 0.00;
        }
        smaaRounded = int_part + tailRider;       
        return smaaRounded;
    }

        jQuery('output').on('DOMSubtreeModified',function () {
           	 var sum = 0;
            var sum1 = 0;   // arbetstid(tim/v)
            var sum2 = 0;   // arbetsmöjlighet(tim/v)
            var sum3 = 0;   //hindertid(tim/v)          
            var nettosum = 0;
			var deciPart = 0;
            var totaltime = 0;
			var error1 = 'Genomsnittlig arbetstid måste vara större än hindertid.';
            var error2 = 'Arbetsmöjlighet måste vara större än hindertid.';
            var error3 = 'Genomsnittlig arbetstid och/eller arbetsmöjlighet måste vara större än hindertid.';
            var sliderError = '';

/*             var tailRider = 0;
            var int_part = 0; 
            var float_part = 0; */
				
            jQuery('output').each(function() {
                sum += Number(jQuery(this).val());
            });         
            sum1 = Number(jQuery('.first output').val()); 
            sum2 = Number(jQuery('.second output').val());
            sum3 = Number(jQuery('.third output').val()); 
			
			// get the slider error
            if(sum3 >= sum1){
                sliderError = error1;
            } 
            if(sum3 >= sum2 ){
                sliderError = error2;
            } 
            if((sum3 >= sum1) && (sum3 >= sum2) ){
                sliderError = error3;
            }
              
      		if(sum1 < sum2){
				nettosum = sum1 - sum3;   // genomsnitt arbetstid - hindertid = antal ärbetslösa timmer
				totaltime = (nettosum / sum1) * 5;
				if(sum1 < 20){
					// totaltime = (Math.round(totaltime * 2) / 2).toFixed(1);
                    totaltime = brettRounds(totaltime);
				}else {  // sum1 more than 20
					// totaltime = (Math.ceil(totaltime * 2) / 2).toFixed(1);
                   // totaltime = brettRounds(totaltime);
                   deciPart = totaltime - parseInt(totaltime);
                   if (deciPart < 0.3){
                    totaltime = totaltime - deciPart;
                   }else{
                    totaltime = brettRounds(totaltime);
                   }
				}				
			}else if(sum1 > sum2){
				// procentDiff = sum1/sum2;
				nettosum = sum2 - sum3;   // arbetsmölihget - hindertid = antal ärbetslösa timmer
				totaltime = ((nettosum / sum1) * 5) ;
                if(sum1 < 20){
					// totaltime = (Math.round(totaltime * 2) / 2).toFixed(1);
                    totaltime = brettRounds(totaltime);
				}else {
                  
					//totaltime = (Math.round(totaltime * 10) / 10).toFixed(1);
                    totaltime = brettRounds(totaltime);
				}
				// totaltime = (Math.round(totaltime * 2) / 2).toFixed(1);
                
			}else if(sum1 == sum2){
				nettosum = sum1 - sum3;   // genomsnitt arbetstid - hindertid = antal ärbetslösa timmer
				totaltime = (nettosum / sum1) * 5;
				// totaltime = (Math.round(totaltime * 2) / 2).toFixed(1);
                totaltime = brettRounds(totaltime);			
			}
			
			if(totaltime < 0.76){
				totaltime = 0;
			}
			if(sum1 == nettosum){
				totaltime = 5;
			}
			totaltime = totaltime.toLocaleString("se-SV");
			
            // global varibles
            window.averageHours = sum1;
            window.nettoMissingHours = nettosum;
            // if( sum3 >= sum2){

            if( sum1 <= sum3 || nettosum < 1 ){
                jQuery('p.lead').hide();
              //  jQuery('input[type="range"]').focus();
                jQuery('.calculated-days').addClass('calc-warning');
            //    jQuery('.calculated-days').text('Arbetsmöjlighet måste vara större än hindertid.');
				jQuery('.calculated-days').text(sliderError);
            //    jQuery(".table-show").hide();
            }else{
               jQuery('p.lead').show();
               jQuery('.calculated-days').removeClass('calc-warning');
               jQuery('.calculated-days').text(totaltime);
           //    jQuery(".table-hide").hide();
           //   jQuery(".table-show").show();

            // highlight the result in the table
               // remove  highlight Class
                jQuery('table tr').each(function() {
                     jQuery(this).find('td').removeClass("result-highLight"); 
                });

                // add hightlight class
                var tableRow = window.averageHours;
                tableRow =  tableRow - 7;
                var tableCol = window.nettoMissingHours;
                tableCol = tableCol - 1;
               
                jQuery('table tr:eq('+ tableRow +') > td:eq('+ tableCol +')').addClass("result-highLight");
             
            }
        });

        jQuery('output').bind('DOMSubtreeModified', function () {
		//	alert('changed');
	    });
		 
// ---------------------  table scripts ------------------------------
		jQuery('.table-orange td, .table-orange th').hover(function () {
        	jQuery('.table-orange td:nth-child(' + (jQuery(this).index() + 1) + ')').addClass('hover');
                },function () {
                    jQuery('table td:nth-child(' + (jQuery(this).index() + 1) + ')').removeClass('hover');
         });
		 	
		 // show hide the table

         jQuery(".table-show").click(function(){
               jQuery(".table-row").toggle('slow');
               jQuery(".table-show").toggle();
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
//--------------------  end table scripts  --------------------
		 		 
    });  // end of on page load

</script>
  
<!-- <div class="anchor-link" > </div> -->
<section id="<?php echo $anchor_link; ?>" class="range-slider-comp">
    <div class="container <?php echo $class_container_adjust; ?>">
        <div class="range-row range-wrapper <?php echo $class_wrapper_align; ?>">
        <?php if( get_field('title')  ):  ?>
            <h2 class="<?php echo $class_h2; ?>"><?php the_field('title'); ?></h2>
            <?php endif; ?>
            <?php if( get_field('ingress_text')  ):  ?>
            <p class="top-lead <?php echo $class_p; ?> mb-4"><?php  the_field('ingress_text'); ?></p> 
            <?php endif; ?>
            <div class="col range-item"  >
                <div class="card">
                    <div class="card-header" >
                        <div class="slider-title-row"><p> Genomsnittlig arbetstid (tim/v)</p> 
                            <div class="con-tooltip left"><img src="/wp-content/uploads/2022/05/Tooltip.svg" class="img-fluid" alt="Help"><div class="tooltip-dr"><p><b><?php  the_field('tooltip_title_1'); ?></b></hp>
                           <p> <?php  the_field('tooltip_1'); ?></p>
                        </div></div>
                        </div>
                        <div class="first slider-row">
                            <input type="range" min="8" max="40" step="1" value="40"  data-rangeslider><output></output>
                        </div>

                        <div class="slider-title-row"><p> Arbetsmöjlighet(tim/v)</p>
                            <div class="con-tooltip left"><img src="/wp-content/uploads/2022/05/Tooltip.svg" class="img-fluid" alt="Help"><div class="tooltip-dr"><p><b><?php  the_field('tooltip_title_2'); ?></b></p><p><?php  the_field('tooltip_2'); ?></p></div></div>
                       </div>
                        <div class="second slider-row">    
                            <input type="range" min="17" max="40" step="1" value="40"  data-rangeslider><output></output>
                        </div>
                        <div class="slider-title-row"><p> Hindertid (tim/v)</p> 
                        <div class="con-tooltip left"><img src="/wp-content/uploads/2022/05/Tooltip.svg" class="img-fluid" alt="Help"><div class="tooltip-dr"><p><b><?php  the_field('tooltip_title_3'); ?></b></p><p><?php  the_field('tooltip_3'); ?></p></div></div>
                    </div>
                        <div class="third slider-row">   
                            <input type="range" min="0" max="40" step="1" value="0" data-rangeslider><output></output>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col result">
            <?php if( get_field('result_text')  ):  ?>
                    <p class="lead <?php echo $class_p; ?> mb-4"><?php  the_field('result_text'); ?></p> 
            <?php endif; ?>
                <div class="calculated-days"></div>
            </div>

        </div>
    </div>
</section>
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
    <div class="container">
    <div class="table-show">Visa tabellform <i class="fa fa-angle-right"></i></div>
    <div class="table-hide ">Glöm tabellform <i class="fa fa-angle-down"></i></div>
        <div class=" table-row"> 
            <div class="<?php echo $class_title_align; ?>">  
                <h2 ><?php the_field('table_title'); ?></h2>
                <p><?php the_field('table_ingress'); ?> </p>
                <p class="pdf-link"><a href="<?php the_field('pdf_lank'); ?>">Ladda ner PDF <i class="fa fa-angle-right"></i></a> </p>
               
                <div class="y-axis-text"><?php the_field('tabell_y_axis_text'); ?><div class="y-text-connect">
					
					</div> </div>
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
</section>
