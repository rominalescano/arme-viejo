
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--link rel="profile" href="http://gmpg.org/xfn/11"-->
	<?php wp_head(); ?>
</head>

<?php
global $wpdb;

$tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
$tabla_subgrupos_test= $wpdb->prefix ."subgrupos_test";
$tabla_resultados_subgrupos_test= $wpdb->prefix ."resultados_subgrupos_test";
$tabla_tipo_test= $wpdb->prefix ."tipo_test";
$tabla_preguntas_test= $wpdb->prefix ."preguntas_test";
$tabla_alumnos=  $wpdb->prefix ."alumnos";
$alumno_id = $_GET['alum']; 

?>


<?php
//-- ENCABEZADO-----------------------------------------------------------------------------------
$datos_alumno= $wpdb->get_row("SELECT * FROM  $tabla_alumnos WHERE id= $alumno_id");
$nombre_almuno= esc_textarea($datos_alumno->nombre);  
$apellido_almuno= esc_textarea($datos_alumno->apellido);  
$dni_almuno= esc_textarea($datos_alumno->dni);  ?>

<div class="container-fluid contenedor-informe">
    <div>
        <p class="encabezado-informe-vocacional">  INFORME VOCACIONAL </p>
        <P class="encabezado-informe-vocacional-nombre"> <?php echo $nombre_almuno. ' ' .$apellido_almuno;  ?></P>
        <P class="encabezado-informe-vocacional-dni"> <?php echo 'DNI N°' . $dni_almuno;  ?></P>
    </div>


<?php
//-- RESULTADOS TEST 1-------------------------------------------------------------------------------
//-- INTELIGENICIAS

$texto_encabezado_resultado_test1 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=1" ) ); 

$texto_finalizacion_resultado_test1= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=1" ) );


$resultados_test1_may7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 1 and alumno_id=$alumno_id 
and total>=7 ORDER BY total DESC"); // primero busca todos los que dieron mayor que 7 e imprime todos los textos, en caso de que no haya ninguno

$resultados_test1_menor7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 1 and alumno_id=$alumno_id 
and total <> 0 and total <> 1 and total <> 2  and total <> 3 and total <> 4  and total <> 5 ORDER BY total DESC LIMIT 3"); // busca los tres mayores pero que ninguno sea 0
?>

  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test"> Test de Inteligencias </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test1; ?></p>
    </div>
    <div class="card-body">
                
        <?php
        if (!empty($resultados_test1_may7)){ 
        
            foreach ($resultados_test1_may7 as $resultado_test1_may7) {

                $subgrupo= esc_textarea($resultado_test1_may7->subgrupo_test_id);
                //$alumno= esc_textarea($resultado_test1_may7->alumno_id);
                //$total= esc_textarea($resultado_test1_may7->total);
           
                
                $texto1 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=1 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto1. '</p><br><br>';
                //echo $wpdb->last_error;
            }


        } else {

            foreach ($resultados_test1_menor7 as $resultado_test1_menor7) {
                $subgrupo= esc_textarea($resultado_test1_menor7->subgrupo_test_id);
                $texto1 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=1 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto1. '</p><br><br>';
                
            }
                
        }

?>
         </div>

 <?php
        if (!empty($texto_finalizacion_resultado_test1)) { ?>
        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test1; ?></p>
        </div> 
        <?php } ?>
    </div>
</div>

<?php

//-- RESULTADOS TEST 2-------------------------------------------------------------------------------
//-- CREENCIAS



$texto_encabezado_resultado_test2 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=2" ) ); 

$texto_finalizacion_resultado_test2= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=2" ) );


$resultados_test2_may7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 2 and alumno_id=$alumno_id 
and total>=7 ORDER BY total DESC"); // primero busca todos los que dieron mayor que 7 e imprime todos los textos, en caso de que no haya ninguno

