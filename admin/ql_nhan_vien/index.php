<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.content_table{
			width: 100%;
			height: 100%;
			background-color: #F0F8FF;
		}
		.content_table a{
			text-decoration: none;
			color: black;
		}
		table {
			text-align: center;
			margin-top: 40px;
		}
		.name{
			border: 1px solid #8baee8;
			width: 150px;
			text-align: center;
			background-color: #a1bff0;
		}
	</style>
</head>
<body>
<div class="container">
		<?php include '../common/menu.php';
		$tim_kiem = ''?>
		<div class="main_content">
			<div class="header">
				<form class="search">
			    	<input type="search" name="tim_kiem" placeholder="Tìm kiếm nhân viên..." value="<?php echo $tim_kiem ?>">
			  	</form>
			</div>
			<div class="content">
				<div class="content_table">
				<a href="view_insert.php">
					<div class="name">Thêm nhân viên</div>
				</a>
				<?php 
				require '../common/connect.php';
				if(isset($_GET['tim_kiem'])){
					$tim_kiem = $_GET['tim_kiem'];
				}
				$sql = "select * from nhan_vien where nhan_vien.ten like '%$tim_kiem%'";
				$result = mysqli_query($connect, $sql);
				?>
				<?php if(mysqli_num_rows($result)==0){
					echo "<script> alert('Không tìm thấy kết quả nào !'); window.history.back(-1); </script>";
				} ?>
					<table width="100%" border="1">
						<tr>
							<th>
								Tên nhân viên
							</th>
							<th>
								Giới tính
							</th>
							<th>
								Email
							</th>
							<th>
								Địa chỉ
							</th>
							<th>
								Ngày sinh
							</th>
							<th>
								SĐT
							</th>
							<th>
								Thời gian bắt đầu làm việc
							</th>
							<th>
								Sửa
							</th>
							<th>
								Xóa
							</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<tr>
								<td>
									<?php echo $each['ten'] ?>
								</td>
								<td>
									<?php echo $each['gioi_tinh'] ?>
								</td>
								<td>
									<?php echo $each['email'] ?>
								</td>
								<td>
									<?php echo $each['dia_chi'] ?>
								</td>
								<td>
									<?php echo $each['ngay_sinh'] ?>
								</td>
								<td>
									<?php echo $each['sdt'] ?>
								</td>
								<td>
									<?php echo $each['thoi_gian_lam_viec'] ?>
								</td>
								<td>
									<a href="sua_nhan_vien.php?ma=<?php echo $each['ma']?>">
										<button>Sửa</button>
									</a>
								</td>
								<td>
									<a href="xoa_nhan_vien.php?ma=<?php echo $each['ma']?>">
										<button>Xóa</button>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
</body>
</html>