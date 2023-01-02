<?php

/**
 * Admin class
 */
class Admin extends Controller{

	public function index(){

		if(!Auth::logged_in()){

			message('please login to view the admin section');
			redirect('login');
		}

		$data['title'] = "Dashboard";
		$this->view('admin/dashboard', $data);

	}


	public function profile($id = null){


		if(!Auth::logged_in()){

			message('please login to view the admin section');
			redirect('login');
		} 
		
		$id = $id ?? Auth::getId();

		$user = new User();
		$data['row'] = $row = $user->first(['id'=>$id]);

		if( $_SERVER['REQUEST_METHOD'] == "POST" && $row){

			$allowed = ['image/jpeg', 'image/png'];

			if(!empty($_FILES['image']['name'])){

				if($_FILES['image']['error'] == 0){

					if(in_array($_FILES['image']['type'], $allowed)){

						//everything good
					}
				}
			}

			$user->update($id, $_POST);
			redirect('admin/profile/'.$id);

		}

		$data['title'] = "Profile";
		$this->view('admin/profile', $data);

	}
	

}