<?php 
	$id = $_GET['id'];
	$sql_brand = "SELECT *FROM loaisanpham";
	$query_brand = mysqli_query($conn, $sql_brand);

	$sql_up ="SELECT * FROM sanpham WHERE id = $id";
	$query_up = mysqli_query($conn, $sql_up);
	$row_up = mysqli_fetch_assoc($query_up);
	if(isset($_POST['sbm'])){
		$tensanpham = $_POST['tensanpham'];

		if($_FILES['image']['name']==''){
			$image = $row_up['hinhanhsanpham'];
		}else{
			$image = $row_up['hinhanhsanpham'];
			//$image = $_FILES['image']['name'];
			//$image_tmp = $_FILES['image']['tmp_name'];
			//move_uploaded_file($image_tmp, 'img/'.$image);
		}

		$giasanpham = $_POST['giasanpham'];
		$motasanpham = $_POST['motasanpham'];
		$idsanpham = $_POST['idsanpham'];
		if($motasanpham != ''){
		$sql = "UPDATE sanpham SET tensanpham = '$tensanpham', hinhanhsanpham = '$image', giasanpham = '$giasanpham', motasanpham = '$motasanpham',idsanpham = '$idsanpham' WHERE id = $id";
		$query = mysqli_query($conn, $sql);
		move_uploaded_file($image_tmp, '../Images/'.$image);
		header('location: widgets.php?page_layout=danhsach');
	}
}
?>
<script src="../ckeditor/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Sửa sản phẩm</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" name="tensanpham" class="form-control" required value="<?php echo $row_up['tensanpham'];?>">
				</div>
				<br>
				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<input type="file" name="image"><br><br>
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="number" name="giasanpham" class="form-control" required value="<?php echo $row_up['giasanpham'];?>">
				</div>
				<div class="form-group">
					<label for="">Loại sản phẩm</label>
					<input type="number" name="idsanpham" class="form-control" required value="<?php echo $row_up['idsanpham'];?>">
				</div>

				<div class="form-group">
				<label for="">Mô tả sản phẩm</label>
				<textarea name="motasanpham" id="Article_editor"></textarea>
				</div>
				<button name="sbm" class="btn btn-success" type="submit">Sửa</button>
			</form>
		</div>
	</div>
</div>
<script>
		CKEDITOR.replace('Article_editor');
	</script>