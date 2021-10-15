<?php include'../common/check_admin.php' ?>
<?php 
	
	$ma_loai_san_pham = $_POST['ma_loai_san_pham'];
	$ten_loai_san_pham = $_POST['ten_loai_san_pham'];
	include '../common/connect.php';

	$sql = "update loai_san_pham set ten_loai_san_pham='$ten_loai_san_pham' where ma_loai_san_pham='$ma_loai_san_pham' ";
	$result = mysqli_query($connect,$sql);
	mysqli_close($connect);
	header('location:index.php');