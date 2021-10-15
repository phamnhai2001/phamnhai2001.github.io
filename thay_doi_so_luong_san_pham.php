<?php 

	$ma_san_pham = $_GET['ma'];
	$kieu = $_GET['kieu'];
	session_start();
	if ($kieu == 'tru') {
		if($_SESSION['gio_hang'][$ma_san_pham] >1){
			$_SESSION['gio_hang'][$ma_san_pham]--;
		}else{
			unset($_SESSION['gio_hang'][$ma_san_pham]);
		}
	}else{
		$_SESSION['gio_hang'][$ma_san_pham]++;
	}

header("location:gio_hang.php");
	