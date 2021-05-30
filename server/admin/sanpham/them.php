<?php 
	$sql_brand = "SELECT *FROM loaisanpham";
	$query_brand = mysqli_query($conn, $sql_brand);
	if(isset($_POST['sbm'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanhsanpham = $_POST['hinhanhsanpham'];

		$giasanpham = $_POST['giasanpham'];
		
		$motasanpham = $_POST['motasanpham'];
		$idsanpham = $_POST['idsanpham'];
		if($motasanpham != ''){
		$sql = "INSERT INTO sanpham (tensanpham, hinhanhsanpham, giasanpham, motasanpham, idsanpham) VALUES ('$tensanpham', '$hinhanhsanpham', $giasanpham, '$motasanpham', $idsanpham)";
		$query = mysqli_query($conn, $sql);
		
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
			<h2>Thêm sản phẩm</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" name="tensanpham" class="form-control" required>
				</div>
				<br>
				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<input type="text" name="hinhanhsanpham"><br><br>
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="number" name="giasanpham" class="form-control" required>
				</div>

				
				<div class="form-group">
					<label for="">Loại sản phẩm</label>
					<input type="number" name="idsanpham" class="form-control" required>
				</div>

				<div class="form-group">
				<label for="">Mô tả sản phẩm</label>
				<textarea name="motasanpham" id="Article_editor"></textarea>
				</div>
				<button name="sbm" class="btn btn-success" type="submit">Thêm</button>
				 <button type="button" class="btn btn-success" data-dismiss="modal">Hủy bỏ</button>
			</form>
		</div>
	</div>
</div>
<script>
		CKEDITOR.replace('Article_editor');
	</script>