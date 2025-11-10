<?php

namespace Mlms\Core;

use Mlms\Traits\Base;
use Mlms\Libs\API\Config;

/**
 * Class API
 *
 * Initializes and configures the API for the Mlms.
 *
 * @package Mlms\Core
 */
class API {

	use Base;

	/**
	 * Initializes the API for the Mlms.
	 *
	 * @return void
	 */
	public function init() {
		Config::set_route_file( MLMS_DIR . '/includes/Routes/Api.php' )
			->set_namespace( 'Mlms\Api' )
			->init();
	}
}
