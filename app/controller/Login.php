<?php

class Login extends Controller{

	public function index(){
		
		// $allUSers = $db->query("SELECT * FROM `users`");
		// show($allUSers);

		$data['title'] = "Login";
		$this->view('login', $data);

	}
	

}