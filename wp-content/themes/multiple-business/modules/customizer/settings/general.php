<?php
/**
* Sets settings for general fields
*
* @since  Multiple Business 1.0.0
* @param  array $settings
* @return array Merged array
*/

function Multiplebusiness_Customizer_general_settings( $settings ){

	$general = array(
		# Site identity
		'fixed_header_logo' => array(
			'label'   => esc_html__( 'Alternate Logo for Fixed Header', 'multiple-business' ),
			'section' => 'title_tagline',
			'type'    => 'image',
		),
		'footer_logo' => array(
			'label'   => esc_html__( 'Alternate Logo for Footer', 'multiple-business' ),
			'section' => 'title_tagline',
			'type'    => 'image',
		),
		'disable_footer_site_identity' => array(
			'label'       => esc_html__( 'Disable Footer Logo section', 'multiple-business' ),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		),

		# Color
		'site_title_color' => array(
			'label'     => esc_html__( 'Site Title', 'multiple-business' ),
			'transport' => 'postMessage',
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_tagline_color' => array(
			'label'     => esc_html__( 'Site Tagline', 'multiple-business' ),
			'transport' => 'postMessage',
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_primary_color' => array(
			'label'     => esc_html__( 'Primary', 'multiple-business' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_alternative_color' => array(
			'label'     => esc_html__( 'Alternative', 'multiple-business' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_hover_color' => array(
			'label'     => esc_html__( 'Hover', 'multiple-business' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),

		# Theme Options
		# Header
		'header_layout' => array(
			'label'     => esc_html__( 'Select Header Layout', 'multiple-business' ),
			'section'   => 'header_options',
			'type'      => 'select',
			'choices'   => array(
				'header_one'   => esc_html__( 'Header Layout One', 'multiple-business' ),
				'header_two'   => esc_html__( 'Header Layout Two', 'multiple-business' ),
			),
		),
		'top_header_address' => array(
			'label'   => esc_html__( 'Address', 'multiple-business' ),
			'section' => 'header_options',
			'type'    => 'text',
		),
		'top_header_email' => array(
			'label'   => esc_html__( 'Email', 'multiple-business' ),
			'section' => 'header_options',
			'type'    => 'text',
		),
		'top_header_phone' => array(
			'label'   => esc_html__( 'Phone', 'multiple-business' ),
			'section' => 'header_options',
			'type'    => 'text',
		),
		'disable_top_header' => array(
			'label'     => esc_html__( 'Disable Top Header', 'multiple-business' ),
			'section'   => 'header_options',
			'type'      => 'checkbox',
		),
		'header_button_text' => array(
			'label'     => esc_html__( 'Header Button Text', 'multiple-business' ),
			'section'   => 'header_options',
			'type'      => 'text',
		),
		'header_button_url' => array(
			'label'     => esc_html__( 'Header Button URL', 'multiple-business' ),
			'section'   => 'header_options',
			'type'      => 'text',
		),
		'disable_header_button' => array(
			'label'     => esc_html__( 'Disable Header Button', 'multiple-business' ),
			'section'   => 'header_options',
			'type'      => 'checkbox',
		),
		'disable_fixed_header' => array(
			'label'     => esc_html__( 'Disable Fixed Header', 'multiple-business' ),
			'section'   => 'header_options',
			'type'      => 'checkbox',
		),
		# Layout
		'archive_layout' => array(
			'label'     => esc_html__( 'Archive Layout', 'multiple-business' ),
			'section'   => 'layout_options',
			'type'      => 'select',
			'choices'   => array(
				'left'   => esc_html__( 'Left Sidebar', 'multiple-business' ),
				'right'  => esc_html__( 'Right Sidebar', 'multiple-business' ),
				'none'   => esc_html__( 'No Sidebar', 'multiple-business' ),
			),
		),
		'archive_post_layout' => array(
			'label'     => esc_html__( 'Archive Post Layout', 'multiple-business' ),
			'section'   => 'layout_options',
			'type'      => 'select',
			'choices'   => array(
				'grid'   => esc_html__( 'Grid', 'multiple-business' ),
				'simple' => esc_html__( 'Simple', 'multiple-business' ),
			),
		),
		'archive_post_image' => array(
			'label'     => esc_html__( 'Archive Post Image', 'multiple-business' ),
			'section'   => 'layout_options',
			'type'      => 'select',
			'choices'   => array(
				'thumbnail' => esc_html__( 'Thumbnail (150x150)', 'multiple-business' ),
				'medium'    => esc_html__( 'Medium (300x300)', 'multiple-business' ),
				'large'     => esc_html__( 'Large (1024x1024)', 'multiple-business' ),
				'default'   => esc_html__( 'Default (1170x960)', 'multiple-business' ),
			),
		),
		'archive_post_image_alignment' => array(
			'label'     => esc_html__( 'Archive Post Image Alignment', 'multiple-business' ),
			'section'   => 'layout_options',
			'type'      => 'select',
			'choices'   => array(
				'left'   => esc_html__( 'Left', 'multiple-business' ),
				'right'  => esc_html__( 'Right', 'multiple-business' ),
				'center' => esc_html__( 'Center', 'multiple-business' ),
			),
		),
		'single_layout' => array(
			'label'     => esc_html__( 'Single Page Layout', 'multiple-business' ),
			'section'   => 'layout_options',
			'type'      => 'select',
			'choices'   => array(
				'left'    => esc_html__( 'Left Sidebar', 'multiple-business' ),
				'right'   => esc_html__( 'Right Sidebar', 'multiple-business' ),
				'compact' => esc_html__( 'Compact', 'multiple-business' ),
			),
		),
		# Blog
		'archive_page_title' => array(
			'label'   => esc_html__( 'Blog Page Title', 'multiple-business' ),
			'section' => 'blog_options',
			'type'    => 'text',
		),
		# Footer
		'footer_layout' => array(
			'label'     => esc_html__( 'Select Footer Layout', 'multiple-business' ),
			'section'   => 'footer_options',
			'type'      => 'select',
			'choices'   => array(
				'footer_one'   => esc_html__( 'Footer Layout One', 'multiple-business' ),
				'footer_two'   => esc_html__( 'Footer Layout Two', 'multiple-business' ),
			),
		),
		'enable_scroll_top_in_mobile' => array(
			'label'     => esc_html__( 'Enable Scroll top in mobile', 'multiple-business' ),
			'section'   => 'footer_options',
			'transport' => 'postMessage',
			'type'      => 'checkbox',
		),
		'disable_footer_widget' => array(
			'label'   => esc_html__( 'Disable Footer Widget Area', 'multiple-business' ),
			'section' => 'footer_options',
			'type'    => 'checkbox',
		),
		'footer_text' =>  array(
			'label'     => esc_html__( 'Footer Text', 'multiple-business' ),
			'section'   => 'footer_options',
			'type'      => 'textarea',
		)
	);

	return array_merge( $settings, $general );
}
add_filter( 'Multiplebusiness_Customizer_fields', 'Multiplebusiness_Customizer_general_settings' );