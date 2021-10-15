<!DOCTYPE html>
<html>

<head>
	<title></title>
	<style type="text/css">
		#div_content {
			width: 97%;
			height: auto;
			float: left;
			padding-bottom: 50px;
		}

		#new_items {
			height: auto;
			float: left;
			width: 100%;
			padding-left: 10px;
		}

		#container {
			margin: 0;
			padding: 0;
			width: 100%;
			height: auto;
			float: left;
		}

		.detail_items {
			box-sizing: border-box;
			width: 22%;
			float: left;
			height: 368px;
			margin: 15px;

		}

		.items {
			/*margin: 2px;*/
			text-align: center;
			font-size: 14px;
		}

		.img_items img {
			height: 315px;
			width: 100%;
		}

		.detail_items:hover {
			border: 1px solid #dbdad5;
		}

		.detail_items:hover .inf_items {
			display: block;
			background-color: silver;
		}

		.name_items {
			height: 25px;

		}

		.inf_items {
			height: 20px;
			color: white;
			font-size: 11px;
			text-align: center;
			padding-top: 5px;
			font-family: initial;
		}

		.name_items span {
			width: 50%;
			float: left;
			text-align: center;
			color: black;
		}

		.phan_trang a {
			text-decoration: none;
			color: black;
			border: 1px solid;
			float: left;
			margin-left: 10px;
			width: 18px;
			text-align: center;
		}
	</style>
</head>

<body>
	<?php if (!empty($_GET['ma_loai_san_pham'])) { ?>
		<div id="div_content">
			<?php
			include 'admin/common/connect.php';
			$ma_loai_san_pham = $_GET['ma_loai_san_pham'];
			$sql = "select * from san_pham where ma_loai_san_pham = '$ma_loai_san_pham'";
			$result = mysqli_query($connect, $sql);
			$thu_muc_anh = 'image/';

			$tong_san_pham = mysqli_num_rows($result);
			$san_pham_1_trang = 12;

			$tong_so_trang = ceil($tong_san_pham / $san_pham_1_trang);

			$trang_hien_tai = 1;
			if (isset($_GET['trang'])) {
				$trang_hien_tai = $_GET['trang'];
			}

			$san_pham_bo_qua = ($trang_hien_tai - 1) * $san_pham_1_trang;

			$sql =  "$sql limit $san_pham_1_trang offset $san_pham_bo_qua";
			$result = mysqli_query($connect, $sql);
			?>
			<h3>
				<?php echo $tong_san_pham ?> sản phẩm
			</h3>
			<div id="div_content">
				<div id="new_items">
					<div id="container">
						<?php foreach ($result as $each) : ?>
							<a href="san_pham_chi_tiet.php?ma=<?php echo $each['ma'] ?>" class="details">
								<div class="detail_items">
									<div class="items">
										<div class="img_items">
											<span>
												<img src="<?php echo $thu_muc_anh . $each['anh'] ?>">
											</span>
										</div>
										<div class="note_items">
											<div class="name_items">
												<span>
													<?php echo $each['ten_san_pham'] ?>
												</span>
												<span>
													<?php echo number_format($each['gia']) ?>đ
												</span>
											</div>
											<div class="inf_items">
												<?php echo $each['mo_ta'] ?>
											</div>
										</div>
									</div>
								</div>
							</a>
						<?php endforeach ?>
					</div>

				</div>
				<div class="phan_trang">
					<?php if ($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>"; ?>
					<span>
						<?php for ($i = 1; $i <= $tong_so_trang; $i++) { ?>
							<a href="?trang=<?php echo $i ?>&ma_loai_san_pham=<?php echo $ma_loai_san_pham ?>">
								<?php echo $i ?>
							</a>
						<?php } ?>
					</span>
				</div>
			</div>
		<?php } else { ?>
			<div class="div_content">
				<div class="details" style="text-align: center; color: red;">
					Sản phẩm không tồn tại!
				</div>
			</div>
		<?php } ?>
</body>

</html>