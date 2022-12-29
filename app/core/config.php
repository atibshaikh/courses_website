<?php

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

define('APP_NAME', 'Udemy Clone');
define('APP_DESC', 'Learning Tutorial');


 

/*****
 * Database confif 
*/

if($_SERVER['SERVER_NAME'] == 'localhost'){

	define('DBHOST', 'localhost');
	define('DBNAME', 'udemy_db');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');

	//root Path for localhost
	define('ROOT', 'http://localhost/udemy/public');


}else{

	define('DBHOST', 'localhost');
	define('DBNAME', 'udemy_db');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');

	//root Path for Live server
	define('ROOT', 'https://www.wesbite.com');

}
