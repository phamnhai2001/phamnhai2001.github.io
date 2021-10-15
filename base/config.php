<?php
	function image_url($imageName){
		echo "http://" . $_SERVER['SERVER_NAME'] . "/nhai/image/$imageName";
	}
?>