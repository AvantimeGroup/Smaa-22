
<?php 
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
<script>
    jQuery(document).ready(function () {
            
  
    
        

    }); 
</script>
<div class="anchor-link" > </div>
<section id="<?php echo $anchor_link; ?>" class="faq-block-21">
    <div class="container <?php echo $class_container_adjust; ?>">
        <div class="faq-row faq-wrapper <?php echo $class_wrapper_align; ?>">
        <?php if( get_field('title')  ):  ?>
            <h1 class="<?php echo $class_h1; ?>"><?php the_field('title'); ?></h1>
            <?php endif; ?>
            <?php if( get_field('text')  ):  ?>
            <p class="lead <?php echo $class_p; ?> mb-4"><?php  the_field('text'); ?></p> 
            <?php endif; ?>
            <div class="accordian-wrapper">
            <?php if( get_field('decoration') == 'yes' ):  ?>
                
                <div class="decoration-left">
                    <div class="decoration-cluster">
                        <div class="orange-circle-315px"></div>
                    </div>
                </div> 
            
                <?php endif; ?>
            <div class="accordians">
                <div id="accordian">
            <?php
            if (have_rows('featured_faq')) :
                $count = 1;
                while (have_rows('featured_faq')) : the_row();
                    $id = uniqid();
            ?>
                    <div class="col faq-item"  data-toggle="collapse" data-target="#<?php echo $id ?>" aria-expanded="false" aria-controls="<?php echo 'collapse' . $count;  ?>">
                        <div class="card">
                            <div class="card-header" id="<?php echo 'heading' . $count;  ?>">
                                    <button class="btn btn-link" >
                                   <h5 class="mb-0">  <?php the_sub_field('question') ?> </h5> <i class="fa fa-angle-down"></i>
                                    </button>      
                            </div>
                            <div id="<?php echo $id ?>" class="collapse" aria-labelledby="<?php echo 'heading' . $count;  ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <?php the_sub_field('answer') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile;
            endif;?>
    </div>
</div><!-- end of accordians -->
            <?php if( get_field('decoration') == 'yes' ):  ?>
                
                <div class="decoration-right"> 
                    <div class="decoration-cluster"> 
                        <div class="blue-circle-315px"></div>  
                    </div> 
                </div>
                
                <?php endif; ?>
                </div>   <!--end accordian-wrapper -->
         <?php   if( get_field('link') ): 
                 $link = get_field('link');
        ?>
                <p class="<?php echo $class_p; ?>"><a class="btn btn-primary" href="<?php echo $link['url'] ?>"><?php echo $link['title']  ?></a></p>
        <?php endif; ?>

        </div>
    </div>
</section>