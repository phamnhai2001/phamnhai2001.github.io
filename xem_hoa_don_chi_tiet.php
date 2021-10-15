<?php session_start(); ?>
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
			height: 105px;			
			margin: 0 auto;
			border-bottom: 2px solid #ebeded;
		}
		.anh{
			width: 25%;
			height: 50px;
			float: left;
		}
		.ten{
			width: 20%;
			height: 50px;
			float: left;
		}
		.gia{
			width: 20%;
			height: 50px;
			float: left;
		}
		.so_luong{
			width: 20%;
			height: 50px;
			float: left;
			display: inline-flex;
		}
		.tong_tien{
			width: 15%;
			height: 50px;
			float: left;
		}
		 a{
			text-decoration: none;
			color: red;
		}
		
		.mua_hang{
			width: 40%;
		}
		.mua_hang button{
			color:red;
		}
		.mua_hang a{
			text-decoration: none;
		}
		.tien{
			width: 60%;
			text-align: center;
		}
		body {
			min-width: 100vh;
			margin: 0px;
			min-height: auto;
		}
		
	</style>
</head>
<body>
	<?php include'header.php' ?>
	<?php 
	include'admin/common/connect.php'; 
	?>
	<div class="gio_hang">
		<p>ĐƠN HÀNG CỦA BẠN</p>
		<div class="menu">
			<div class="sp">
				<span ><b>Thời gian mua</b></span>
			</div>
			<div class="dg">
				<span ><b>Trạng thái</b></span>
			</div>
			<div class="sl">
				<span ><b>Thông tin người đặt</b></span>
			</div>
			<div class="tt">
				<span ><b>Thông tin người nhận</b></span>
			</div>
			<div class="xoa">
				<span ><b>Thao tác</b></span>
			</div>
			
		</div>
		<?php 
			if (isset($_SESSION['user']['ma'])) {
			$ma_khach_hang = $_SESSION['user']['ma'];
				$sql = "select
				hoa_don.*,
				users.username,
				users.sdt,
				users.dia_chi
				from hoa_don join users on users.ma = hoa_don.ma_khach_hang
				where hoa_don.ma_khach_hang = '$ma_khach_hang' order by trang_thai,ma_hoa_don DESC";
				$result = mysqli_query($connect,$sql);
		?>
		<?php foreach ($result as $each): ?> 	
		<div class="items">
			<div class="anh">
				<?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s') ?>
			</div>
			<div class="ten">
				<?php 
						if ($each['trang_thai']==1) {
							echo "Đang chờ duyệt";
						}
						else if ($each['trang_thai']==2){
							echo "Đã duyệt";
						}
						else{
							echo "Đã hủy";
						}
				?>
			</div>
			<div class="gia">
				<?php echo $each['username'] ?>
							<br>
						<?php echo $each['dia_chi'] ?>
							<br>
						<?php echo $each['sdt'] ?>
			</div>
			<div class="so_luong">
				<?php echo $each['ten_nguoi_nhan'] ?>
							<br>
						<?php echo $each['dia_chi_nguoi_nhan'] ?>
							<br>
						<?php echo $each['sdt_nguoi_nhan'] ?>
			</div>
			<div class="tong_tien">
				<a href="xem_chi_tiet.php?ma=<?php echo $each['ma_hoa_don'] ?>">
					Xem
				</a>
			</div>
		</div>
		<?php endforeach ?>

	<?php }else{ ?>

		<?php include'don_hang_trong.php' ?>
	<?php } ?>	
				<a href="gio_hang.php">
					<button style="margin-top: 10px; margin-bottom: 10px;">Quay lại</button>
				</a>
	</div>
<?php include'footer.php' ?>
</body>
</html>