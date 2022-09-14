<?php

add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
add_editor_style( 'style.css' );
        

add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'SMÅA Orange', 'genesis-sample' ),
		'slug'  => 'smaa-orange',
		'color'	=> '#F18E00',
	),
	array(
		'name'  => __( 'Blockskugga', 'genesis-sample' ),
		'slug'  => 'block-shade',
		'color' => '#f5f5f6',
	),
	array(
		'name'  => __( 'White', 'genesis-sample' ),
		'slug'  => 'white',
		'color' => '#ffffff',
	)
) );

add_theme_support( 'wp-block-styles' );