<?php


// background gray or white
    if( get_field('block_background') == 'white' ) {
        $class_bg = 'bg-white';
    } else {
        $class_bg = 'bg-gray';
    }
?>
<section class="contact-puffer <?php echo $class_bg; ?>">
    <div class="container">
        <div class="puffer-row">
           <h2><?php the_field('title'); ?> </h2>
        <div class="puff-wrapper">
            <?php
            if (have_rows('puffer')) :
                while (have_rows('puffer')) : the_row();
                if(strlen(get_sub_field('name')) >= 3){
                    $str_comma = ', ';
                }else{
                    $str_comma = '';
                }
            ?>
                    <div class="puff">
                        <h3><?php the_sub_field('name'); ?> </h3>
                        <?php  if(get_sub_field('city') && get_sub_field('job_title') ){  ?>
                            <p><?php the_sub_field('city'); ?><?php echo $str_comma; ?><?php the_sub_field('job_title'); ?> </p>
                        <?php } ?>
                        <?php  if(get_sub_field('city') && !get_sub_field('job_title') ){  ?>
                            <p><?php the_sub_field('city'); ?></p>
                        <?php } ?>
                        <?php  if(!get_sub_field('city') && get_sub_field('job_title') ){  ?>
                            <p><?php the_sub_field('job_title'); ?> </p>
                        <?php } ?>

                        <p><a href="mailto:<?php the_sub_field('kontakt_epost'); ?>"><?php the_sub_field('kontakt_epost'); ?> </a></p>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
        </div>
    </div>
</section>