<?php



function smaa_21_block_category( $categories ) {
    $custom_block = array(
        'slug'  => 'smaa-2021',
		'title' => __( 'Småa Blocks 2021', 'smaa-2021' ),
		'icon'  => 'menu-alt3'
    );

    $categories_sorted = array();
    $categories_sorted[0] = $custom_block;

    foreach ($categories as $category) {
        $categories_sorted[] = $category;
    }

    return $categories_sorted;
}
add_filter( 'block_categories_all', 'smaa_21_block_category', 10, 2);


add_action('acf/init', 'smaa_acf_init');

function smaa_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'benefits',
			'title'				=> __('Medlemsförmåner'),
			'description'		=> __('Block med medlemsförmåner'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'medlemsförmåner', 'benefits' ),
			'icon'				=> array('foreground' => '#f18e00', 'size' => '58', 'src' =>'info-outline'),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'start-page-benefits', get_template_directory_uri() . '/template-parts/block/assets/css/start-page-benefits.css', array(), '1.0.0' );
			  }, 
		));
	
		acf_register_block(array(
			'name'				=> 'entry-points',
			'title'				=> __('Sökpuffar'),
			'description'		=> __('Block med sökpuffar'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'puffar' ),
			'icon'				=> array('foreground' => '#f18e00', 'size' => '58', 'src' =>'info-outline'),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'start-page-puffer', get_template_directory_uri() . '/template-parts/block/assets/css/start-page-puffer.css', array(), '1.0.0' );
			  }, 
		));

		acf_register_block(array(
			'name'				=> 'faq',
			'title'				=> __('Vanliga fråor (FAQ)'),
			'description'		=> __('Vanliga frågor'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'faq' ),
		));

		acf_register_block(array(
			'name'				=> 'testimonials',
			'title'				=> __('Lovord'),
			'description'		=> __('Lovord'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'faq' ),
		));

		acf_register_block(array(
			'name'				=> 'featured-news',
			'title'				=> __('Nyhetspuffar'),
			'description'		=> __('Nyhetspuffar'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'faq' ),
		));
		acf_register_block(array(
			'name'				=> 'expanding-text',
			'title'				=> __('Expanderande text'),
			'description'		=> __('Expanderande text'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'expanderande', 'faq' ),
		));
		acf_register_block(array(
			'name'				=> 'downloadable-content',
			'title'				=> __('Nedladdningsbara filer'),
			'description'		=> __('Nedladdningsbara filer'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'SMÅA',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'downloadable', 'nedladdningsbara' ),
		));

		acf_register_block(array(
			'name'				=> 'alert-21',
			'title'				=> __('Varningsmeddelande 2022'),
			'description'		=> __('Varningsmeddelande. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'mode' 				=> 'preview',
			'keywords'			=> array( 'alert', 'Design 2021' ),
			'icon'				=> array('foreground' => '#f18e00', 'size' => '58', 'src' =>'info-outline'),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'alert-21', get_template_directory_uri() . '/template-parts/block/assets/css/alert-21.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'breadcrumbs',
			'title'				=> __('Joast Breadcrumbs'),
			'description'		=> __('Custom Joast Breadcrumbs'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '58', 'src' =>'admin-home'),
			'keywords'			=> array( 'breadcrumbs', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-breadcrumbs', get_template_directory_uri() . '/template-parts/block/assets/css/breadcrumbs.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'block-title',
			'title'				=> __('Block Rubrik '),
			'description'		=> __('Rubrik övanpå en block. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-bold'),
			'keywords'			=> array( 'Bold text', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
					wp_enqueue_style( 'block-boldtext', get_template_directory_uri() . '/template-parts/block/assets/css/block-title.css', array(), '1.0.0' );
				  }, 
		));
		acf_register_block(array(
			'name'				=> 'page-ingress-h2',
			'title'				=> __('Bold text '),
			'description'		=> __('Bold text, sid ingress. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-bold'),
			'keywords'			=> array( 'Bold text', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
					wp_enqueue_style( 'block-boldtext', get_template_directory_uri() . '/template-parts/block/assets/css/bold-text-ingress.css', array(), '1.0.0' );
				  }, 
		));
		acf_register_block(array(
			'name'				=> 'bread-text',
			'title'				=> __('Bröd Text'),
			'description'		=> __('Standard WordPress WYSIWYG editor. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-paragraph'),
			'keywords'			=> array( 'Text editor', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
					wp_enqueue_style( 'block-breadtext', get_template_directory_uri() . '/template-parts/block/assets/css/bread-text.css', array(), '1.0.0' );
				  }, 
		));
		acf_register_block(array(
			'name'				=> 'cta-text-btn',
			'title'				=> __('CTA + Text'),
			'description'		=> __('CTA Text and Button. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'phone'),
			'keywords'			=> array( 'CTA + text ', 'Design 2021n' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-cta', get_template_directory_uri() . '/template-parts/block/assets/css/cta-text-btn.css', array(), '1.0.0' );
			  },
		));
		acf_register_block(array(
			'name'				=> 'cta-e-tjanster',
			'title'				=> __('CTA E-tjänster  '),
			'description'		=> __('CTA Mina E-tjänster knapp. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'phone'),
			'keywords'			=> array( 'Mina e-tänster ', 'Design 2021n' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-cta-tjanster', get_template_directory_uri() . '/template-parts/block/assets/css/cta-e-tjanster.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'cta-bli-medlam',
			'title'				=> __('CTA Bli Medlam '),
			'description'		=> __('Bli medlam länkar. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'phone'),
			'keywords'			=> array( 'Mina e-tänster ', 'Design 2021n' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-cta-bli-medlam', get_template_directory_uri() . '/template-parts/block/assets/css/cta-bli-medlam.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'sixty-fourty-text-left',
			'title'				=> __('60/40 Text Left'),
			'description'		=> __('Text left 60%.  Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'text left', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-text-60-40', get_template_directory_uri() . '/template-parts/block/assets/css/sixty-fourty-text-left.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'text-50-img-right',
			'title'				=> __('Text 50% Bild Höger'),
			'description'		=> __('Vänster text 50%, bild till höger . Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'image + text ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-text-img', get_template_directory_uri() . '/template-parts/block/assets/css/text-50-img-right.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'image-text-50-50',
			'title'				=> __('50/50 Image Text'),
			'description'		=> __('Image 50% Text 50%. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'image + text ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-image-text', get_template_directory_uri() . '/template-parts/block/assets/css/image-text-50-50.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'link-text-50-50',
			'title'				=> __('50/50 Länkar Text'),
			'description'		=> __('2 kolumn länkar 50% Text 50%. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'Länkar  text ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-link-text', get_template_directory_uri() . '/template-parts/block/assets/css/link-text-50-50.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'text-curv-img-50-50',
			'title'				=> __('50/50 Kurvad Bild Text'),
			'description'		=> __(' Kurv på bild kant 50% och Text 50%. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'image + text ', 'Design 2021' ),
			'mode'				=> 'edit',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-text-curv-img', get_template_directory_uri() . '/template-parts/block/assets/css/text-curve-img-50-50.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'hero-gray-curve',
			'title'				=> __('Hero Gray Curve'),
			'description'		=> __('Hero gray background with curved bottom border. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '42', 'src' =>'superhero'),
			'keywords'			=> array( 'hero', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-hero-gray-curve', get_template_directory_uri() . '/template-parts/block/assets/css/hero-gray-curve.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'hero-divider-curve',
			'title'				=> __('Hero Divider Curve'),
			'description'		=> __('Full width divider gray curved bottom border. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'align'           	=> 'full',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '42', 'src' =>'superhero'),
			'keywords'			=> array( 'hero', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-divider-curve', get_template_directory_uri() . '/template-parts/block/assets/css/divider-curve.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'compensation-calculator',
			'title'				=> __('Ersättningsberäkning'),
			'description'		=> __('Beräkning av ersättning'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'calculator'),
			'keywords'			=> array( 'compensation', 'ersättning' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-calculator', get_template_directory_uri() . '/template-parts/block/assets/css/compensation21.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'faq-21',
			'title'				=> __('1 Column FAQ '),
			'description'		=> __('1 column FAQ. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-justify'),
			'keywords'			=> array( 'FAQ accordian ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-faq-21', get_template_directory_uri() . '/template-parts/block/assets/css/faq21.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'super-accordian',
			'title'				=> __('Super Accordian '),
			'description'		=> __('1 column + 10 element accordian. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-justify'),
			'keywords'			=> array( 'Accordian ', 'Design 2021' ),
			'align'           	=> 'full',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-supper-accordian', get_template_directory_uri() . '/template-parts/block/assets/css/super-accordian.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'timeline',
			'title'				=> __('Timeline'),
			'description'		=> __('Timeline. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-justify'),
			'keywords'			=> array( 'Accordian ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-timeline', get_template_directory_uri() . '/template-parts/block/assets/css/timeline.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'contact-puffer',
			'title'				=> __('Kontakt Puffer'),
			'description'		=> __('Kontakt puffer för personal. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'editor-justify'),
			'keywords'			=> array( 'Kontakt ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'contact-puffer', get_template_directory_uri() . '/template-parts/block/assets/css/contact-puffer.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'entry-puffs',
			'title'				=> __('Entry Puffs: 4 medium '),
			'description'		=> __('Entry Puffs Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'screenoptions'),
			'keywords'			=> array( 'entry puffs ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'entry-puffs', get_template_directory_uri() . '/template-parts/block/assets/css/entry-puffs.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'entry-puffs-three',
			'title'				=> __('Entry Puffs: 3 stor '),
			'description'		=> __('Entry Puffs: 3 storre puffs. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'image-filter'),
			'keywords'			=> array( 'entry puffs 3 ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
					wp_enqueue_style( 'entry-puffs-three', get_template_directory_uri() . '/template-parts/block/assets/css/entry-puffs-3.css', array(), '1.0.0' );
				  }, 
		));
		acf_register_block(array(
			'name'				=> 'super-puffer',
			'title'				=> __('Super Puffer'),
			'description'		=> __('Super Puffs: 2-4 puffer med text. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'image-filter'),
			'keywords'			=> array( 'entry puffs  ', 'Design 2021' ),
			'enqueue_assets' 	=> function(){
					wp_enqueue_style( 'super-puffer', get_template_directory_uri() . '/template-parts/block/assets/css/super-puffer.css', array(), '1.0.0' );
				  }, 
		));

		acf_register_block(array(
			'name'				=> 'tabs-21',
			'title'				=> __('Tabs'),
			'description'		=> __('For 1 - 5 tabs. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'table-row-after'),
			'keywords'			=> array( 'Tab', 'Design 2021' ),
			'multiple'			=> true,
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-tabs', get_template_directory_uri() . '/template-parts/block/assets/css/tabs.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'sidebar-menu',
			'title'				=> __('Sticky Sidebar Meny'),
			'description'		=> __('Meny  för en sidebar kolumn. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'table-row-after'),
			'keywords'			=> array( 'Tab', 'Design 2021' ),
			'multiple'			=> true,
			'enqueue_assets' 	=> function(){
				wp_enqueue_script( 'block-sticky', get_template_directory_uri() . '/template-parts/block/assets/jquery.sticky-kit.js', array(), '1.0.0', true );
				wp_enqueue_style( 'block-sidebar-meu', get_template_directory_uri() . '/template-parts/block/assets/css/sidebar-meny.css', array(), '1.0.0' );
			  },  
		));
		acf_register_block(array(
			'name'				=> 'chapter-select',
			'title'				=> __('Chapter Select for Vilkör pages'),
			'description'		=> __('Define start and end of "chapters". Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'table-row-after'),
			'keywords'			=> array( 'Hide och show define', 'Design 2021' ),
			'multiple'			=> true,
			 'enqueue_assets' 	=> function(){
				// wp_enqueue_script( 'chapter-starter', get_template_directory_uri() . '/template-parts/block/assets/jquery.sticky-kit.js', array(), '1.0.0', true );
				//  wp_enqueue_style( 'chapter-starter', get_template_directory_uri() . '/template-parts/block/assets/css/chapter-select.css', array(), '1.0.0' );
			   },  
		));
		acf_register_block(array(
			'name'				=> 'fixed-table',
			'title'				=> __('Tabel'),
			'description'		=> __('Tabel. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'editor-table'),
			'keywords'			=> array( 'Tab', 'Design 2021' ),
			'multiple'			=> true,
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-table', get_template_directory_uri() . '/template-parts/block/assets/css/table.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'link-table',
			'title'				=> __('Länk Tabel'),
			'description'		=> __('Länk Tabel. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'grid-view'),
			'keywords'			=> array( 'Tab', 'Design 2021' ),
			'multiple'			=> true,
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-link-table', get_template_directory_uri() . '/template-parts/block/assets/css/table-link.css', array(), '1.0.0' );
			  }, 
		));
		acf_register_block(array(
			'name'				=> 'oembed-video',
			'title'				=> __('Embed video'),
			'description'		=> __('Video, YouTube eller vimeo. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'video-alt3'),
			'keywords'			=> array( 'video', 'Design 2021' ),
			'multiple'			=> true,
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'block-table', get_template_directory_uri() . '/template-parts/block/assets/css/oembed-video.css', array(), '1.0.0' );
			  }, 
		));
 		acf_register_block_type(array(
            'name'              => 'testimonial-slider',
            'title'             => __(' Testimonial Slider'),
            'description'       => __('Testimonial slider block. Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'          => 'smaa-2021',
			'icon' 				=> array('foreground' => '#f18e00', 'size' => '36', 'src' => 'images-alt2'),
			'keywords'			=> array( 'Testimonial slider', 'Design 2021' ),
				// 'align'				=> 'full',
		'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0' );
				wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css', array(), '1.9.0' );
				wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true );
				wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/block/assets/css/slider.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/block/assets/testimonial-slider.js', array(), '1.0.0', true );
			  }, 
        ));

		acf_register_block(array(
			'name'				=> 'member-archive',
			'title'				=> __('Medlems Arkiv'),
			'description'		=> __('Medlemmar arkiv . Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'Medlemmar ', 'Design 2021' ),
			'mode'				=> 'edit',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'more-members', get_template_directory_uri() . '/template-parts/block/assets/css/member-archive.css', array(), '1.0.0' );
				// wp_enqueue_script( 'more-members', get_template_directory_uri() . '/template-parts/block/assets/loadmore_members.js', array(), '1.0.0', true );
			  },  
		));
		acf_register_block(array(
			'name'				=> 'contact-form',
			'title'				=> __('Kontakt Formulär'),
			'description'		=> __('Medlemmar arkiv . Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'Medlemmar ', 'Design 2021' ),
			'mode'				=> 'edit',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'contact-form', get_template_directory_uri() . '/template-parts/block/assets/css/contact-form.css', array(), '1.0.0' );
			  },  
		));
		acf_register_block(array(
			'name'				=> 'recent-news',
			'title'				=> __('Senaste Nyheter'),
			'description'		=> __('nyheter . Design 2021'),
			'render_callback'	=> 'smaa_acf_block_render_callback',
			'category'			=> 'smaa-2021',
			'icon'				=> array('foreground' => '#f18e00', 'size' => '36', 'src' =>'align-right'),
			'keywords'			=> array( 'Medlemmar ', 'Design 2021' ),
			'mode'				=> 'edit',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'recent-news', get_template_directory_uri() . '/template-parts/block/assets/css/recent-news.css', array(), '1.0.0' );
			  },  
		));
	}
	function smaa_acf_block_render_callback( $block ) {
	
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}
	}
}