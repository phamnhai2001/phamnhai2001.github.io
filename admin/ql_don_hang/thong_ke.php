<?php include'../common/check_admin.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
</head>
<body>
<div class="container">
		<?php include '../common/menu.php' ?>
			<div class="main_content">
				<div class="header">
				</div>
				<div class="content" style="text-align: center;">
					<h2>Doanh thu của cửa hàng</h2>
					<?php 
						$ngay_bat_dau = $_POST['ngay_bat_dau'];
						$ngay_ket_thuc = $_POST['ngay_ket_thuc'];

						include "../common/connect.php";

						$sql = " select sum(if(hoa_don.trang_thai=2, hoa_don_chi_tiet.so_luong *hoa_don_chi_tiet.gia,0)) as doanh_thu_da_nhan,
						sum(if(hoa_don.trang_thai=1, hoa_don_chi_tiet.so_luong *hoa_don_chi_tiet.gia,0)) as doanh_thu_du_kien,
						sum(if(hoa_don.trang_thai=3, hoa_don_chi_tiet.so_luong *hoa_don_chi_tiet.gia,0)) as doanh_thu_bi_mat,
						sum(if(hoa_don.trang_thai=2, hoa_don_chi_tiet.so_luong,0)) as tong_so_san_pham_da_ban,
						sum(if(hoa_don.trang_thai=1, hoa_don_chi_tiet.so_luong,0)) as tong_so_san_pham_sap_ban
						 from hoa_don join hoa_don_chi_tiet on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma_hoa_don where thoi_gian_mua > '$ngay_bat_dau' and thoi_gian_mua < '$ngay_ket_thuc'";

						$result = mysqli_query($connect,$sql);
						$each = mysqli_fetch_array($result);
					 ?>
					 <table border="1px" width="100%">
					 	<tr>
					 		<th>Doanh thu đã nhận</th>
					 		<th>Doanh thu dự kiến</th>
					 		<th>Doanh thu bị mất</th>
					 		<th>Tổng số sản phẩm đã bán</th>
					 		<th>Tổng số sản phẩm sắp bán</th>
					 	</tr>
					 	<?php foreach ($result as $each): ?>
					 		<tr>
					 			<td>
					 				<?php echo number_format($each['doanh_thu_da_nhan']) ?> VNĐ
					 			</td>
					 			<td>
					 				<?php echo number_format($each['doanh_thu_du_kien']) ?> VNĐ
					 			</td>
					 			<td>
					 				<?php echo number_format($each['doanh_thu_bi_mat']) ?> VNĐ
					 			</td>
					 			<td>
					 				<?php echo $each['tong_so_san_pham_da_ban'] ?>
					 			</td>
					 			<td>
					 				<?php echo $each['tong_so_san_pham_sap_ban'] ?>
					 			</td>
					 		</tr>

					 	<?php endforeach ?>
					 </table>
				</div>
			</div>
</div>
</body>
</html>