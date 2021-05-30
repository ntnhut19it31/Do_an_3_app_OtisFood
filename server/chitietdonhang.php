<?php
	 include "connect.php";
	  $json = '[{"madonhang":"2","masanpham":2,"tensanpham":"TOKIBOKI","giasanpham":12000,"soluongsanpham":2},{"madonhang":"3","masanpham":3,"tensanpham":"Trà sữa trân châu đường đen","giasanpham":12000,"soluongsanpham":2}]';
	  $data = json_decode($json,true);
	  foreach ($data as $value) {
			$madonhang = $value['madonhang'];
			$masanpham = $value['masanpham'];
			$tensanpham = $value['tensanpham'];
			$giasanpham	= $value['giasanpham'];
			$soluongsanpham = $value['soluongsanpham'];
			$query = "INSERT INTO chitietdonhang (id,madonhang,masanpham,tensanpham,giasanpham,soluongsanpham)
					VALUES (null,'$madonhang','$masanpham','$tensanpham','$giasanpham','$soluongsanpham')";
			$Dta = mysqli_query($conn,$query); 
	  }
	  if ($Dta) {
	  	echo "1";
	  }else{
	  	echo "0";
	  }
?>