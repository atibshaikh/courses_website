<?php
/**
 * Users Class
 */

class User extends Model{

	public $errors = [];
	protected $table = "users";

	protected $allowedColumns = [

		'email',
		'firstname',
		'lastname',
		'password',
		'role',
		'date',
		'image',
		'about',
		'company',
		'job',
		'country',
		'address',
		'phone',
		'slug',
		'facebook_link',
		'instagram_link',
		'twitter_link',
		'linkedin_link',

	];

	public function validate($data){
		
		if(empty($data['firstname'])){

			$this->errors['firstname'] = "A firstname is required";

		}else if( !preg_match("/^[a-zA-z]+$/", trim($data['firstname'])) ){
			$this->errors['firstname'] = "A firstname can only have letters without spaces";

		}

		if(empty($data['lastname'])){

			$this->errors['lastname'] = "A lastname is required";

		}else if( !preg_match("/^[a-zA-z]+$/", trim($data['lastname'])) ){
			$this->errors['lastname'] = "A lastname can only have letters without spaces";

		}


		//check email

		//$query = "SELECT * from users where email = :email limit 1";

		if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL )){

			$this->errors['email'] = "email is not Valid";

		}else if($this->where(['email' => $data['email']] )){

			$this->errors['email'] = "The email already exists";

		}

		// if(empty($data['username'])){

		// 	$this->errors['username'] = "A username is required";

		// }

		if(empty($data['password'])){

			$this->errors['password'] = "A password is required";

		}

		if(!empty($data['password']) && !empty($data['retype_password'])){

			if($data['password'] !== $data['retype_password']  ){

				$this->errors['password'] = "Password do not matched";
				
			}
		}


		if(empty($data['terms'])){

			$this->errors['terms'] = "Please accepts the terms and conditions";

		}

		//show($this->errors);

		if(empty($this->errors)){
			return true;					
		}	

		return false;

	}


	public function edit_validate($data){
		
		if(empty($data['firstname'])){

			$this->errors['firstname'] = "A firstname is required";

		}else if( !preg_match("/^[a-zA-z]+$/", trim($data['firstname'])) ){
			$this->errors['firstname'] = "A firstname can only have letters without spaces";

		}

		if(empty($data['lastname'])){

			$this->errors['lastname'] = "A lastname is required";

		}else if( !preg_match("/^[a-zA-z]+$/", trim($data['lastname'])) ){
			$this->errors['lastname'] = "A lastname can only have letters without spaces";

		}

		if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL )){

			$this->errors['email'] = "email is not Valid";

		}else if($this->where(['email' => $data['email']] )){

			$this->errors['email'] = "The email already exists";

		}

		if(!empty($data['phone'])){

			if(!filter_var($data['phone'],FILTER_VALIDATE_URL)){

				$this->errors['phone'] = "facebook link is not valid";

			}
		}

		if(!empty($data['facebook_link'])){

			if(!filter_var($data['facebook_link'],FILTER_VALIDATE_URL)){

				$this->errors['facebook_link'] = "facebook link is not valid";

			}
		}

		if(!empty($data['instagram_link'])){

			if(!filter_var($data['instagram_link'],FILTER_VALIDATE_URL)){

				$this->errors['instagram_link'] = "Instagram link is not valid";

			}
		}

		if(!empty($data['twitter_link'])){

			if(!filter_var($data['twitter_link'],FILTER_VALIDATE_URL)){

				$this->errors['twitter_link'] = "Twitter link is not valid";

			}
		}

		if(!empty($data['linkedin_link'])){

			if(!filter_var($data['linkedin_link'],FILTER_VALIDATE_URL)){

				$this->errors['linkedin_link'] = "Linkedin link is not valid";

			}
		}

		//show($this->errors);

		if(empty($this->errors)){
			return true;					
		}	

		return false;

	}
	

}