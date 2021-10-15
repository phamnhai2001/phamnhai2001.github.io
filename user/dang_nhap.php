<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		.error-message {
			color: red;
			font-size: 14px;
			font-weight: 500;
		}
		.style-login table{
			border: 1px solid ;
			border-radius: 10px;
			height: 150px;
			width: 30%;
			margin: 0 auto;
			background-color: #f5f4f0;
			text-align: center;
		}
		.style-login p{
			text-align: center;
			font-size: 25px;
		}
		.style-login a{
			color: red;
		}
		.style-login button{
			background-color: #89CFF0;
			border: 1px solid #ACE5EE;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == true) {
			echo "<div class='error-message'>Tên đăng nhập hoặc mật khẩu không đúng!!!</div>";
			unset($_SESSION['login_error']);
		} 
	?>
	<?php if (isset($_GET['error'])) { ?>
		<p style="color: red">
			<?php echo $_GET['error'] ?>
		</p>
	<?php } ?>
	<div id="background">
		<form class="style-login" method="POST" action="./process2.php">
				<p>
					<b>
						ĐĂNG NHẬP
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
						<input type="text" id="ten_dang_nhap" name="username">
						<span id="error_ten"></span>
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
					<td><a href="dang_ky.php"><b>Đăng ký</b></a>
					</td>
					<td>
						<button type="submit" onclick="return check();" name="submit">
							<b>Đăng nhập</b>
						</button>
					</td>
			</table>
			<script>
				function check(){
					var ten_dang_nhap = document.getElementById('ten_dang_nhap').value;
					var password = document.getElementById('password').value;
					var ten_dang_nhap_regex = /^[A-Za-z ]+$/;
					if (ten_dang_nhap==''||password=='') {
						alert("bạn không được để trống!");
					}
					if (ten_dang_nhap_regex.test(ten_dang_nhap)) {
						document.getElementById('error_ten').innerHTML = '';
					} else {
						document.getElementById('error_ten').innerHTML = 'Tên đăng nhập không hợp lệ!';
						return false;
					}
					return true;
				}
			</script>
			
		</form>
	</div>
</body>
</html>