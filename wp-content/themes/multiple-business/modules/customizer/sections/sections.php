<?php
/**
* Sets sections for Multiplebusiness_Customizer
*
* @since  Multiple Business 1.0.0
* @param  array $sections
* @return array Merged array
*/
function Multiplebusiness_Customizer_sections( $sections ){

	$multiple_business_sections = array(
		
		# Section for Fronpage panel
		'home_slider' => array(
			'title' => esc_html__( 'Slider', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_service' => array(
			'title' => esc_html__( 'Service', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_about' => array(
			'title' => esc_html__( 'About', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_portfolio' => array(
			'title' => esc_html__( 'Portfolio', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_testimonial' => array(
			'title' => esc_html__( 'Testimonial', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_team' => array(
			'title' => esc_html__( 'Team', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_callback' => array(
			'title' => esc_html__( 'Callback', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_highlight' => array(
			'title' => esc_html__( 'Highlight Posts', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),
		'home_contact' => array(
			'title' => esc_html__( 'Contact', 'multiple-business' ),
			'panel' => 'frontpage_options'
		),

		# Section for Theme Options panel
		'header_options' => array(
			'title' => esc_html__( 'Header Options', 'multiple-business' ),
			'panel' => 'theme_options'
		),
		'layout_options' => array(
			'title' => esc_html__( 'Layout Options', 'multiple-business' ),
			'panel' => 'theme_options'
		),
		'blog_options' => array(
			'title' => esc_html__( 'Blog Options', 'multiple-business' ),
			'panel' => 'theme_options'
		),
		'footer_options' => array(
			'title' => esc_html__( 'Footer Options', 'multiple-business' ),
			'panel' => 'theme_options'
		)
	);

	return array_merge( $multiple_business_sections, $sections );
}
add_filter( 'Multiplebusiness_Customizer_sections', 'Multiplebusiness_Customizer_sections' );