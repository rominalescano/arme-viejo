<?php
/**
 * Template part for displaying contact section
 *
 * @since Multiple Business 1.0.0
 */

if( !multiple_business_get_option( 'disable_contact' ) ):
?>

<section class="wrapper block-contact">
	<div class="container">
		<div class="section-title-group">
			<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'contact_section_title' ) ); ?></h2>
		</div>
		<div class="contact-form-detail">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-10 offset-lg-1">
					<div class="contact-form-section">
					<?php echo do_shortcode( multiple_business_get_option( 'contact_shortcode' ) ); ?>
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-details-wrap">
		<div class="container">
			<div class="contact-list-outer">
				<?php if ( multiple_business_get_option( 'top_header_address') ): ?>
						<div class="contact-list">
							<div class="icon-area">
								<span class="kfi kfi-pin-alt"></span>
							</div>
							<div class="info">
								<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_address' ) ); ?>
							</div>
						</div>
				<?php endif; ?>
				<?php if ( multiple_business_get_option( 'top_header_email') ): ?>
						<div class="contact-list">
							<div class="icon-area">
								<span class="kfi kfi-pin-alt"></span>
							</div>
							<div class="info">
								<a href="mailto:<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_email' ) ); ?>">
									<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_email' ) ); ?>
								</a>
							</div>
						</div>
				<?php endif; ?>
				<?php if ( multiple_business_get_option( 'top_header_phone') ): ?>
						<div class="contact-list">
							<div class="icon-area">
								<span class="kfi kfi-phone"></span>
							</div>
							<div class="info">
								<a href="tel:<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_phone' ) ); ?>">
									<?php echo wp_kses_post(  multiple_business_get_option( 'top_header_phone' ) ); ?>
								</a>
							</div>
						</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php endif;