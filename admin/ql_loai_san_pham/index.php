<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.form{
			padding: 0px 0px 0px 200px;
		}
		.form input{
			height: 20px;
		}
		.content ul li{
			list-style-type: none;
	</style>
</head>
<body>
	<div class="container">
		<?php include '../common/menu.php' ?>
		
		<div class="main_content">
			<div class="header">
			</div>
			<div class="content">

				<p><b>Sửa loại sản phẩm</b></p>
				<?php 
					include '../common/connect.php';

					$sql = "select * from loai_san_pham where ma_loai_san_pham_cha is null";
					$result = mysqli_query($connect,$sql);

			 	?>
				<ul>
					<?php foreach ($result as $each): ?>
					<li>
						<form action="process_update.php" method="post">
							<input type="hidden" name="ma_loai_san_pham" value="<?php echo($each['ma_loai_san_pham']) ?>">

							<input type="text" name="ten_loai_san_pham" value=" <?php echo $each['ten_loai_san_pham'] ?> ">
							<button>Sửa</button>
						</form>
						<ul>
							<?php 
							$sql = "select * from loai_san_pham where ma_loai_san_pham_cha = ".$each['ma_loai_san_pham'];
							$result_loai_sp = mysqli_query($connect,$sql);

							?>
							<?php foreach ($result_loai_sp as $each_loai_sp): ?>
							<li>
								<form action="process_update.php" method="post">
									<input type="hidden" name="ma_loai_san_pham" value="<?php echo($each_loai_sp['ma_loai_san_pham']) ?>">
									<input type="text" name="ten_loai_san_pham" value="<?php echo $each_loai_sp['ten_loai_san_pham'] ?>">
									<button>Sửa</button>
								</form>
							</li>
							<?php endforeach ?>
						</ul>
					</li>
				<?php endforeach ?>
				</ul>
				<p><b>Thêm loại sản phẩm</b></p>
				<form action="process_insert.php" method="post">
					<select name="ma_loai_san_pham">
								<?php foreach ($result as $each): ?>
				
											<option value="<?php echo $each['ma_loai_san_pham'] ?>">
												<?php echo $each['ten_loai_san_pham'] ?>
											</option>
										
								<?php endforeach ?>
							</select>
					<input type="text" name="ten_loai_san_pham">
				<button>Thêm</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>