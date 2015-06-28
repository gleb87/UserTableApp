<?php
class Router {
	private $table = array();
	
	public function __construct() {
		$this->table['usertable'] = new Route('\Model\UserTable\UserTableModel', 'View\UserTable\UserTableView', '\Controller\UserTable\UserTableController');
	}
	
	public function getRoute($route) {
		$route = strtolower($route);

		//Return a default route if no route is found
		if (!isset($this->table[$route])) {
			return $this->table['usertable'];	
		}
		
		return $this->table[$route];		
	}
} 
?>