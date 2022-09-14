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
<header class="header main">
    <div class="header-top">
        <div class=" container text-shell">
            <div id="header-top-widget-1" class=" header-widget">
                  <?php dynamic_sidebar( 'header-top-widget-1' ); ?>
            </div>
            <div class="static">
                <span class="no-call">
                    <a href="tel:+4687234400" >
                    <i class="fa fa-phone"></i><span class="nav-label"> 08-723 44 00
                    </a>
				</span>
                </span>
                <a href="tel:+4687234400" class="mobile-call">
                    <i class="fa fa-phone"></i><span class="nav-label"> 08-723 44 00</span>
                </a>
                <a href="mailto:info@smakassa.se">
                    <i class="fa fa-envelope"></i> <span class="nav-label"> info@smakassa.se</span>
                </a>
                <span class="menu-translate translate-link" aria-hidden="true" data-toggle="collapse" data-target="#header-translate">
                  <i>  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" height="18" width="18">
  
  <g transform="matrix(1.5,0,0,1.5,0,0)"><g>
      <circle cx="12" cy="12" r="11.25" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"></circle>
      <path d="M9.88,23.05c-1.57-2.2-2.63-6.33-2.63-11S8.31,3.15,9.88,1" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"></path>
      <path d="M14.12,23.05c1.57-2.2,2.63-6.33,2.63-11S15.69,3.15,14.12,1" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"></path>
      <line x1="0.75" y1="12" x2="23.25" y2="12" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"></line>
      <line x1="2.05" y1="17.25" x2="21.95" y2="17.25" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"></line>
      <line x1="2.05" y1="6.75" x2="21.95" y2="6.75" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"></line>
    </g></g></svg></i><span class="nav-label"> Languages</span>
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
                        <a href="/"><img class="logo" src="/wp-content/themes/smaa/images/smaa-logo.svg" alt="SMÅA"></a>
                    </div>
                    </div>
                <div class="nav-item-4">
                    <a class=" btn-primary ml-auto d-xl-inline-block" 
                        href="<?php echo $member_registration_link['url']; ?>"
                        target="_blank">
                        <?php echo $member_registration_link['title']; ?>
                    </a>
                </div>
                <div class="nav-item-5">
                    <a class="btn menu-login" id="log-in" data-toggle="collapse" data-target="#header-login"> 
                        <button >
                             <i class="fa fa-lock"></i><span class="mobile-hide">Mina E-tjänster</span>  
                        </button>
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
                <?php # dynamic_sidebar( 'mobile-extra-menu' ); ?>
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