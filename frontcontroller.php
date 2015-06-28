<?php
class FrontController {
	private $controller;
	private $view;
	
	public function __construct(Router $router, $routeName, $action = null) {
		$route = $router->getRoute($routeName);
		$modelName = $route->model;
		$controllerName = $route->controller;
		$viewName = $route->view;
		
		$model = new $modelName;
		$this->controller = new $controllerName($model);
		$this->view = new $viewName($routeName, $model);
		
		
		if (!empty($action) && method_exists($this->controller, $action)) {
			$this->controller->{$action}();
		}
	}
	
	public function output() {
		$loader = new \Loader;
		$header = $loader->load('header.tpl');
		$footer = $loader->load('footer.tpl');
		return $header . $this->view->output() . $footer;
	}
}
?>