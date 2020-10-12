<?php

global $wpdb;
$alumno_id = $_GET['alum']; 
$tabla_alumnos = $wpdb->prefix . 'alumnos';


$alumno= $wpdb->get_row( $wpdb->prepare ("SELECT * FROM  $tabla_alumnos WHERE id= $alumno_id"));
$nombre_alumno= $alumno->nombre;
$cadena_hash_bd=  $alumno->cadena_hash;
$correo= $alumno->correo;
$alumno_id= $alumno->id;

$link= "http://arme.local/test/?cadena=".$cadena_hash_bd;
// Varios destinatarios
$para  = " ' " . $correo ." ' " ; 

// título
$título = 'Link para realizar Tests Vocacionales';

// mensaje
$mensaje = "
<html>
<head>
  <title>Link para realizar Tests Vocacionales</title>
</head>
<body>
  <p>Ingresá a este mail para realizar los test que nos ayudarán a econtrar tu verdadera vocación.</p>
  <br>
  <p>Recordá que debes hacer los test en orden, desde el primero al último, y que podrás usar este link
  una única vez</p>
  <br>
  <br>
  <p>Link:". $link . "</p>
</body>
</html>
";

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'From: ArmeConsulting <romina.mariel.lescano@gmail.com>' . "\r\n";


// Enviarlo
mail($para, $título, $mensaje, $cabeceras); 

echo "<div class='container text-center mb-5 mt-5 exito'>
            <b class='h3'>¡Perfecto, mail enviado a  ". $correo ." </b>
            <br>  
            <br>
            </div>";


?>








