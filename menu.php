<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="admin/static/css/style.css">
	<!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
	<title></title>
</head>

<body>
	<?php
	include 'admin/common/connect.php';

	$sql = "select * from loai_san_pham where ma_loai_san_pham_cha is null";
	$result = mysqli_query($connect, $sql);

	?>
	<div class="div_menu">
		<ul id="menu">
			<li style="float: left;">
				<a href="index.php"><i class="material-icons w3-xlarge">home</i></a>
			</li>
			<?php foreach ($result as $each) : ?>
				<li style="float: left;">
					<?php
					$ma_loai_san_pham = $each['ma_loai_san_pham'];
					$sql_check = "SELECT * from loai_san_pham where ma_loai_san_pham_cha = '$ma_loai_san_pham'";
					$result_check = mysqli_query($connect, $sql_check);
					$count = mysqli_num_rows($result_check); ?>

					<?php if ($count == 0) { ?>
						<a href="xem_sp_theo_loai.php?ma_loai_san_pham=<?php echo $each['ma_loai_san_pham'] ?>">
							<?php echo $each['ten_loai_san_pham'] ?>
						</a>
					<?php } else { ?>
						<a href=""><?php echo $each['ten_loai_san_pham']; ?><i class="fa fa-angle-down"></i></a>
					<?php } ?>
					<ul>
						<?php
						$sql = "select * from loai_san_pham
										where ma_loai_san_pham_cha = " . $each['ma_loai_san_pham'];
						$result_loai_sp_ct = mysqli_query($connect, $sql);

						?>
						<?php foreach ($result_loai_sp_ct as $loai_sp_ct) : ?>
							<li>
								<a href="xem_sp_theo_loai.php?ma_loai_san_pham=<?php echo $loai_sp_ct['ma_loai_san_pham'] ?>">
									<?php echo $loai_sp_ct['ten_loai_san_pham'] ?>

								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</li>
			<?php endforeach ?>

	</div>
</body>

</html>