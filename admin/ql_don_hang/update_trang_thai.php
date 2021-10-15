<?php include'../common/check_admin.php' ?>

<?php 

$ma = $_GET['ma'];
$trang_thai = $_GET['trang_thai'];

include "../common/connect.php";
$sql = "select trang_thai from hoa_don where ma_hoa_don = '$ma'";
$each = mysqli_fetch_array(mysqli_query($connect,$sql));
if ($each['trang_thai'] != 1) {
	header("location:index.php");
	exit();
}

$sql = "update hoa_don
set 
trang_thai = '$trang_thai'
where 
ma_hoa_don = '$ma'";

mysqli_query($connect,$sql);
mysqli_close($connect);
header("location:index.php");
