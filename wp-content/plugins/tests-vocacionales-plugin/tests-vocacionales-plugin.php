<?php
/**
 * Plugin Name:  Plugin de Tests Vocacionales
 * Description:  Plugin para administrar test de coachig vocacional. Utiliza el shortcode [rml_test_vocacionales] para que el formulario aparezca en la página o el post que desees.
 * Version:      0.1.1
 * Author:       Romina Lescano
 * PHP Version:  5.6
 *
 * @category Form
 * @package  KFP
 * @author   Romina Lescano <romina.mariel.lescano@gmail.com>
 * @license  GPLv2 http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Cuando el plugin se active se crea la tabla del mismo si no existe
register_activation_hook(__FILE__, 'Rml_alumnos_init');
register_activation_hook(__FILE__, 'Rml_tipo_test_init');
register_activation_hook(__FILE__, 'Rml_preguntas_test_init');
register_activation_hook(__FILE__, 'Rml_respuestas_test_init');
register_activation_hook(__FILE__, 'Rml_test_realizados_init');
register_activation_hook(__FILE__, 'Rml_subgrupos_test_init');
register_activation_hook(__FILE__, 'Rml_resultados_subgrupos_test_init');
register_activation_hook(__FILE__, 'Rml_textos_informe_subgrupos_test_init');


/**
 * Realiza las acciones necesarias para configurar el plugin cuando se activa
 *
 * @return void
 */
function Rml_alumnos_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_alumnos = $wpdb->prefix . 'alumnos';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_alumnos (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(100) NOT NULL,
        apellido varchar(100) NOT NULL,
        edad varchar(10) NOT NULL,
        dni varchar(10) NOT NULL,
        sexo varchar(10) NOT NULL,
        correo varchar(100) NOT NULL,
        escuela_procedencia varchar(100) NOT NULL,
        ciudad varchar(100) NOT NULL,
        provincia varchar(100) NOT NULL,
        pais varchar(100) NOT NULL,
        lugar_futuro_estudio varchar(10) NOT NULL,
        aceptacion smallint(4) NOT NULL,
        ip varchar(100),
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}

function Rml_tipo_test_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_tipo_test = $wpdb->prefix . 'tipo_test';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_tipo_test (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(40) NOT NULL,
        numero_test varchar(40) NOT NULL,
        texto_indicaciones text,
        tipo_preguntas varchar(40) NOT NULL,
        descripcion_tipo_preguntas varchar(250),
        texto_encabezado_resultado text,
        texto_finalizacion_resultado text,
        ip varchar(100),
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
  
}

function Rml_subgrupos_test_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_subgrupos_test = $wpdb->prefix . 'subgrupos_test';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_subgrupos_test (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        tipo_test_id mediumint(9) NOT NULL,
        subgrupo_test_id mediumint(9) NOT NULL,
        nombre varchar(500) NOT NULL,
        ip varchar(100),
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}


function Rml_preguntas_test_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_preguntas_test = $wpdb->prefix . 'preguntas_test';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_preguntas_test (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        tipo_test_id mediumint(9) NOT NULL,
        subgrupo_test_id mediumint(9) NOT NULL,
        numero_pregunta varchar(50),
        texto text NOT NULL,
        tipo varchar(50),
        ip varchar(100),
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}

