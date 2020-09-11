<?php
/**
 * Template part for displaying about us section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Multiple Business 1.0.0
 */

if( !multiple_business_get_option( 'disable_about' ) ): ?>
	<!-- About Section -->
	<section class="wrapper block-about">
		<div class="container">
			<div class="section-title-group">
				<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'about_section_title' ) ); ?></h2>
				<span>
					<?php if( get_edit_post_link()){
						multiple_business_edit_link();
					} ?>
				</span>
			</div>
			<div class="thumb-block-outer">
				<div class="row">
					<!-- About page -->
					<?php
						$class = '';
						$about_accordion_page_id = multiple_business_get_ids( 'about_accordion_page' );
						$about_id = multiple_business_get_option( 'about_page' );

						if( !$about_id || !$about_accordion_page_id ){
							$class = 'col-12 col-lg-8 offset-lg-2';
						}else {
							$class = 'col-lg-6';
						}

						if( $about_id ):
							$query = new WP_Query( apply_filters( 'multiple_business_about_page_args',  array( 
								'post_type'  => 'page',
								'p'          => $about_id,
						)));
						while( $query->have_posts() ):
							$query->the_post();
							$image = multiple_business_get_thumbnail_url( array(
								'size' => 'multiple-business-1170-710'
							));

					?>
					<div class="<?php echo esc_attr( $class ); ?>">
						<div class="thumb-outer">
							<div class="thumb-inner">
								<img src="<?php echo esc_url( $image );?>">
							</div>
							<div class="about-content">
								<h3><?php the_title(); ?></h3>
								<?php multiple_business_excerpt(40); ?>
								<div class="button-container">
									<a href="<?php the_permalink(); ?>" class="button-primary">
										<?php esc_html_e( 'View More', 'multiple-business' ); ?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php 
						endwhile;
						wp_reset_postdata();
						endif;
					?>
					<!-- Accordion -->
					<?php
						if( !empty( $about_accordion_page_id ) && is_array( $about_accordion_page_id ) && count( $about_accordion_page_id ) > 0 ):

							$query = new WP_Query( apply_filters( 'multiple_business_about_accordion_page_args', array(
								'post_type'      => 'page',
								'post__in'       => $about_accordion_page_id,
								'posts_per_page' => 3,
								'orderby'        => 'post__in'
							)));
							if( $query->have_posts() ):
							?>
							<div class="<?php echo esc_attr( $class ); ?>">
								<div class="accordion-section">
									<div class="accordion" id="accordion">
									<?php
										$i = 0;
										foreach( $about_accordion_page_id as $key => $field ):
											$query->the_post();
											?>
												<div class="card">
													    <div class="card-header" id="heading-<?php echo esc_attr( $key ); ?>">
													      <h3 class="m-0">
													        <button class="btn btn-link <?php echo $key == 0 ? esc_attr( '' ) : 'collapsed'; ?>" type="button" data-toggle="collapse" data-target="#collapse-<?php echo esc_attr( $key ); ?>" aria-expanded="true" aria-controls="#collapse-<?php echo esc_attr( $key ); ?>">
													          <?php the_title(); ?>
													          <span class="kfi kfi-minus-06"></span>
													        </button>
													      </h3>
													    </div>

													    <div id="collapse-<?php echo esc_attr( $key ); ?>" class="collapse <?php echo $key == 0 ? esc_attr( 'show' ) : ''; ?>" aria-labelledby="heading-<?php echo esc_attr( $key ); ?>" data-parent="#accordion">
														    <div class="card-body-wrap">
															    <div class="card-body">
															      <div class="scrollbar">
															        <?php the_content(); ?>
															      </div>
															    </div>
														    </div>
													    </div>
												</div>
											<?php
										if (++$i == 3) break;
										endforeach;
										wp_reset_postdata();

									?>
									</div>
								</div>
							</div>
							<?php 
							endif;
						endif;
					 ?>
				</div>
			</div>
		</div>	
	</section> <!-- End About Section -->
<?php endif; ?>