<?php
/**
 * Displays header callback button
 * @since Multiple Business 1.0.0
 */
?>

<?php if( !multiple_business_get_option( 'disable_header_button' ) ): ?>
	<span class="callback-button">
		<a href="<?php echo wp_kses_post( multiple_business_get_option( 'header_button_url' ) ); ?>" class="default-button">
			<?php echo wp_kses_post( multiple_business_get_option( 'header_button_text' ) ); ?>
		</a>
	</span>
<?php endif; ?>