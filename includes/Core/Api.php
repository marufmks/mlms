<?php

namespace EduLMS\Core;

use EduLMS\Traits\Base;
use EduLMS\Libs\API\Config;

/**
 * Class API
 *
 * Initializes and configures the API for the EduLMS.
 *
 * @package EduLMS\Core
 */
class API {

	use Base;

	/**
	 * Initializes the API for the EduLMS.
	 *
	 * @return void
	 */
	public function init() {
		Config::set_route_file( EDU_LMS_DIR . '/includes/Routes/Api.php' )
			->set_namespace( 'EduLMS\Api' )
			->init();
	}
}
