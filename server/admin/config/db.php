<?php 
$conn = mysqli_connect('localhost','root','','appfood');
if($conn){
	echo"";
}else{
	echo'Kết nối thất bại';
}