<?php
namespace View\UserTable;
class UserTableView extends \View\View {

	public function output() {
		switch ($this->model->state) {
			case 'showTable':
				$data['route'] = $this->route;
				$data['users'] = $this->model->getUsers();

				$data['button_delete'] = 'Delete user';
				$data['action_delete'] = 'deleteUser';

				$data['button_edit'] = 'Edit user';
				$data['action_edit'] = 'editUser';

				$data['button_add'] = 'Add user';
				$data['action_add'] = 'addUser';

				$data['result'] = $this->model->result;

				$loader = new \Loader;
				$output = $loader->load('main.tpl', $data);
				break;

			case 'addUser':
				$data['route'] = $this->route;
				$data['action'] = 'addUser';
				$data['button_submit'] = 'Add user';
				$data['button_cancel'] = 'Cancel';

				$data['id'] = $this->model->id;
				$data['email'] = $this->model->email;
				$data['firstname'] = $this->model->firstname;
				$data['lastname'] = $this->model->lastname;

				$data['error'] = $this->model->error;

				$loader = new \Loader;
				$output = $loader->load('userform.tpl', $data);
				break;
			case 'editUser':
				$data['route'] = $this->route;
				$data['action'] = 'editUser';
				$data['button_submit'] = 'Edit user';
				$data['button_cancel'] = 'Cancel';

				$data['id'] = $this->model->id;
				$this->model->setUser();

				$data['email'] = $this->model->email;
				$data['firstname'] = $this->model->firstname;
				$data['lastname'] = $this->model->lastname;

				$data['error'] = $this->model->error;

				$loader = new \Loader;
				$output = $loader->load('userform.tpl', $data);
				break;
		}
		
		return $output;
	}
}
?>