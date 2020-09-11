<?php
/**
 * Template part for displaying testimonial section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Multiple Business 1.0.0
 */

if( !multiple_business_get_option( 'disable_testimonial' ) ):
	$testi_ids = multiple_business_get_ids( 'testimonial_page' );

	if( !empty( $testi_ids ) && is_array( $testi_ids ) && count( $testi_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'multiple_business_testimonial_args', array( 
			'post_type'      => 'page',
			'post__in'       => $testi_ids,
			'posts_per_page' => 4,
			'orderby'        => 'post__in'
		)));

		if( $query->have_posts() ):
?>
			<section class="wrapper block-testimonial">
				<div class="container">
					<div class="section-title-group">
						<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'testimonial_section_title' ) ); ?></h2>
					</div>
					<div class="content-inner">
						<div class="owl-carousel testimonial-carousel">
							<?php 
								while ( $query->have_posts() ):
									$query->the_post(); 
									$image = multiple_business_get_thumbnail_url( array(
										'size' => 'thumbnail'
									));
							?>
								    <div class="slide-item">
										<article class="post-content">
											<div class="post-content-inner">
												<div class="author-content">
													<blockquote>
								    					<div class="text">
								    						<?php the_content(); 	
								    						?>
								    					</div>
								    					<?php 
							    							if( get_edit_post_link()){
							    								multiple_business_edit_link();
							    							}
									    				?>
													</blockquote>
												</div>
												<div class="author">
													<div class="post-thumb-outer">
														<div class="post-thumb">
															<img src="<?php echo esc_url( $image ); ?>">
														</div>
													</div>
													<footer class="post-title">
								    					<cite>
								    						<?php echo get_the_title(); ?>
								    					</cite>
								    				</footer>
												</div>
											</div>

										</article>
									</div>
							<?php
								endwhile; 
								wp_reset_postdata();
							?>
						</div>
						<div class="owl-pager" id="testimonial-pager"></div>
					</div>
				</div>
			</section><!-- End Testimonial Section -->
<?php
		endif;
	endif;
endif;