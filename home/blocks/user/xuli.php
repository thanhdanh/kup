<?php
	include("../../../libs/DB_Business.php");
	include("../../../libs/function.php");	
	
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
	
	
	$_id=($_GET["id"]);
	echo $_id;
	$ei		=$energy->select_by_id('*', $_id);
	$ui		=$user->select_by_id('*', $_id);
	

	
	if(isset($_POST["submit"])){
		$ac=$_GET["ac"];
		$streng=(int)$_POST["streng"];
		if($streng<=99)
			$energy->update_by_id(array($ac =>(int) $streng), $_id);	
	}	
	else if(isset($_POST["desciption"])){
		$descipt= $_POST["descript"];	
		
			$user->update_by_id(array("descript"=>$descipt), $_id);
			
	}
	else if(isset($_POST["change-picture"])){
		$name=$_FILES["edit-picture"]["name"];
		
		if($name!=""){
			$url=upload_image("edit-picture","../../../images/profile/");
			$url= substr($url,6);
			
			if($ui["anhdaidien"]!="")
				unlink("../../".$ui["anhdaidien"]);
						
			$user->update_by_id(array("anhdaidien"=>$url), $_id);
		}
	}
	else{	
		$ac1=($_GET["ac1"]);
		$ac2=($_GET["ac2"]);
			$vl=(int)$ei[$ac1];	
		if($ac2=="inc"){			
			if($vl <99 ){
				$vl=$vl+1;					
				$energy->update_by_id(array($ac1 => $vl), $_id);		
			}
		}
		else if($ac2=="desc"){			
			if($vl >1 )	
			{
				$vl=$vl-1;	
				$energy->update_by_id(array($ac1 =>$vl), $_id);
			}
		}
		
	}
	$energy->__destruct();
	header("location:../../index.php?ctr=user");	
	
?>