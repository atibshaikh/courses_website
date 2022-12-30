<?php

class Login extends Controller{

	public function index(){
		
		// $allUSers = $db->query("SELECT * FROM `users`");
		// show($allUSers);

		$data['errors'] = [];

		$data['title'] = "Login";

		$user = new User();


		if($_SERVER['REQUEST_METHOD'] == "POST"){

			//valdiate function

			$row = $user->first([
				'email'=> $_POST['email'],
			]);

			//show($row);

			if($row){


				if( password_verify($_POST['password'], $row->password) ){

					//authenticate user
					Auth::authenticate($row);

					$_SESSION['USER_DATA'] = $row;

					// show($_SESSION);					
					redirect('home');
				}
			}		

			$data['errors']['email'] = "Wrong Email or password";

		}
		$this->view('login', $data);

	}
	

}