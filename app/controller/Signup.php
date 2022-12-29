<?php
/**
 * Signup Class
 */

class Signup extends Controller{

	public function index(){
		

		$data['errors'] = [];

		$user = new User();

		if($_SERVER['REQUEST_METHOD'] == "POST"){

			if($user->validate($_POST)){

				$_POST['date'] = date("Y-m-d H:i:s");
				$_POST['role'] = 'user';

				$user->insert($_POST);

				message("Your profile was successfuly created, Please login");
				redirect('login');
			}else{

				show("no validate");
			}

		}
		

		// $query = "insert into users (email,firstname,lastname,password,role,date) values (:email,:firstname,:lastname,:password,:role,:date)";

		// $arr['firstname'] = $_POST['firstname'];
		// $arr['lastname'] = $_POST['lastname'];
		// $arr['email'] = $_POST['email'];
		// $arr['password'] = $_POST['password'];
		// $arr['role'] = "user";
		// $arr['date'] = date("Y-m-d H:i:s");



		// $db = new Database();
		// $db->query($query, $arr);
		
		//show($user->errors);

		$data['errors'] = $user->errors;
		$data['title'] = "Signup";
		$this->view('signup', $data);

	}
	

}