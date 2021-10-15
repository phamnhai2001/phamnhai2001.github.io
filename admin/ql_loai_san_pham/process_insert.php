<?php include'../common/check_admin.php' ?>
<?php  
	
	$ten_loai_san_pham = $_POST['ten_loai_san_pham'];
	$ma_loai_san_pham = $_POST['ma_loai_san_pham'];

	include '../common/connect.php';

	$sql = "insert into loai_san_pham(ten_loai_san_pham,ma_loai_san_pham_cha) values('$ten_loai_san_pham','$ma_loai_san_pham')";
	mysqli_query($connect,$sql);
	mysqli_close($connect);
	header('loacation:index.php');
