<?php

require_once("Controller.php");
require_once("../models/users.php");

class UsersController extends Controller{
	public function insert() {
		$name = $_REQUEST['name'];
		$password = $_REQUEST['password'];
		$age = $_REQUEST['age'];
		$phone = $_REQUEST['phone'];

		$this->model->insertUser($name,$password,$age,$phone);
	}

	public function edit() {
		$name = $_REQUEST['name'];
		$password = $_REQUEST['password'];
		$age = $_REQUEST['age'];
		$phone = $_REQUEST['phone'];

		$this->model->editUser($name,$password,$age,$phone);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}
	public function viewUsers()
    {
        $users = array();

        $stmt = $this->conn->prepare('SELECT * FROM users');
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $users = new users();
            $users->set_firstname($row['firstname']);
            $users->set_lastname($row['lastname']);
            $users->set_mail($row['mail']);
            $users->set_phone($row['phone']);
            $users->set_dob($row['dob']);
            $users->set_gender($row['gender']);

            $users[] = $users;
        }

        return $users;
    }
}
?>