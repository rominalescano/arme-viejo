<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Multiple Business 1.0.0
 */
function multiple_business_setup() {

	/*
 	 * Make theme available for translation.
 	*/
	load_theme_textdomain( 'multiple-business', get_template_directory() . '/languages' );

	# Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	# Set the default content width.
	$GLOBALS['content_width'] = apply_filters( 'multiple_business_content_width', 1050 );

	# Register menu locations.
	register_nav_menus( array(
		'primary'    => esc_html__( 'Primary Menu', 'multiple-business' ),
		'social'     => esc_html__( 'Social Menu', 'multiple-business' ),
		'footer'     => esc_html__( 'Footer Menu', 'multiple-business' )
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-header', array(
		'default-image'    => get_parent_theme_file_uri( '/assets/images/placeholder/multiple-business-banner-1920-380.jpg' ),
		'width'            => 1920,
		'height'           => 380,
		'flex-height'      => true,
		'wp-head-callback' => 'multiple_business_header_style',
	));

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/placeholder/multiple-business-banner-1920-380.jpg',
			'thumbnail_url' => '%s/assets/images/placeholder/multiple-business-banner-1920-380.jpg',
			'description'   => esc_html__( 'Default Header Image', 'multiple-business' ),
		),
	) );

	# Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	));

	# Enable support for selective refresh of widgets in Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	# Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 190,
		'height'      => 50,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	add_theme_support( 'infinite-scroll', array(
	    'container' 	 => '#main-wrap',
	    'footer_widgets' => true,
	    'render'         => 'multiple_business_infinite_scroll_render',
	));

	add_theme_support( 'woocommerce' );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	
	add_editor_style( array( '/assets/css/editor-style.min.css') );

	// Gutenberg support
	add_theme_support( 'editor-color-palette', array(
       	array(
			'name' => esc_html__( 'Tan', 'multiple-business' ),
			'slug' => 'tan',
			'color' => '#D2B48C',
       	),
       	array(
           	'name' => esc_html__( 'Yellow', 'multiple-business' ),
           	'slug' => 'yellow',
           	'color' => '#FDE64B',
       	),
       	array(
           	'name' => esc_html__( 'Orange', 'multiple-business' ),
           	'slug' => 'orange',
           	'color' => '#ED7014',
       	),
       	array(
           	'name' => esc_html__( 'Red', 'multiple-business' ),
           	'slug' => 'red',
           	'color' => '#D0312D',
       	),
       	array(
           	'name' => esc_html__( 'Pink', 'multiple-business' ),
           	'slug' => 'pink',
           	'color' => '#b565a7',
       	),
       	array(
           	'name' => esc_html__( 'Purple', 'multiple-business' ),
           	'slug' => 'purple',
           	'color' => '#A32CC4',
       	),
       	array(
           	'name' => esc_html__( 'Blue', 'multiple-business' ),
           	'slug' => 'blue',
           	'color' => '#4E97D8',
       	),
       	array(
           	'name' => esc_html__( 'Green', 'multiple-business' ),
           	'slug' => 'green',
           	'color' => '#00B294',
       	),
       	array(
           	'name' => esc_html__( 'Brown', 'multiple-business' ),
           	'slug' => 'brown',
           	'color' => '#231709',
       	),
       	array(
           	'name' => esc_html__( 'Grey', 'multiple-business' ),
           	'slug' => 'grey',
           	'color' => '#7D7D7D',
       	),
       	array(
           	'name' => esc_html__( 'Black', 'multiple-business' ),
           	'slug' => 'black',
           	'color' => '#000000',
       	),
   	));

	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-font-sizes', array(
	   	array(
	       	'name' => esc_html__( 'small', 'multiple-business' ),
	       	'shortName' => esc_html__( 'S', 'multiple-business' ),
	       	'size' => 12,
	       	'slug' => 'small'
	   	),
	   	array(
	       	'name' => esc_html__( 'regular', 'multiple-business' ),
	       	'shortName' => esc_html__( 'M', 'multiple-business' ),
	       	'size' => 16,
	       	'slug' => 'regular'
	   	),
	   	array(
	       	'name' => esc_html__( 'larger', 'multiple-business' ),
	       	'shortName' => esc_html__( 'L', 'multiple-business' ),
	       	'size' => 36,
	       	'slug' => 'larger'
	   	),
	   	array(
	       	'name' => esc_html__( 'huge', 'multiple-business' ),
	       	'shortName' => esc_html__( 'XL', 'multiple-business' ),
	       	'size' => 48,
	       	'slug' => 'huge'
	   	)
	));
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );

	add_image_size( 'multiple-business-1920-1200', 1920, 1200, true );
	add_image_size( 'multiple-business-1920-750', 1920, 750, true );
	add_image_size( 'multiple-business-1920-380', 1920, 380, true );
	add_image_size( 'multiple-business-600-675', 600, 675, true );
	add_image_size( 'multiple-business-1170-710', 1170, 710, true );
}
add_action( 'after_setup_theme', 'multiple_business_setup' );

if( ! function_exists( 'multiple_business_infinite_scroll_render' ) ):
/**
 * Set the code to be rendered on for calling posts,
 * hooked to template parts when possible.
 *
 * Note: must define a loop.
 */
function multiple_business_infinite_scroll_render(){
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/archive/content', '' );
	endwhile;
	wp_reset_postdata();
}
endif;

if( ! function_exists( 'multiple_business_header_style' ) ):
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see multiple_business_setup().
 */
function multiple_business_header_style(){
	$header_text_color = get_header_textcolor();

	# If no custom options for text are set, let's bail.
	# get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	# If we get this far, we have custom styles. Let's do this.
	?>
	<style id="multiple-business-custom-header-styles" type="text/css">
		.wrap-inner-banner .page-header .page-title,
		body.home.page .wrap-inner-banner .page-header .page-title {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	</style>
<?php
}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @since Multiple Business 1.0.0
 */
function multiple_business_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'multiple-business' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'multiple-business' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'multiple-business' ) . $i,
			'id'            => 'multiple-business-footer-sidebar-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'multiple-business' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-item">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	

}
add_action( 'widgets_init', 'multiple_business_widgets_init' );