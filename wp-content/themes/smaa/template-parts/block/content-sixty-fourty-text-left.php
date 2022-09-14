<?php

if( get_field('decoration') == 'alt2' ){ 
    $left_col = "small-60";

}else{
    $left_col = "column-60";
}
       // background gray or white
       if( get_field('block_bakgrund') == 'white' ) {
        $class_bg = 'bg-white';
     } else {
        $class_bg = 'bg-gray';
     }


 /*  add RTL classes for arabiska och andra right layout languages  */
    if( get_field('ltl_rtl') == 'RTL' ) {
        $class_lang_layout = 'lang_layout_rtl';  
    } else {
        $class_lang_layout = 'lang_layout_ltl';    
    }
?>



<section class="block-sixty-fourty-text-left  <?php echo $class_bg .' '.  $class_lang_layout ; ?>">
    <div class="container wrapper-60-40">
        <div class="<?php echo $left_col;  ?>">
            <h1 ><?php the_field('title'); ?></h1>
            <div class="left-bread">
                <?php the_field('paragraph_1'); ?>
            </div>  
         </div>
        <div class="column-40">


        <?php if( get_field('decoration') == 'alt1' ){ 
            echo '
                <div class="decoration-1">
                    <div class="orange-ring-42px"></div>
                </div>
                <div class="decoration-2">
                    <div class="blue-ring-72px"></div>
                </div> '; 
         } else if( get_field('decoration') == 'alt2' ){ 
         ?>
            <div class="decoration-3">
                <div class="decoration-cluster">
                    <div class="light-blue-circle-107px"></div>
                    <div class="circle-402px"><?php  the_field('stor_ikon');  ?> </div>
                </div>
         </div>

<?php
         
        } else if( get_field('decoration') == 'no' ){ 
            # choose to do nothing
        } else {
            # do none of the above
        }

         ?>


<!--             <div class="decoration-1">
                <div class="orange-ring-42px"></div>
            </div>
            <div class="decoration-2">
                <div class="blue-ring-72px"></div>
            </div>   -->       
        </div>
    </div>
</section>