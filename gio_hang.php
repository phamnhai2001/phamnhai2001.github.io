<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/khach-hang.css">
	<style type="text/css">
		.gio_hang {
			width: 100%;
			background-color: #ebeded;
			height: 100%;
		}

		.menu {
			padding: 10px;
			width: 90%;
			margin: 0 auto;
			height: 30px;
			text-align: center;
			background-color: white;
			border-bottom: 2px solid #ebeded;
		}

		.menu span {
			padding-right: 50px;
		}

		.sp {
			width: 30%;
			float: left;
		}

		.dg {
			width: 15%;
			float: left;
		}

		.sl {
			width: 15%;
			float: left;
		}

		.tt {
			width: 15%;
			float: left;
		}

		.xoa {
			width: 15%;
			float: left;
		}

		.items {
			padding: 10px;
			background-color: white;
			padding-top: 20px;
			width: 90%;
			height: 105px;
			margin: 0 auto;
			border-bottom: 2px solid #ebeded;
		}

		.anh {
			width: 8%;
			height: 50px;
			float: left;
		}

		.ten {
			width: 25%;
			height: 50px;
			float: left;
		}

		.gia {
			width: 15%;
			height: 50px;
			float: left;
		}

		.so_luong {
			width: 15%;
			height: 50px;
			float: left;
			display: inline-flex;
		}

		.tong_tien {
			width: 15%;
			height: 50px;
			float: left;
		}

		.xoa_san_pham {
			width: 15%;
			height: 50px;
			float: left;
		}

		.xoa_san_pham a {
			text-decoration: none;
			color: red;
		}

		.tong_tien_hang {
			padding-top: 10px;
			width: 92%;
			height: 30px;
			margin: 0 auto;
			border: 2px solid #ebeded;
			margin-top: 2px;
			background-color: white;
			display: flex;
		}

		.mua_hang {
			width: 40%;
		}

		.mua_hang button {
			color: red;
		}

		.mua_hang a {
			text-decoration: none;
		}

		.tien {
			width: 60%;
			text-align: center;
		}

		body {
			min-width: 100vh;
			margin: 0px;
			min-height: auto;
		}

		.input-quantity {
			width: 20px;
			height: 20px;
			display: flex;
			justify-content: center;
			align-items: center;
			border: 1px solid #ebeded;
			text-decoration: none;
		}

		.xoa_sp {
			text-decoration: none;
		}
	</style>
</head>

<body>
	<?php include 'header.php' ?>
	<?php
	if (isset($_SESSION['gio_hang'])) {
		include 'admin/common/connect.php';
		$tong = 0;
	?>
		<?php include 'base/config.php' ?>

		<div class="gio_hang">
			<p>GI??? H??NG C???A B???N</p>
			<div class="menu">
				<div class="sp">
					<span>S???n ph???m</span>
				</div>
				<div class="dg">
					<span>????n gi??</span>
				</div>
				<div class="sl">
					<span>S??? l?????ng</span>
				</div>
				<div class="tt">
					<span>T???ng ti???n</span>
				</div>
				<div class="xoa">
					<span>Thao t??c</span>
				</div>

			</div>
			<?php foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong) : ?>
				<?php
				$sql = "select * from san_pham where ma = '$ma_san_pham'";
				$result = mysqli_query($connect, $sql);
				$each = mysqli_fetch_array($result);
				?>
				<div class="items">
					<div class="anh">
						<img height="100" src="<?php image_url($each['anh']) ?>" />
					</div>
					<div class="ten">
						<?php echo $each['ten_san_pham'] ?>
					</div>
					<div class="gia">
						<?php echo number_format($each['gia']) ?> VN??
					</div>
					<div class="so_luong">
						<a class="input-quantity" href="thay_doi_so_luong_san_pham.php?ma=<?php echo $ma_san_pham ?>&kieu=tru">-</a>
						<div class="input-quantity">
							<?php echo $so_luong ?>
						</div>
						<a class="input-quantity" href="thay_doi_so_luong_san_pham.php?ma=<?php echo $ma_san_pham ?>&kieu=cong">+</a>
					</div>
					<div class="tong_tien">
						<?php echo number_format($each['gia'] * $so_luong) ?> VN??
						<!-- <?php echo $tong += $each['gia'] * $so_luong ?>?? -->
					</div>
					<div class="xoa_san_pham">
						<a class="xoa_sp" href="xoa_san_pham.php?ma=<?php echo $ma_san_pham ?>">
							X??a
						</a>
					</div>
				</div>
			<?php endforeach ?>
			<div class="tong_tien_hang">
				<div class="tien">
					<b>T???ng ti???n: <?php echo number_format($tong) ?> VN??</b>
				</div>
				<div class="mua_hang">
					<?php if (isset($_SESSION['user']['ma'])) { ?>
						<a href="dat_hang.php">
							<button>Mua ngay</button>
						</a>
					<?php } else { ?>
						<a href="user/dang_nhap.php?error=B???n ph???i ????ng nh???p ????? ti???p t???c.">
							<button>Mua ngay</button>
						</a>
					<?php } ?>
					<a href="xem_hoa_don_chi_tiet.php">
						<button>????n h??ng</button>
					</a>
				</div>


			</div>
		</div>

	<?php } else { ?>
		<?php include 'gio_hang_trong.php' ?>

	<?php } ?>
	<?php include 'footer.php' ?>
</body>

</html>