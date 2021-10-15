<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/khach-hang.css">
	<style type="text/css">
		.form_group {
			display: flex;
			min-width: 400px;
			margin-top: 10px;
		}

		.form_group label {
			padding-right: 10px;
			width: 20%;
			text-align: right;
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}

		.form_group .form_input {
			width: 70%;
		}

		.form_group .form_input input {
			font-size: .8rem;
			border-radius: 3px;
			border: 1px solid #dbdbdb;
			height: 25px;
			width: 181px;
			padding: 3px;
		}

		.form_button {
			margin-left: 290px;
			margin-top: 15px;
			width: 100px;
			height: 30px;
		}

		.gio_hang {
			width: 100%;
			background-color: #ebeded;
			height: 100%;
		}

		.items {
			padding: 10px;
			background-color: white;
			padding-top: 20px;
			width: 90%;
			height: 250px;
			margin: 0 auto;
			border-bottom: 2px solid #ebeded;
		}
	</style>
</head>

<body>
	<?php include 'header.php' ?>
	<?php include 'admin/common/connect.php' ?>

	<?php
	$sql = "select * from users";
	if (isset($_SESSION['ma_khach_hang'])) {
		$ma_khach_hang = $_SESSION['ma_khach_hang'];
		$sql = " $sql where ma ='$ma_khach_hang'";
	}


	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	?>
	<div class="gio_hang">
		<p>THÔNG TIN NGƯỜI NHẬN</p>
		<div class="items">
			<form action="xu_ly_dat_hang.php" method="post">
				<div class="form_group">
					<label>Tên: </label>
					<div class="form_input">
						<input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?php echo $each['username'] ?>">
						<span id="error_ten"></span>
					</div>
				</div>
				<div class="form_group">
					<label>SĐT: </label>
					<div class="form_input">
						<input type="number" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?php echo $each['sdt'] ?>">
					</div>
				</div>
				<div class="form_group">
					<label>Địa chỉ: </label>
					<div class="form_input">
						<input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?php echo $each['dia_chi'] ?>">
					</div>
				</div>
				<div class="form_button">
					<button style="color: red;" onclick="return check();" name="submit">Đặt hàng</button>
				</div>
			</form>
			<div>
				<a href="gio_hang.php">
					<button>Quay lại</button>
				</a>
			</div>
		</div>
	</div>
	<?php include 'footer.php' ?>
	<script>
		function check() {
			var ten_nguoi_nhan = document.getElementById('ten_nguoi_nhan').value;
			var dia_chi_nguoi_nhan = document.getElementById('dia_chi_nguoi_nhan').value;
			var sdt_nguoi_nhan = document.getElementById('sdt_nguoi_nhan').value;
			var ten_nguoi_nhan_regex = /^[A-Za-z ]+$/;

			if (ten_nguoi_nhan == '' || dia_chi_nguoi_nhan == '' || sdt_nguoi_nhan == '') {
				alert("bạn không được để trống!");
				return false;
			}
			if (ten_nguoi_nhan_regex.test(ten_nguoi_nhan)) {
				document.getElementById('error_ten').innerHTML = '';
			} else {
				document.getElementById('error_ten').innerHTML = 'Tên không hợp lệ !';
				return false;
			}
			return true;
		}
	</script>
</body>

</html>