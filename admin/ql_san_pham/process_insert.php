<?php include'../common/check_admin.php' ?>
<?php 

if(!empty($_POST['ten_san_pham']) && !empty($_POST['gia']) && !empty($_POST['mo_ta']) && !empty($_POST['ma_loai_san_pham']) && !empty($_FILES['anh'])){

	$ten_san_pham = $_POST['ten_san_pham'];
	$gia = $_POST['gia'];
	$mo_ta = $_POST['mo_ta'];
	$ma_loai_san_pham = $_POST['ma_loai_san_pham'];
	$anh = $_FILES['anh'];
	
	include '../common/connect.php';
	$thu_muc_anh = '../../image/';
	$duoi_anh = explode('.', $anh['name'])[1];
	$ten_anh = time() . '.' . $duoi_anh;

	$duong_dan_anh = $thu_muc_anh . $ten_anh;
	move_uploaded_file($anh['tmp_name'],$duong_dan_anh);
	

	$sql = "insert into san_pham(ten_san_pham,gia,mo_ta,anh,ma_loai_san_pham)values ('$ten_san_pham','$gia','$mo_ta','$ten_anh','$ma_loai_san_pham')";


	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:index.php');
}else{
	header('location:view_insert.php');
}
?>