<?php  

session_start();
unset($_SESSION['user']);
unset($_SESSION['gio_hang']);

header('location:../index.php');