<?php
/**
* Customizing footer
*/
function smaa_footer_customizer_settings($wp_customize){
    $menus = get_available_menus();
    // Footer panel
    $wp_customize->add_panel('smaa_footer_panel',array(
        'title'=>'Footer',
        'description'=> 'This is panel for website footer',
    ));
    
    // Pre footer 
    $wp_customize->add_section('pre_footer',array(
        'title'=>'Pre Footer',
        'panel'=>'smaa_footer_panel',
    ));
    // menu settings
    $wp_customize->add_setting('smaa_pre_footer_menu',array(
        'defaule'=>'a',
    ));
    $wp_customize->add_control('smaa_pre_footer_menu',array(
        'label'=>'Select menu',
            'type'=>'select',
            'default' => array_keys($menus),
            'choices' => $menus,
            'section'=>'pre_footer',
            'settings'=>'smaa_pre_footer_menu'
        )
     );

     // Social links 
    $wp_customize->add_section('footer_social_links',array(
        'title'=>'Social Links',
        'panel'=>'smaa_footer_panel',
    ));
    // facebook settings
    $wp_customize->add_setting('smaa_facebook_link',array(
        'defaule'=>'a',
    ));
    $wp_customize->add_control('smaa_facebook_link',array(
        'label'=>'Facebook',
            'type'=>'text',
            'section'=>'footer_social_links',
            'settings'=>'smaa_facebook_link'
        )
     );

     // Linkedin settings
    $wp_customize->add_setting('smaa_linkedin_link',array(
        'defaule'=>'a',
    ));
    $wp_customize->add_control('smaa_linkedin_link',array(
        'label'=>'Linkedin',
            'type'=>'text',
            'section'=>'footer_social_links',
            'settings'=>'smaa_linkedin_link'
        )
     );

     // Twitter settings
    $wp_customize->add_setting('smaa_twitter_link',array(
        'defaule'=>'a',
    ));
    $wp_customize->add_control('smaa_twitter_link',array(
        'label'=>'Twitter',
            'type'=>'text',
            'placeholder'=>'Enter twitter link',
            'section'=>'footer_social_links',
            'settings'=>'smaa_twitter_link'
        )
     );

     // Youtube settings
    $wp_customize->add_setting('smaa_youtube_link',array(
        'defaule'=>'Enter youtube link',
    ));
    $wp_customize->add_control('smaa_youtube_link',array(
        'label'=>'Youtube',
            'type'=>'text',
            'section'=>'footer_social_links',
            'settings'=>'smaa_youtube_link'
        )
     );

    // Logo section
    $wp_customize->add_section('logo',array(
        'title'=>'Logotip',
        'panel'=>'smaa_footer_panel',
    ));
    // logo default settings
    $wp_customize->add_setting('smaa_footer_logo',array(
        'defaule'=>'a',
    ));
    // image settings
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'smaa_footer_logo',
        array(
        'label' => 'Upload logo with tagline',
        'section' => 'logo',
        'settings' => 'smaa_footer_logo',
    ) ) );

}    
add_action('customize_register','smaa_footer_customizer_settings');