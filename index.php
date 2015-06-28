<?php
// Autoloader
function autoload($class) {
	$file = '/' . str_replace('\\', '/', strtolower($class)) . '.php';
	
	/*if (!is_file($file)) {
		include_once($file);
		return true;
	}
	
	return false;*/

	include_once($file);
}

spl_autoload_register('autoload');
spl_autoload_extensions('.php');

$router = new Router;

$route = NULL;
if (isset($_GET['route'])) {
	$route = $_GET['route'];
}

$action = NULL;
if (isset($_GET['action'])) {
	$action = $_GET['action'];
}

$frontController = new FrontController($router, $route, $action);
echo $frontController->output();	
?>