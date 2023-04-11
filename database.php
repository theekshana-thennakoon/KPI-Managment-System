<?php
$servername = "localhost:3306";
$username = "flockups_fscs";
$password = "fscs@brandix";
$dbname = "flockups_fscs";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed" . $conn->connect_error);
}

?>