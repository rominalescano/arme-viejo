<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Multiple Business 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<div id="site-loader">
		<div class="site-loader-inner">
			<?php
				$src = get_theme_file_uri( 'assets/images/placeholder/loader.gif' );
				echo apply_filters( 'multiple_business_preloader',
				sprintf( '<img src="%s" alt="%s">',
					esc_url( $src ),
					esc_html__( 'Site Loader', 'multiple-business' )
				)); 
			?>
		</div>
	</div>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php echo esc_html__( 'Skip to content', 'multiple-business' ); ?>
		</a>
		<?php get_template_part( 'template-parts/header/offcanvas', 'menu' ); ?>

		<?php
		if ( !multiple_business_get_option( 'disable_fixed_header') ):
		?>
		<header id="fixed-header" class="wrapper site-header wrap-fixed-header" role="banner">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-9 col-lg-3">
						<div class="site-branding">
							<?php
								$fixed_header_logo = multiple_business_get_option( 'fixed_header_logo' );
								if( $fixed_header_logo ){
									?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
											<img src="<?php echo esc_url( $fixed_header_logo ); ?>">
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
					<?php $class = ''; ?>
					<?php !multiple_business_get_option( 'disable_header_button' ) ? $class = 'col-lg-7' : $class = 'col-lg-9'; ?>
					<div class="d-none d-lg-block <?php echo esc_attr( $class ); ?>" id="primary-nav-container">
						<div class="wrap-nav main-navigation">
							<div id="navigation">
							    <nav class="nav">
									<?php echo multiple_business_get_menu( 'primary' ); ?>
							    </nav>
							</div>
						</div>
					</div>
					<div class="col-3 col-lg-2" id="header-bottom-right-outer">
						<div class="header-bottom-right">
							<div class="d-none d-lg-inline-block">
								<?php get_template_part('template-parts/header/header', 'callback'); ?>
							</div>
						</div>
					</div>
				</div>
				<span class="alt-menu-icon d-lg-none">
					<a class="offcanvas-menu-toggler" href="#">
						<span class="kfi kfi-menu"></span>
					</a>
				</span>
			</div>
		</header><!-- fix header -->
		<?php endif; ?>

		<?php if( multiple_business_get_option( 'header_layout' ) == 'header_one' ): ?>
			<header id="masthead" class="wrapper site-header site-header-primary" role="banner">
				<?php if( !multiple_business_get_option( 'disable_top_header' ) ): ?>
					<div class="top-header d-none d-lg-block">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-6 col-lg-7 d-none d-lg-block">
									<?php get_template_part( 'template-parts/header/header', 'contact' ); ?>
								</div>
								<div class="col-6 col-lg-5 d-none d-lg-block">
									<div class="header-bottom-right">
										<div class="socialgroup">
											<?php echo multiple_business_get_menu( 'social' ); ?>
										</div>
										<?php get_template_part('template-parts/header/header', 'cart'); ?>
										<?php get_template_part('template-parts/header/header', 'search'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="main-header">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-9 col-lg-3">
								<?php
									get_template_part( 'template-parts/header/site', 'branding' );
								?>
							</div>
							<?php $class = ''; ?>
							<?php !multiple_business_get_option( 'disable_header_button' ) ? $class = 'col-lg-7' : $class = 'col-lg-9'; ?>
							<div class="d-none d-lg-block <?php echo esc_attr( $class ); ?>" id="primary-nav-container">
								<div class="wrap-nav main-navigation">
									<div id="navigation" class="d-xl-block">
										<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'multiple-business' ); ?>">
											<?php echo multiple_business_get_menu( 'primary' ); ?>
										</nav>
									</div>
								</div>
							</div>
							<div class="col-3 col-lg-2" id="header-bottom-right-outer">
								<div class="header-bottom-right">
									<div class="d-none d-lg-inline-block">
										<?php get_template_part('template-parts/header/header', 'callback'); ?>
									</div>
								</div>
							</div>
						</div>
						<span class="alt-menu-icon d-lg-none">
							<a class="offcanvas-menu-toggler" href="#">
								<span class="kfi kfi-menu"></span>
							</a>
						</span>
					</div>
				</div>
			</header>
		<?php endif; ?> <!-- header one ends -->

		<?php if( multiple_business_get_option( 'header_layout' ) == 'header_two' ): ?>
			<header id="masthead" class="wrapper site-header site-header-two" role="banner">
				<div class="top-header d-none d-lg-block">
					<div class="container">
						<?php get_template_part( 'template-parts/header/header', 'contact' ); ?>
					</div>
				</div>
				<div class="main-header">
					<div class="container">
						<div class="main-header-wrap row">
							<div class="col-12 col-lg-4 d-none d-lg-block">
								<div class="socialgroup">
									<?php multiple_business_get_menu( 'social' ); ?>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<?php
									get_template_part( 'template-parts/header/site', 'branding' );
								?>
							</div>
							<div class="col-12 col-lg-4 d-none d-lg-block">
								<div class="header-bottom-right">
									<?php get_template_part('template-parts/header/header', 'cart'); ?>
									<?php get_template_part('template-parts/header/header', 'search'); ?>
									<?php get_template_part('template-parts/header/header', 'callback'); ?>
								</div>
							</div>
						</div>
						<span class="alt-menu-icon d-lg-none">
							<a class="offcanvas-menu-toggler" href="#">
								<span class="kfi kfi-menu"></span>
							</a>
						</span>
					</div>
				</div>
				<div class="main-navigation">
					<div class="container">
							<?php $class = ''; ?>
							<?php !multiple_business_get_option( 'disable_header_button' ) ? $class = '' : $class = ''; ?>
							<div class="d-none d-lg-block primary-navigation<?php echo esc_attr( $class ); ?>" id="primary-nav-container">
								<div id="navigation">
									<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'multiple-business' ); ?>">
										<?php echo multiple_business_get_menu( 'primary' ); ?>
								    </nav>
								</div>
							</div>
					</div>
				</div>
			</header>
		<?php endif; ?> <!-- header two ends -->

		<div id="content" class="wrapper site-main">
