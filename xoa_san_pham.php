<?php 
	session_start();
	$ma_san_pham = $_GET['ma'];
	unset($_SESSION['gio_hang'][$ma_san_pham]);

	header("location:gio_hang.php");
 ?>