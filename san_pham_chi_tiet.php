<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/khach-hang.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}

		.details {
			width: 100%;
			height: 500px;
			border-bottom: 2px solid #ebeded;
		}

		.anh_san_pham {

			margin-top: 10px;
			float: left;
			width: 40%;
		}

		.details .anh_san_pham img {
			height: 330px;
			width: 250px;
			padding-left: 50px;
		}

		.style_items {
			width: 60%;
			margin: 0 auto;
			float: left;
			padding-top: 50px;
		}

		.san_pham {
			border: 1px solid #a5a5a5;
			width: 400px;
			margin: 0 auto;
			margin-top: 20px;
			/*padding:20px;*/

		}

		.style_items .thong_tin_san_pham {
			padding: 9px 0;
			text-align: center;
			font-size: 14px;
			text-transform: uppercase;
			color: #fff;
			background: #777;
		}

		.mo_ta {
			font-size: 14px;
			padding-top: 20px;
			padding-left: 5px;
		}

		.gia {
			font-size: 14px;
			padding-top: 20px;
			padding-bottom: 10px;
			padding-left: 5px;
		}

		.mua_hang {
			width: 400px;
			margin: 0 auto;
			margin-top: 20px;
			border: 1px solid #a5a5a5;
		}

		.them_vao_gio_hang {
			font-size: 14px;
			padding-top: 20px;
			padding-left: 35px;
			padding-bottom: 10px;
		}

		.them_vao_gio_hang button {
			padding-right: 20px;
			width: 160px;
			color: red;
		}

		.them_vao_gio_hang a {
			text-decoration: none;
			color: red;
		}
	</style>
</head>

<body>
	<?php include 'header.php' ?>
	<?php if (!empty($_GET['ma'])) { ?>
		<div id="div_content">
			<?php
			require 'admin/common/connect.php';
			$ma = $_GET['ma'];
			$sql = "select * from san_pham where ma = '$ma'";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);
			$thu_muc_anh = 'image/';
			$dem = mysqli_num_rows($result);
			?>
			<div class="details">
				<div class="error" style="text-align: center; color: red;">
					<?php if ($dem == 0) {
						echo "Sản phẩm không tồn tại!";
					} ?>
				</div>
				<?php foreach ($result as $each) : ?>
					<div class="anh_san_pham">
						<img src="<?php echo $thu_muc_anh . $each['anh'] ?>">
					</div>
					<div class="style_items">
						<div class="san_pham">
							<p class="thong_tin_san_pham">Thông tin sản phẩm</p>
							<p class="mo_ta">
								<b>Mô tả:</b><?php echo $each['mo_ta'] ?>
							</p>
							<p class="gia">
								<b>Giá:</b><?php echo number_format($each['gia']) ?> VNĐ
							</p>
						</div>
						<div class="mua_hang">
							<div class="them_vao_gio_hang">
								<button>
									<i class="fa fa-shopping-cart"></i>
									<a href="them_san_pham_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
										Thêm vào giỏ hàng
									</a>
								</button>
								<button class="mua_ngay">
									<a href="them_san_pham_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
										Mua ngay
									</a>
								</button>
							</div>
						</div>
					</div>

			</div>
			<b>Có thể bạn cũng thích</b>
			<div>
				<?php include 'san_pham_tuong_tu.php' ?>
			</div>
		<?php endforeach ?>
		</div>
	<?php } else { ?>
		<div class="div_content">
			<div class="details" style="text-align: center; color: red;">
				Sản phẩm không tồn tại!
			</div>
		</div>
	<?php } ?>

	<?php include 'footer.php' ?>
</body>

</html>