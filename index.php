<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<title>Nơi tạo những trận cầu hấp dẫn</title>
</head>
<body>
	
<?php 
	if(isset($_GET["r"])){
		?>
        	<script>
				alert("Bạn đã đăng ký thành công!!!")
            </script>
        <?php
	}
	include("libs/function.php");	
	require_once("libs/DB_Business.php");	
	include("modules/banner.php");
	?>
    <div id="wrap">
    	
    <?php
	
	include("modules/content.php");
		
?>
	</div>
</body>
</html>