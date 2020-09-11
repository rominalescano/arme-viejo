<?php
/**
 * Multiple Business back compat functionality
 *
 * Prevents Multiple Business from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @since Multiple Business 1.0.0
 */

/**
 * Prevent switching to Multiple Business on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Multiple Business 1.0.0
 */
function multiple_business_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'multiple_business_upgrade_notice' );
}
add_action( 'after_switch_theme', 'multiple_business_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Multiple Business on WordPress versions prior to 4.7.
 *
 * @since Multiple Business 1.0.0
 * @global string $wp_version WordPress version.
 */
function multiple_business_upgrade_notice() {
	$message = sprintf( esc_html__( 'Multiple Business requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'multiple-business' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Multiple Business 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function multiple_business_customize() {
	wp_die( sprintf( esc_html__( 'Multiple Business requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'multiple-business' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'multiple_business_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Multiple Business 1.0.0
 * @global string $wp_version WordPress version.
 */
function multiple_business_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Multiple Business requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'multiple-business' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'multiple_business_preview' );
