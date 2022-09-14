<?php
/**
 * SMÅA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SMÅA
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'smaa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function smaa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SMÅA, use a find and replace
		 * to change 'smaa' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'smaa', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'smaa' ),
				'menu-2' => esc_html__( 'Secondary', 'smaa' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'smaa_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// add wide alignment
		add_theme_support('align-wide');

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Add our styles to the gutenberg editr
		 */

		require('inc/gutenberg.php');
	}
endif;
add_action( 'after_setup_theme', 'smaa_setup' );

// Helper function for listing wp menus
function get_available_menus() {
	$menus = wp_get_nav_menus();

	$options = [];

	foreach ( $menus as $menu ) {
		$options[ $menu->slug ] = $menu->name;
	}
	return $options;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function smaa_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'smaa_content_width', 640 );
}
add_action( 'after_setup_theme', 'smaa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smaa_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidofält', 'smaa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'smaa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'smaa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */


function smaa_scripts() {
	wp_enqueue_style( 'smaa-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css') );


	// Add ionicons
	// wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js', [] , '5.0.0', true);

	// Add fontawesome
	wp_enqueue_style( 'fontawsome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css", array(), _S_VERSION );

	//wp_enqueue_script( 'smaa-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'smaa-main-js', get_template_directory_uri() . '/build/index.js', ['jquery'] , filemtime(get_template_directory() . '/build/index.js'), true);

	wp_enqueue_script( 'bootstrap4','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ),'',true );
	
	//wp_enqueue_script( 'smaa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'collapse-extensions', get_template_directory_uri() . '/js/collapse-extensions.js', ['jquery'] , filemtime(get_template_directory() . '/js/collapse-extensions.js'), true);

	wp_enqueue_script( 'nav-search', get_template_directory_uri() . '/js/nav-search.js', ['jquery'] , filemtime(get_template_directory() . '/js/nav-search.js'), true);

	wp_enqueue_script( 'block-alert', get_template_directory_uri() . '/js/block-alert.js', ['jquery'] , filemtime(get_template_directory() . '/js/block-alert.js'), true);
	
	wp_enqueue_script( '21-scripts', get_template_directory_uri() . '/js/2021scripts.js', ['jquery'] , filemtime(get_template_directory() . '/js/2021scripts.js'), true);

	// Add ionicons
	// wp_enqueue_script( 'ionicons', '', [] , '5.0.0', true);

	wp_enqueue_script( 'smaa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smaa_scripts' );


/**
 * New styles 2021
 */
function style_design_new() {
	wp_register_style( 'new-style', get_template_directory_uri().'/new-style.css' );
	wp_enqueue_style( 'new-style' );
 	wp_register_style( 'archive-style', get_template_directory_uri().'/template-parts/block/assets/css/news-archive.css' );
	wp_enqueue_style( 'archive-style' ); 
 }
 add_action('wp_enqueue_scripts', 'style_design_new' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Links Feature.
 */
require get_template_directory() . '/inc/custom-links.php';

/**
 * Implement the Custom Footer feature.
 */
require get_template_directory() . '/inc/custom-footer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *  Load custom nav walker
 */
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
/**
 * Register Custom Navigation Walker
 */
/* function register_navwalker(){
	require_once get_template_directory() . '/inc/classes/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
 */

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}

/**
 *  Load custom acf blocks and fields
 */
require_once get_template_directory() . '/inc/acf-blocks.php';


/**
 *  Load custom options page
 */
require_once get_template_directory() . '/inc/acf-options.php';



/**
 *  Rename posts to articles
 */
require_once get_template_directory() . '/inc/rename-posts.php';

/**
 *  Loading analytics file
 */
require_once get_template_directory() . '/inc/relevanssi-extention.php';

/**
 * Loading chatbot js-code
 */
function smaa_vergic_chatbot() {
	echo <<<EOF
<script type="text/javascript">
(function(server,psID){
    var s=document.createElement('script');
    s.type='text/javascript';
    s.src=server+'/'+psID+'/engage.js';
    document.getElementsByTagName('head')[0].appendChild(s);
    }('https://st-smaak.vergic.com', 'FAE93D06-FCB0-4CE8-B79B-04F48BD29590'));
</script>
EOF;
}
add_action( 'wp_footer', 'smaa_vergic_chatbot' );

/**
 * register footer widgets
 */
function smaa_footer__widgets_init() {

	register_sidebar( array(
        'name' => esc_html__( 'Header Top Widget 1', 'smaa' ),
        'id' => 'header-top-widget-1',
        'description' => esc_html__( 'The first header widget area', 'smaa' ),
        'before_widget' => '  <img class="svg-icon" src="https://smaa-test.lab.avantime.io/wp-content/themes/smaa/template-parts/block/assets/Warning_2198195.svg" width="22" height="22">  <section id="%1$s" class="widget %2$s"> ',
        'after_widget' => '</section>',
        'before_title' => '<!--<h5 class="widget-title">',
        'after_title' => '</h5>-->',
    ) );

	register_sidebar( array(
        'name' => esc_html__( 'Header Menu Genvager', 'smaa' ),
        'id' => 'header-menu-genvager',
        'description' => esc_html__( 'Genväger meny i meny dropdown', 'smaa' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
	register_sidebar( array(
        'name' => esc_html__( 'Mobile Extra Menu', 'smaa' ),
        'id' => 'mobile-extra-menu',
        'description' => esc_html__( 'Extra mobile menu below dropdown', 'smaa' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
 
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 1', 'smaa' ),
        'id' => 'footer-widget-1',
        'description' => esc_html__( 'The first footer widget area', 'smaa' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
 
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 2', 'smaa' ),
        'id' => 'footer-widget-2',
        'description' => esc_html__( 'The second footer widget area', 'smaa' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
 
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 3', 'smaa' ),
        'id' => 'footer-widget-3',
        'description' => esc_html__( 'The third footer widget area', 'smaa' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
 
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 4', 'smaa' ),
        'id' => 'footer-widget-4',
        'description' => esc_html__( 'The fourth footer widget area', 'smaa' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
         
}
add_action( 'widgets_init', 'smaa_footer__widgets_init' );

function footer_bottom_text() {
	echo '<div class="footer-bottom"><div class="container text-shell">
	
		</div>
	</div>
	';
}
add_action( 'wp_footer', 'footer_bottom_text' );

/**
 * Get Alert block content  in shortcode.
 * For header presentation of alert block.
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Truncates the given string at the specified length.
 *
 * @param string $str The input string.
 * @param int $width The number of chars at which the string will be truncated.
 * @return string
 */
function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}
function mine_alert_block( $atts=[] ) {
    $defaults = [
        'post_id' => 0,
        'block_name' => ''
    ];
    $atts = shortcode_atts( $defaults, $atts );
	if ( !has_blocks( $atts['post_id'] ) ) {
		$post = get_post($atts['post_id']);
		$blocks = parse_blocks($post->post_content);
		$alertBlock =($blocks[0]);		
		if(isset($alertBlock["attrs"]["data"]['text' ])){
			$content = $alertBlock["attrs"]["data"]['text' ];
			$content = truncate($content, 80);
		 }
		 if(isset($alertBlock["attrs"]["data"]['readmore' ])){		
		//	$content = $content . '  ' . $alertBlock["attrs"]["data"]['readmore' ];
		 }

		return $content;
    }
}
add_shortcode( 'mine_block', 'mine_alert_block' );

function my_acf_post_id() {
	if ( is_admin() && function_exists( 'acf_maybe_get_POST' ) ) :
		return intval( acf_maybe_get_POST( 'post_id' ) );
	else :
		global $post;
		return $post->ID;
	endif;
}

function global_etjanst_btn () {
	return '<a href="https://smaa.minasidor.org/" target="_blank"><button> <i class="fa fa-lock"></i>Mina E-tjänster</button></a>';
}
add_shortcode('e-tjanster', 'global_etjanst_btn');

  function diwp_menu_shortcode($attr){
 
    $args = shortcode_atts(array(
 
                'name'  => '',
                'class' => ''
 
                ), $attr);
 
    return wp_nav_menu( array(
                'menu'             => $args['name'],
                'menu_class'    => $args['class']
            ));
}
add_shortcode('addmenu', 'diwp_menu_shortcode');


function add_members_post_type() {

		$labels = array(
			'name'                  => _x( 'Medlemmar', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Medlem', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Medlemmar', 'text_domain' ),
			'name_admin_bar'        => __( 'Medlem', 'text_domain' ),
			'archives'              => __( 'Medlems arkiv', 'text_domain' ),
			'attributes'            => __( 'Medlem Attributes', 'text_domain' ),
			'all_items'             => __( 'Alla medlem', 'text_domain' ),
			'add_new_item'          => __( 'Lägg till medlem', 'text_domain' ),
			'add_new'               => __( 'Ny medlem', 'text_domain' ),
			'edit_item'             => __( 'Redigera Medlem', 'text_domain' ),
			'update_item'           => __( 'Uppdatera Medlem', 'text_domain' ),
			'view_item'             => __( 'Medlems Vy', 'text_domain' ),
			'search_items'          => __( 'Sök Medlemmar', 'text_domain' ),
			'not_found'             => __( 'No Members found', 'text_domain' ),
			'not_found_in_trash'    => __( 'No members found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Utvälde bild', 'text_domain' ),
			'set_featured_image'    => __( 'välj bild', 'text_domain' ),
			'remove_featured_image' => __( 'radera utvälde bild', 'text_domain' ),
			'use_featured_image'    => __( 'använder utvälda bild', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
			'menu_position' => 6,
		);
		$args = array(
			'label'                 => __( 'Medlem', 'text_domain' ),
			'description'           => __( 'Medlem information .', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'rewrite'      => array( 'slug' => 'medlemmar', 'with_front' => false ),
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			// 'has_archive'           => 'vara-medlemmar',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'medlemmar', $args );


	
}
add_action( 'init', 'add_members_post_type' );

function archive_to_custom_archive() {
    if( is_post_type_archive( 'medlemmar' ) ) {
        wp_redirect( home_url( '/vara-medlemmar/' ), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'archive_to_custom_archive' );

function remove_menu () 
{
   remove_menu_page('edit.php');
} 

 add_action('admin_menu', 'remove_menu');



function add_nyheter_post_type() {

	$labels = array(
		'name'                  => _x( 'Nyheter', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Nyhet', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Nyheter', 'text_domain' ),
		'name_admin_bar'        => __( 'Nyhet', 'text_domain' ),
		'archives'              => __( 'Nyhets arkiv', 'text_domain' ),
		'attributes'            => __( 'Nyhets Attributes', 'text_domain' ),
		'all_items'             => __( 'Alla Nyheter', 'text_domain' ),
		'add_new_item'          => __( 'Lägg till nyhet', 'text_domain' ),
		'add_new'               => __( 'Ny nyhet', 'text_domain' ),
		'edit_item'             => __( 'Redigera nyhet', 'text_domain' ),
		'update_item'           => __( 'Uppdatera nyhet', 'text_domain' ),
		'view_item'             => __( 'Nyhets Vy', 'text_domain' ),
		'search_items'          => __( 'Sök Nyheter', 'text_domain' ),
		'not_found'             => __( 'No News found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No News found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Utvald bild', 'text_domain' ),
		'set_featured_image'    => __( 'Välj bild', 'text_domain' ),
		'remove_featured_image' => __( 'Ta bort utvald bild', 'text_domain' ),
		'use_featured_image'    => __( 'Använder utvald bild', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		'menu_position' => 6,
	);
	$args = array(
		'label'                 => __( 'Nyhet', 'text_domain' ),
		'description'           => __( 'Nyhets information .', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'rewrite'      => array( 'slug' => 'nyheter', 'with_front' => false ),
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'nyheter',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'nyheter', $args );
}
add_action( 'init', 'add_nyheter_post_type' );


//  functions for news archive 2022

function posts_by_year() {
    $years = array();
    $y_posts = get_posts(array(
        'numberposts' => -1,
        'orderby' => 'post_date',
        'order' => 'ASC',
        'post_type' => 'nyheter',
        'post_status' => 'publish'
    ));
    foreach($y_posts as $y_post) {
        $years[date('Y', strtotime($y_post->post_date))][date('F', strtotime($y_post->post_date))] = $y_post;
    }
    krsort($years);
	wp_reset_postdata(); 
    return $years;
}

add_post_type_support('page', 'excerpt');


function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
	$content = '<p>' . get_the_post_thumbnail($post->ID) .
	'</p>' . get_the_content();
	}
	return $content;
	}
	add_filter('the_excerpt_rss', 'rss_post_thumbnail');
	add_filter('the_content_feed', 'rss_post_thumbnail');


function archive_scripts() {
    wp_register_script( 'ladda-script', get_stylesheet_directory_uri(). '/js/laddamer.js', array('jquery'), false, true );
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'ladda-script', 'nyheter', $script_data_array );
    wp_enqueue_script( 'ladda-script' );
}
add_action( 'wp_enqueue_scripts', 'archive_scripts' );

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');
function load_posts_by_ajax_callback() {

$newsyear_more = $_POST['newsyear'];
    check_ajax_referer('load_more_posts', 'security');

    $args = array(
        'post_type' => 'nyheter',
        'post_status' => 'publish',
        'posts_per_page' => $_POST['antal_posts'],
        'paged' => $_POST['page'],
		'year'  => $_POST['newsyear'],
    );
    $blog_posts = new WP_Query( $args );
     if ( $blog_posts->have_posts() ) : 
         while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); 
		 if(strlen(get_the_excerpt()) < 10){
			// $load_utdrag = '';
			$load_utdrag = get_the_excerpt();
		}else{
			$load_utdrag = get_the_excerpt();
		}
		?>
		<li >

			<div class="post-wrapper" onclick="location.href='<?php echo get_permalink() .'?newsyear='. $newsyear ;; ?>'" style="cursor:pointer;">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post-img"><?php the_post_thumbnail('medium');?></div>
                <?php } ?>
                <div class="post-text">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <div class="post-date"><?php echo get_the_date('d F, Y'); ?></div>
                    <div class="post-utdrag"><p><?php  echo $load_utdrag; ?></p></div>
                </div>
			</div>
            <div class="post-link">
                <a href="<?php echo get_permalink() .'?newsyear='. $newsyear_more; ?>"> Läs mer <i class="fas fa-angle-right"></i></a>
            </div>			
        </li>
        <?php endwhile; 
         wp_reset_postdata(); 
		
     endif; 
    
    wp_die();
}

function smaa_excerpt_more( $more ) {
	if (is_post_type_archive('nyheter')) {
    	return '...';
	}
}
 add_filter('excerpt_more', 'smaa_excerpt_more');

 function smaa_excerpt_length($length){
	if (is_post_type_archive('nyheter')) {
	   return 40;
	}
}
// add_filter('excerpt_length', 'smaa_excerpt_length', 999 );
//  functions for medlems archive 2022

function medlemmar_scripts() {
    wp_register_script( 'member-script', get_stylesheet_directory_uri(). '/js/loadmore_members.js', array('jquery'), false, true );
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_member_posts' ),
    );
    wp_localize_script( 'member-script', 'medlemmar', $script_data_array );
    wp_enqueue_script( 'member-script' );
}
add_action( 'wp_enqueue_scripts', 'medlemmar_scripts' );

add_action('wp_ajax_load_member_posts_by_ajax', 'load_member_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_member_posts_by_ajax', 'load_member_posts_by_ajax_callback');

function load_member_posts_by_ajax_callback() {
    check_ajax_referer('load_more_member_posts', 'security');
    $args = array(
        'post_type' => 'medlemmar',
        'post_status' => 'publish',
        'posts_per_page' => $_POST['antalmembers'],
        'paged' => $_POST['page'],
    );
    $member_posts = new WP_Query( $args );
     if ( $member_posts->have_posts() ) : 
    	while ( $member_posts->have_posts() ) : $member_posts->the_post(); 
			$post_id = get_the_ID();
				
			$work_title = get_field('work_title', $post_id);
			$name = get_field('bio_namn', $post_id);
			$bio_date = get_field('bio_datum', $post_id);
			$bio_bild = get_field('bio_bild', $post_id);
			$bio_utdrag = get_field('bio_utdrag', $post_id);
		?>
                 <div class="member-card" onclick="location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;">
                    <div class="member-card-img">   
                    <?php if( $bio_bild ): ?>
                        <img src="<?php echo $bio_bild ?>"/>
                    <?php endif; ?>
                    </div>
                    <div class="card-date">
                        <?php echo $bio_date ?>
                    </div>
                    <div class="card-title">
                        <?php echo $work_title ?>
                    </div>
                    <div class="bio-utdrag">
                        <?php echo $bio_utdrag ?>
                    </div>
                    <div class="card-read-more">
                            <a href="<?php echo get_permalink(). '?antal-m=' . $antal_m ; ?>">Läs mer <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
        <?php endwhile; 
         wp_reset_postdata(); 
     endif; 
    
    wp_die();
}


/*   landing page language menu 2022-06-02   brett */
	

	function landing_lang_menu() {
		register_nav_menu('landing-page-lang',__( 'Landing Page lang' ));
	}
	add_action( 'init', 'landing_lang_menu' );


/* add custom language code to page  */

add_filter('language_attributes', 'language_attributes_fix');
function language_attributes_fix( $language_attributes ) {
global $post;
	$lang_code = get_field('page_lang', $post->ID);
if(!empty($lang_code)){
return str_replace('sv-SE', $lang_code ,$language_attributes);}
return $language_attributes;
}
