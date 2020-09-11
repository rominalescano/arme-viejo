<?php
/**
 * Plugin Name:  KFP Aspirantes
 * Description:  Plugin para administrar test de coachig vocacional. Utiliza el shortcode [kfp_aspirante_form] para que el formulario aparezca en la página o el post que desees.
 * Version:      0.1.1
 * Author:       Romina Lescano
 * Author URI:   https://kungfupress.com/
 * PHP Version:  5.6
 *
 * @category Form
 * @package  KFP
 * @author   Juanan Ruiz <juananruizrivas@gmail.com>
 * @license  GPLv2 http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://kungfupress.com
 */

// Cuando el plugin se active se crea la tabla del mismo si no existe
register_activation_hook(__FILE__, 'Rml_alumnos_init');
register_activation_hook(__FILE__, 'Rml_tipo_test_init');
register_activation_hook(__FILE__, 'Rml_preguntas_test_init');
register_activation_hook(__FILE__, 'Rml_respuestas_test_init');
register_activation_hook(__FILE__, 'Rml_test_realizados_init');
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
        nombre varchar(40) NOT NULL,
        apellido varchar(40) NOT NULL,
        dni varchar(10) NOT NULL,
        correo varchar(100) NOT NULL,
        aceptacion smallint(4) NOT NULL,
        ip varchar(300),
        created_at datetime,
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
        ip varchar(300),
        created_at datetime,
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
        texto varchar(500) NOT NULL,
        tipo varchar(50),
        ip varchar(300),
        created_at datetime,
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
        alumno_id mediumint(9) NOT NULL,
        valor int (10) NOT NULL,
        ip varchar(300),
        created_at datetime,
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
        ip varchar(300),
        created_at datetime,
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

add_shortcode('kfp_aspirante_form', 'Kfp_Aspirante_form');

/**
 * Crea y procesa el formulario que rellenan los aspirantes
 *
 * @return string
 */
function Kfp_Aspirante_form()
{
    global $wpdb; // Este objeto global nos permite trabajar con la BD de WP
    // Si viene del formulario  grabamos en la base de datos

    if (!empty($_POST)
        && $_POST['nombre'] != ''
        && $_POST['apellido'] != ''
        && $_POST['dni'] != ''
        && is_email($_POST['correo'])
        && $_POST['aceptacion'] == '1'
        ) {

        $tabla_alumnos = $wpdb->prefix . 'alumnos';

        $nombre = sanitize_text_field($_POST['nombre']);
        $apellido = sanitize_text_field($_POST['apellido']);
        $dni = $_POST['dni'];
        $correo = $_POST['correo'];
        $aceptacion = (int) $_POST['aceptacion'];
        $ip = Kfp_Obtener_IP_usuario();
        $created_at = date('Y-m-d H:i:s');
        

        echo $ip;
        $exists = $wpdb->get_var( $wpdb->prepare(
          "SELECT COUNT(*) FROM $tabla_alumnos WHERE correo = %s", $_POST['correo']
        ) );
       
        if ( ! $exists ) {

            $wpdb->insert(
                $tabla_alumnos,
                array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'dni' => $dni,
                    'correo' => $correo,
                    'aceptacion' => $aceptacion,
                    'ip' => $ip,
                    'created_at' => $created_at,
                )
            );

            $tabla_respuestas_test = $wpdb->prefix . 'respuestas_test';
            $tabla_preguntas_test = $wpdb->prefix . 'preguntas_test';
            $preguntas_tipo_test = $wpdb->get_results("SELECT * FROM  $tabla_preguntas_test WHERE tipo_test_id=1");
            $alumno_id= $wpdb->get_var( $wpdb->prepare ("SELECT id FROM  $tabla_alumnos WHERE correo =  %s ", $_POST['correo'] ) );
            foreach ($preguntas_tipo_test as $test) {
                //echo ($wpdb->last_error);
                $id_pregunta= esc_textarea($test->id);
                $respuesta= $_POST[$id_pregunta];
                $wpdb->insert(
                $tabla_respuestas_test,
                array(
                    'pregunta_id' => $id_pregunta,
                    'alumno_id' => $alumno_id,  
                    'valor' => $respuesta,
                    'ip' => $ip,
                    'created_at' => $created_at,
                )
            );


            $tabla_test_realizado = $wpdb->prefix . 'test_realizados';
           // $tabla_preguntas_test = $wpdb->prefix . 'preguntas_test';
            $preguntas_tipo_test = $wpdb->get_results("SELECT * FROM  $tabla_preguntas_test WHERE tipo_test_id=1");
            $alumno_id= $wpdb->get_var( $wpdb->prepare ("SELECT id FROM  $tabla_alumnos WHERE correo =  %s ", $_POST['correo'] ) );
            foreach ($preguntas_tipo_test as $test) {
                //echo ($wpdb->last_error);
                $id_pregunta= esc_textarea($test->id);
                $respuesta= $_POST[$id_pregunta];
                $wpdb->insert(
                $tabla_respuestas_test,
                array(
                    'pregunta_id' => $id_pregunta,
                    'alumno_id' => $alumno_id,  
                    'valor' => $respuesta,
                    'ip' => $ip,
                    'created_at' => $created_at,
                )
            );


            }    

        echo "<p class='exito'><b>Tus datos han sido registrados</b>. Gracias
            por tu interés. En breve contactaré contigo.<p>";
        } else {
            echo "<p class='error'><b>El mail ya fue utilizado en un registro anterior</b><p>";
            
        }
    }
    // Carga esta hoja de estilo para poner más bonito el formulario
    wp_enqueue_style('css_aspirante', plugins_url('style.css', __FILE__));
    ob_start();
   

   
    ?>
        <form action="<?php get_the_permalink();?>" method="post" id="form_alumnos"
                class="cuestionario">
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
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni" required>
                </div>
                <div class="form-input">
                    <label for='correo'>Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" required>
                </div>

                <?php
                $tabla_tipo_test = $wpdb->prefix . 'preguntas_test';
                $tipo_test = $wpdb->get_results("SELECT * FROM  $tabla_tipo_test WHERE tipo_test_id=1");
                foreach ($tipo_test as $test) {
                $pregunta = esc_textarea($test->texto); 
                $id_pregunta= esc_textarea($test->id); ?>

                <div class="form-input">
                    <label for="<?php echo $id_pregunta;?> "> <?php echo $pregunta;?>  </label>
                    <input type="radio" name="<?php echo $id_pregunta;?>" value="1" required> 
                    Si
                    <br>
                    <input type="radio" name="<?php echo $id_pregunta;?>" value="0" required> 
                    No
                    <br>
                    
                </div>
                <?php }  ?>
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
    <?php

    return ob_get_clean();
}

