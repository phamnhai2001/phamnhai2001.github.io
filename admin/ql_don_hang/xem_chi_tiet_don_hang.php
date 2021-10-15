<?php include'../common/check_admin.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Xem chi tiết đơn hàng</title>
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container">
		<?php include '../common/menu.php' ?>
		<?php if (!empty($_GET['ma'])) { ?>
			<div id="main_content">
			<div class="main_content">
				<div class="header">
					
				</div>
				<div class="content">
					<h2 style="text-align: center;">Đơn hàng của bạn</h2>
					<?php 
					$ma = $_GET['ma'];
					include "../common/connect.php";
					$sql = "select
					hoa_don_chi_tiet.*,
					san_pham.ten_san_pham,
					san_pham.anh
					from hoa_don_chi_tiet 
					join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham where ma_hoa_don = '$ma'";
					$result = mysqli_query($connect,$sql);
					$thu_muc_anh = '../../image/';
					$tong_tien=0;
					$dem = mysqli_num_rows($result);
					?>
					<?php if($dem == 0){
						echo "<script> alert('Không tìm thấy sản phẩm nào !'); window.history.back(-1); </script>";
					} ?>
					<table width="100%" border="1">
						<tr>
							<th>
								Tên sản phẩm
							</th>
							<th>
								Ảnh
							</th>
							<th>
								Số lượng
							</th>
							<th>
								Giá
							</th>
							<th>
								Tổng tiền
							</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<?php $imageUrl = $thu_muc_anh . $each['anh'] ?>
							<tr>
								<td>
									<?php echo $each['ten_san_pham'] ?>
								</td>
								<td>
									<img height="50px" src="<?php echo $imageUrl ?>">
								</td>
								<td>
									<?php echo $each['so_luong'] ?>
								</td>
								<td>
									<?php echo number_format($each['gia']) ?>đ
								</td>
								<td>
									<?php echo number_format($each['so_luong'] * $each['gia']) ?>đ
									<?php $tong_tien += $each['so_luong'] * $each['gia'] ?>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
					<h1>
						Tổng tiền: <?php echo number_format($tong_tien) ?>đ
					</h1>
				<a href="index.php">
					<button>Quay lại</button>
				</a>
<?php mysqli_close($connect) ?>
				</div>
			</div>
		<?php } else{ ?>
			<div class="div_content">
				<div class="details" style="text-align: center; color: red;">
					Sản phẩm không tồn tại!
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>