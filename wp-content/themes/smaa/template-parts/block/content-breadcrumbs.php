<script>
jQuery(document).ready(function () {

    //change class on second child
  jQuery('#breadcrumbs span span span a ').addClass('kill-link');
  jQuery('#breadcrumbs span span span span a ').removeClass('kill-link');

 
}); 
</script>
<section class="smaa-block-breadcrumbs" >
    <div class="container">
        <div class="breadcrumb-row">
        <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
        ?>
        </div>
    </div>
</section>