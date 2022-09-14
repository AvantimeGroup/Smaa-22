<?php
/**
* Customizing footer
*/
function smaa_links_customizer_settings($wp_customize){
    // Links panel
    $wp_customize->add_panel('smaa_links_panel',array(
        'title'=>'Custom Links',
        'description'=> 'This is panel for website footer',
    ));
    
    // headers links section
    $wp_customize->add_section('header_links',array(
        'title'=>'Header Links',
        'panel'=>'smaa_links_panel',
    ));

    // Bli Medlem links settings
    $wp_customize->add_setting('smaa_bli_medlem_link',array(
        'defaule'=>'a',
    ));
    $wp_customize->add_control('smaa_bli_medlem_link',array(
        'label'=>'Bli Medlem Link',
            'type'=>'text',
            'section'=>'header_links',
            'settings'=>'smaa_bli_medlem_link'
        )
     );

     // Login link settings
    $wp_customize->add_setting('smaa_login_link',array(
        'defaule'=>'a',
    ));
    $wp_customize->add_control('smaa_login_link',array(
        'label'=>'Bli Medlem Link',
            'type'=>'text',
            'section'=>'header_links',
            'settings'=>'smaa_login_link'
        )
     );

     

}    
add_action('customize_register','smaa_links_customizer_settings');