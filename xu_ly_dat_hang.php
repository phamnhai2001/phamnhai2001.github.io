<?php session_start(); ?>
<?php 
if(isset($_SESSION['user']['ma'])){
date_default_timezone_set('Asia/Ho_Chi_Minh');

$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];


$ma_khach_hang = $_SESSION['user']['ma'];

$trang_thai = 1; //trạng thái chờ
$thoi_gian_mua = date("Y-m-d H:i:s");
include 'admin/common/connect.php';

$sql = "insert into hoa_don(ma_khach_hang,ten_nguoi_nhan,dia_chi_nguoi_nhan,sdt_nguoi_nhan,trang_thai,thoi_gian_mua)
values ('$ma_khach_hang','$ten_nguoi_nhan','$dia_chi_nguoi_nhan','$sdt_nguoi_nhan','$trang_thai','$thoi_gian_mua')";

mysqli_query($connect,$sql);

$sql = "select max(ma_hoa_don) from hoa_don";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

$ma_hoa_don = $each['max(ma_hoa_don)'];

foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong) {
	$sql = "select gia from san_pham where ma = '$ma_san_pham'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);

	$gia = $each['gia'];


	$sql = "insert into hoa_don_chi_tiet(ma_hoa_don,ma_san_pham,so_luong,gia)
	values('$ma_hoa_don','$ma_san_pham','$so_luong','$gia')";
	mysqli_query($connect,$sql);

}

unset($_SESSION['gio_hang']);
header("location:xem_hoa_don_chi_tiet.php");
} else {	
	echo"Bạn phải đăng nhập để mua hàng";
}
