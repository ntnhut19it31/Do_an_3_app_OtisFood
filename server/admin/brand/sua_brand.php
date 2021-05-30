<?php 
$id = $_GET['id'];
	$conn = mysqli_connect("localhost", "root", "", "banhanggiadung");
	if(isset($_POST['sbm'])){
		$ten = $_POST['ten'];

		$sql_brand1 = "UPDATE brand SET ten = '$ten' WHERE id=".$id."";
		$query_brand = mysqli_query($conn, $sql_brand1);
		header('location: ../ql_brand.php');
	}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>THÊM THƯƠNG HIỆU</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Tên thương hiệu</label>
					<input type="text" name="ten" class="form-control" required>
				</div>
				

				<button name="sbm" class="btn btn-success" type="submit">Sửa</button>
			</form>
		</div>
	</div>
</div>
