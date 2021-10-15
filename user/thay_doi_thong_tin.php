<?php session_start() ?>
<?php
	include'../admin/common/connect.php';
	
		$ma = $_POST['ma'];
		$username = $_POST['username'];
		$sdt = $_POST['sdt'];
		$dia_chi = $_POST['dia_chi'];
		$email = $_POST['email'];
		
				$sql = "update users set username = '$username', sdt = '$sdt', dia_chi = '$dia_chi', email = '$email' where ma ='$ma'"; 
				unset($_SESSION['user']['username']);
				//unset cong taoj laij ddi
				$_SESSION['user']['username']= $username;
				$result = mysqli_query($connect,$sql);
				header("location:../index.php");