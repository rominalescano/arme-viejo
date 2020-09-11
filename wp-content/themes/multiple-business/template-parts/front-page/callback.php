<?php
/**
 * Template part for displaying callback section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Multiple Business 1.0.0
 */

if( !multiple_business_get_option( 'disable_callback' ) ):

	$callback_id = multiple_business_get_option( 'callback_page' );
	if( $callback_id ):
		$query = new WP_Query( apply_filters( 'multiple_business_callback_page_args',  array( 
			'post_type'  => 'page',
			'p'          => $callback_id,
	)));

	while( $query->have_posts() ):
		$query->the_post();
		$image = multiple_business_get_thumbnail_url( array(
			'size' => 'multiple-business-1920-850'
		));
?>
		<!-- Callback Section -->
		<section class="wrapper block-callback overlay" style="background-image: url(<?php echo esc_url( $image ); ?>)">
			<div class="container">
				<h2 class="section-title"><?php the_title(); ?></h2>
				<div class="button-container">
					<a href="<?php the_permalink(); ?>" class="button-primary">
						<?php esc_html_e( 'View More', 'multiple-business' ); ?>
					</a>
					<?php if( !multiple_business_get_option( 'disable_add_callback' ) ): ?>
						<a href="<?php echo wp_kses_post( multiple_business_get_option( 'callback_add_button_url' ) ); ?>" class="button-outline">
							<?php echo wp_kses_post( multiple_business_get_option( 'callback_add_button_text' ) ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- End Callback Section -->
<?php
	
	endwhile;
	wp_reset_postdata();
	endif;
endif;

?>