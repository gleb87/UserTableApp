<?php
namespace Controller\UserTable;
class UserTableController extends \Controller\Controller {

	public function addUser() {
		$this->model->state = 'addUser';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->model->email = $_POST['email'];
				$this->model->firstname = $_POST['firstname'];
				$this->model->lastname = $_POST['lastname'];
			if ($this->validateUser()) {
				$this->model->addUser();
			}
		}
	}

	public function editUser() {
		$this->model->state = 'editUser';
		$this->model->id = $_GET['id'];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->model->email = $_POST['email'];
				$this->model->firstname = $_POST['firstname'];
				$this->model->lastname = $_POST['lastname'];
			if ($this->validateUser()) {
				$this->model->editUser();
			}
		}

	}

	public function deleteUser() {
		if (isset($_GET['id'])) {
			$this->model->id = $_GET['id'];
			$this->model->deleteUser();
		}
	}

	public function validateUser() {
		if (empty($_POST['email'])) {
			$this->model->error['email'] = 'Please, enter user email!'; 
		}

		if (!empty($this->model->error)) {
			return false;
		}

		return true;
	}
}
?>