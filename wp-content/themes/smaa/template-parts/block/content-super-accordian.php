
<?php 

        // background gray or white
    if(get_field('bg_colour') == 'white' ) {
        $class_bg = 'bg-white';
    } else {
        $class_bg = 'bg-gray';
    }
    if( get_field('section_position') == 'left' ) {
        $class_h1 = 'text-left';
        $class_p = 'text-left';
        $class_wrapper_align = 'faq-left';
        $class_container_adjust = 'container-adjust-left ';
        
    } else if( get_field('section_position') == 'right' ){
        $class_h1 = 'text-right';
        $class_p = 'text-right';
        $class_wrapper_align = 'faq-right';
        $class_container_adjust = 'container-adjust-right ';
    } else {   // standard center
        $class_h1 = 'text-center';
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
<div class="anchor-link"></div>
<section id="<?php echo $anchor_link; ?>" class="super-accordian <?php echo $class_bg; ?>">
    <div class="container <?php echo $class_container_adjust; ?>">
        <div class="row faq-wrapper <?php echo $class_wrapper_align; ?>">
            <h1 class="<?php echo $class_h1; ?>"><?php the_field('title'); ?></h1>
            <p class="lead <?php echo $class_p; ?> mb-4"><?php  the_field('text'); ?></p> 
            <div class="accordian-wrapper">
            <?php if( get_field('decoration') == 'yes' ):  ?>
                
                <div class="decoration-top">
                    <div class="decoration-cluster">
                        <div class="blue-circle-262px"></div>
                    </div>
                </div> 
               
                <?php endif; ?>
             <div class="accordians">   
            <?php
            if (have_rows('featured_faq')) :
                $count = 1;
                while (have_rows('featured_faq')) : the_row();
                    $id = uniqid();
            ?>
                    <div class="col faq-item"  data-toggle="collapse" data-target="#<?php echo $id ?>" aria-expanded="false" aria-controls="collapseOne">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                    <button class="btn btn-link" >
                                   <h5 class="mb-0">  <?php the_sub_field('question') ?> </h5> <i class="fa fa-angle-down"></i>
                                    </button>      
                            </div>
                            <div id="<?php echo $id ?>" class="collapse" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <?php the_sub_field('answer') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile;
            endif;
            ?>
            </div><!-- end of accordians -->
            <?php if( get_field('decoration') == 'yes' ):  ?><!-- position center decorations to right -->
                
                <div class="decoration-bottom"> 
                    <div class="decoration-cluster"> 
                        <div class="orange-circle-315px"></div>  
                    </div> 
                </div>
                
            <?php endif; ?>
            <!-- position left decorations to right -->
            <?php if( get_field('hoger_decor') == 'yes' ):  ?>
                
                <div class="decor-mash-right"> 
                    <div class="decoration-cluster"> 
                        <div class="blue-ring-50px"></div>
                        <?php $ikon_mashup = get_field('ikon_mashup');
                            if( !empty( $ikon_mashup ) ): ?>
                        <?php # if( get_field('ikon_mashup') ):  ?>
                            <div class="icon-wrapper">
                            <img src="<?php echo esc_url($ikon_mashup['url']); ?>" alt="<?php echo esc_attr($ikon_mashup['alt']); ?>" />    
                            <!-- <img src="<?php #the_field('ikon_mashup'); ?>" />  </div> -->
                        <?php endif; ?>
                    </div> 
                </div>
            <?php endif; ?>
        </div>   <!--end accordian-wrapper -->
        <?php  if( get_field('link') ): 
                 $link = get_field('link');
        ?>
                <p class="<?php echo $class_p; ?>"><a class="btn btn-primary" href="<?php echo $link['url'] ?>"><?php echo $link['title']  ?></a></p>
        <?php  endif; ?>
        </div>
    </div>
</section>