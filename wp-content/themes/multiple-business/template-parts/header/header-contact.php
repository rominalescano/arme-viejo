<?php
/**
 * Displays header contact
 * @since Multiple Business 1.0.0
 */
?>

<div class="contact-details" id="contact-details-area">
	<?php if ( multiple_business_get_option( 'top_header_address') ): ?>
			<div class="list">
				<span class="kfi kfi-pin-alt"></span>
				<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_address' ) ); ?>
			</div>
	<?php endif; ?>
	<?php if ( multiple_business_get_option( 'top_header_email') ): ?>
			<div class="list">
				<span class="kfi kfi-mail-alt"></span>
				<a href="mailto:<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_email' ) ); ?>">
					<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_email' ) ); ?>
				</a>
			</div>
	<?php endif; ?>
	<?php if ( multiple_business_get_option( 'top_header_phone') ): ?>
			<div class="list">
				<span class="kfi kfi-phone"></span>
				<a href="tel:<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_phone' ) ); ?>">
					<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_phone' ) ); ?>
				</a>
			</div>
	<?php endif; ?>
</div>