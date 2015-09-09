<?php
	
	class energy_a extends DB_Business{
		function __construct()
		{
			// Khai báo tên bảng
			$this->_table_name = 'energy';			 
			// Khai báo tên field id
			$this->_key = 'id';			 
			// Gọi hàm khởi tạo cha
			parent::__construct();
		}	
	}
	$energy= new energy_a();
	$ac=isset($_GET['ac'])? $_GET['ac']: '';
	if($ac=="edit")
		include("blocks/user/sua.php");		
	else	
		include ("blocks/user/xem.php");
?>