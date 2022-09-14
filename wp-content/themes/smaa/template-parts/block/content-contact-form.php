<?php

    if( get_field('form_rubrik')){
        $form_rubrik = get_field('form_rubrik');
    }else {
        $form_rubrik = '';
    }

    if( get_field('contactform7_id')){
        $form_id = get_field('contactform7_id');
    $form_shortcode = do_shortcode('[contact-form-7 id="'.  $form_id .'" title="'. $form_rubrik .'"]');
    }else {
        return;
    }


    ?>
<section class="contact-form">
    <div class="container">
        <div class="contactform-row form-wrapper">
    <?php
        echo $form_shortcode;
?>
</div>
    </div>
</section>