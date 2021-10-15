<?php include'../common/check_admin.php' ?>
<?php 

if(isset($_POST['ma']) && !empty($_POST['ten_san_pham']) && !empty($_POST['gia']) && !empty($_POST['mo_ta']) && !empty($_POST['ma_loai_san_pham']) && !empty($_FILES['anh_moi'])){

	$ma = $_POST['ma'];
	$ten_san_pham = $_POST['ten_san_pham'];
	$gia = $_POST['gia'];
	$mo_ta = $_POST['mo_ta'];
	$ma_loai_san_pham = $_POST['ma_loai_san_pham'];
	$anh = $_FILES['anh_moi'];



	if($anh['size']==0){
		$ten_anh= $_POST['anh_cu'];
	}else{
		$thu_muc_anh = '../../image/';

		$duoi_anh = explode('.', $anh['name'])[1];
		$ten_anh = time() . '.' . $duoi_anh;

		$duong_dan_anh = $thu_muc_anh . $ten_anh;
		move_uploaded_file($anh['tmp_name'],$duong_dan_anh);
	}

	include '../common/connect.php';

	$sql = "update san_pham set ten_san_pham='$ten_san_pham',gia='$gia', mo_ta='$mo_ta',anh='$ten_anh',ma_loai_san_pham='$ma_loai_san_pham'  where ma='$ma' ";

	$a =  mysqli_query($connect,$sql);
	echo $a;
	mysqli_close($connect);
	if ($a == 1) {
		header("location:./index.php");
	}
}else{
	header('location:index.php');
}
?>