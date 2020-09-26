<?php
/*
Template Name: Template-Inscripcion
*/
// inicio sesion
session_start();
 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>


                
<?php
	   
	   if ( have_posts() ) {
        ?> 
        <div class="container" style="margin-top:40px;">
        <h1>¡Hola! Bienvenido a este espacio en el que juntos vamos a descubrir cuál es tu VOCACIÓN!
			<br> BIENVENIDO A  ARME CONSULTING!</h1>
        <?php 
		while ( have_posts() ) {
            the_post();
			 the_content(); 
			//
			// Contenido Aqui
			//
		}
    }  //  ?>

    </div>

<?php 
			 	
get_footer(); ?>
