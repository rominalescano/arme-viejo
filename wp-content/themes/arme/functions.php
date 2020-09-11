<?php

//function mytheme_add_woocommerce_support() {
	//add_theme_support( 'woocommerce' );
//}
//add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


//----------------------------------------------------
function child_theme_assets() {
$parent_style = 'parent-style'; 

wp_enqueue_style($parent_style, 
                get_template_directory_uri() . '/style.css' );
                                    // aqui agrego mis estilos y escripts
 wp_enqueue_style( 'child-style',
                    get_stylesheet_directory_uri() . '/assets/css/main.css',
                    array( $parent_style ),
                    wp_get_theme()->get('Version'));
 
wp_enqueue_script( 'child-script',
                    get_stylesheet_directory_uri() . '/assets/js/main.js' );
                    }

add_action( 'wp_enqueue_scripts', 'child_theme_assets' );

//------------------------------------------------------

// quito el titulo de la pagina Tienda
add_filter( 'woocommerce_show_page_title', 'not_a_shop_page' );

function not_a_shop_page() {
    return boolval(!is_shop());
}


// ----------------------------------------------------------
// quito campos innecesarios de chackout woocommerce

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
   // unset($fields['billing']['billing_first_name']);
   // unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    //unset($fields['billing']['billing_country']);
    //unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    //unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_city']);
    unset( $tabs['additional_information'] );
    return $fields;
}

add_filter('woocommerce_enable_order_notes_field', '__return_false');

// quito el select de busqueda y el count result de woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


// creo un Post Type para ingresar datos de personas


function create_post_type_personas() {
 $args=  array(
        'labels'         => array(
        'name'           => __( 'Personas' ),
        'singular_name'  => __( 'Persona' )
          ),
        'public'         => true,
        'supports'       => array('title','editor','thumbnail'),
        'menu_position'  => 4,
        'menu_icon'      => 'dashicons-universal-access-alt',
        'has_archive' => true,
          );
  register_post_type( 'personas', $args);
  }

add_action( 'init', 'create_post_type_personas' );


  // remplazar titulo 
  add_filter( 'enter_title_here', 'custom_enter_title' );
function custom_enter_title( $input ) {
    if ( 'personas' === get_post_type() ) {
        return __( 'Ingresar Apellido (,) y Nombre', 'your_textdomain' );
    }

    return $input;
}

  // Crear una Taxonomy for Custom Post Type
  add_action( 'init', 'add_custom_taxonomy', 0 );

  function add_custom_taxonomy() {
  register_taxonomy('grupos', 'personas', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'grupos', 'taxonomy general name' ),
      'singular_name' => _x( 'grupo', 'taxonomy singular name' ),
      'search_items' =>  __( 'Buscar grupo' ),
      'all_items' => __( 'Todos los grupos' ),
      'parent_item' => __( 'Parent Advert Tag' ),
      'parent_item_colon' => __( 'Parent Advert Tag:' ),
      'edit_item' => __( 'Editar grupo' ),
      'update_item' => __( 'Actualizar grupo' ),
      'add_new_item' => __( 'Agregar nuevo grupo' ),
      'new_item_name' => __( 'Nuevo nombre de grupo' ),
      'menu_name' => __( 'grupos' ),
    ),
    'rewrite' => array(
      'slug' => 'advert-tags',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
 } 


 // agrego un custom field que quiero que sea un Select que me liste los posts types nada mas

 add_filter('acf/load_field/name=poststypes', 'acf_load_post_types');

 function acf_load_post_types($field)
 {
     foreach ( get_post_types( '', 'names' ) as $post_type ) {
        $field['choices'][$post_type] = $post_type;
     }
 
     // return the field
     return $field;
 }

 //------ Agregar columnas al listado de Posts del Admin

 /*
Añade una nueva columna al admin
*/
// GET FEATURED IMAGE
function get_featured_image($post_ID) {
  $post_thumbnail_id = get_post_thumbnail_id($post_ID);
  if ($post_thumbnail_id) {
      $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
      return $post_thumbnail_img[0];
  }
}

// ADD NEW COLUMN
function columns_head_only_personas($defaults) {
  $defaults['featured_image'] = 'Avatar';
  $defaults['cargo']          = 'Cargo';
  $defaults['email']          = 'Mail';
  $defaults['grupo']          = 'Grupo';
  return $defaults;
}

// INSERTO LOS VALORES A LAS COLUMNAS CREADAS
function columns_content_only_personas($column_name, $post_ID) {
  $fields = get_fields();
  if ($column_name == 'featured_image') {
      $post_featured_image = get_featured_image($post_ID);
      if ($post_featured_image) {
          echo '<img src="' . $post_featured_image . '" />';
      }
  }
  if ($column_name == 'cargo') {
    $cargo = $fields['cargo'];
    if ($cargo) {
        echo $cargo;
    }
  }
  if ($column_name == 'email') {
      $email = $fields['email'];
      if ($email) {
          echo $email;
      }
  }
  if ($column_name == 'grupo') {
    $grupo = get_the_term_list( $post->ID, 'grupos', 'Tipo:  ');
    if ($grupo) {
        echo $grupo;
    }
  }
}
add_filter('manage_personas_posts_columns', 'columns_head_only_personas', 10);
add_action('manage_personas_posts_custom_column', 'columns_content_only_personas', 10, 2);



/**
 * Registramos el bloque de Gutenberg para Personas
 */
function create_personas_gb_block() {
  acf_register_block( [
    'name'				=> 'personas',
    'title'				=> 'personas',
    'description'		=> 'Block con grid de personas.',
    'render_template'	=> '/blocks/personas.php',
    'mode'				=> 'edit',
    'icon'				=> 'screenoptions',
    'keywords'			=> [ 'personas', 'quote'],
    'enqueue_style'		=>  get_stylesheet_directory_uri() . '/assets/css/blocks/personas.css',
  ] );
}
add_action('acf/init', 'create_personas_gb_block');

/**
 * Registramos el bloque de Gutenberg para loop block
 */
function create_loop_gb_block() {
  acf_register_block( [
    'name'				=> 'loop-block',
    'title'				=> 'loop-block',
    'description'		=> 'Block loop de pages o posts.',
    'render_template'	=> '/blocks/loop-block.php',
    'mode'				=> 'edit',
    'icon'				=> 'screenoptions',
    'keywords'			=> [ 'loop-block', 'quote'],
    'enqueue_style'		=>  get_stylesheet_directory_uri() . '/assets/css/blocks/loop-block.css',
  ] );
}
add_action('acf/init', 'create_loop_gb_block');


/**
 * Registramos el bloque de Gutenberg para texto imagen 
 */
function create_media_text_gb_block() {
  acf_register_block( [
    'name'				=> 'media-text',
    'title'				=> 'media-text',
    'description'		=> 'Block para agregar un texto con media',
    'render_template'	=> '/blocks/media-text.php',
    'mode'				=> 'edit',
    'icon'				=> 'dashicons-admin-media',
    'keywords'			=> [ 'media-text', 'quote'],
    'enqueue_style'		=>  get_stylesheet_directory_uri() . '/assets/css/blocks/media-text.css',
  ] );
}
add_action('acf/init', 'create_media_text_gb_block');


