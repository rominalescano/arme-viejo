

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--link rel="profile" href="http://gmpg.org/xfn/11"-->
	<?php wp_head(); ?>
</head>

<?php
//echo $wpdb->last_error;
$alumno_id = $_GET['alum']; 
$tabla_alumnos = $wpdb->prefix . 'alumnos';
$alumno= $wpdb->get_row( $wpdb->prepare ("SELECT * FROM  $tabla_alumnos WHERE id= $alumno_id")); ?>


<div class="container resultados-test">
    <div class="h3 titulo-resultados-test" >Hola <?php echo $alumno->nombre.' '.$alumno->apellido ?> felicidades! Hemos llegado al final del recorrido
    <br>ahora veamos los resultados para saber que opciones son las más afines a vos.</div>


    <?php
// 
//$tipo_test_id= 6;
$tabla_tipo_test= $wpdb->prefix .'tipo_test';
$tipos_test = $wpdb->get_results($wpdb->prepare("SELECT * FROM  $tabla_tipo_test"));
foreach ($tipos_test as $tipo_test) {
    $tipo_test_id= esc_textarea($tipo_test->id);
    $nombre_test= esc_textarea($tipo_test->nombre); ?>
    <div class="div ml-4 h5"> <?php  echo "Test Número: ".  $tipo_test_id . " - " . $nombre_test . "<br><br> "; ?></div>

    <?php
   // echo $wpdb->last_error;
         
    //$tabla_subgrupos_test = $wpdb->prefix . 'subgrupos_test';
    $tabla_resultados_subgrupos_test= $wpdb->prefix ."resultados_subgrupos_test";
    $tabla_subgrupos_test= $wpdb->prefix ."subgrupos_test";
    $resultados_test_uno = $wpdb->get_results(
    "SELECT * FROM  $tabla_resultados_subgrupos_test as r 
    LEFT JOIN $tabla_subgrupos_test as s on s.subgrupo_test_id= r.subgrupo_test_id and s.tipo_test_id=r.tipo_test_id
    WHERE r.tipo_test_id=$tipo_test_id and r.alumno_id=$alumno_id"); 
    //var_dump($resultados_test_uno);?>
   <ul class="list-group mb-4">
   
    <?php   foreach ($resultados_test_uno as $resultado) {
                        $subgrupo= esc_textarea($resultado->subgrupo_test_id);       
                        $nombre_subgrupo= esc_textarea($resultado->nombre);         
                        $total= esc_textarea($resultado->total);      ?>

                       
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                        <?php echo  $nombre_subgrupo ?>
                          <span class="badge badge-primary badge-pill"><?php echo  $total   ?>  </span>
                        </li>
                        
                                             
           <?php  }  ?>
    </ul>
    

 <?php } ?>


</div>



