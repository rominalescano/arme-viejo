<?php
/**
 * Template part for displaying portfolio section
 *
 * @since Multiple Business 1.0.0
 */
?>

<?php 
if( !multiple_business_get_option( 'disable_portfolio' ) ):

	$portfolio_ids = multiple_business_get_ids( 'portfolio_page' );
	if( !empty( $portfolio_ids ) && is_array( $portfolio_ids ) && count( $portfolio_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'multiple_business_portfolio_args',  array( 
			'post_type'      => 'page',
			'post__in'       => $portfolio_ids, 
			'posts_per_page' => 4,
			'orderby'        => 'post__in'
		)));

	if( $query->have_posts() ):
		?>
		<!-- Portfolio Section -->
		<section class="wrapper block-portfolio block-grid">
			<div class="section-title-group">
				<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'portfolio_section_title' ) ); ?></h2>
			</div>
			<div class="container">
				<div class="row">
					<?php
					while( $query->have_posts() ): 
						$query->the_post();

						$image = multiple_business_get_thumbnail_url( array(
							'size' => 'multiple-business-1170-710'
						));
						?>
						<div class="masonry-grid">
							<article class="post">
								<div class="line-div">
									<figure class="feature-image">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo esc_url( $image ); ?>" />
										</a>
									</figure>
									<div class="post-content">
										<div class="post-title">
											<h3>
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
										</div>
									</div>
								</div>
							</article>
							<?php 
							if( get_edit_post_link()){
								multiple_business_edit_link();
							}
							?>
						</div>
						<?php  
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section> <!-- End Portfolio Section -->
		<?php
	endif; 
endif; 
endif;
?>