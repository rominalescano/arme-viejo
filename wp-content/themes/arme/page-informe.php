
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--link rel="profile" href="http://gmpg.org/xfn/11"-->
	<?php wp_head(); ?>
</head>

<?php
global $wpdb;

$tabla_subgrupos_test= $wpdb->prefix ."subgrupos_test";
$tabla_resultados_subgrupos_test= $wpdb->prefix ."resultados_subgrupos_test";
$tabla_tipo_test= $wpdb->prefix ."tipo_test";
$tabla_preguntas_test= $wpdb->prefix ."preguntas_test";
$alumno_id = $_GET['alum']; 

?>


<?php



//-- RESULTADOS TEST 1-------------------------------------------------------------------------------
$texto_encabezado_resultado_test1 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=1" ) ); 

$texto_finalizacion_resultado_test1= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=1" ) );


$resultados_test1_may7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 1 and alumno_id=$alumno_id 
and total>=7 ORDER BY total DESC"); // primero busca todos los que dieron mayor que 7 e imprime todos los textos, en caso de que no haya ninguno

$resultados_test1_menor7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 1 and alumno_id=$alumno_id 
and total <> 0 and total <> 1 and total <> 2  and total <> 3 and total <> 4  and total <> 5 ORDER BY total DESC LIMIT 3"); // busca los tres mayores pero que ninguno sea 0
?>
<div class="container-fluid contenedor-informe">
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
                $alumno= esc_textarea($resultado_test1_may7->alumno_id);
                $total= esc_textarea($resultado_test1_may7->total);
           
                $tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
                $texto1 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=1 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto1. '</p><br><br>';
                //echo $wpdb->last_error;
            }


        } else {

            foreach ($resultados_test1_menor7 as $resultado_test1_menor7) {
                $subgrupo= esc_textarea($resultado_test1_menor7->subgrupo_test_id);
                $alumno= esc_textarea($resultado_test1_menor7->alumno_id);
                $total= esc_textarea($resultado_test1_menor7->total);

                $tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
                $texto1 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=1 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto1. '</p><br><br>';
                //echo $wpdb->last_error;
            }
                
        }

?>
         </div>
        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test1; ?></p>
        </div> 

    </div>
</div>

<?php

//-- RESULTADOS TEST 2-------------------------------------------------------------------------------
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
                $alumno= esc_textarea($resultado_test2_may7->alumno_id);
                $total= esc_textarea($resultado_test2_may7->total);
                
                $texto_creencia= $wpdb->get_var( $wpdb->prepare("SELECT texto FROM $tabla_preguntas_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" )); 

                $tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
                $texto2 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" ) ); 

                echo '<p class="texto_creencia">'. $texto_creencia. '</p>';
                echo '<p class="texto_result_test">'. $texto2. '</p><br><br>';
                //echo $wpdb->last_error;

            }
        } 
        
        if ($count_may7_test2 <3 ) {

            foreach ($resultados_test2_menor7 as $resultado_test2_menor7) {
                $subgrupo= esc_textarea($resultado_test2_menor7->subgrupo_test_id);
                $alumno= esc_textarea($resultado_test2_menor7->alumno_id);
                $total= esc_textarea($resultado_test2_menor7->total);

                $tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
                $texto2 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto2. '</p><br><br>';
                //echo $wpdb->last_error;
            }
                
        }

?>
         </div>
        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test1; ?></p>
        </div> 

    </div>
</div>



<?php

//-- RESULTADOS TEST 3------------------------------------------------------------------------------
$texto_encabezado_resultado_test3 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=3" ) ); 

$texto_finalizacion_resultado_test3= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=3" ) );


$resultados_test3_may4= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 3 and alumno_id=$alumno_id 
and total>=4 ORDER BY total DESC"); // primero busca todos los que dieron mayor que 7 e imprime todos los textos, en caso de que no haya ninguno

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
                $alumno= esc_textarea($resultado_test3_may4->alumno_id);
                $total= esc_textarea($resultado_test3_may4->total);
                
                //$texto_creencia= $wpdb->get_var( $wpdb->prepare("SELECT texto FROM $tabla_preguntas_test 
                //WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" )); 

                $tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
                $texto3 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=3 and subgrupo_test_id=$subgrupo" ) ); 

                //echo '<p class="texto_creencia">'. $texto_creencia. '</p>';
                echo '<p class="texto_result_test">'. $texto3. '</p><br><br>';
                //echo $wpdb->last_error;

            }
        } 
        
        if ($count_may7_test2 <3 ) {

            foreach ($resultados_test2_menor7 as $resultado_test2_menor7) {
                $subgrupo= esc_textarea($resultado_test2_menor7->subgrupo_test_id);
                $alumno= esc_textarea($resultado_test2_menor7->alumno_id);
                $total= esc_textarea($resultado_test2_menor7->total);

                $tabla_textos_resultados_test= $wpdb->prefix ."textos_informe_subgrupos_test";
                $texto2 = $wpdb->get_var( $wpdb->prepare("SELECT texto_resultado FROM $tabla_textos_resultados_test 
                WHERE tipo_test_id=2 and subgrupo_test_id=$subgrupo" ) ); 
                echo '<p class="texto_result_test">'. $texto2. '</p><br><br>';
                //echo $wpdb->last_error;
            }
                
        }

?>
         </div>
        <div class="card-footer">
          <p class="card-text texto_encabezado_result_test"> <?php echo $texto_finalizacion_resultado_test1; ?></p>
        </div> 

    </div>
</div>



<?php

//-- RESULTADOS TEST 4  


//-- RESULTADOS TEST 5  

//-- RESULTADOS TEST 6  

//-- RESULTADOS TEST 7   


//-- RESULTADOS TEST 8





?>


