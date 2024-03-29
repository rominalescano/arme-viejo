

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Type
 * @since Type 1.0
 */

//get_header();


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
<?php do_action( 'wp_body_open' ); 


//----------------

global $wpdb;

$cadena_get= $_GET["cadena"];

$tabla_alumnos = $wpdb->prefix . 'alumnos';


$alumno= $wpdb->get_row( $wpdb->prepare ("SELECT * FROM  $tabla_alumnos WHERE cadena_hash =  %s ", $cadena_get) );
$nombre_alumno= $alumno->nombre;
$cadena_hash_bd=  $alumno->cadena_hash;
$ingreso_al_link= $alumno->ingreso_al_link;
$correo= $alumno->correo;
$alumno_id= $alumno->id;
$_SESSION['logged_in_user_id'] = session_id();
$_SESSION['logged_in_user_name'] = $nombre_alumno;
$_SESSION['logged_in_user_mail'] = $correo;

$tabla_test_realizados = $wpdb->prefix . 'test_realizados';
$test_realizados = $wpdb->get_results("SELECT * FROM  $tabla_test_realizados WHERE alumno_id= $alumno_id");


$entrar= false;

if ($cadena_get <> '') {

   if ($cadena_get==$cadena_hash_bd  &&  $ingreso_al_link==0 ) {$entrar= true;}

}


if ($entrar) {

?>
<div class="container container-tests">
<div class="h2"><?php  echo $_SESSION['logged_in_user_name']; ?> !</div>
<div class="h5">Frente de ti vas a ver 8 botones llamados TEST que analizarán por completo distintas 
   áreas de tu vida que influyen en tu vocación. Para ello, es necesario que completes cada test 
   en orden creciente de manera ordenada sin saltar de un test al otro desordenadamente. 
   <br> <br>
   Una vez que finalices, nuestro equipo recibirá todos tus resultados, los analizaremos y realizaremos 
   un informe detallado al respecto de vos y las posibilidades para tu desarrollo futuro.  
   <br> <br>
¿Estás listo para empezar? 
</div>
<?php
$var1='';
$var2='';
$var3='';
$var4='';
$var5='';
$var6='';
$var7='';
$var8='';
foreach ($test_realizados as $test) {
   $id_test= esc_textarea($test->tipo_test_id);
   //var_dump ($test);
   //echo  $id_test;
   if ($id_test==1){ $var1='disabled'; }
   if ($id_test==2){ $var2='disabled'; }
   if ($id_test==3){ $var3='disabled'; }
   if ($id_test==4){ $var4='disabled'; }
   if ($id_test==5){ $var5='disabled'; }
   if ($id_test==6){ $var6='disabled'; }
   if ($id_test==7){ $var7='disabled'; }
   if ($id_test==8){
       $var8='disabled';
       //--- colocar $ingreso_al_link en 1  en la Base de Datos
         $wpdb->update( 
         $tabla_alumnos, 
         array('ingreso_al_link'=> '1', ),
          array( 'id' => $alumno_id )
          );
      
      }
} 

?>
<div style="margin-top:30px;">
<a class="btn btn-info btn-lg <?php echo  $var1 ?>"  href="/page/test-1" style="margin-right:15px;"> Test 1</a>
<a class="btn btn-info btn-lg <?php echo  $var2 ?>"  href="/page/test-2" style="margin-right:15px;"> Test 2</a>
<a class="btn btn-info btn-lg <?php echo  $var3 ?>"  href="/page/test-3" style="margin-right:15px;"> Test 3</a>
<a class="btn btn-info btn-lg <?php echo  $var4 ?>"  href="/page/test-4" style="margin-right:15px;"> Test 4</a>
<a class="btn btn-info btn-lg <?php echo  $var5 ?>"  href="/page/test-5" style="margin-right:15px;"> Test 5</a>
<a class="btn btn-info btn-lg <?php echo  $var6 ?>"  href="/page/test-6" style="margin-right:15px;"> Test 6</a>
<a class="btn btn-info btn-lg <?php echo  $var7 ?>"  href="/page/test-7" style="margin-right:15px;"> Test 7</a>
<a class="btn btn-info btn-lg <?php echo  $var8 ?>"  href="/page/test-8" style="margin-right:15px;"> Test 8</a>
</div>


</div>



<?php

} else { ?>

   <div class="container container-tests">
   <div class="h2"><?php  echo $_SESSION['logged_in_user_name']; ?> !</div>
   <div class="h5">Este link ya ha sido utilizado, o es incorrecto. Comunicate con Arme Consulting.
   </div>


<?php
}

get_footer(); ?>