<?php include'../common/check_admin.php' ?>
<?php
	$ma = $_POST['ma'];
	$ten = $_POST['ten'];
	$gioi_tinh = $_POST['gioi_tinh'];
	$email = $_POST['email'];
	$dia_chi = $_POST['dia_chi'];
	$ngay_sinh = $_POST['ngay_sinh'];
	$sdt = $_POST['sdt'];
	$thoi_gian_lam_viec = $_POST['thoi_gian_lam_viec'];
	
require '../common/connect.php';

$sql = "update nhan_vien
 set 
 ten = '$ten',
 gioi_tinh = '$gioi_tinh',
 email = '$email',
 dia_chi = '$dia_chi',
 ngay_sinh = '$ngay_sinh',
 sdt = '$sdt',
 thoi_gian_lam_viec = '$thoi_gian_lam_viec'
 where 
 ma = $ma
  ";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');