function Rml_respuestas_test_init()
{

    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_respuestas_test = $wpdb->prefix . 'respuestas_test';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_respuestas_test (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        pregunta_id mediumint(9) NOT NULL,
        subgrupo_test_id mediumint(9) NOT NULL,
        tipo_test_id mediumint(9) NOT NULL,
        alumno_id mediumint(9) NOT NULL,
        valor int (10) NOT NULL,
        ip varchar(100),
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}

function Rml_test_realizados_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_test_realizados = $wpdb->prefix . 'test_realizados';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_test_realizados (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        alumno_id mediumint(9) NOT NULL,
        tipo_test_id mediumint(9),
        valor int (10) NOT NULL,
        ip varchar(100),
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}


function Rml_resultados_subgrupos_test_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_resultados_subgrupos_test = $wpdb->prefix . 'resultados_subgrupos_test';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_resultados_subgrupos_test (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        alumno_id mediumint(9) NOT NULL,
        tipo_test_id mediumint(9) NOT NULL,
        subgrupo_test_id mediumint(9) NOT NULL,  
        total int (10) NOT NULL,
        created_at datetime,
        estado smallint(4) NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}


function Rml_textos_informe_subgrupos_test_init()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Crea la tabla si no existe
    $tabla_textos_informe_subgrupos_test = $wpdb->prefix . 'textos_informe_subgrupos_test';
    $charset_collate = $wpdb->get_charset_collate();
    $query = "CREATE TABLE IF NOT EXISTS $tabla_textos_informe_subgrupos_test (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        tipo_test_id mediumint(9) NOT NULL,
        subgrupo_test_id mediumint(9) NOT NULL, 
        nombre_subgrupo varchar(500), 
        subgrupo_combinado mediumint(9), 
        nombre_subgrupo_combinado varchar(100),
        texto_resultado text NOT NULL,
        UNIQUE (id)
        ) $charset_collate;";
    // La función dbDelta que nos permite crear tablas de manera segura se
    // define en el fichero upgrade.php que se incluye a continuación
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}
// El formulario puede insertarse en cualquier sitio con este shortcode
// El código de la función que carga el shortcode hace una doble función:
// 1-Graba los datos en la tabla si ha habido un envío desde el formulario
// 2-Muestra el formulario

add_shortcode('rml_inscripcion_test_vocacionales' , 'Rml_inscripcion_test_vocacionales_form');


/**
 * Crea y procesa el formulario que rellenan los aspirantes
 *
 * @return string
 */