add_action("admin_menu", "Kfp_Aspirante_menu");

/**
 * Agrega el menú del plugin al formulario de WordPress
 *
 * @return void
 */
function Kfp_Aspirante_menu()
{
    add_menu_page("Formulario Aspirantes", "Aspirantes", "manage_options",
        "kfp_aspirante_menu", "Kfp_Aspirante_admin", "dashicons-feedback", 75);
}

function Kfp_Aspirante_admin()
{
    global $wpdb;
    $tabla_alumnos = $wpdb->prefix . 'alumnos';
    $tabla_preguntas = $wpdb->prefix . 'preguntas';
    $tabla_respuestas = $wpdb->prefix . 'respuestas';
    $alumnos = $wpdb->get_results("SELECT * FROM $tabla_alumnos
    LEFT JOIN ");
    echo '<div class="wrap"><h1>Lista de aspirantes</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th width="30%">Nombre</th><th width="20%">Correo</th>';
    echo '<th>HTML</th><th>CSS</th><th>JS</th><th>PHP</th><th>WP</th><th>Total</th>';
    echo '</tr></thead>';
    echo '<tbody id="the-list">';
    foreach ($alumnos as $alumno) {
        $nombre = esc_textarea($alumno->nombre);
        $correo = esc_textarea($alumno->correo);
        $motivacion = esc_textarea($aspirante->motivacion);
        $nivel_html = (int) $aspirante->nivel_html;
        $nivel_css = (int) $aspirante->nivel_css;
        $nivel_js = (int) $aspirante->nivel_js;
        $nivel_php = (int) $aspirante->nivel_php;
        $nivel_wp = (int) $aspirante->nivel_wp;
        $total = $nivel_html + $nivel_css + $nivel_js + $nivel_php + $nivel_wp;
        echo "<tr><td><a href='#' title='$motivacion'>$nombre</a></td>";
        echo "<td>$correo</td><td>$nivel_html</td><td>$nivel_css</td>";
        echo "<td>$nivel_js</td><td>$nivel_php</td><td>$nivel_wp</td>";
        echo "<td>$total</td></tr>";
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
