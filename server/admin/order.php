<?php
include('../form_xlilogin.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Panels</title>
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	<link href="../CSS/bootstrap.min.css" rel="stylesheet">
	<link href="../CSS/font-awesome.min.css" rel="stylesheet">
	<link href="../CSS/datepicker3.css" rel="stylesheet">
	<link href="../CSS/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../Images/user.jpg" class="img-responsive" width="50px;" height="50px;">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
				<?php endif ?>
			</div>
		</div>
	</div>
				</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="home.php"><em class="fa fa-dashboard">&nbsp;</em>B???ng ??i???u khi???n</a></li>
			<li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em>Qu???n l?? s???n ph???m</a></li>
			<li><a href="ql_brand.php"><em class="fa fa-calendar">&nbsp;</em>Qu???n l?? th????ng hi???u</a></li>
			<li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Qu???n l?? ng?????i d??ng</a></li>
			<li><a href="detail_order.php"><em class="fa fa-bar-chart">&nbsp;</em>Qu???n l?? ????n h??ng</a></li>
			<li><a href="elements.php"><em class="fa fa-toggle-off">&nbsp;</em>ADMIN</a></li>
			<li><a href="panels.php><em class="fa fa-clone">&nbsp;</em>Qu???n l?? danh m???c</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Order</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">TH??NG TIN KH??CH H??NG</h2>
				</div>
				<div class="panel-body text-left">
					<?php 
					$id = $_GET['id'];
					$conn = mysqli_connect("localhost", "root", "", "appfood");		
					$sql_order ="SELECT * FROM `donhang` WHERE `id` = ".$id."";
					$result_order = mysqli_query($conn, $sql_order);
					while($row_order = mysqli_fetch_assoc($result_order)){?>
						<p>T??n kh??ch h??ng: <?php echo $row_order['tenkhachhang'] ?></p>
						<p>S??? ??i???n tho???i: <?php echo $row_order['sodienthoai'] ?></p>
						<p>Email: <?php echo $row_order['email'] ?></p>
						<p>?????a ch???: <?php echo $row_order['diachi'] ?></p>
				<?php }?>
				</div>
			</div>
		</div>
		<a href="detail_order.php" class="btn btn-primary"> ????n h??ng</a>
		<div class="row">
			<div class="col-lg-12">
			<h2>Danh s??ch ????n h??ng</h2>
			<table class="table">
				<thead class="thead-dark">
			<tr>
			<th>STT</th>
			<th>M?? ????n h??ng</th>
			<th>M?? s???n ph???m</th>
			<th>T??n s???n ph???m</th>
			<th>Gi?? s???n ph???m</th>
			<th>S??? l?????ng s???n ph???m</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i = 1;
		$id = $_GET['id'];
		$conn = mysqli_connect("localhost", "root", "", "appfood");
		$sql ="SELECT * FROM `chitietdonhang` WHERE `madonhang` = ".$id." ORDER BY `id` ASC ";
		$ketqua = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($ketqua)){?>
			<tr>
			<td><?= $i++;?></td>
			<td><?= $row['madonhang'] ?></td>
			<td><?= $row['masanpham']?></td>
			<td><?= $row['tensanpham']?></td>
			<td><?= $row['giasanpham']?></td>
			<td><?= $row['soluongsanpham']?></td>
			<tr>
		<?php }
		?>
	</tbody>
				</table>
			
		</div><!--/.row-->
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	
        </div>
      </div>
      
			</div>
		</div><!--/.row-->		
	
		<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
