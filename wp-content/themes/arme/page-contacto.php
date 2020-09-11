<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Type
 * @since Type 1.0
 */

get_header(); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div><!-- #primary -->
	<div class="container">
		<div class="row justify-content-center formulario">

			<div class="col-md-4">
					<?php echo do_shortcode( '[contact-form-7 id="55" title="Formulario de contacto 1"]' ); ?>
			</div>

		</div>
	</div>

<?php get_footer(); ?>
