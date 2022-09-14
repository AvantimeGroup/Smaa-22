<div id="header-login" class="collapse header-flyout">
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                <div class="close-header">
                    <a id="log-in" class="header-close" data-toggle="collapse" data-target="#header-login"></a> 
                </div>
                    <!-- begin content -->
                    <div class="text-center mb-5">
                        <h1><?php the_field('header_login_title', 'options') ?></h1>
                        <?php the_field('header_login_text', 'options') ?>
                    </div>
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <h4><?php the_field('header_login_mypages_title', 'options') ?></h4>
                                <?php the_field('header_login_mypages_text', 'options') ?>
                                <?php
                                $mypages_link = get_field('header_login_mypages_link', 'options');
                                ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo esc_url($mypages_link['url']); ?>" target="<?php echo $mypages_link['target']; ?>" class="btn d-block d-md-inline-block btn-primary"><?php echo $mypages_link['title']; ?></a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4><?php the_field('header_login_membership_title', 'options') ?></h4>
                                <?php the_field('header_login_membership_text', 'options') ?>
                                <?php
                                $membership_link = get_field('header_login_membership_link', 'options');
                                ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo esc_url($membership_link['url']); ?>" target="<?php echo $membership_link['target']; ?>" class="btn d-block d-md-inline-block btn-primary"><?php echo $membership_link['title']; ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-3 col-md-1">
                            <img src="/wp-content/themes/smaa/assets/images/bankid.png" alt="BankID" class="img-fluid" />
                        </div>
                        <div class="col-9 col-md-11">
                            <?php the_field('header_login_bankid_text', 'options') ?>
                        </div>
                    </div>
                    <!-- end content -->
                </div>
            </div>
        </div>
    </div>
</div>