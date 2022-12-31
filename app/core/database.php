<?php

class Database{
	
	private function connect(){
		$str = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
		
		return  new PDO($str, DBUSER, DBPASS);
	}

	public function query($query, $data = [], $type = 'object'){
		$con = $this->connect();

		$stm = $con->prepare($query);

		if($stm){


			//example that shows how pdo insert query work
			/*
			 	$data = [
				    'name' => $name,
				    'surname' => $surname,
				    'sex' => $sex,
				];
				$sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
				$stmt= $pdo->prepare($sql);
				$stmt->execute($data);
			*/

			$check = $stm->execute($data);

			if($check){
				
				if($type != "object"){
					$type = PDO::FETCH_ASSOC;
				}else{
					$type = PDO::FETCH_OBJ;

				}
				$result = $stm->fetchAll($type);

				if(is_array($result) && count($result) > 0){
					return $result;
				}
			}
		}
		
		return false;
		
	}

	public function create_tables(){

		//user table

		$query = "

				CREATE TABLE IF NOT EXISTS `users` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
  				  `email` varchar(100) NOT NULL,
  				  `firstname` varchar(30) NOT NULL,
  				  `lastname` varchar(30) NOT NULL,
  				  `password` varchar(255) NOT NULL,
  				  `role` varchar(20) NOT NULL,
  				  `date` date DEFAULT NULL,
  				  `about` varchar(2048) DEFAULT NULL,
  				  `company` varchar(100) DEFAULT NULL,
  				  `job` varchar(100) DEFAULT NULL,
  				  `country` varchar(100) DEFAULT NULL,
  				  `address` varchar(1024) DEFAULT NULL,
  				  `phone` varchar(10) DEFAULT NULL,
  				  `slug` varchar(100) NOT NULL,
  				  PRIMARY KEY (`id`),
  				  KEY `email` (`email`),
  				  KEY `firstname` (`firstname`),
  				  KEY `lastname` (`lastname`),
  				  KEY `date` (`date`),
  				  KEY `slug` (`slug`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1

		";

		$this->query($query);
	}

}