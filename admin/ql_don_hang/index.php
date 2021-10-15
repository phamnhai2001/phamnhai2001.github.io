<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lí hóa đơn</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.content a{
			text-decoration: none;
		}
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
					<form class="search">
				    	<input type="search" name="tim_kiem" placeholder="Tìm kiếm hóa đơn..."/>
				  	</form>
				</div>
				<div class="content">
					<form action="thong_ke.php" method="post">
					 	<input type="date" name="ngay_bat_dau">
					 	<input type="date" name="ngay_ket_thuc">

					 	<button>Thống kê</button>
					 </form>
					<?php 
					include "../common/connect.php";
					$tim_kiem = '';
					if(isset($_GET['tim_kiem'])){
						$tim_kiem = $_GET['tim_kiem'];
					}
					$sql = "select
					hoa_don.*,
					users.username,
					users.sdt,
					users.dia_chi
					from hoa_don join users on users.ma = hoa_don.ma_khach_hang where users.username like '%$tim_kiem%' order by trang_thai,ma_hoa_don DESC";
					$result = mysqli_query($connect,$sql);

					$tong_hoa_don = mysqli_num_rows($result);
					$hoa_don_1_trang = 6;

					$tong_so_trang = ceil($tong_hoa_don / $hoa_don_1_trang);

					$trang_hien_tai = 1;
					if(isset($_GET['trang'])){
						$trang_hien_tai = $_GET['trang'];
					}
						
					$hoa_don_bo_qua = ($trang_hien_tai - 1) * $hoa_don_1_trang;

					$sql =  "$sql limit $hoa_don_1_trang offset $hoa_don_bo_qua";
						$result = mysqli_query($connect,$sql);
					?>
					<?php if(mysqli_num_rows($result)==0){
					echo "<script> alert('Không tìm thấy hóa đơn nào !'); window.history.back(-1); </script>";
				} ?>
					<h1 style="margin-top: 0px;">
						<?php echo $tong_hoa_don ?> hóa đơn
					</h1>
					<table width="100%" border="1">
						<tr>
							<th>
								Thời gian mua
							</th>
							<th>
								Trạng thái
							</th>
							<th>
								Thông tin người đặt
							</th>
							<th>
								Thông tin người nhận
							</th>
							<th>
								Sửa trạng thái
							</th>
							<th>
								Xem chi tiết
							</th>
						</tr>
						<?php foreach ($result as $each): ?> 
							<tr>
								<td>
									<?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s') ?>
								</td>
								<td>
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
								</td>
								<td>
									<?php echo $each['username'] ?>
									<br>
									<?php echo $each['dia_chi'] ?>
									<br>
									<?php echo $each['sdt'] ?>
								</td>
								<td>
									<?php echo $each['ten_nguoi_nhan'] ?>
									<br>
									<?php echo $each['dia_chi_nguoi_nhan'] ?>
									<br>
									<?php echo $each['sdt_nguoi_nhan'] ?>
								</td>
								<td>
									<?php if ($each['trang_thai']==1) { ?>
										<a href="update_trang_thai.php?ma=<?php echo $each['ma_hoa_don'] ?>&trang_thai=2">
											<button>Duyệt</button>
										</a>
											<a href="update_trang_thai.php?ma=<?php echo $each['ma_hoa_don'] ?>&trang_thai=3">
											<button>Hủy</button>
										</a>
									<?php } ?>
								</td>
								<td>
									<a href="xem_chi_tiet_don_hang.php?ma=<?php echo $each['ma_hoa_don'] ?>">
										<button>Xem</button>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
					<div class="phan_trang">
						<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
						<span>
							<?php for($i = 1; $i <= $tong_so_trang; $i++){?>
								<a href="?trang=<?php echo $i ?>">
									<?php echo $i ?>
								</a>
							<?php } ?>
						</span>
					</div>
				</div>
			</div>
<?php mysqli_close($connect) ?>
</body>
</html>