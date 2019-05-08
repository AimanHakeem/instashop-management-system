<?php
$host = "localhost";
$db_name = "instashop";
$db_usr = "root";
$db_pass = "";

try{
	$con = new PDO ("mysql:host={$host};dbname={$db_name}", $db_usr, $db_pass);
	
}
catch(PDOException $exception){
	echo "Error:". $exception;
}
?>