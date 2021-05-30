<?php 
require "connect.php";
/**
 * 
 */
class Sanpham 

{
	
	function Sanpham ($id, $idsanpham,$tensanpham,$hinhanhsanpham,$motasanpham,$giasanpham)
	

	{
	$this->ID = $id;
	$this->Tensanpham = $tensanpham;
	$this->Giasanpham = $giasanpham;
	$this->Hinhanhsanpham = $hinhanhsanpham;
	$this->Motasanpham = $motasanpham;
	$this->IDSanpham= $idsanpham;
	}
}
$mangsanpham = array();


if (isset($_POST['tukhoa'])) {
	$tukhoa = $_POST['tukhoa'];
	$query = "SELECT * FROM sanpham WHERE lower(tensanpham) LIKE '%tukhoa'";
	$data =  mysqli_query($conn,$query);
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangsanpham, new Sanpham(
			$row['$id'],
			$row['$tensanpham'],
			$row['$giasanpham'],
			$row['$hinhanhsanpham'],
			$row['$motasanpham'],
			$row['idsanpham']

	));
		
	
}
echo json_decode($mangsanpham);
}

 ?>
