<?php
namespace Model\UserTable;
class UserTableModel extends \Model\Model {
	private $connection;
	public $state = 'showTable';
	public $result = '';
	public $error = array();

	public $id = '';
	public $email = '';
	public $firstname = '';
	public $lastname = '';

	public function __construct() {
		$servername = 'localhost';
        $username = 'UserTableApp';
        $password = 'usertable';
        $db_name = 'usertableapp'; 

		$this->connection = new \mysqli($servername, $username, $password, $db_name);

		if ($this->connection->connect_error) {
			trigger_error('Error: Could not make a database connection (' . $this->connection->connect_errno . ') ' . $this->connection->connect_error);
			exit();
		}
	}

	public function getUsers() {
		$users = array();

		$sql = "SELECT * FROM users";

	    $result = $this->connection->query($sql);

	    if ($result === false) {
	        trigger_error('Error: ' . $this->connection->error  . '<br />Error No: ' . $this->connection->errno . '<br />' . $sql);
	    } else {
	    	$users = $result->fetch_all(MYSQLI_ASSOC);
	    }

	    return $users;
	}

	public function setUser() {
		if (empty($this->id)) return;

		$sql = "SELECT * FROM users WHERE id=$this->id";

	    $result = $this->connection->query($sql);

	    if ($result === false) {
	        trigger_error('Error: ' . $this->connection->error  . '<br />Error No: ' . $this->connection->errno . '<br />' . $sql);
	    } else {
	    	$user = $result->fetch_assoc();
	    	$this->email = $user['email'];
	    	$this->firstname = $user['firstname'];
	    	$this->lastname = $user['lastname'];
	    }

	}

	public function addUser() {
		$sql = "INSERT INTO users (email, firstname, lastname)
				VALUES ('" . $this->email . "', '" . $this->firstname . "', '" . $this->lastname . "')";

		if ($this->connection->query($sql) === true) {
		    $this->result = 'Success! Created new user!';
			$this->state = 'showTable';
		} else {
		    $this->error['addUser'] = 'Error: ' . $this->connection->error; 
		}
	}

	public function editUser() {
		$sql = "UPDATE users SET email='$this->email', firstname='$this->firstname', lastname='$this->lastname'
				WHERE id=$this->id";

		if ($this->connection->query($sql) === true) {
		    $this->result = 'Success! User updated!';
			$this->state = 'showTable';
		} else {
		    $this->error['editUser'] = 'Error: ' . $this->connection->error; 
		}
	}

	public function deleteUser() {
		if (empty($this->id)) return;

		$sql = "DELETE FROM users WHERE id=$this->id";

		if ($this->connection->query($sql) === true) {
			$this->result = 'Success! User deleted!';
		} else {
		    $this->error['deleteUser'] = 'Error: ' . $this->connection->error; 
		}
	}

	public function __destruct() {
		$this->connection->close();
	}


}
?>