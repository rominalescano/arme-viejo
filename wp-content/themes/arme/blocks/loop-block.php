<?php

// Variables for Current Block.
$columnas  = get_field( 'cantidad_columnas_grid' );
$tipo_post = get_field( 'tipo_post' ); // paginas o posts o personas
//$grupos_de_personas = get_field( 'categorias_personas' );
//$slug_grupos_de_personas = get_term($grupos_de_personas)->slug;


// Variable $columnas
if ( $columnas == "1col" ) {
  $class_col_text  = 'col-md-12 text-center';
} else if ( $columnas == "2col" ) {
  $class_col_text  = 'col-md-6 text-center' ;
} else if ( $columnas == "3col" ) {
  $class_col_text  = 'col-md-4 text-center' ;
} else if ( $columnas == "4col" ) {
  $class_col_text  = 'col-md-3 text-center' ;
}


//echo $tipo_post; die();
if ( $tipo_post == "posts" ) {
$entradas = get_field('posts'); // trae todas los posts que voy a recorrer


} elseif ( $tipo_post == "pages" ) {
$entradas =  get_field('paginas'); // trae todas las paginas que voy a recorrer


}  elseif ( $tipo_post == "personas" ){
$entradas =  get_field('personas'); // trae todas las personas que voy a recorrer


}
 

$selected_posts = $entradas;
if( $selected_posts ): ?>
 <div class="container">
      <div class="row">  
        <?php foreach( $selected_posts as $selected_post ):  ?>
            <div class="<?php echo esc_attr(  $class_col_text) ?>">
              <?php  
              $permalink = get_permalink( $selected_post->ID ); 
              $title = get_the_title( $selected_post->ID ); ?>

              <?php  echo get_the_post_thumbnail( $selected_post->ID, 'thumbnail', array( 'class' => 'imagen' )); ?>
              <div class="titulo"><?php echo esc_html( $title ); ?></div>
                 
           </div>           
        <?php endforeach; ?>
    </div>
    </div>
<?php endif; 


?>
