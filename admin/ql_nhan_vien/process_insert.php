<?php include'../common/check_admin.php' ?>
<?php

if(!empty($_POST['ten']) && !empty($_POST['gioi_tinh']) && !empty($_POST['email']) && !empty($_POST['dia_chi']) && !empty($_POST['ngay_sinh']) && !empty($_POST['sdt']) && !empty($_POST['thoi_gian_lam_viec'])){


	$ten = $_POST['ten'];
	$gioi_tinh = $_POST['gioi_tinh'];
	$email = $_POST['email'];
	$dia_chi = $_POST['dia_chi'];
	$ngay_sinh = $_POST['ngay_sinh'];
	$sdt = $_POST['sdt'];
	$thoi_gian_lam_viec = $_POST['thoi_gian_lam_viec'];

	$connect = mysqli_connect('localhost','root','','do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into nhan_vien(ten,gioi_tinh,email,dia_chi,ngay_sinh,sdt,thoi_gian_lam_viec)
	values('$ten','$gioi_tinh','$email','$dia_chi','$ngay_sinh','$sdt','$thoi_gian_lam_viec')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:index.php');
}else{

	header('location:view_insert.php');
}
