<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.form {
			padding: 20px 50px 50px 50px;
		}

		.form-group {
			display: flex;
			min-width: 400px;
			margin-top: 10px;
		}
		.form-group label {
			padding-right: 10px;
			width: 20%;
			text-align: right;
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}
		.form-group .form-input {
			width: 70%;
		}

		.form-group .form-input input {
			font-size: .8rem;
		    border-radius: 3px;
		    border: 1px solid #dbdbdb;
		    height: 25px;
		    width: 181px;
		    padding: 3px;
		}
		.button-container button{
			margin-left: 160px;
			margin-top: 15px;
			background-color: #6699CC;
			border: 1px solid #5072A7;
			color: white;
			width: 50px;
			height: 30px;
		}
	</style>
</head>
<body>
	<?php if (!empty($_GET['ma'])) { ?>
			<div id="main_content">
			<?php
				$ma = $_GET['ma'];
				require '../common/connect.php';
				$sql = "select * from nhan_vien where ma = '$ma'";
				$result = mysqli_query($connect, $sql);
				$each = mysqli_fetch_array($result);
				$dem = mysqli_num_rows($result);
			?>
			<?php if($dem == 0){
				echo "<script> alert('Không tìm thấy nhân viên nào !'); window.history.back(-1); </script>";
			} ?>
			<div class="container">
				<?php include '../common/menu.php' ?>
				<div class="main_content">
					<div class="header">
						
					</div>
					<div class="content">

						<form class="form" method="post" action="process_update.php">
							<div class="form-group">
									<label>Tên nhân viên: </label>
									<div class="form-input">
										<input type="text" name="ten" value="<?php echo $each['ten'] ?>">
									</div>
							</div>
							<div class="form-group">
								<label>Giới tính: </label>
								<div class="form-input">
									<input type="text" name="gioi_tinh" value="<?php echo $each['gioi_tinh'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Email: </label>
								<div class="form-input">
									<input type="email" name="email" value="<?php echo $each['email'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Địa chỉ: </label>
								<div class="form-input">
									<input type="text" name="dia_chi" value="<?php echo $each['dia_chi'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Ngày sinh: </label>
								<div class="form-input">
									<input type="date" name="ngay_sinh" value = "<?php echo $each['ngay_sinh']?>">
								</div>
							</div>
							<div class="form-group">
								<label>SĐT: </label>
								<div class="form-input">
									<input type="number" name="sdt" value = "<?php echo $each['sdt']?>">
								</div>
							</div>
							<div class="form-group">
								<label>Bắt đầu làm việc: </label>
								<div class="form-input">
									<input type="date" name="thoi_gian_lam_viec" value ="<?php echo $each['thoi_gian_lam_viec']?>">
								</div>
							</div>
								<div class="button-container">
									<button>Sửa</button>
								</div>
								<input type="hidden" name="ma" value="<?php echo $ma ?>">
								
						</form>
					</div>
<?php mysqli_close($connect) ?>
				</div>
				<?php } else{ ?>
			<div class="main_content">
				<div class="details" style="text-align: center; color: red;">
					Không tìm thấy trang yêu cầu!
				</div>
			</div>
		<?php } ?>
			</div>
</body>
</html>