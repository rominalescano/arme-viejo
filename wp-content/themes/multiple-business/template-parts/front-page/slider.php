<?php
/**
 * Template part for displaying slider section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Multiple Business 1.0.0
 */

$slider_page_id = multiple_business_get_ids( 'slider_page' );

if( !empty( $slider_page_id ) && is_array( $slider_page_id ) && count( $slider_page_id ) > 0 && !multiple_business_get_option( 'disable_slider' ) ){
?>
	<section class="wrapper block-slider pages-slider">
		<div class="controls">
			<div class="owl-pager" id="kt-slide-pager"></div>
		</div>
		<div class="home-slider owl-carousel">
			<?php
				$query = new WP_Query( apply_filters( 'multiple_business_slider_args', array(
					'posts_per_page' => 3,
					'post_type'      => 'page',
					'orderby'        => 'post__in',
					'post__in'       => $slider_page_id,
				)));
				
				while ( $query->have_posts() ) : $query->the_post();
					$image = multiple_business_get_thumbnail_url( array( 'size' => 'multiple-business-1920-750' ) );
			?>
					<div class="slide-item" style="background-image: url( <?php echo esc_url( $image ); ?> );">
						<div class="banner-overlay">
					    	<div class="container">
					    		<div class="row">
					    			<div class="col-12 col-lg-8 offset-lg-2 text-center">
					    				<div class="slide-inner">
					    					<div class="post-content-inner-wrap">
						    					<header class="post-title">
						    						<h2><?php the_title(); ?></h2>
						    					</header>
					    						<div class="content">
						    					<?php  
						    						multiple_business_excerpt( 10, true );
						    						if( get_edit_post_link()){
		    											multiple_business_edit_link();
		    										}
						    					?>
					    						</div>
							    				<div class="button-container">
							    					<a href="<?php the_permalink(); ?>" class="button-primary">
							    						<?php esc_html_e( 'Learn More', 'multiple-business' ); ?>
							    					</a>
							    					<?php if( !multiple_business_get_option( 'disable_slider_button' ) ): ?>
						    							<a href="<?php echo wp_kses_post( multiple_business_get_option( 'slider_button_url' ) ); ?>" class="button-outline">
						    								<?php echo wp_kses_post( multiple_business_get_option( 'slider_button_text' ) ); ?>
						    							</a>
							    					<?php endif; ?>
							    				</div>
						    				</div>
					    				</div>
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
		<div id="after-slider"></div>
	</section>
<?php
}else {
	multiple_business_inner_banner();
}

