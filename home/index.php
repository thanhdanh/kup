<?	
	ob_start();	
	session_start();
	$login=false;
	if($_SESSION["username"]=="") 
		header("location:../index.php");
	else $login=true;
		
	$_id=$_SESSION["id"];
	$_name=$_SESSION["fullname"];	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset='utf-8'" />
<link type="text/css" rel="stylesheet" href="../css/style.css" />
<link type="text/css" rel="stylesheet" href="../css/font-awesome.css" />
<title>Nơi tạo những trận cầu hấp dẫn</title>
</head>
<body>
<?php 		
	include("../libs/function.php");	
	require_once("../libs/DB_Business.php");
	
	class user_a extends DB_Business{
		function __construct()
    	{
			// Khai báo tên bảng
			$this->_table_name = 'users';			 
			// Khai báo tên field id
			$this->_key = 'id';			 
			// Gọi hàm khởi tạo cha 
			parent::__construct();
			
    	}	
	}
	$user= new user_a();		
	include("modules/banner.php");	
	include("modules/menu.php");
	include("modules/content1.php");	
	?>
	
	
<script type="text/javascript" src="../js/jquery-2.0.0.min.js" ></script>
</body>
</html>
