<?php
	function base_admin_url(){
	  	return sprintf(
		    "%s://%s/nhai/admin/",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $_SERVER['SERVER_NAME']
	  	);
	}
	function check_login(){
		// session_start();
		if($_SESSION['admin'] == null){
			header('location:../index.php');
		}
		
	}
?>