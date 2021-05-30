<?php 
	$id =$_GET['id'];
	$conn = mysqli_connect("localhost", "root", "", "banhanggiadung");
	$sql_brand = "DELETE FROM `brand` WHERE `brand`.`id` = ".$id."";
	$query_brand = mysqli_query($conn, $sql_brand);
	header('location: ../ql_brand.php');
	