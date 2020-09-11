<?php
/**
* Template for Home page's Heading Section
* @since Multiple Business 1.0.0
*/
?>
<div class="container">
	<div class="section-title-group">
		<h2 class="section-title"><?php echo get_the_title(); ?></h2>
		<span>
			<?php
				if( get_edit_post_link()){
					multiple_business_edit_link();
				}
			?>
		</span>
	</div>
	<?php if( $args[ 'sub_title' ] ): ?>
		<?php multiple_business_excerpt(25); ?>
	<?php endif; ?>
	<div class="button-container">
		<a href="<?php the_permalink(); ?>" class="button-primary">
			<?php esc_html_e( 'View More', 'multiple-business' ); ?>
		</a>
	</div>
</div>