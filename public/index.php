<?php

// public/index.php

// Setup Include Path
define( 'APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application/') );
set_include_path(
	APPLICATION_PATH . '/../library' .
	PATH_SEPARATOR . get_include_path()
);

// Autoloader
require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();

// Bootstrap
try {
	require '../application/bootstrap.php';
} catch( Exception $exception ) {
	echo '<html><body><center>'
			. 'An exception occurred while bootstrapping the application.';
	if( defined('APPLICATION_ENVIRONMENT')
		&& APPLICATION_ENVIRONMENT != 'production' ) {
			echo '<br /><br />' . $exception->getMessage() . '<br />'
					. '<div>Stack Trace:'
					. '<pre>' . $exception->getTraceAsString() . '</pre></div>';
	}
	echo '</center></body></html>';
	exit(1);
}

// Dispatch to Controller
Zend_Controller_Front::getInstance()->dispatch();