function Rml_inscripcion_test_vocacionales_form()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Si viene del formulario  grabamos en la base de datos
    $var_style_display_none='';
   

    if (!empty($_POST)
        && $_POST['nombre'] != ''
        && $_POST['apellido'] != ''
        && $_POST['edad'] != ''
        && $_POST['dni'] != ''
        && $_POST['sexo'] != ''
        && $_POST['correo'] != ''
        && $_POST['escuela_procedencia'] != ''
        && $_POST['ciudad'] != ''
        && $_POST['provincia'] != ''
        && $_POST['pais'] != ''
        && $_POST['lugar_futuro_estudio'] != ''
        && $_POST['aceptacion'] == '1'
        ) {
    
        $tabla_alumnos = $wpdb->prefix . 'alumnos';

        $nombre = sanitize_text_field($_POST['nombre']);
        $apellido = sanitize_text_field($_POST['apellido']);
        $edad= $_POST['edad'];
        $dni = $_POST['dni'];
        $sexo= $_POST['sexo'];
        $correo = $_POST['correo'];
        $escuela_procedencia= $_POST['escuela_procedencia'];
        $ciudad=  $_POST['ciudad'];
        $provincia=  $_POST['provincia'];
        $pais=  $_POST['pais'];
        $lugar_futuro_estudio= $_POST['lugar_futuro_estudio'];
        $aceptacion = (int) $_POST['aceptacion'];
        $ip = Kfp_Obtener_IP_usuario();
        $created_at = date('Y-m-d H:i:s');
        $estado= 1;
 
        $exists = $wpdb->get_var( $wpdb->prepare(
          "SELECT COUNT(*) FROM $tabla_alumnos WHERE correo = %s", $_POST['correo']
        ) );
        //echo $wpdb->last_error;
        if ( ! $exists ) {
            $wpdb->insert(
                $tabla_alumnos,
                array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'edad' => $edad,
                    'dni' => $dni,
                    'sexo' => $sexo,
                    'correo' => $correo,
                    'escuela_procedencia' => $escuela_procedencia,
                    'ciudad' => $ciudad,
                    'provincia' => $provincia,
                    'pais' => $pais,
                    'lugar_futuro_estudio' => $lugar_futuro_estudio,
                    'aceptacion' => $aceptacion,
                    'ip' => $ip,
                    'created_at' => $created_at,
                    'estado' => $estado,
                )
                
            );
        
        $var_style_display_none='display:none;';
        echo "<div class='container text-center mb-5 mt-5'>
            <b class='h3'>¡Perfecto ". $nombre ."! ya estás registrado, ahora manos a la obra</b>
            <br>  
            <b class='h3'>Ingresa al siguiente botón para hacer los distintos Test</b>
            <br>
            <a class='btn btn-info btn-lg'  href='/page/test' style='margin-top: 40px;'> Hagamos los test aquí</a>
            </div>";
         // Guardo variables de sesion
        $_SESSION['logged_in_user_id'] = session_id();
        $_SESSION['logged_in_user_name'] = $nombre;
        $_SESSION['logged_in_user_mail'] = $correo;
        //sesion
        //echo 'Id Logueado:  '. $_SESSION['logged_in_user_id'];
        //echo 'User Name:  '. $_SESSION['logged_in_user_name'];
        //echo 'User Mail:  '. $_SESSION['logged_in_user_mail'];


        } else {

            echo "<p class='error'><b>El mail ya fue utilizado en un registro anterior</b><p>";
            
        }
    }
    // Carga esta hoja de estilo para poner más bonito el formulario
    wp_enqueue_style('css_aspirante', plugins_url('style.css', __FILE__));
    ob_start();
   

   
    ?> 
    <div class="container-cuestionario">
        <form action="<?php get_the_permalink();?>" method="post" id="form_alumnos"
                class="cuestionario" style='<?php echo $var_style_display_none; ?>'>
                <?php wp_nonce_field('graba_alumnos', 'alumnos_nonce');?>
                <div class="form-input">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div class="form-input">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" required>
                </div>
                <div class="form-input">
                    <label for="edad">Edad</label>
                    <input type="text" name="edad" id="edad" required>
                </div>
                <div class="form-input">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni" required>
                </div>
                <label for="sexo"> SEXO </label>
                                <input class= "radio_sexo" type="radio" name="sexo" value="1" required> 
                                Femenino
                                <br>
                                <input class= "radio_sexo" type="radio" name="sexo" value="2" required> 
                                Masculino
                                <br>
                                <input class= "radio_sexo" type="radio" name="sexo" value="3" required> 
                                Otro
                                <br>
                                <div class="form-input">
                <label for="correo">Mail</label>
                    <input type="text" name="correo" id="correo" required>
                </div>
                <div class="form-input">
                    <label for='escuela_procedencia'>¿En que escuela estudiaste tu secundario?</label>
                    <input type="text" name="escuela_procedencia" id="escuela_procedencia" required>
                </div>
                <div class="form-input">
                    <label for="ciudad">¿De qué ciudad eres?</label>
                    <input type="text" name="ciudad" id="ciudad" required>
                </div>
                <div class="form-input">
                    <label for="provincia">¿De qué Provincia eres?</label>
                    <input type="text" name="provincia" id="provincia" required>
                </div>
                <div class="form-input">
                    <label for="pais">¿De qué País eres?</label>
                    <input type="text" name="pais" id="pais" required>
                </div>
                <label for="lugar_futuro_estudio"> ¿Solo buscas carreras en tu ciudad actual? o podrías trasladarte a otra ciudad para estudiar </label>
                                <input class= "radio_sexo" type="radio" name="lugar_futuro_estudio" value="1" required> 
                                Solo en mi ciudad
                                <br>
                                <input class= "radio_sexo" type="radio" name="lugar_futuro_estudio" value="2" required> 
                                Puedo ir a estudiar a otra ciudad
                                <br>
                                <input class= "radio_sexo" type="radio" name="lugar_futuro_estudio" value="3" required> 
                                No lo sé
                                <br>

                <div class="form-input">
                    <label for="aceptacion"> Arme Consultora se 
                        compromete a custodiar de manera responsable los datos que vas
                        a enviar. Su única finalidad es la de colaborar en tu proceso
                        de crecimiento personal.
                        En cualquier momento puedes solicitar el acceso, la rectificación
                        o la eliminación de tus datos desde esta página web.</label>
                    <input type="checkbox" id="aceptacion" name="aceptacion" value="1"
                    required> Entiendo y acepto las condiciones
                </div>
                <div class="form-input">
                    <input type="submit" value="Enviar">
                </div>
            </form>
       </div>
    <?php

    return ob_get_clean();
}


// El formulario puede insertarse en cualquier sitio con este shortcode
// El código de la función que carga el shortcode hace una doble función:
// 1-Graba los datos en la tabla si ha habido un envío desde el formulario
// 2-Muestra el formulario

add_shortcode('rml_test_vocacionales' , 'Rml_test_vocacionales_form');


/**
 * Crea y procesa el formulario que rellenan los aspirantes
 *
 * @return string
 */
