<?php session_start() ?>
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
			text-align: center;
			background-color: white;
			border-bottom: 2px solid #ebeded;
		}
		.menu span{
			padding-right: 50px;
		}
		.sp{
			width: 20%;
			float: left;
		}
		.dg{
			width: 8%;
			float: left;
		}
		.sl{
			width: 32%;
			float: left;
		}
		.tt{
			width: 15%;
			float: left;
		}
		.xoa{
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
			width: 20%;
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
		.tong_tien_hang{
			padding-top: 10px;
			width: 92%;
			height: 30px;
			margin: 0 auto;
			border: 2px solid #ebeded;
			margin-top: 2px;
			background-color: white;
			display: flex;
		}
		.quay_lai{
			width: 40%;
		}
		.quay_lai a{
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
		.input-quantity {
			width: 20px;
			height: 20px;
			display: flex;
			justify-content: center;
			align-items: center;
			border: 1px solid #ebeded;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php include'header.php' ?>
		<?php if (!empty($_GET['ma'])) { ?>
	<?php 
	$ma = $_GET['ma'];	
	include'admin/common/connect.php'; 
	$sql = "select
	hoa_don_chi_tiet.*,
	san_pham.ten_san_pham,
	san_pham.anh
	from hoa_don_chi_tiet
	join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham where ma_hoa_don = '$ma'";
	$result = mysqli_query($connect,$sql);
	$thu_muc_anh = 'image/';
	$tong_tien=0;
	?>
	<div class="gio_hang">
		<p>ĐƠN HÀNG CHI TIẾT CỦA BẠN</p>
		<div class="menu">
			<div class="sp">
				<span><b>Sản phẩm</b></span>
			</div>
			<div class="dg">
				<span><b>Ảnh</b></span>
			</div>
			<div class="sl">
				<span><b>Số lượng</b></span>
			</div>
			<div class="tt">
				<span><b>Giá</b></span>
			</div>
			<div class="xoa">
				<span><b>Tổng tiền</b></span>
			</div>
			
		</div>
		<?php foreach ($result as $each): ?>
		<div class="items">
			<div class="anh">
				<?php echo $each['ten_san_pham'] ?>
			</div>
			<div class="ten">
				<img height="50px" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			</div>
			<div class="gia">
				<?php echo $each['so_luong'] ?>
			</div>
			<div class="so_luong">
				<?php echo number_format($each['gia']) ?> VNĐ
			</div>
			<div class="tong_tien">
				<?php echo number_format($each['so_luong'] * $each['gia']) ?>
				<?php $tong_tien+= $each['so_luong'] * $each['gia'] ?> VNĐ
			</div>
		</div>
		<?php endforeach ?>
		<div class="tong_tien_hang">
			<div class="tien">
				<b>Tổng tiền: <?php echo number_format($tong_tien) ?> VNĐ</b>
			</div>
			<div class="quay_lai">
				<a href="xem_hoa_don_chi_tiet.php">
					<button>Quay lại</button>
				</a>
			</div>
		</div>
	</div>
	<?php } else{ ?>
			<div class="gio_hang">
				<div class="details" style="text-align: center; color: red;">
					Hóa đơn không tồn tại!
				</div>
			</div>
		<?php } ?>	
	<?php include'footer.php' ?>
</body>
</html>