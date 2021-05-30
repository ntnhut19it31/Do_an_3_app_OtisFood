<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 <style type="text/css">
 	.fas{
 		font-size: 18px;
 	}
 	.fas.fa-edit{
 		color: green;
 	}
 	.fas.fa-trash-alt{
 		color: #DC143C;
 	}
 </style>
<?php
	$sql ="SELECT * FROM sanpham inner join loaisanpham on sanpham.idsanpham = loaisanpham.id";
	$query = mysqli_query($conn , $sql);
?>
 
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Danh sách sản phẩm</h2>
			<?php 
            $conn = mysqli_connect("localhost", "root", "", "appfood");
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $result = mysqli_query($conn, 'select count(id) as total from sanpham');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page']:1;
            $limit = 7;
            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
            $current_page = $total_page;
            }
            else if ($current_page < 1){
            $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
            // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");

                      ?>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Tên sản phẩm</th>
						<th>Giá sản phẩm</th>
						<th>Ảnh sản phẩm</th>
						<th>Mô tả</th>
						<th>Sửa</th>
						<th>Xóa</th>
						
					</tr>
				</thead>
				<tbody>
					<?php  
					$i = 1;
					while($row = mysqli_fetch_assoc($query)){?>
						<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['tensanpham']; ?></td>
						
						<td><?php echo $row['giasanpham']; ?></td>
						<td><img src="<?php echo $row['hinhanhsanpham'];?>" width="80px" hieght="80px"></td>
						
						<td><?php echo $row['motasanpham']; ?></td>
						<td>
						<a href="index.php?page_layout=sua&id=<?php echo $row['id'];?>"><i class="fas fa-edit"></i></a>
						</td>
						<td>
							<a onclick="return Del('<?php echo $row['tensanpham'];?>')" href="index.php?page_layout=xoa&id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt"></i></a>
						</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<a href="index.php?page_layout=them" class="btn btn-primary">Thêm mới</a>
		</div>
		<nav aria-label="..." id="page">
  <ul class="pagination">
<?php

// PHẦN HIỂN THỊ PHÂN TRANG
// BƯỚC 7: HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1){
echo '<li class="page-item disabled">
      <span class="page-link"><a href="widgets.php?page='.($current_page-1).'">Prev</a></span>
    </li>';
}
// Lặp khoảng giữa
for ($n = 1; $n <= $total_page; $n++){
// Nếu là trang hiện tại thì hiển thị thẻ span
// ngược lại hiển thị thẻ a
if ($n == $current_page){
echo '<li class="page-item"><a class="page-link"><span>'.$n.'</span></a></li> ';
}
else{
echo '<li class="page-item">
      <a class="page-link" href="widgets.php?page='.$n.'">'.$n.'
        <span class="sr-only"></span></a>
    </li>  ';
}
}
// nếu current_page < $total_page và total_page > 1 mới hiển thị

if ($current_page < $total_page && $total_page > 1){
echo '<li class="page-item">
      <a class="page-link" href="widgets.php?page='.($current_page+1).'">Next</a>
    </li>';
}
?>
</ul>
</nav>
	</div>
</div>
<script>
	function Del(name){
		return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name +"?");
	}
</script>