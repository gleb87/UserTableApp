<?php
namespace Controller;
abstract class Controller {
	protected $model;
	
	public function __construct(\Model\Model $model) {
		$this->model = $model;
	}
} 
?>