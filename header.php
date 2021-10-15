<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style type="text/css">
	#div_header {
		width: 100%;
		height: auto;
		background: #f5f4f0;
		float: left;
	}

	#name_shop>img {
		width: 30%;
		float: left;
		padding: 0;
		height: 120px;
	}

	#tai_khoan {
		width: 10%;
		float: right;
		height: 40px;
		/*border: 1px solid;*/
		background-color: #fcfbf7;
	}

	#tai_khoan a {
		text-decoration: none;
		color: black;
	}

	#gio_hang {
		width: 5%;
		float: right;
		height: 40px;
		/*border: 1px solid;*/
		background-color: #fcfbf7;
	}
</style>
<div id="div_header">
	<div id="name_shop">
		<img src="anh/name_shop_1.jpg">
	</div>
	<div id="gio_hang">
		<a href="gio_hang.php">
			<i class='fas fa-shopping-cart' style='font-size:24px;color:gray ;'></i>
		</a>
	</div>
	<div id="tai_khoan">
		<?php if (empty($_SESSION['user'])) { ?>
			<a href="user/quan_li_tai_khoan.php">
				<i class="fa fa-user-circle" style="font-size:30px;color:gray;"></i>
			</a>
		<?php } else { ?>
			<a href="user/thong_tin_khach_hang.php">
				<?php echo $_SESSION['user']['username'] ?>
			</a>
			<br>
			<a class="logout" href="user/dang_xuat.php"><button>Đăng xuất</button></a>
		<?php } ?>

	</div>
	<?php include 'thanh_tim_kiem.php' ?>
	<?php include 'menu.php' ?>

</div>