function Rml_test_vocacionales_form()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Si viene del formulario  grabamos en la base de datos
    $var_style_display_none='';

     // Leo Campos ACF 
     $tipo_test_id  = get_field( 'tipo_test' );

     $tabla_respuestas_test = $wpdb->prefix . 'respuestas_test';
     $tabla_preguntas_test = $wpdb->prefix . 'preguntas_test';
     $tabla_alumnos = $wpdb->prefix . 'alumnos';
     $ip = Kfp_Obtener_IP_usuario();
     $created_at = date('Y-m-d H:i:s');
     $estado= 1;

    if (!empty($_POST)) {

        
        $error_ckeck=0;
        $preguntas_tipo_test = $wpdb->get_results("SELECT * FROM  $tabla_preguntas_test WHERE tipo_test_id= $tipo_test_id");
        
        foreach ($preguntas_tipo_test as $pregunta) {
            $id_pregunta= esc_textarea($pregunta->id);
            if ($_POST[ $id_pregunta]==null) {
                $error_ckeck=1;
            }
        }

        //echo 'error_ckeck';
        //echo $error_ckeck;

       
        if ($error_ckeck==0) {
            $user_mail= $_SESSION['logged_in_user_mail'];
            $alumno_id= $wpdb->get_var( $wpdb->prepare ("SELECT id FROM  $tabla_alumnos WHERE correo =  %s ", $user_mail ) );
            
            foreach ($preguntas_tipo_test as $pregunta) {
                //echo ($wpdb->last_error);
                // echo 'escuela';
                $id_pregunta= esc_textarea($pregunta->id);
                $subgrupo_test_id=esc_textarea($pregunta->subgrupo_test_id);
                $respuesta= $_POST[$id_pregunta];
                //echo 'id_pregunta:'.$id_pregunta;
                //echo 'respuesta:'. $respuesta;
                //echo $tabla_respuestas_test;
                //echo $alumno_id;

                $wpdb->insert(
                $tabla_respuestas_test,
                array(
                    'pregunta_id' => $id_pregunta,
                    'subgrupo_test_id'=>$subgrupo_test_id,
                    'tipo_test_id'=>$tipo_test_id,
                    'alumno_id' => $alumno_id,  
                    'valor' => $respuesta,
                    'ip' => $ip,
                    'created_at' => $created_at,
                    'estado' => $estado,
                        )
                );
            } 

            $tabla_test_realizado = $wpdb->prefix . 'test_realizados';
            $valor= 1;
            //$alumno_id= $wpdb->get_var( $wpdb->prepare ("SELECT id FROM  $tabla_alumnos WHERE correo =  %s ", $user_mail ) );
            
            $wpdb->insert(
            $tabla_test_realizado,
            array(
                'alumno_id' => $alumno_id,
                'tipo_test_id' => $tipo_test_id,
                'valor' => $valor,
                'ip' => $ip,
                'created_at' => $created_at,
                'estado' => $estado,
                )
                );
          
            
            $tabla_subgrupos_test = $wpdb->prefix . 'subgrupos_test';
            $subgrupos_test = $wpdb->get_results("SELECT * FROM  $tabla_subgrupos_test WHERE tipo_test_id=$tipo_test_id");
           
            foreach ($subgrupos_test as $subgrupos) { 
                $subgrupo_id= esc_textarea($subgrupos->subgrupo_test_id);
                $resultados_test = $wpdb->get_results("SELECT * FROM  $tabla_respuestas_test WHERE alumno_id = $alumno_id and tipo_test_id = $tipo_test_id and subgrupo_test_id= $subgrupo_id");
                $total=0;
                foreach ($resultados_test as $resultado) {
                    $valor= esc_textarea($resultado->valor);                   
                    $total= $total + $valor;
                    
                }
                //echo $total;
               
                $tabla_resultados_subgrupos_test = $wpdb->prefix . 'resultados_subgrupos_test';
                $wpdb->insert(
                    $tabla_resultados_subgrupos_test,
                    array(                        
                        'alumno_id' => $alumno_id,
                        'tipo_test_id' => $tipo_test_id,
                        'subgrupo_test_id'=>$subgrupo_id,
                        'total' => $total,
                        'created_at' => $created_at,
                        'estado' => $estado,
                        )
                        );
                       // echo ($wpdb->last_error);
            }

            $var_style_display_none='display:none;';
            //style='margin-top: 150px!important;'
            echo "<div class='container exito text-center mb-5' >
            <b>Has completado el Test N° ". $tipo_test_id ."!</b>. Buen trabajo!<p>
            <br>  
            <a class='btn btn-info btn-lg'  href='/page/test' style='margin-top: 40px;'> Volver </a>
            </div>";
            //muestro sesion
           
           // echo 'Id Logueado:  '. $_SESSION['logged_in_user_id'];
           // echo 'User Name:  '. $_SESSION['logged_in_user_name'];
           // echo 'User Mail:  '. $_SESSION['logged_in_user_mail'];

            } else {
            echo "<p class='error'><b> Te faltó completar alguna respuesta</b><p>";
            

            }

        }

    // Carga esta hoja de estilo para poner más bonito el formulario
    wp_enqueue_style('css_aspirante', plugins_url('style.css', __FILE__));
    ob_start();
   

   
    ?>
        <form action="<?php get_the_permalink();?>" method="post" id="form_test"
                class="cuestionario" style='<?php echo $var_style_display_none; ?>'>
                <h4>Muy bien, <?php  echo $_SESSION['logged_in_user_name']; ?> </h4>
                 
                
                    <?php wp_nonce_field('graba_alumnos', 'alumnos_nonce');
                   
                    $tabla_tipo_test = $wpdb->prefix . 'tipo_test';
                    $tipo_pregunta_id= $wpdb->get_var( $wpdb->prepare ("SELECT tipo_preguntas FROM   $tabla_tipo_test WHERE  id= %d ", $tipo_test_id ) );
                    $texto_test= $wpdb->get_var( $wpdb->prepare ("SELECT texto_indicaciones FROM   $tabla_tipo_test WHERE  id= %d ", $tipo_test_id ) );?>
                    <h4><?php echo $texto_test; ?></h4> 
             <?php  $tabla_subgrupos_test = $wpdb->prefix . 'subgrupos_test';
                    $subgrupos_test = $wpdb->get_results("SELECT * FROM  $tabla_subgrupos_test WHERE tipo_test_id=$tipo_test_id");
                    foreach ($subgrupos_test as $subgrupos) {
                        $subgrupo_id= esc_textarea($subgrupos->subgrupo_test_id);
                        $subgrupo_title= esc_textarea($subgrupos->nombre);
                        ?>         
                        <div class="card card-cuestionario"> 
                        <div class="h3 text-center mt-3 mb-3"><?php echo $subgrupo_title;  ?> </div>    
                        <?php   
                        $tabla_preguntas_test = $wpdb->prefix . 'preguntas_test';
                        $preguntas_test = $wpdb->get_results("SELECT * FROM  $tabla_preguntas_test WHERE tipo_test_id=$tipo_test_id and subgrupo_test_id=$subgrupo_id");
                        if ($tipo_pregunta_id == 3) {?>  
                        <div class="row">
                                
                        <?php }
                        
                            foreach ($preguntas_test as $pregunta) {  
                            $texto_pregunta = esc_textarea($pregunta->texto);
                            $subgrupo_pregunta=  esc_textarea($pregunta->subgrupo_test_id);
                            $id_pregunta= esc_textarea($pregunta->id); 
                            $num_pregunta= esc_textarea($pregunta->numero_pregunta); 

                            if ($tipo_pregunta_id == 1) {  ?>

                                <div class="form-input ml-3">
                                    <label for="<?php echo $id_pregunta;?> "> <?php echo $num_pregunta. " - " . $texto_pregunta;?>  </label>
                                    <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="1" required> 
                                    Si
                                    <br>
                                    <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="0" required> 
                                    No
                                    <br>
                                </div>
                        <?php } elseif ($tipo_pregunta_id == 2) {  ?>
                                  
                                 <div class="form-input ml-3">
                                 <label for="<?php echo $id_pregunta;?> "> <?php echo $num_pregunta. " - " . $texto_pregunta;?>  </label>
                                 <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="2" required> 
                                 Considero ser muy competente
                                 <br>
                                 <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="1" required> 
                                 Considero ser competente
                                 <br>
                                 <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="0" required> 
                                 Considero ser medianamente competente
                                 <br>
                                 <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="0" required> 
                                 Considero ser muy poco competente
                                 <br>
                                 <input class= "radio_cuestionario" type="radio" name="<?php echo $id_pregunta;?>" value="0" required> 
                                 Considero ser incompetente
                                 <br>
                             </div>  
                        <?php } elseif ($tipo_pregunta_id == 4 ) { 
                         

                            if ( $subgrupo_id==1 ) {
                               
                                ?>
                                <div class="form-input ml-3">
                                 <label for="555"> </label>
                                 <input class= "radio_cuestionario" type="radio" name="555" value="1" required> 
                                 Tiendo a ser bastante independiente y confiado: pienso que la vida va mejor cuando la esperas de frente. Me fijo objetivos, me comprometo y deseo que ocurran las cosas. No me gusta quedarme sentado, prefiero realizar algo grande y dejar mi huella. No busco necesariamente confrontaciones, pero no me dejo llevar ni empujar tampoco. La mayor parte del tiempo sé lo que quiero y voy a por ello. Tiendo a trabajar mucho y a disfrutar mucho. 
                                 <br>
                                 <label for="555"></label>
                                 <input class= "radio_cuestionario" type="radio" name="555" value="2" required> 
                                 Tiendo a estar callado, y estoy acostumbrado a estar solo. Normalmente no atraigo mucho la atención en el aspecto social, y por lo general procuro no imponerme por la fuerza. No me siento cómodo destacando sobre los demás ni siendo competitivo. Probablemente muchos dirán que tengo algo de soñador, pues disfruto con mi imaginación. Puedo estar bastante a gusto sin pensar que tengo que ser activo todo el tiempo. 
                                 <br>
                                 <label for="555"></label>
                                 <input class= "radio_cuestionario" type="radio" name="555" value="3" required> 
                                 Tiendo a ser muy responsable y entregado. Me siento fatal si no cumplo mis compromisos o no hago lo que se espera de mí. Deseo que los demás sepan que estoy por ellos y que haré todo lo que crea que es mejor por ellos. Con frecuencia hago grandes sacrificios personales por el bien de otros, lo sepan o no lo sepan. No suelo cuidar bien de mí mismo; hago el trabajo que hay que hacer y me relajo (y hago lo que realmente deseo) si me queda tiempo. 
                                 <br>  
                                 </div> 
                     <?php         } elseif ( $subgrupo_id==2 ) {
                        
                                ?>
                                <div class="form-input ml-3">
                                 <label for="556"></label>
                                 <input class= "radio_cuestionario" type="radio" name="556" value="1" required> 
                                 Soy una persona que normalmente mantiene una actitud positiva y piensa que las cosas se van a resolver para mejor. Suelo entusiasmarme por las cosas y no me cuesta encontrar en qué ocuparme. Me gusta estar con gente y ayudar a otros a ser felices; me agrada compartir con ellos mi bienestar. (No siempre me siento fabulosamente bien, pero trato de que nadie se dé cuenta.) Sin embargo, mantener esta actitud positiva ha significado a veces dejar pasar demasiado tiempo sin ocuparme de mis problemas. 
                                 <br>
                                 <label for="556"></label>
                                 <input class= "radio_cuestionario" type="radio" name="556" value="2" required> 
                                 Soy una persona que tiene fuertes sentimientos respecto a las cosas, la mayoría de la gente lo nota cuando me siento desgraciado por algo. Suelo ser reservado con los demás, pero soy más sensible de lo que dejo ver. Deseo saber a qué atenerme con los demás y con quiénes y con qué puedo contar; la mayoría de las personas tienen muy claro a qué atenerse conmigo. Cuando estoy alterado por algo deseo que los demás reaccionen y se emocionen tamo como yo. Conozco las reglas, pero no quiero que me digan lo que he de hacer. Quiero decidir por mí mismo.
                                 <br>
                                 <label for="556"></label>
                                 <input class= "radio_cuestionario" type="radio" name="556" value="3" required> 
                                 Tiendo a controlarme y a ser lógico, me desagrada hacer frente a los sentimientos. Soy eficiente, incluso perfeccionista, y prefiero trabajar solo. Cuando hay problemas o conflictos personales trato de no meter mis sentimientos por medio. Algunos dicen que soy demasiado frío y objetivo, pero no quiero que mis reacciones emocionales me distraigan de lo que realmente me importa. Por lo general, no muestro mis emociones cuando otras personas "me fastidian". 
                                 <br>  
                                 </div> 
                     <?php     } 

                         } elseif ($tipo_pregunta_id == 3) { 
                                 ?>
                                <div class="col-12 col-md-3"> 
                                    <div class="form-input ml-3">
                                            <label for="<?php echo $id_pregunta;?> "> <?php echo $num_pregunta. " - " . $texto_pregunta;?>  </label>
                                            <input class= "radio_cuestionario" type="hidden" name="<?php echo $id_pregunta;?>" value="0"> 
                                            <input class= "radio_cuestionario" type="checkbox" name="<?php echo $id_pregunta;?>" value="1"> 
                                    </div>   
                                </div>                                  
                        <?php    } ?>
                        <?php  } //cierra el foreach  
                        if ($tipo_pregunta_id == 3) {?>  
                            </div>
                            
                        <?php }  ?>
                        </div> 
                   <?php }  ?>
                <div class="form-input">
                    <input type="submit" value="Enviar">
                </div>   
            </form>
    
    
    <?php

    return ob_get_clean();
}




