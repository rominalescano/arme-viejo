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
			<div class="top-footer">
				<div class="container">
					<div class="footer-content-wrap">
						<div class="row align-items-center">
							<?php 
								$class = '';
								$alt_class = '';
								if( multiple_business_get_option( 'disable_footer_site_identity' ) ){
									$class = 'col-md-12 text-center';
								}else {
									$class = 'col-md-6';
								}
								if ( !has_nav_menu( 'social' ) ) {
								    $alt_class = 'col-md-12 text-center';
								}else {
								    $alt_class = 'col-md-6';
								}
							?>
							<?php if ( !multiple_business_get_option( 'disable_footer_site_identity' ) ): ?>
								<div class="<?php echo esc_attr( $alt_class ) ?>">
									<div class="site-branding footer-site-branding">
										<?php
											$footer_logo = multiple_business_get_option( 'footer_logo' );
											if( $footer_logo ){
												?>
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
														<img src="<?php echo esc_url( $footer_logo ) ?>">
													</a>
												<?php
											}else {
												the_custom_logo();
											}
										?>
										<?php
										if( display_header_text()){
												if( get_bloginfo('name') ) {
										?> 
												<p class="site-title">
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
														<?php bloginfo( 'name' ); ?>
													</a>
												</p>
											<?php
												}
											?>
											<?php
												if( get_bloginfo('description') ) {
											?> 
												<p class="site-description">
													<?php echo get_bloginfo( 'description', 'display' ); ?>
												</p>
											<?php 
											}
										}
										?>
									</div>
								</div>
							<?php endif; ?>
							<div class="<?php echo esc_attr( $class ) ?>">
							<?php 
								if ( has_nav_menu( 'social' ) ) { ?>
									<div class="footer-social">
										<div class="socialgroup">
											<?php echo multiple_business_get_menu( 'social' ); ?>
										</div>
									</div>
							 <?php } ?>
							</div>
						</div>
					</div>
					<?php if( !multiple_business_get_option( 'disable_footer_widget' ) ):
					
					if( multiple_business_is_active_footer_sidebar() ):
					?>
						<div class="footer-widget-wrap">
							<div class="row">
							<?php
								$count = 0;
								for( $i = 1; $i <= 4; $i++ ){
									?>
										<?php if ( is_active_sidebar( 'multiple-business-footer-sidebar-'.$i ) ) : ?>
											<div class="col-lg-3 col-md-6 col-12 footer-widget-item">
											<?php dynamic_sidebar( 'multiple-business-footer-sidebar-'.$i ); ?>
											</div>
										<?php endif; ?>
									<?php
								}
								if( $count > 0 ){
									$return = true;
								}else{
									$return = false;
								}
							?>
							</div>
						</div>
					<?php
						endif;
					endif
					?>
				</div>
			</div>
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
			<div class="top-footer">
				<div class="container">
					<?php if( !multiple_business_get_option( 'disable_footer_widget' ) ):
					
					if( multiple_business_is_active_footer_sidebar() ):
					?>
						<div class="footer-widget-wrap">
							<div class="row">
							<?php
								$count = 0;
								for( $i = 1; $i <= 4; $i++ ){
									?>
										<?php if ( is_active_sidebar( 'multiple-business-footer-sidebar-'.$i ) ) : ?>
											<div class="col-lg-3 col-md-6 col-12 footer-widget-item">
											<?php dynamic_sidebar( 'multiple-business-footer-sidebar-'.$i ); ?>
											</div>
										<?php endif; ?>
									<?php
								}
								if( $count > 0 ){
									$return = true;
								}else{
									$return = false;
								}
							?>
							</div>
						</div>
					<?php
						endif;
					endif
					?>
				</div>
			</div>
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