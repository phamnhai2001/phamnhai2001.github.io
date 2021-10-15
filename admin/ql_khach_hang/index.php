<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
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
		<?php include '../common/menu.php';
		$tim_kiem = '' ?>
			<div class="main_content">
				<div class="header">
					<form class="search">
				    	<input type="search" name="tim_kiem" placeholder="Tìm kiếm khách hàng..." value="<?php echo $tim_kiem ?>">
				  	</form>
				</div>
				<div class="content">
					<?php 
					require '../common/connect.php';
					if(isset($_GET['tim_kiem'])){
						$tim_kiem = $_GET['tim_kiem'];
					}
					$sql = "select * from users where users.username like '%$tim_kiem%'";
					$result = mysqli_query($connect, $sql);

						$tong_khach_hang = mysqli_num_rows($result);
						$khach_hang_1_trang = 20;
						//tính số trang cần phải hiển thị
						$tong_so_trang = ceil($tong_khach_hang / $khach_hang_1_trang);

						$trang_hien_tai = 1;
						if(isset($_GET['trang'])){
							$trang_hien_tai = $_GET['trang'];
						}
						
						$khach_hang_bo_qua = ($trang_hien_tai - 1) * $khach_hang_1_trang;
						//hiển thị sản phẩm
						$sql =  "$sql limit $khach_hang_1_trang offset $khach_hang_bo_qua";
						$result = mysqli_query($connect,$sql);
					?>
					<?php if(mysqli_num_rows($result)==0){
					echo "<script> alert('Không tìm thấy kết quả nào !'); window.history.back(-1); </script>";
				} ?>
						<h1>
							<?php echo $tong_khach_hang ?> khách hàng
						</h1>
						<table width="100%" border="1">
							<tr>
								<th>
									Tên khách hàng
								</th>
								<th>
									Số điện thoại
								</th>
								<th>
									Địa chỉ
								</th>
								<th>
									Email
								</th>
								
							</tr>
							<?php foreach ($result as $each): ?>
									<tr>
										<td>
											<?php echo $each['username'] ?>
										</td>
										<td>
											<?php echo $each['sdt'] ?>
										</td>
										<td>
											<?php echo $each['dia_chi'] ?>
										</td>
										<td>
											<?php echo $each['email'] ?>
										</td>
										
									</tr>
							<?php endforeach ?>
						</table>
						<div class="phan_trang">
							<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
							<span>
								<?php for($i = 1; $i <= $tong_so_trang; $i++){?>
									<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem?>">
										<?php echo $i ?>
									</a>
								<?php } ?>
							</span>
						</div>
				</div>
			</div>
		</div>
</body>
</html>