<?php
$servername="localhost";
$username="root";
$password="password";
$db="inventory";

$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_errorno)
	die("Sorry we are having problems.");

?>
