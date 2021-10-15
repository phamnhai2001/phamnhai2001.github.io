<?php 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$regex_username ='/^[A-Za-z ]+$/';
if(preg_match($regex_username, $username) === 1) {

$connect = mysqli_connect('localhost','root','','do_an');
mysqli_set_charset($connect, 'utf8');

$sql = "select * from users where username = '$username' AND password = '$password'";
$result = mysqli_query($connect, $sql);

$user = mysqli_fetch_assoc($result);

mysqli_close($connect);
if ($user == null) {
	$_SESSION['login_error'] = true;
	header('location:./dang_nhap.php?error=Đăng nhập không hợp lệ !');
} else {
	$each = mysqli_fetch_array($result);
	$_SESSION['user'] =  $user;
	$_SESSION['ma_khach_hang'] = $user["ma"];
	header('location:../index.php');
}
} else header("location:quan_li_tai_khoan.php?error=Không được nhập kí tự đặc biệt !");
