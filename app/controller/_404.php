<?php 

/**
* 404 class page not fund
* 
*/

class _404 extends Controller{

	public function index(){
		
		$data['title'] = "404";
		$this->view('404', $data);

	}

}