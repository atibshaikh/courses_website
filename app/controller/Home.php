<?php

class Home extends Controller{

	public function index(){
		
		
		// $allUSers = $db->query("SELECT * FROM `users`");
		// show($allUSers);

		$data['title'] = "This is home page";
		$this->view('home', $data);

	}
	

}