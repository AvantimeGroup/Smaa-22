<?php 
/*

//  Block CTA E-Tjänster
//  Title, text and CTA
*/

    if( get_field('link_btn_color') == 'white' ) {
        $class_link_btn = 'btn-white';
    } else {
        $class_link_btn = 'orange';
    }

    if( get_field('button_color') == 'black' ) {
        $class_btn = 'btn-black';
    } else {
        $class_btn = 'orange-file';
    }

    // background gray or white
if( get_field('block_bakgrund') == 'white' ) {
    $class_bg = 'bg-white';
 } else {
    $class_bg = 'bg-gray';
 }
 
 //align text & buttons
  if( get_field('block_position') == 'left' ) {
    $class_block_align = 'block-left';
 } else if( get_field('block_position') == 'right' ) {
    $class_block_align = 'block-right';
 } else {
    $class_block_align = 'block-center';
 } 
 ?>
 
<section class=" cta-text-file-download  <?php echo $class_bg; ?>" >
    <div class="container">
        <div class="cta-row">
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
                        echo'<!-- no decorations zero ->';
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
                        echo'<!-- no decorations ->';
                        break;
                    default:
                    echo'<!-- no decorations  fallback -->';
            } ?>
            <!-- <div class="col "> -->
            <div class="cta-box <?php echo $class_block_align; ?>" >
                <h1><?php the_field('title'); ?></h1>
                <p><?php the_field('bread_text'); ?></p>

                <?php if(have_rows('knappar')): ?>
                    <div class="block-buttons ">

                    <?php while (have_rows('knappar')): the_row(); 
            
                            if (get_sub_field('link_btn_color') == 'orange'){
                                $btn_class ='orange';
                                }else if (get_sub_field('link_btn_color') == 'white'){
                                    $btn_class ='btn-white';
                                } else if  (get_sub_field('link_btn_color') == 'black'){
                                    $btn_class ='black-btn';
                                }

                            if(get_sub_field('knapp_typ') == 'url'){
                                $btn_link = get_sub_field('link_url');
                                } else {
                                    $btn_link = get_sub_field('file_url');
                                }      

                            $btn_text = get_sub_field('link_btn_text');

                            if(get_sub_field('link_btn_icon')){
                                $btn_icon = get_sub_field('link_btn_icon');
                                } else {
                                    $btn_icon = '';
                                }
                            ?>
                            <div class="block-button">
                                <a class="btn <?php echo $btn_class; ?>"  href="<?php echo $btn_link; ?>" ><?php echo $btn_text; ?><?php echo $btn_icon; ?></a>
                            </div>
                        <?php       
                     endwhile;            
                 endif; 
                 if(have_rows('sub_kolumn')): ?>
                <div class="two-sub-col-wrapper">
                    <?php while (have_rows('sub_kolumn')): the_row(); 
                        $col_title = get_sub_field('kolumn_rubrik');
                    ?>
                    <div class="sub-col">
                        <h3><?php echo $col_title; ?></h3>
                     <?php   if(get_sub_field('kolumn_text')){
                       echo  get_sub_field('kolumn_text') ;
                     }
                        ?>
                        <?php if(have_rows('kolumn_knapp')): ?>
                            <?php while (have_rows('kolumn_knapp')): the_row(); 
                    
                                    if (get_sub_field('knapp_stil') == 'orange'){
                                        $btn_class ='orange';
                                        }else if (get_sub_field('knapp_stil') == 'white'){
                                            $btn_class ='btn-white';
                                        } else if  (get_sub_field('knapp_stil') == 'black'){
                                            $btn_class ='black-btn';
                                        }
                                    if(get_sub_field('lank_typ') == 'url'){
                                        $btn_link = get_sub_field('knapp_url');
                                        } else if(get_sub_field('lank_typ') == 'file'){
                                            $btn_link = get_sub_field('knapp_fil');
                                        }else if(get_sub_field('lank_typ') == 'e-tjanst'){
                                            $btn_link = 'e-tjanst';
                                        }            
                                        $btn_text = get_sub_field('knapp_text');
                                        if(get_sub_field('sub_btn_icon')){
                                            $btn_icon = get_sub_field('sub_btn_icon');
                                            } else {
                                                $btn_icon = '';
                                            }
                                    if(get_sub_field('lank_typ') == 'e-tjanst'){         
                                    ?>
                                    <div class="block-button">
                                        <a class="btn <?php echo $btn_class; ?>  <?php #echo $class_bg; ?> e-tjanster" id="log-in" data-toggle="collapse" data-target="#header-login">               
                                                    <i class="fa fa-lock"></i><span class="mobile-hide">Mina E-tjänster</span>  
                                        </a>
                                        </div>   
                                        <div id="login-notch" class="container"></div>
                                    <?php } else { ?>
                                            <div class="block-button">
                                                <a class="btn <?php echo $btn_class; ?>"  href="<?php echo $btn_link; ?>" ><?php echo $btn_text; ?><?php echo $btn_icon; ?></a>
                                            </div>
                                <?php   }       
                            endwhile;            
                        endif; ?>
                    </div>
                    <?php       
                     endwhile; ?>  
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>