<?php 
	require_once ('config/db.php');
	$id =$_GET['id'];
	$sql = "DELETE FROM `order` WHERE `order`.`id` = ".$id."";
	$query = mysqli_query($conn, $sql);
	header('location: detail_order.php');
	