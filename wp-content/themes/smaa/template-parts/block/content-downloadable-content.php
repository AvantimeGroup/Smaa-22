<?php
$id = uniqid();

if (!function_exists('readableBytes')) {
    function readableBytes($bytes)
    {
        $i = floor(log($bytes) / log(1024));

        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

        return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
    }
}
?>

<div class="smaa-block downloadable-content">

    <ul class="list-group">
        <?php
        if (have_rows('files')) :

            $count = 1;

            while (have_rows('files')) : the_row();

                $file = get_sub_field('file');


        ?>


                <li class="list-group-item">
                    <a class="btn btn-outline-primary pull-right" href="<?php echo $file['url']; ?>" download>Ladda ned</a>
                    <strong><?php echo $file['title']; ?></strong><br>
                    <small><span class="subtype"><?php echo $file['subtype']; ?></span>, <span class="filesize"><?php echo readableBytes($file['filesize']); ?></span></small>
                </li>


        <?php

            endwhile;
        endif;
        ?>
    </ul>