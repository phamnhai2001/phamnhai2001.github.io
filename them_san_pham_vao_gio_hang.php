<?php 
	$ma_san_pham = $_GET['ma'];
	session_start();
	if(isset($_SESSION['gio_hang'][$ma_san_pham])){
		$_SESSION['gio_hang'][$ma_san_pham]++;
	}else{
		$_SESSION['gio_hang'][$ma_san_pham] = 1;
	}
 	header("location:gio_hang.php");
 ?>