
<?php 
/*

//  Block CTA E-Tjänster
//  Title, text and CTA

*/
// group block

// background gray or white
if( get_field('block_background') == 'white' ) {
   $class_bg = 'bg-white';
} else {
   $class_bg = 'bg-gray';
}
//align text & buttons
 if( get_field('block_align') == 'left' ) {
   $class_block_align = 'block-left';
} else if( get_field('block_align') == 'right' ) {
   $class_block_align = 'block-right';
} else {
   $class_block_align = 'block-center';
} 


?>
<section class=" cta-etjanster-text  <?php echo $class_bg; ?>" >

    <div class="container">

        <div class="row-cta-etjanster ">
        <?php switch (get_field('block_decorations')) {
                    case "alt1":
                        echo'<div class="decoration-left-1">
                                <div class="decoration-cluster-1">
                                    <div class="orange-ring-50px"></div>
                                </div>  
                             </div>';
                        break;
                    case "alt2" :
                        echo'<!-- no decorations left -->';
                        break;
                    case 0 :
                        echo'<!-- no decorations ->';
                        break;
                    default:
                    echo'<!-- no decorations  fallback -->';
            } ?>
         <?php switch (get_field('block_decorations')) {
                    case "alt1":
                        echo'<div class="decoration-right-1">
                                <div class="decoration-cluster-1">      
                                    <div class="light-blue-ring-25px"></div>
                                    <div class="blue-ring-38px"></div>
                                </div>  
                            </div> ';
                        break;
                    case "alt2" :
                        echo'<div class="decoration-right-2">
                                <div class="decoration-cluster-2">
                                    <div class="blue-ring-50px"></div>
                                    <div class="blue-ring-25px"></div>
                                </div>  
                            </div> ';
                        break;
                    case 0 :
                        echo'<!-- no decorations -->';
                        break;
                    default:
                    echo'<!-- no decorations  fallback -->';
            } ?>
            <div class="cta-box <?php echo $class_block_align; ?>" >
                <h1><?php the_field('title'); ?></h1>
                <p><?php the_field('bread_text'); ?></p>  
                <div class="block-button">
                        <a class="btn white-btn  <?php echo $class_bg; ?>" id="log-in" data-toggle="collapse" data-target="#header-login">               
                                    <i class="fa fa-lock"></i><span class="mobile-hide">Mina E-tjänster</span>  
                           </a>
                           <div id="login-notch" class="container"></div>
                </div>  
            </div>
   

        </div>

    </div>

</section>


