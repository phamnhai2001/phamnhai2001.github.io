<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
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
		.background{
			border: 1px solid;
		    width: 30%;
		    margin: 0 auto;
		    height: 270px;
		    border-radius: 15px;
		}
	</style>	
</head>
<body>

	<h1 style="text-align: center;">Thông tin cá nhân</h1>
	<?php 
		if (isset($_SESSION['user']['ma'])) {
			$ma = $_SESSION['user']['ma'];
		} else{
			header("location:dang_nhap.php");
		}

		include'../admin/common/connect.php';

		$sql = "select * from users where ma='$ma'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
	 ?>
<div class="background">	
	<form  onsubmit="return check();" action="thay_doi_thong_tin.php" method="post">
			<input type="hidden" name="ma" value="<?php echo $ma ?>">
			<div class="form_group">
					<label>Tên: </label>
				<div class="form_input">
					<input type="text" id="ten" name="username" value="<?php echo $each['username'] ?>">
					<span id="error_ten"></span>
				</div>
			</div>
			<div class="form_group">
					<label>SĐT: </label>
				<div class="form_input">
					<input type="number" id="sdt" name="sdt" value="<?php echo $each['sdt'] ?>">
				</div>
			</div>
			<div class="form_group">
					<label>Email: </label>
				<div class="form_input">
					<input type="email" id="email" name="email" value="<?php echo $each['email'] ?>">
				</div>
			</div>
			<div class="form_group">
					<label>Địa chỉ: </label>
				<div class="form_input">
					<input type="text" name="dia_chi" id="dia_chi" value="<?php echo $each['dia_chi'] ?>">
				</div>
			</div>
			<div class="form_button">
				<button name="submit" style="margin-left: 190px;
    margin-top: 20px; color: red;">Lưu thay đổi</button>
			</div>
		</form>
		<div style="margin-top: 20px;">
			<a href="thay_doi_mat_khau.php">
				<button style="margin-left: 8px;">Cập nhật mật khẩu</button>
			</a>
		</div>

		<script>
			function check(){
				var ten = document.getElementById('ten').value;
				var sdt = document.getElementById('sdt').value;
				var email = document.getElementById('email').value;
				var dia_chi = document.getElementById('dia_chi').value;
				var ten_regex = /^[A-Za-z ]+$/;

				if (ten==''||sdt==''||email==''||dia_chi=='') {
					alert("Thông tin sửa không được để trống!");
					return false;
				}
				if (ten_regex.test(ten)) {
					document.getElementById('error_ten').innerHTML = '';
				} else {
					document.getElementById('error_ten').innerHTML = 'Tên không hợp lệ!';
					return false;
				}
				return true;
			}

		</script>
</div>
</body>
</html>