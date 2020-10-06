
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
$alumno_id = $_GET['alum']; 
//-- RESULTADOS TEST 1

$texto_encabezado_resultado_test1 = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_encabezado_resultado FROM $tabla_tipo_test WHERE id=1" ) ); 



$texto_finalizacion_resultado_test1= $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_finalizacion_resultado FROM $tabla_tipo_test WHERE id=1" ) );



$resultados_test1_may7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 1 and alumno_id=$alumno_id 
and total>=7 ORDER BY total DESC"); // primero busca todos los que dieron mayor que 7 e imprime todos los textos, en caso de que no haya ninguno

$resultados_test1_menor7= $wpdb->get_results("SELECT * FROM  $tabla_resultados_subgrupos_test WHERE tipo_test_id= 1 and alumno_id=$alumno_id 
and total <> 0 ORDER BY total DESC LIMIT 3"); // busca los tres mayores pero que ninguno sea 0
?>
<div class="container-fluid contenedor-informe">
  <div class="card">
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
                echo $wpdb->last_error;
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
//-- RESULTADOS TEST 2

//-- RESULTADOS TEST 3

//-- RESULTADOS TEST 4  


//-- RESULTADOS TEST 5  

//-- RESULTADOS TEST 6  

//-- RESULTADOS TEST 7   


//-- RESULTADOS TEST 8





?>


