<?php
/**
 * Mlms Routes
 *
 * Defines and registers custom API routes for the Mlms using the Haruncpi\WpApi library.
 *
 * @package Mlms\Routes
 */

namespace Mlms\Routes;

use Mlms\Libs\API\Route;

Route::prefix(
	MLMS_ROUTE_PREFIX,
	function ( Route $route ) {

		// Define accounts API routes.

		$route->post( '/accounts/create', '\Mlms\Controllers\Accounts\Actions@create' );
		$route->get( '/accounts/get', '\Mlms\Controllers\Accounts\Actions@get' );
		$route->post( '/accounts/delete', '\Mlms\Controllers\Accounts\Actions@delete' );
		$route->post( '/accounts/update', '\Mlms\Controllers\Accounts\Actions@update' );

		// Posts routes.
		$route->get( '/posts/get', '\Mlms\Controllers\Posts\Actions@get_all_posts' );
		$route->get( '/posts/get/{id}', '\Mlms\Controllers\Posts\Actions@get_post' );
		// Allow hooks to add more custom API routes.
		do_action( 'mlms_api', $route );
	}
);
