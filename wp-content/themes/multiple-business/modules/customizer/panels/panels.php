<?php
/**
* Sets the panels and returns to Multiplebusiness_Customizer
*
* @since  Multiple Business 1.0.0
* @param  array An array of the panels
* @return array
*/
function Multiplebusiness_Customizer_panels( $panels ){

	$panels = array(
		'frontpage_options' => array(
			'title' => esc_html__( 'Front Page Options', 'multiple-business' )
		),
		'theme_options' => array(
			'title' => esc_html__( 'Theme Options', 'multiple-business' )
		)
	);

	return $panels;	
}
add_filter( 'Multiplebusiness_Customizer_panels', 'Multiplebusiness_Customizer_panels' );