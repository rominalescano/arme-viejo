<?php
/**
* Multiple Business breadcrumb.
*
* @since Multiple Business 1.0.0
* @uses breadcrumb_trail()
*/
require get_parent_theme_file_path( '/modules/breadcrumbs/breadcrumbs.php' );
if ( ! function_exists( 'multiple_business_breadcrumb' ) ) :

	function multiple_business_breadcrumb() {

		$breadcrumb_args = apply_filters( 'multiple_business_breadcrumb_args', array(
			'show_browse' => false,
		) );

		breadcrumb_trail( $breadcrumb_args );
	}

endif;

function multiple_business_modify_breadcrumb( $crumb ){

	$i = count( $crumb ) - 1;
	$title = $crumb[ $i ];

	$crumb[ $i ] = $title;

	return $crumb;
}
add_filter( 'breadcrumb_trail_items', 'multiple_business_modify_breadcrumb' );