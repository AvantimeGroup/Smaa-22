<?php
add_action('acf/init', 'smaa_acf_op_init');
function smaa_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('SMÅA'),
            'menu_title'    => __('SMÅA'),
            'menu_slug'     => 'smaa-options',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}
?>