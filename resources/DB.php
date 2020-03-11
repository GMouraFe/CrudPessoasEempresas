<?php 
	define("DB_HOST", "127.0.0.1");
	define("DB_USER", "admin");
	define("DB_PASS", "SUSTAIN@ev3ris!");
	define("DB_DATABASE", "Catalogo");

	function connectToMyDB(){
		
		$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		return $connect;
	}	
?>