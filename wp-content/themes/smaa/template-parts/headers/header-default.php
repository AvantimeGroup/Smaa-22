<?php

/**
 * Home header template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SMÅA
 * 
 * version 2021
 */
?>

<?php
$member_registration_link = get_field('member_registration', 'options');
?>
<header class="header main if-mobile">
    <div class="header-top">
        <div class=" container text-shell">
            <div id="header-top-widget-1" class=" header-widget">
                  <?php dynamic_sidebar( 'header-top-widget-1' ); ?>
            </div>

            <div class="static">
            <span class="mobil-sok">
                    <a class="p-0-sm  pl-0 search-btn" id="search-icon" data-toggle="collapse"
                        data-target="#header-search">
                        <i>
                        <img class="mobil-login-ikon" src="/wp-content/uploads/2022/06/MagniGlass.svg" alt="Login"/>
                        </i>
                        <span class="nav-label"> Sök</span>
                        <div id="search-notch" class="container"></div>
                    </a>
                </span>
                <span class="no-call">
                    <i>
                        <img class="header-top-ikon" src="/wp-content/uploads/2022/06/Telephone.svg" alt="Ringa oss"/>
                    </i><span class="nav-label"> 08-723 44 00</span>
                </span>
                <a href="tel:+4687234400" class="mobile-call">
                    <i>
                        <img class="header-top-ikon" src="/wp-content/uploads/2022/06/Telephone.svg" alt="Ringa oss"/>
                </i><span class="nav-label"> 08-723 44 00</span>
                </a>
                <a href="mailto:info@smakassan.se">
                    <i>
                    <img class="header-top-ikon" src="/wp-content/uploads/2022/06/Mail.svg" alt="Epost oss"  />
                    </i> <span class="nav-label"> info@smakassa.se</span>
                </a>
                <span class="menu-translate translate-link" aria-hidden="true" data-toggle="collapse" data-target="#header-translate">
                  <i> <img class="header-top-ikon" src="/wp-content/uploads/2022/06/Globe.svg" alt="Choose Language"  />
</i><span class="nav-label"> Languages</span>
                </span>
            </div>
        </div>
    </div>
    <div class="header-inner">
        <div class="container ">
            <nav class="navbar navbar-light navbar-fixed-top ">
                <div class="nav-item-1">
                    <button class=" p-0-sm hamburger-btn" type="button" id="hamburger-menu-21" data-toggle="collapse"
                        data-target="#main-nav" aria-controls="navbarsExample01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <div id="nav-ham">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span class="nav-label">Meny</span>
                        <div id="notch" class="container"></div>
                        <div id="mob-hamburger-notch" class="container"></div>
                    </button>
                </div>
                <div class="nav-item-2">
                    <a class="btn p-0-sm  pl-0 search-btn" id="search-icon" data-toggle="collapse"
                        data-target="#header-search">
                        <i class="fa fa-search"></i>
                        <span class="nav-label"> Sök</span>
                        <div id="search-notch" class="container"></div>
                    </a>
                 </div>
                <div class="nav-item-3">
                    <div class="header-logo text-center">
                        <a href="/">
						<!--	<img class="logo" src="/wp-content/themes/smaa/images/smaa-logo.svg" alt="SMÅA">-->
						<img class=" logo22 " src="/wp-content/uploads/2022/08/cropped-SMÅA-Logo-Black-300x154.png" draggable="false" alt="SMÅA">
                   	</a>
							</div>
                    </div>
                <div class="nav-item-4">
                    <a class=" btn-primary ml-auto d-xl-inline-block" 
                        href="<?php echo $member_registration_link['url']; ?>"
                        target="<?php echo $member_registration_link['target'] ?>">
                        <?php echo $member_registration_link['title']; ?>
                    </a>
                </div>
                <div class="nav-item-5">
                    <a class="btn menu-login" id="log-in" data-toggle="collapse" data-target="#header-login"> 
                        <button >
                            <span class="mobile-hide"> <i class="fa fa-lock"></i>Mina E-tjänster</span>      
                        </button>
                        <img class="mobil-login-ikon" src="/wp-content/uploads/2022/06/Locker.svg" alt="Login "  />
                        <div id="login-notch" class="container"></div>
                     </a>
                     </div>
             
            </nav>
        </div>
    </div>

    <div class="navbar-wrapper">
        <nav class="navbar expanded-nav">
            <div id="main-nav" class="collapse navbar-collapse block-nav">
            <?php

            wp_nav_menu(array(
                'theme_location'    => 'menu-1',
                'depth'             =>  2,
                'container'         => 'div',
                'container_class'   => ' navbar-collapse block-nav',
                'container_id'      => 'testy-nav',
                'menu_class'        => 'nav navbar-nav flex-md-row d-flex',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            )); 


            ?>
                <div id="header-menu-genvager" class="container header-genvag">
                    <?php  dynamic_sidebar( 'header-menu-genvager' ); ?>
                </div>
                <!-- mobile menu elements -->
                <div id="mobile-extra-menu">
                <?php  dynamic_sidebar( 'mobile-extra-menu' ); ?>
                </div>
                <div id="mobile-member-btn"> 
                <a class=" btn-primary ml-auto d-xl-inline-block" 
                        href="<?php echo $member_registration_link['url']; ?>"
                        target="<?php echo $member_registration_link['target'] ?>">
                        <?php echo $member_registration_link['title']; ?>
                    </a>
                </div>
            </div>
        </nav>    
    </div>
    <?php
    echo get_template_part('template-parts/modals/header', 'search');
    echo get_template_part('template-parts/modals/header', 'login');
    echo get_template_part('template-parts/modals/header', 'translate');
    ?>

<?php
    if(is_page_template('landing-multi-lang.php')){
        echo '<div class="sprak-chooser container ">';
        wp_nav_menu( array( 
            'theme_location' => 'landing-page-lang', 
            'container_class' => 'lpl' ) ); 
        echo '</div>';
    }
?>
</header>
