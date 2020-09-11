<?php
/**
* Generates default options for customizer.
*
* @since  Multiple Business 1.0.0
* @access public
* @param  array $options 
* @return array
*/
	
function multiple_business_default_options( $options ){

	$defaults = array(
		# Site identity
		'site_title'         	         => esc_html__( 'Multiple Business', 'multiple-business' ),
		'disable_footer_site_identity'   => false,

		# Color
		'site_title_color'   	         => '#10242b',
		'site_tagline'       	         => esc_html__( 'Business WP Theme', 'multiple-business' ),
		'site_tagline_color' 	         => '#4d4d4d',

		# Primary color
		'site_primary_color' 	         => '#00b294',
		'site_alternative_color' 	     => '#D2B48C',
		'site_hover_color' 	             => '#4E97D8',

		# Slider
		'slider_timeout'     	         => 5,
		'slider_autoplay'    	         => true,
		'slider_button_text'             => esc_html__( 'Contact', 'multiple-business' ),
		'slider_button_url'              => esc_html__( '#', 'multiple-business' ),
		'disable_slider_button'          => false,
		'disable_slider'    	         => false,

		# Service
		'service_section_title'          => esc_html__( 'Our Services', 'multiple-business' ),
		'disable_service'                => false,

		# Callback
		'callback_add_button_text'       => esc_html__( 'Contact', 'multiple-business' ),
		'callback_add_button_url'        => esc_html__( '#', 'multiple-business' ),
		'disable_add_callback'           => false,
		'disable_callback'               => false,

		# About
		'about_section_title'            => esc_html__( 'About Us', 'multiple-business' ),
		'disable_about'                  => false,
		
		# Portfolio
		'portfolio_section_title'        => esc_html__( 'Some Works', 'multiple-business' ),
		'disable_portfolio'              => false,

		# Testimonial
		'testimonial_section_title'      => esc_html__( 'Client Testimonials', 'multiple-business' ),
		'disable_testimonial'            => false,

		# Team
		'team_section_title'             => esc_html__( 'Meet Our Team', 'multiple-business' ),
		'disable_team'                   => false,

		# Highlight
		'highlight_section_title'        => esc_html__( 'Highlighted Posts', 'multiple-business' ),
		'highlight_autoplay'    	     => true,
		'disable_highlight'    	         => false,

		# Contact
		'contact_section_title'          => esc_html__( 'Contact us', 'multiple-business' ),
		'disable_contact'          		 => false,

		# Theme options
		# Header
		'header_layout'                  => 'header_one',
		'disable_top_header'             => false,
		'header_button_text'             => esc_html__( 'Get a Quote', 'multiple-business' ),
		'header_button_url'              => esc_html__( '#', 'multiple-business' ),
		'disable_header_button'          => false,
		'disable_fixed_header'           => false,
		'top_header_address'             => esc_html__( 'Rock Street, San Francisco', 'multiple-business' ),
		'top_header_email'               => esc_html__( 'company@mail.com', 'multiple-business' ),
		'top_header_phone'               => esc_html__( '1 (234) 567-891', 'multiple-business' ),

		# Layout
		'archive_layout'			     => 'right',
		'archive_post_layout'            => 'grid',
		'archive_post_image'             => 'default',
		'archive_post_image_alignment'   => 'center',
		'single_layout'			         => 'compact',

		# Blog
		'archive_page_title'			 => esc_html__( 'Welcome to Multiple Business', 'multiple-business' ),

		# Footer
		'footer_layout'                  => 'footer_one',
		'enable_scroll_top_in_mobile'    => false,
		'disable_footer_widget'          => false,
		'footer_text'                    => multiple_business_get_footer_text(),
	);

	return array_merge( $options, $defaults );
}
add_filter( 'Multiplebusiness_Customizer_defaults', 'multiple_business_default_options' );

if( !function_exists( 'multiple_business_get_footer_text' ) ):
/**
* Generate Default footer text
*
* @return string
* @since Multiple Business 1.0.0
*/

function multiple_business_get_footer_text(){
	$text = esc_html__( 'Copyright &copy; All Rights Reserved.', 'multiple-business' );
							
	return $text;
}
endif;