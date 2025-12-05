<?php
/**
 * EduLMS Routes
 *
 * Defines and registers custom API routes for the EduLMS using the Haruncpi\WpApi library.
 *
 * @package EduLMS\Routes
 */

namespace EduLMS\Routes;

use EduLMS\Libs\API\Route;

Route::prefix(
	EDU_LMS_ROUTE_PREFIX,
	function ( Route $route ) {

		// Define accounts API routes.

		$route->post( '/accounts/create', '\EduLMS\Controllers\Accounts\Actions@create' );
		$route->get( '/accounts/get', '\EduLMS\Controllers\Accounts\Actions@get' );
		$route->post( '/accounts/delete', '\EduLMS\Controllers\Accounts\Actions@delete' );
		$route->post( '/accounts/update', '\EduLMS\Controllers\Accounts\Actions@update' );

		// Posts routes.
		$route->get( '/posts/get', '\EduLMS\Controllers\Posts\Actions@get_all_posts' );
		$route->get( '/posts/get/{id}', '\EduLMS\Controllers\Posts\Actions@get_post' );
		// Allow hooks to add more custom API routes.
		do_action( 'edu_lms_api', $route );
	}
);
