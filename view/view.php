<?php
namespace View;
abstract class View {
	public $model;
	public $route;

	public function __construct($route, \Model\Model $model) {
		$this->route = $route;
		$this->model = $model;
	}

	abstract public function output(); 
}
?>
