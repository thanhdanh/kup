<?php
	$db_host = "localhost"; // Giữ mặc định là localhost
	$db_name    = 'demo';// Can thay doi
	$db_username    = 'root'; //Can thay doi
	$db_password    = '';//Can thay doi
	$sql=mysqli_connect($db_host,$db_username,$db_password , $db_name) or die('Lỗi kết nối');
	
?>