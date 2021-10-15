<?php  session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error-message {
			color: red;
			font-size: 14px;
			font-weight: 500;
		}
		.login table{
			border-radius: 10px;
			border: 1px solid ;
			height: 150px;
			width: 30%;
			margin: 0 auto;
			background-color: #f5f4f0;
			text-align: center;
		}
		.login p{
			text-align: center;
			font-size: 25px;
		}
		.login button {
			background-color: #89CFF0;
			border: 1px solid #ACE5EE;
		}
	</style>
</head>
<body>
<?php 
	// include 'menu.php';
	if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == true) {
			echo "<div class='error-message'>Đăng nhập sai mời đăng nhập lại!!!</div>";
			unset($_SESSION['login_error']);
		}
?>
<div id="background">

<?php if(isset($_GET['error'])) { ?>
	<p style="color: red"><?php echo $_GET['error']; ?></p>
	<?php } ?>
		<form class="login" method="POST" action="common/xu_li_admin.php">
				<p>
					<b>
						ĐĂNG NHẬP ADMIN
					</b>
				</p>
			<table>
				<tr>
					<td>
						<b>
						Email:
						</b>
					</td>
					<td>
						<input type="text" name="email">
					</td>
				</tr>
				<tr>
					<td>
						<b>
						Password:
						</b>
					</td>
					<td>
						<input type="password" id="password" name="mat_khau">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" onclick="check()">
							<b>Đăng nhập</b>
						</button>
					</td>
				</tr>
			</table>
			<script type="text/javascript">
				function check(){
					var email = document.getElementById('email').value;
					var password = document.getElementById('mat_khau').value;
					if (email=='') {
						alert("bạn phải nhập email");
						return false;
					}
					if (password=='') {
						alert("bạn phải nhập mật khẩu");
						return false;
					}
						return true;
				}
			</script>
		</form>
	</div>
</body>
</html>