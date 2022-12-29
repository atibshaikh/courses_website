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

	];

	public function validate($data){
		


			if(empty($data['firstname'])){

				$this->errors['firstname'] = "A firstname is required";

			}

			if(empty($data['lastname'])){

				$this->errors['lastname'] = "A lastname is required";

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
	

}