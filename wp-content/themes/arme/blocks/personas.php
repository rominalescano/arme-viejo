<?php

// Variables for Current Block.
$columnas  = get_field( 'cantidad_columnas_grid' );
$grupos_de_personas = get_field( 'grupos_de_personas' );
$slug_grupos_de_personas = get_term($grupos_de_personas)->slug;



// Variable $columnas
if ( $columnas == "1col" ) {
  $class_col_text  = 'col-md-12';
} else if ( $columnas == "2col" ) {
  $class_col_text  = 'col-md-6' ;
} else if ( $columnas == "3col" ) {
  $class_col_text  = 'col-md-4' ;
}
else if ( $columnas == "4col" ) {
  $class_col_text  = 'col-md-3' ;

}


//*----------------Loop en un Bloque-------------------
$args = array( 
    'orderby' => 'title',
    'post_type' => 'personas',
    'grupos' => $slug_grupos_de_personas,
    'posts_per_page' => -1
      );
$personas = new WP_Query( $args );

?>
<?php 
  if ( $personas->have_posts() ) : ?>
    <div class="container hola">
      <div class="row">  
         <?php 
          while ( $personas->have_posts() ) : $personas->the_post(); ?>
        
        <div class="<?php echo esc_attr(  $class_col_text) ?>">
              <?php the_post_thumbnail('thumbnail'); ?>
              <br>
              <?php //the_content(); ?>
              <b><?php the_title(); ?></b>
         </div>
        <?php endwhile; ?>
      </div>
    </div>
<?php endif;

?>