<?php
    define('DB_SERVER', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_DATABASE', "swe");
 ?>

<?php

	require_once("Dbh.php");
	$database = Dbh::getInstance();

	$conn = new mysqli("localhost","root","","swe");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>