<?php defined( 'ABSPATH' ) || exit;

add_action( 'rest_api_init',  'tesate_custom_rest_route' );

function tesate_custom_rest_route(){

	register_rest_route( 'tesate/v1', 'nonce', array(
		'methods' => WP_REST_SERVER::READABLE,
		'callback' => function () { return wp_create_nonce("wp_rest"); },
	));
}
