
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--link rel="profile" href="http://gmpg.org/xfn/11"-->
	<?php wp_head(); ?>
</head>

<?php

$tabla_subgrupos_test= $wpdb->prefix ."subgrupos_test";
$texto = $wpdb->get_var( $wpdb->prepare(
    "SELECT texto_resultado FROM $tabla_subgrupos_test WHERE id=1" ) ); ?>


<div class="container h4"><?php echo $texto; ?> </div>
