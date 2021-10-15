<!DOCTYPE html>
<html>
<head>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
			text-align: center;
			background-color: white;
			border-bottom: 2px solid #ebeded;
		}
		.menu span{
			padding-right: 50px;
		}
		.sp{
			width: 30%;
			float: left;
		}
		.dg{
			width: 15%;
			float: left;
		}
		.sl{
			width: 15%;
			float: left;
		}
		.tt{
			width: 15%;
			float: left;
		}
		.xoa{
			width: 15%;
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
		.items a{
			text-decoration: none;
		}
		.items button{
			color: red;
			float: right;
    		margin-left: 10px;
    		margin-top: 55px;
		}
		body {
			min-width: 100vh;
			margin: 0px;
			min-height: 580px;
		}
	</style>
</head>
<body>
	<div class="gio_hang">
		<p>GIỎ HÀNG CỦA BẠN</p>
		<div class="menu">
			<div class="sp">
				<span >Sản phẩm</span>
			</div>
			<div class="dg">
				<span >Đơn giá</span>
			</div>
			<div class="sl">
				<span >Số lượng</span>
			</div>
			<div class="tt">
				<span >Tổng tiền</span>
			</div>
			<div class="xoa">
				<span >Thao tác</span>
			</div>
			
		</div>
		<div class="items">
			<i class='far fa-frown' style='font-size:60px;color:#f5f4eb; margin: 0 auto;'></i>
			<br>
			<p style="text-align: center;">chưa có sản phẩm</p>
			<a href="index.php">
				<button>Mua hàng</button>
			</a>
			<a href="xem_hoa_don_chi_tiet.php">
					<button>Đơn hàng</button>
			</a>

		</div>
	</div>
</body>
</html>