<?php 

spl_autoload_register(function($class_name){

	require "../app/models/".$class_name.".php";
	
});

//define all constant in config file
require "config.php";

//useful and repeate function in function file
require "functions.php";

//Database connection and creation of table in database file
require "database.php";


require "model.php";



//all cotroll related functionality in this file (E.g View templates)
require "controller.php";

//page router function here
require "app.php";