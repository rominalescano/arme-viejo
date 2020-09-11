<?php
/**
 * Template part for displaying highlight posts slider section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Multiple Business 1.0.0
 */

$highlight_category_id = multiple_business_get_option( 'highlight_category' );
$args = array(
	'posts_per_page'      => 4,
	'offset'              => 0,
	'category'            => $highlight_category_id,
	'ignore_sticky_posts' => 1
	);
$posts_array = get_posts( $args );

if( count( $posts_array ) > 0 && !multiple_business_get_option( 'disable_highlight' ) ){
	?>
	<section class="wrapper block-highlight">
		<div class="container">
			<div class="section-title-group">
				<h2 class="section-title"><?php echo wp_kses_post( multiple_business_get_option( 'highlight_section_title' ) ); ?></h2>
			</div>
			<div class="block-highlight-inner">
				<div class="highlight-slider owl-carousel">
					<?php
					foreach ( $posts_array as $post ) : setup_postdata( $post );
					$image = multiple_business_get_thumbnail_url( array(
						'size' => 'multiple-business-1170-710'
					));
					?>
					<article class="post">
						<div class="post-inner-wrap">
							<figure class="feature-image">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url( $image );?>">
								</a>
								<?php
									if( 'post' == get_post_type() ):
										$cat = multiple_business_get_the_category();
										if( $cat ):
											?>
										<span class="cat">
											<?php
											$term_link = get_category_link( $cat[ 0 ]->term_id );
											?>
											<a href="<?php echo esc_url( $term_link ); ?>">
												<?php echo esc_html( $cat[0]->name ); ?>
											</a>
										</span>
										<?php
										endif;
									endif;
									?>
							</figure>
							<div class="post-content">
								<header class="post-title">
									<h3>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
								</header>
								<div class="post-text"><?php multiple_business_excerpt( 15, true ); ?></div>
								<div class="button-container">
									<a href="<?php the_permalink(); ?>" class="button-text">
										<?php esc_html_e( 'Learn More', 'multiple-business' ); ?>
									</a>
								</div>
							</div>
						</div>
						<div class="meta">
							<?php
							if( 'post' == get_post_type() ){
								?>	
								<div class="meta-date">
									<a href="<?php echo esc_url( multiple_business_get_day_link() ); ?>" class="date">
										<span class="day">
											<span class="day-line">
												<?php
												echo esc_html(get_the_date('j')); ?>
											</span>
										</span>
										<span class="month">
											<?php
											echo esc_html(get_the_date('M')); ?>
										</span>
										<span class="year">
											<?php
											echo esc_html(get_the_date('Y')); ?>
										</span>
									</a>
								</div>
								<?php
								if( 'post' == get_post_type() ){
									?>	
									<div class="meta-author">
										<span class="author-img">
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
										</span>
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
											<?php echo get_the_author(); ?>
										</a>
									</div>
									<div class="meta-comment">
										<span class="comment-link">
											<a href="<?php comments_link(); ?>">
												<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>
											</a>
										</span>
									</div>
									<?php } ?>
									<?php } ?>
									<?php if( 'post' == get_post_type() ): ?>
										<div class="meta-format">
											<span class="kfi <?php echo esc_attr( multiple_business_get_icon_by_post_format() ); ?>">
											</span>
										</div>
									<?php endif; ?>
								</div>
							</article>
							<?php
							endforeach;
							wp_reset_postdata(); 	
							?>
						</div>
						<div class="controls"></div>
					</div>
					<div id="after-slider"></div>
				</div>
			</section>
			<?php
		}