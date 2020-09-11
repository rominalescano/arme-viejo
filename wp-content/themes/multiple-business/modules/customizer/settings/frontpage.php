<?php
/**
* Sets setting field for homepage
* 
* @since  Multiple Business 1.0.0
* @param  array $settings
* @return array Merged array of settings
*
*/
function multiple_business_frontpage_settings( $settings ){

	$home_settings = array(
		# Settings for slider section
		'slider_page' => array(
			'label'    => esc_html__( 'Slider Pages', 'multiple-business' ),
			'section'  => 'home_slider',
			'type'     => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23. Supports Maximum 3 sliders.', 'multiple-business' )
		),
		'slider_autoplay' => array(
			'label'   => esc_html__( 'Slider Auto Play', 'multiple-business' ),
			'section' => 'home_slider',
			'type'    => 'checkbox'
		),
		'slider_timeout' => array(
			'label'    => esc_html__( 'Slider Timeout ( in sec )', 'multiple-business' ),
			'section'  => 'home_slider',
			'type'     => 'number'
		),
		'slider_button_text' => array(
			'label'     => esc_html__( 'Additional Slider Button Text', 'multiple-business' ),
			'section'   => 'home_slider',
			'type'      => 'text',
		),
		'slider_button_url' => array(
			'label'     => esc_html__( 'Additional Slider Button URL', 'multiple-business' ),
			'section'   => 'home_slider',
			'type'      => 'text',
		),
		'disable_slider_button' => array(
			'label'     => esc_html__( 'Disable Additional Slider Button', 'multiple-business' ),
			'section'   => 'home_slider',
			'type'      => 'checkbox',
		),
		'disable_slider' => array(
			'label'   => esc_html__( 'Disable Slider Section', 'multiple-business' ),
			'section' => 'home_slider',
			'type'    => 'checkbox',
		),
		
		# Settings for service section
		'service_section_title' => array(
			'label'   => esc_html__( 'Enter Title for Service section', 'multiple-business' ),
			'section' => 'home_service',
			'type'    => 'text',
		),
		'service_page' => array(
			'label'   => esc_html__( 'Service Pages', 'multiple-business' ),
			'section' => 'home_service',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'multiple-business' )
		),
		'disable_service' => array(
			'label'   => esc_html__( 'Disable Service Section', 'multiple-business' ),
			'section' => 'home_service',
			'type'    => 'checkbox',
		),
		
		# Settings for about section
		'about_section_title' => array(
			'label'   => esc_html__( 'Enter Title for About section', 'multiple-business' ),
			'section' => 'home_about',
			'type'    => 'text',
		),
		'about_page' => array(
			'label'   => esc_html__( 'Select About Page', 'multiple-business' ),
			'section' => 'home_about',
			'type'    => 'dropdown-pages',
		),
		'about_accordion_page' => array(
			'label'   => esc_html__( 'Accordion Section Pages', 'multiple-business' ),
			'section' => 'home_about',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'multiple-business' ),
		),
		'disable_about' => array(
			'label'   => esc_html__( 'Disable About Us Section', 'multiple-business' ),
			'section' => 'home_about',
			'type'    => 'checkbox',
		),
		
		# Settings for portfolio section
		'portfolio_section_title' => array(
			'label'   => esc_html__( 'Enter Title for Portfolio section', 'multiple-business' ),
			'section' => 'home_portfolio',
			'type'    => 'text',
		),
		'portfolio_page' => array(
			'label'   => esc_html__( 'Portfolio Pages', 'multiple-business' ),
			'section' => 'home_portfolio',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'multiple-business' )
		),
		'disable_portfolio' => array(
			'label'   => esc_html__( 'Disable Portfolio Section', 'multiple-business' ),
			'section' => 'home_portfolio',
			'type'    => 'checkbox',
		),

		# Settings for Testimonials section
		'testimonial_section_title' => array(
			'label'   => esc_html__( 'Enter Title for Testimonial section', 'multiple-business' ),
			'section' => 'home_testimonial',
			'type'    => 'text',
		),
		'testimonial_page' => array(
			'label'   => esc_html__( 'Testimonial Pages', 'multiple-business' ),
			'section' => 'home_testimonial',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'multiple-business' )
		),
		'disable_testimonial' => array(
			'label'   => esc_html__( 'Disable Testimonial Section', 'multiple-business' ),
			'section' => 'home_testimonial',
			'type'    => 'checkbox',
		),

		# Settings for Team section
		'team_section_title' => array(
			'label'   => esc_html__( 'Enter Title for Team section', 'multiple-business' ),
			'section' => 'home_team',
			'type'    => 'text',
		),
		'team_page' => array(
			'label'   => esc_html__( 'Team Pages', 'multiple-business' ),
			'section' => 'home_team',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'multiple-business' )
		),
		'disable_team' => array(
			'label'   => esc_html__( 'Disable Team Section', 'multiple-business' ),
			'section' => 'home_team',
			'type'    => 'checkbox',
		),

		# Settings for callback section
		'callback_page' => array(
			'label'   => esc_html__( 'Select Callback Page', 'multiple-business' ),
			'section' => 'home_callback',
			'type'    => 'dropdown-pages',
		),
		'callback_add_button_text' => array(
			'label'   => esc_html__( 'Additional Button Text', 'multiple-business' ),
			'section' => 'home_callback',
			'type'    => 'text',
		),
		'callback_add_button_url' => array(
			'label'   => esc_html__( 'Additional Button URL', 'multiple-business' ),
			'section' => 'home_callback',
			'type'    => 'text',
		),
		'disable_add_callback' => array(
			'label'   => esc_html__( 'Disable Additional Button', 'multiple-business' ),
			'section' => 'home_callback',
			'type'    => 'checkbox',
		),
		'disable_callback' => array(
			'label'   => esc_html__( 'Disable Callback Section', 'multiple-business' ),
			'section' => 'home_callback',
			'type'    => 'checkbox',
		),

		# Settings for Highlighted Posts section
		'highlight_section_title' => array(
			'label'   => esc_html__( 'Enter Title for Highlight section', 'multiple-business' ),
			'section' => 'home_highlight',
			'type'    => 'text',
		),
		'highlight_category' => array(
			'label'   => esc_html__( 'Choose Highlight Category', 'multiple-business' ),
			'section' => 'home_highlight',
			'type'    => 'dropdown-categories',
		),
		'highlight_autoplay' => array(
			'label'   => esc_html__( 'Slider Auto Play', 'multiple-business' ),
			'section' => 'home_highlight',
			'type'    => 'checkbox'
		),
		'disable_highlight' => array(
			'label'   => esc_html__( 'Disable Highlight Section', 'multiple-business' ),
			'section' => 'home_highlight',
			'type'    => 'checkbox',
		),

		# Settings for Contact section
		'contact_section_title' => array(
			'label'   => esc_html__( 'Enter Title for Contact section', 'multiple-business' ),
			'section' => 'home_contact',
			'type'    => 'text',
		),
		'contact_shortcode' => array(
			'label'   => esc_html__( 'Shortcode', 'multiple-business' ),
			'section' => 'home_contact',
			'description' => esc_html__( 'Add a Contact Form 7 Shortcode.', 'multiple-business' ),
			'type'    => 'text',
		),
		'disable_contact' => array(
			'label'   => esc_html__( 'Disable Contact Section', 'multiple-business' ),
			'section' => 'home_contact',
			'type'    => 'checkbox',
		),
	);

	return array_merge( $home_settings, $settings );
}
add_filter( 'Multiplebusiness_Customizer_fields', 'multiple_business_frontpage_settings' );