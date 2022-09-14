<?php
$id = uniqid();
?>

<div class="smaa-block expanding-text">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#<?php echo $id ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php the_field('title') ?><span class="ml-auto">
                        <ion-icon class="ml-auto" name="chevron-down-outline"></ion-icon>
                    </span>
                </button>
            </h5>
        </div>

        <div id="<?php echo $id ?>" class="collapse" aria-labelledby="headingOne">
            <div class="card-body">
                <?php the_field('text') ?>
            </div>
        </div>
    </div>
</div>