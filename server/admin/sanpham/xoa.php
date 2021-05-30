<?php 
	$id =$_GET['id'];
	$sql = "DELETE FROM sanpham WHERE id = $id";
	$query = mysqli_query($conn, $sql);
	header('location: widgets.php?page_layout=danhsach');
	