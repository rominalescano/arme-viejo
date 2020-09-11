<?php
/**
 * Template part for displaying services section
 *
 * @since Multiple Business 1.0.0
 */

if( !multiple_business_get_option( 'disable_service' ) ):

	$service_ids = multiple_business_get_ids( 'service_page' );
	if( !empty( $service_ids ) && is_array( $service_ids ) && count( $service_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'multiple_business_services_args',  array( 
			'post_type'      => 'page',
			'post__in'       => $service_ids,
			'posts_per_page' => 3,
			'orderby'        => 'post__in'
		)));

		if( $query->have_posts() ):
?>
			<!-- Service Section -->
			<section class="wrapper block-service">
				<div class="container">
					<div class="section-title-group">
						<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'service_section_title' ) ); ?></h2>
						<span>
							<?php if( get_edit_post_link()){
								multiple_business_edit_link();
							} ?>
						</span>
					</div>
					<div class="row">
			    		<?php
				    		while( $query->have_posts() ):
				    			$query->the_post();
					    		$image = multiple_business_get_thumbnail_url( array(
					    			'size' => 'multiple-business-1170-710'
					    		));
				    			$title = multiple_business_get_piped_title();
				    	?>
						    	<div class="col-12 col-md-4">
						    		<div class="icon-block-outer">
						    			<div class="post-content-inner">
						    				<div class="list-inner">
						    					<figure class="feature-image overlay">
						    						<a href="<?php the_permalink(); ?>">
						    							<img src="<?php echo esc_url( $image );?>">
						    						</a>
						    						<?php 
					    							$icon = $title[ 'sub_title' ] ;
					    							if( !empty( $icon ) ):
					    							?>
					    								<div class="icon-area">
					    									<span class="icon-outer">
					    										<span class="kfi <?php echo esc_attr( $icon ); ?>"></span>
					    									</span>
					    								</div>
					    						<?php endif; ?>
						    					</figure>
												<div class="icon-content-area">
						    						<h3>
						    							<a href="<?php the_permalink(); ?>">
						    								<?php echo esc_html( $title[ 'title' ] ); ?>
						    							</a>
						    						</h3>
						    						<div class="text">
						    							<?php 
						    								multiple_business_excerpt( 10, true );
						    							?>
						    						</div>
						    						<?php 
														if( get_edit_post_link()){
			    											multiple_business_edit_link();
			    										}
													?>
												</div>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
						<?php  
							endwhile;
							wp_reset_postdata();
						?>
						</div>
					</div>
				</div>
			</section> <!-- End Service Section -->
<?php
		endif; 
	endif; 
endif;