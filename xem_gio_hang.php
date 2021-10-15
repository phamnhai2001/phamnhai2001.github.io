<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include'admin/common/connect.php' ?>
	<?php include'base/config.php' ?>
	
	<table border="1px" width="100%">
		<tr>
			<th>Tên sản phẩm</th>
			<th>Ảnh</th>
			<th>Số lượng</th>
			<th>Giá</th>
			<th>Tổng tiền</th>
		</tr>
	<?php foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong): ?>
		<?php 
			$sql = "select * from san_pham where ma = '$ma_san_pham'";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);
		 ?>
		 <tr>
		 	<td>
		 		<?php echo $each['ten_san_pham'] ?>
		 	</td>
		 	<td>
		 		<img height="100" src="<?php image_url($each['anh']) ?>" />
		 	</td>
		 	<td>
		 		<a href="thay_doi_so_luong_san_pham.php?ma=<?php echo $ma_san_pham?>&kieu=tru">-</a>
		 		<?php echo $so_luong ?>
		 		<a href="thay_doi_so_luong_san_pham.php?ma=<?php echo $ma_san_pham?>&kieu=cong">+</a>
		 	</td>
		 	<td>
		 		<?php echo $each['gia'] ?>
		 	</td>
		 	<td>
		 		<?php echo $each['gia'] * $so_luong?>
		 	</td>
		 </tr>
	<?php endforeach ?>
	</table>
</body>
</html>