<!DOCTYPE html>
<html>
<head>
	<title>Đăng kí tài khoản</title>
	<meta charset="utf-8">
	<style type="text/css">
		.style-sign-in table{
			border: 1px solid ;
			border-radius: 10px;
			height: 250px;
			width: 30%;
			margin: 0 auto;
			background-color: #f5f4f0;
			text-align: center;
		}
		.style-sign-in p{
			text-align: center;
			font-size: 25px;
		}
		.style-sign-in button{
			background-color: #89CFF0;
			border: 1px solid #ACE5EE;
		}
	</style>
</head>
<body>
	<?php
	require_once("../admin/common/connect.php");
	if (isset($_POST["submit"])){
		//láy thông tin từ form
		$username = $_POST['username'];
		$sdt = $_POST['sdt'];
		$dia_chi = $_POST['dia_chi'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// $repassword = $_POST['repassword'];
		//kiểm tra ô không được bỏ trống
		if ($username=='' || $sdt=='' || $dia_chi=='' || $email==''|| $password=='') {
			echo "bạn phải điền đầy đủ thông tin !";
		} else {
			//kiểm tra tài khoản đã tồn tại chưa
			$sql = "select * from users where username = '$username'";
			$kiem_tra = mysqli_query($connect,$sql);

			if (mysqli_num_rows($kiem_tra) > 0) {
				echo "tài khoản đã tồn tại !";
			} else {
				//lưu dữ liệu vào database
				$sql = "insert into users(username,sdt,dia_chi,email,password)
				values ('$username', '$sdt', '$dia_chi', '$email', '$password')"; 

				mysqli_query($connect,$sql);
				header("location:dang_nhap.php");
			}
		}
	}
	?>
	<div id="background">
		<form onsubmit="return check();" class="style-sign-in" method="post" action="dang_ky.php">
				<p>	
					<b>
					ĐĂNG KÝ
					</b>
				</p>
			<table>
				<tr>
					<td>
						<b>
						Username:
						</b>
					</td>
					<td>
						<input type="text" id="username" name="username">
						<span id="error_name"></span>
					</td>
				</tr>
				<tr>
					<td>
						<b>
						SĐT:
						</b>
					</td>
					<td>
						<input type="text" id="sdt" name="sdt">
						<span id="error_sdt"></span>
					</td>
				</tr>
				<tr>
					<td>
						<b>
						Địa chỉ:
						</b>
					</td>
					<td>
						<input type="text" id="dia_chi" name="dia_chi">
					</td>
				</tr>
				<tr>
					<td>
						<b>
						Email:
						</b>
					</td>
					<td>
						<input type="email" id="email" name="email">
					</td>
				</tr>
				<tr>
					<td>
						<b>
						Password:
						</b>
					</td>
					<td>
						<input type="password" id="password" name="password">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button  name="submit">
							<b>Đăng ký</b>
						</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<script>
		function check(){
			var username = document.getElementById('username').value;
			var username_regex = /^[A-Za-z ]+$/;
			if (username_regex.test(username)) {
				document.getElementById('error_name').innerHTML = '';
			} else {
				document.getElementById('error_name').innerHTML = 'Tên đăng kí không hợp lệ !';
				return false;
			}
			return true;
		}
	</script>
</body>
</html>