$count_may7_test2= $wpdb->get_var( $wpdb->prepare(
    "SELECT count(*) FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 2 and alumno_id=$alumno_id 
    and total>=7")); 
//echo 'count'. $count_may7_test2;

$resultados_test2_menor7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 2 and alumno_id=$alumno_id 
and total <> 0 and total <> 1 and total <> 2 and total <> 3 and total <> 4 ORDER BY total DESC LIMIT 1"); // busca los tres mayores pero que ninguno sea 0
?>
<div class="container-fluid contenedor-informe">
  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test"> Creencias Limitantes - Test de Ellis </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test2; ?></p>
    </div>
    <div class="card-body">
                
        <?php
        if (!empty($resultados_test2_may7)){ 
        
            foreach ($resultados_test2_may7 as $resultado_test2_may7) {

                $subgrupo= esc_textarea($resultado_test2_may7->subgrupo_test_id);              
                $texto_creencia= $wpdb->get_var( $wpdb->prepare("SELECT texto FROM $tabla_preguntas_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" )); 

                $texto2 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" ) ); 

                echo '<p class="texto_creencia">'. $texto_creencia. '</p>';
                echo '<p class="texto_result_test">'. $texto2. '</p><br><br>';


            }
        } 
        
        if ($count_may7_test2 <3 ) {

            foreach ($resultados_test2_menor7 as $resultado_test2_menor7) {
                $subgrupo= esc_textarea($resultado_test2_menor7->subgrupo_test_id);
                $texto2 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto2. '</p><br><br>';

            }
                
        }

?>
         </div>

<?php
        if (!empty($texto_finalizacion_resultado_test2)) { ?>
        <div class="card-footer texto_finalizacion_resultado ">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test2; ?></p>
        </div> 
<?php } ?>
    </div>
</div>



<?php

//-- RESULTADOS TEST 3------------------------------------------------------------------------------
//-- APTITUDES  

$texto_encabezado_resultado_test3 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=3" ) ); 

$texto_finalizacion_resultado_test3= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=3" ) );


$resultados_test3_may4= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 3 and alumno_id=$alumno_id 
and total>=4 ORDER BY total DESC"); // solo se buscan los que tienen al menos 4 de las 6 preguntas de cada aptitud

?>
<div class="container-fluid contenedor-informe">
  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test"> Test de Aptitudes </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test3; ?></p>
    </div>
    <div class="card-body">
                
        <?php
        if (!empty($resultados_test3_may4)){ 
        
            foreach ($resultados_test3_may4 as $resultado_test3_may4) {

                $subgrupo= esc_textarea($resultado_test3_may4->subgrupo_test_id);
                $texto3 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=3 and subgrupo_test_id=$subgrupo" ) ); 

                echo '<p class="texto_result_test">'. $texto3. '</p><br><br>';


            }
        } 
?>
         </div>
<?php
if (!empty($texto_finalizacion_resultado_test3)) { ?>
        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test3; ?></p>
        </div> 
<?php } ?>
    </div>
</div>



<?php


//-- RESULTADOS TEST 4------------------------------------------------------------------------------
//-- INTERESES



$texto_encabezado_resultado_test4 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=4" ) ); 

$texto_finalizacion_resultado_test4= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=4" ) );


$resultados_test4_may4= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id=4 and alumno_id=$alumno_id 
and total>=4 ORDER BY total DESC"); // solo se buscan los que tienen al menos 4 de las 6 preguntas de cada interes

?>
<div class="container-fluid contenedor-informe">
  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test"> Test de Intereses </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test4; ?></p>
    </div>
    <div class="card-body">
                
        <?php
        if (!empty($resultados_test4_may4)){ 
        
            foreach ($resultados_test4_may4 as $resultado_test4_may4) {

                $subgrupo= esc_textarea($resultado_test4_may4->subgrupo_test_id);
                $texto4 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=3 and subgrupo_test_id=$subgrupo" ) ); 

                echo '<p class="texto_result_test">'. $texto4. '</p><br><br>';

            }
        } 
?>
         </div>

<?php
if (!empty($texto_finalizacion_resultado_test4)) { ?>

        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test4; ?></p>
        </div> 
<?php } ?>
    </div>
</div>



<?php

//-- RESULTADOS TEST 5-------------------------------------------------------------------------------
//-- ESTILOS DE APRENDIZAJE

$texto_encabezado_resultado_test5 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=5" ) ); 

$texto_finalizacion_resultado_test5= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=5" ) );


$resultados_test5_may7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 5 and alumno_id=$alumno_id 
and total>=7 ORDER BY total DESC"); // primero busca todos los que dieron mayor que 7 e imprime todos los textos, en caso de que no haya ninguno

$resultados_test5_menor7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 5 and alumno_id=$alumno_id 
and total <> 0 and total <> 1 and total <> 2  and total <> 3 and total <> 4  and total <> 5 ORDER BY total DESC LIMIT 3"); // busca los tres mayores pero que ninguno sea 0
?>
<div class="container-fluid contenedor-informe">
  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test"> Estilos de Aprendizaje </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test1; ?></p>
    </div>
    <div class="card-body">
                
        <?php
        if (!empty($resultados_test5_may7)){ 
        
            foreach ($resultados_test5_may7 as $resultado_test5_may7) {

                $subgrupo= esc_textarea($resultado_test5_may7->subgrupo_test_id);
                $texto5 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=5 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto5. '</p><br><br>';
                //echo $wpdb->last_error;
            }


        } else {

            foreach ($resultados_test5_menor7 as $resultado_test5_menor7) {
                $subgrupo= esc_textarea($resultado_test5_menor7->subgrupo_test_id);
                $texto5 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=5 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto5. '</p><br><br>';
                //echo $wpdb->last_error;
            }
                
        }

?>
         </div>

 <?php
        if (!empty($texto_finalizacion_resultado_test5)) { ?>
        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test5; ?></p>
        </div> 
        <?php } ?>
    </div>
</div>

<?php

//-- RESULTADOS TEST 6 Y 7------------------------------------------------------------------------------
//-- TEMPERAMENTOS

//--  TEST 6

$texto_encabezado_resultado_test6 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=6" ) ); 

$texto_finalizacion_resultado_test6= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=6" ) );


$resultados_test6= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id=6 and alumno_id=$alumno_id 
 ORDER BY total DESC LIMIT 1"); // solo se buscan los que tienen al menos 4 de las 6 preguntas de cada interes

//--  TEST 7

$subgrupo_mayor_7= $wpdb->get_var("SELECT subgrupo_test_id FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id=7 and alumno_id=$alumno_id 
 ORDER BY total DESC LIMIT 1"); // solo se buscan los que tienen al menos 4 de las 6 preguntas de cada interes



?>
<div class="container-fluid contenedor-informe">
  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test"> Temperamentos </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test6; ?></p>
    </div>
    <div class="card-body">
                
        <?php
        if (!empty($resultados_test6)){ 
        
            foreach ($resultados_test6 as $resultado_test6) {

                $subgrupo6= esc_textarea($resultado_test6->subgrupo_test_id);
                $texto6 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=6 and subgrupo_test_id=$subgrupo6" ) ); 

                echo '<p class="texto_result_test">'. $texto6. '</p><br><br>';

            }
        } 

        if (!empty($subgrupo_mayor_7)){ 
                    
                if ($subgrupo6 <> $subgrupo_mayor_7) {
                $texto7 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=7 and subgrupo_test_id=$subgrupo_mayor_7 and subgrupo_combinado=$subgrupo6" ) ); 
                echo '<p class="texto_result_test">'. $texto7. '</p><br><br>';

                }           
        } 
?>
         </div>
    </div>
</div>


<?php

//--  TEST 8

$primera_pregunta= $wpdb->get_var("SELECT total FROM  $tabla_resultados_subgrupos_test WHERE subgrupo_test_id=1 and tipo_test_id=8 and alumno_id=$alumno_id "); 
$segunda_pregunta= $wpdb->get_var("SELECT total FROM  $tabla_resultados_subgrupos_test WHERE subgrupo_test_id=2 and tipo_test_id=8 and alumno_id=$alumno_id "); 
$texto_encabezado_resultado_test6 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=8" ) ); 

?>
<div class="container-fluid contenedor-informe">
  <div class="card mb-4">
    <div class="card-header">
        <p class="card-text titulo_result_test">Eneatipo </p>
        <p class="card-text texto_encabezado_result_test"> <?php echo $texto_encabezado_resultado_test8; ?></p>
    </div>
    <div class="card-body">
                
        <?php
       
                $texto8 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=8 and subgrupo_combinado=$primera_pregunta and subgrupo_test_id=$segunda_pregunta" ) ); 

                echo '<p class="texto_result_test">'. $texto8. '</p><br><br>';


?>
         </div>
    </div>
</div>


<?php






?>


