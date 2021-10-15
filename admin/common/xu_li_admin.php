<?php 
session_start();
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
$regex_email ='/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
if(preg_match($regex_email, $email) === 1) {
	$connect = mysqli_connect('localhost','root','','do_an');
	mysqli_set_charset($connect, 'utf8');

	$sql = "select * from admin where email = '$email' AND mat_khau = '$mat_khau'";
	$result = mysqli_query($connect, $sql);

	$admin = mysqli_fetch_assoc($result);

	mysqli_close($connect);
	if ($admin == null) {
		$_SESSION['login_error'] = true;
		header('location:../index.php?Đăng nhập không hợp lệ !');
	} else {
		$each = mysqli_fetch_array($result);
		$_SESSION['admin'] =  $admin;

		header('location:../common/index.php');
	}
} else  header("location:../?error=Không được nhập kí tự đặc biệt !");
