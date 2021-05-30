<?php 

$sname = "localhost";
$user ="root";
$password ="";

$db_name = "appfood";
$conn = mysqli_connect($sname, $user, $password, $db_name);
if(!$conn){
	echo "connection failed!";
}
?>