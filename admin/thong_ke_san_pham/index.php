<?php include'../common/check_admin.php' ?>
<?php
// Lấy ngày hiện tại
	$ngay_ket_thuc = date('Y-m-d');
	$ngay_bat_dau = strtotime(date("Y-m-d", strtotime($ngay_ket_thuc)) . " -2 month");
	$ngay_bat_dau = strftime("%Y-%m-%d", $ngay_bat_dau);
	if (isset($_GET['ngay_bat_dau']) && isset($_GET['ngay_ket_thuc'])) {
		$ngay_bat_dau = $_GET['ngay_bat_dau'];
		$ngay_ket_thuc = $_GET['ngay_ket_thuc'];
	}

	$thu_muc_anh = '../../image/';
	include "../common/connect.php";

	$sql = "select san_pham.*, sum(hoa_don_chi_tiet.so_luong) as so_luong from hoa_don join hoa_don_chi_tiet on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma_hoa_don join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham where trang_thai = 2 and thoi_gian_mua > '$ngay_bat_dau' and thoi_gian_mua < '$ngay_ket_thuc' group by hoa_don_chi_tiet.ma_san_pham order by sum(hoa_don_chi_tiet.so_luong)";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);

	$tong_san_pham = mysqli_num_rows($result);
	$san_pham_1_trang = 6;

	$tong_so_trang = ceil($tong_san_pham / $san_pham_1_trang);

	$trang_hien_tai = 1;
	if(isset($_GET['trang'])){
		$trang_hien_tai = $_GET['trang'];
	}
		
	$san_pham_bo_qua = ($trang_hien_tai - 1) * $san_pham_1_trang;

	$sql =  "$sql limit $san_pham_1_trang offset $san_pham_bo_qua";
	$result = mysqli_query($connect,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.phan_trang a{
			text-decoration: none;
			color: black;
			border: 1px solid;
			float: left;
    		margin-left: 10px;
    		width: 18px;
    		text-align: center;
    		margin-top: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php include '../common/menu.php' ?>
			<div class="main_content">
				<div class="header">
					
				</div>
				<div class="content" style="text-align: center;">
					<form>
						<input type="date" name="ngay_bat_dau" value="<?php echo $ngay_bat_dau ?>">
						<input type="date" name="ngay_ket_thuc" value="<?php echo $ngay_ket_thuc ?>">
						<button>Thống kê</button>
					</form>
					<h2>SẢN PHẨM ĐÃ BÁN</h2>
					<table border="1px" width="100%">
						<tr>
							<th>Tên sản phẩm</th>
							<th>Giá</th>
							<th>Mô tả</th>
							<th>Ảnh</th>
							<th>Số lượng</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<?php $imageUrl = $thu_muc_anh . $each['anh'] ?>
						<tr>
							<td>
								<?php echo $each['ten_san_pham'] ?>
							</td>
							<td>
								<?php echo number_format($each['gia']) ?> VNĐ
							</td>
							<td>
								<?php echo $each['mo_ta'] ?>
							</td>
							<td>
								<img height="50px" src="<?php echo $imageUrl ?>">
							</td>
							<td>
								<?php echo $each['so_luong'] ?>
							</td>
						</tr>
						<?php endforeach ?>
					</table>
					<div class="phan_trang">
						<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
							<span>
							<?php for($i = 1; $i <= $tong_so_trang; $i++){?>
								<a href="?trang=<?php echo $i ?>&ngay_bat_dau=<?php echo $ngay_bat_dau ?>&ngay_ket_thuc=<?php echo $ngay_ket_thuc; ?>">
									<?php echo $i ?>
								</a>
							<?php } ?>
						</span>
					</div>
				</div>
			</div>
	</div>
<?php mysqli_close($connect) ?>
</body>
</html>