add_action("admin_menu", "rml_test_vocacionales_menu");

/**
 * Agrega el menú del plugin al formulario de WordPress
 *
 * @return void
 */
function rml_test_vocacionales_menu()
{
    add_menu_page("Formulario de Test", "Tests", "manage_options",
        "rml_test_vocacionales_menu", "rml_test_vocacionales_admin", "dashicons-feedback", 75);
}

function rml_test_vocacionales_admin()
{
    global $wpdb;
    echo '<div class="wrap"><h1>Alumnos - Test Realizados</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Correo</th>
    <th>Edad</th>
    <th>DNI</th>
    <th>Sexo</th>
    <th>Escuela Procedencia</th>
    <th>Ciudad</th>
    <th>Provincia</th>
    <th>País</th>
    <th>Lugar Estudio Futuro</th>
    <th>Acptó Terminos</th>
    <th>Informe</th>';

    echo '</tr></thead>';
    echo '<tbody id="the-list">';
    $tabla_alumnos = $wpdb->prefix . 'alumnos';
    $alumnos = $wpdb->get_results("SELECT * FROM  $tabla_alumnos");
    
    foreach ($alumnos as $alumno) {

        $nombre = esc_textarea($alumno->nombre);
        $apellido= esc_textarea($alumno->apellido);
        $edad= esc_textarea($alumno->edad);
        $dni= esc_textarea($alumno->dni);
        $sexo= esc_textarea($alumno->sexo);
        $correo = esc_textarea($alumno->correo);
        $escuela = esc_textarea($alumno->escuela_procedencia);
        $ciudad = esc_textarea($alumno->ciudad);
        $provincia = esc_textarea($alumno->provincia);
        $pais = esc_textarea($alumno->pais);
        $lugar_futuro_estudio = esc_textarea($alumno->lugar_futuro_estudio);
        $acepto_terminos= esc_textarea($alumno->aceptacion);
        $alumnos_id= esc_textarea($alumno->id);

        if ($lugar_futuro_estudio==1) {$lugar_futuro_estudio="Solo en mi ciudad";}        
        if ($lugar_futuro_estudio==2) {$lugar_futuro_estudio="Puedo ir a estudiar a otra ciudad";}   
        if ($lugar_futuro_estudio==3) {$lugar_futuro_estudio="No lo sé";}  
        if ($acepto_terminos==1) {$acepto_terminos="Si aceptó";}                      
                               
        echo "<tr><td><a href='/page/resultados/?alum=$alumnos_id'>$nombre</a></td><td>$apellido</td>";
        echo "<td>$correo</td><td>$edad</td><td>$dni</td><td>$sexo</td>";
        echo "<td>$escuela</td><td>$ciudad</td><td>$provincia</td><td>$pais</td><td>$lugar_futuro_estudio</td>
        <td>$acepto_terminos</td><td><a href='/page/informe/?alum=$alumnos_id'>Informe</a></td></tr>"; 
            
    }
       
      
    
    echo '</tbody></table></div>';
}

/**
 * Devuelve la IP del usuario que está visitando la página
 * Código fuente: https://stackoverflow.com/questions/6717926/function-to-get-user-ip-address
 *
 * @return string
 */
function Kfp_Obtener_IP_usuario()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED',
        'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }
}
