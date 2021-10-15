
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/khach-hang.css">
	<style type="text/css">
		.gio_hang{
			width: 100%;
			background-color: #ebeded;
			height: 100%;
		}
		.menu{
			padding: 10px;
			width: 90%;
			margin: 0 auto;
			height: 30px;
			
			background-color: white;
			border-bottom: 2px solid #ebeded;
		}
		.menu span{
			padding-right: 80px;
		}
		.sp{
			width: 25%;
			float: left;
		}
		.dg{
			width: 20%;
			float: left;
		}
		.sl{
			width: 20%;
			float: left;
		}
		.tt{
			width: 20%;
			float: left;
		}
		.items{
			padding: 10px;
			background-color: white;
			padding-top: 20px;
			width: 90%;
			height: 205px;			
			margin: 0 auto;
			border-bottom: 2px solid #ebeded;
		}
		body {
			min-width: 100vh;
			margin: 0px;
			min-height: 580px;
		}
		
	</style>
</head>
<body>
	<?php 
	include'admin/common/connect.php'; 
	?>
		<div class="items">
				<p style="text-align: center; color: red">Bạn cần đăng nhập để xem được đơn hàng!</p>
				<a href="user/dang_nhap.php">
					<button style="margin-top: 10px; margin-bottom: 10px; margin: 0 auto;float: right;">Đăng nhập</button>
				</a>
		</div>
</body>
</html>