<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		.form {
			padding: 20px 50px 50px 50px;
		}

		.form_group {
			display: flex;
			min-width: 400px;
			margin-top: 10px;
		}
		.form_group label {
			padding-right: 10px;
			width: 50%;
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
		.background{
			border: 1px solid;
		    width: 40%;
		    margin: 0 auto;
		    height: 215px;
		    border-radius: 15px;
		}
	</style>
</head>
<body>
	<?php
	$ma = $_SESSION['ma_khach_hang'] ?? '';
	?>
	<?php include '../admin/common/connect.php'; ?>
	<h1 align="center">Chỉnh sửa mật khẩu</h1>
<div class="background">
	<form class="form" method="post" action="process_sua_mat_khau.php">
		<!-- <table align="center" class="table"> -->
			<input hidden type="text" name="ma" value="<?php echo $ma ?>">
			<div class="form_group">
					<label>Nhập mật khẩu cũ: </label>
				<div class="form_input">
					<input type="password" name="mat_khau_cu">
				</div>
			</div>
			<?php if(isset($_GET['error'])) { ?>
						<p style="color: red; text-align: center; ">
							<?php echo $_GET['error'] ?>
						</p>
			<?php } ?>
			<div class="form_group">
					<label>Nhập mật khẩu mới : </label>
				<div class="form_input">
					<input type="password" name="mat_khau_moi">
				</div>
			</div>
			<div class="form_group">
					<label>Nhập lại mật khẩu mới : </label>
				<div class="form_input">
					<input type="password" name="nhap_lai_mat_khau">
				</div>
			</div>
		<div align="center" class="button">
			<button onclick="alert('Sửa mật khẩu thành công')" style="color: red;
    float: right; margin-top: 15px;">
				Cập nhật
			</button>
		</div>
	</form>
</div>
</body>
</html>