<?php

// Replace Posts label as Nyheter in Admin Panel 

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Nyheter';
    $submenu['edit.php'][5][0] = 'Nyheter';
    $submenu['edit.php'][10][0] = 'Lägg till nyhet';
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Nyheter';
        $labels->singular_name = 'Nyhet';
        $labels->add_new = 'Lägg till Nyhet';
        $labels->add_new_item = 'Lägg till Nyhet';
        $labels->edit_item = 'Redigera Nyhet';
        $labels->new_item = 'Nyhet';
        $labels->view_item = 'Visa Nyhet';
        $labels->search_items = 'Sök Nyheter';
        $labels->not_found = 'Inga Nyheter hittades';
        $labels->not_found_in_trash = 'Inga Nyheter hittades i papperskorgen';
}

// Change Slug of Registered Post Type for Services (Resave your PERMALINKS or this will return 404)
function smaa_change_post_types_slug_service( $args, $post_type ) {
   /*item post type slug*/   
   if ( 'post' === $post_type ) :
      $args['rewrite'] = ['slug' => 'nyheter]'];
   endif;

   return $args;
}


//add_action( 'init', 'change_post_object_label' );
//add_action( 'admin_menu', 'change_post_menu_label' );
//add_filter( 'register_post_type_args', 'smaa_change_post_types_slug_service', 10, 2 );