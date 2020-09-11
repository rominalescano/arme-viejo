<?php
/**
 * Template part for displaying team section
 *
 * @since Multiple Business 1.0.0
 */
?>

<?php 
if( !multiple_business_get_option( 'disable_team' ) ):

	$team_ids = multiple_business_get_ids( 'team_page' );
	if( !empty( $team_ids ) && is_array( $team_ids ) && count( $team_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'multiple_business_team_args',  array( 
			'post_type'      => 'page',
			'post__in'       => $team_ids,
			'posts_per_page' => 4,
			'orderby'        => 'post__in'
		)));

		if( $query->have_posts() ):
?>

		<section class="wrapper block-team">
			<div class="container">
				<div class="section-title-group">
					<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'team_section_title' ) ); ?></h2>
				</div>
				<div class="content-inner">
					<div class="row">
					<?php
						while( $query->have_posts() ):
							$query->the_post();

							$image = multiple_business_get_thumbnail_url( array(
								'size' => 'multiple-business-600-675'
							));
					?>
						<div class="col-lg-3 col-sm-6 col-12">
							<article class="post">
								<figure class="feature-image">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url( $image ); ?>" />
									</a>
								</figure>
								<div class="post-content">
									<h3 class="post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
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
			</div>
		</section>

<?php
		endif;
	endif;
endif;
?>