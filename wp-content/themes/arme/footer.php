<?php
/**
 * The template for displaying the footer
 * Contains the closing of the body tag and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Multiple Business 1.0.0
 */
?>
</div> <!-- end content -->

	<?php
		if( multiple_business_get_option( 'footer_layout' ) == 'footer_one' ):
	?>	
		<footer id="colophon" class="wrapper site-footer site-footer-primary">
			<div class="bottom-footer">
				<div class="container">
					<?php get_template_part('template-parts/footer/site', 'info'); ?>
					<div class="footer-menu">
						<?php echo multiple_business_get_menu( 'footer' ); ?>
					</div>
				</div>
			</div>
		</footer>
	<?php endif; ?> <!-- footer one ends -->
	<?php
		if( multiple_business_get_option( 'footer_layout' ) == 'footer_two' ):
	?>
		<footer id="colophon" class="wrapper site-footer site-footer-two">
			<div class="bottom-footer">
				<div class="container">
					<div class="footer-content-wrap">
						<?php if ( !multiple_business_get_option( 'disable_footer_site_identity' ) ): ?>
								<div class="footer-site-branding site-branding">
										<?php
											$image = multiple_business_get_option( 'footer_logo' );
											if( $image ){
												?>
													<img src="<?php echo esc_url( $image ); ?>">
												<?php
											}else{
												the_custom_logo();
											}
										?>
										<p class="site-title">
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
												<?php bloginfo( 'name' ); ?>
											</a>
										</p>
										<p class="site-description">
											<?php echo get_bloginfo( 'description', 'display' ); ?>
										</p>
								</div>
						<?php endif; ?>
						<?php 
							if ( has_nav_menu( 'social' ) ) { ?>
								<div class="footer-social">
									<div class="socialgroup">
										<?php echo multiple_business_get_menu( 'social' ); ?>
									</div>
								</div>
						<?php } ?>
					</div>
					<?php get_template_part('template-parts/footer/site', 'info'); ?>
					<div class="footer-menu">
						<?php echo multiple_business_get_menu( 'footer' ); ?>
					</div>
				</div>
			</div>
		</footer>
	<?php endif; ?>	<!-- footer one ends -->
		<?php wp_footer(); ?>
		
	</body>
</html>