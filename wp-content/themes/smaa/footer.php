<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SMÅA
 */

?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row no-gutters footer-widgets">
            <div class="col-sm-12 d-md-block d-none">
            </div>
            <div id="footer-widget-1" class="card-footer footer-widget"> <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                <!-- Social links -->
                <ul class="social-links nav ">
                    <?php if (!empty(get_theme_mod('smaa_facebook_link'))) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_theme_mod('smaa_facebook_link'); ?>">
                            <img src="/wp-content/themes/smaa/assets/images/facebook.svg" class="img-fluid"
                                alt="Facebook" />
                        </a></li>
                    <?php endif; ?>
                    <?php if (!empty(get_theme_mod('smaa_linkedin_link'))) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_theme_mod('smaa_linkedin_link'); ?>">
                            <img src="/wp-content/themes/smaa/assets/images/linkedin.svg" class="img-fluid"
                                alt="Linked In" />
                        </a></li>
                    <?php endif; ?>
                    <?php if (!empty(get_theme_mod('smaa_twitter_link'))) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_theme_mod('smaa_twitter_link'); ?>">
                            <img src="/wp-content/themes/smaa/assets/images/twitter.svg" class="img-fluid"
                                alt="Twitter" />
                        </a></li>
                    <?php endif; ?>
                    <?php if (!empty(get_theme_mod('smaa_youtube_link'))) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_theme_mod('smaa_youtube_link'); ?>">
                           <img src="/wp-content/themes/smaa/assets/images/youtube.svg" class="img-fluid"
                                alt="Youtube" />
                        </a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div id="footer-widget-2" class="card-footer footer-widget"> <?php dynamic_sidebar( 'footer-widget-2' ); ?>
            </div>
            <div id="footer-widget-3" class="card-footer footer-widget"> <?php dynamic_sidebar( 'footer-widget-3' ); ?>
            </div>
            <div id="footer-widget-4" class="card-footer footer-widget footer-genvag">
                <?php dynamic_sidebar( 'footer-widget-4' ); ?></div>
            <!-- logo -->
            <div class="col col-sm-12 p-0 footer-logo text-center">
                <a href="#">
				<!--	<img src="/wp-content/themes/smaa/images/smaa-logo-tagline.svg" alt="SMÅA">-->
					<img  style="height:70px" src="/wp-content/uploads/2022/08/cropped-SMÅA-Logo-Black-300x154.png" draggable="false" alt="SMÅA">
				</a>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php  wp_footer(); ?>

</body>

</html>