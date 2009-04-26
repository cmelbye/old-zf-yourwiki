<?php

// application/bootstrap.php

// Constants
defined('APPLICATION_PATH')
	or define( 'APPLICATION_PATH', dirname(__FILE__) );

defined('APPLICATION_ENVIRONMENT')
	or define( 'APPLICATION_ENVIRONMENT', 'development' );

// Setup Front Controller
$frontController = Zend_Controller_Front::getInstance();
$frontController->setControllerDirectory( APPLICATION_PATH . '/controllers' );
$frontController->setParam( 'env', APPLICATION_ENVIRONMENT );

// Clean Up
unset($frontController);
