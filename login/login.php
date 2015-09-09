<?php
	session_start();
	
	if(isset($_POST['dangnhap'])){
		$array= array('email', 'password');
		foreach ($array as $field){
			if(!isset($_POST[$field]) || empty($_POST[$field])){
				header("location: ../?login");
				exit;
			}
		}
		include("../libs/config.php");	
									
		$email		= $_POST["email"];
		$password	= md5($_POST["password"]);
		$sql1=mysqli_query($sql,"select id,username,fullname from users where email='$email' and 				password='$password'");	
						
		$row=mysqli_num_rows($sql1);
		
		if($row > 0){
			$row=mysqli_fetch_array($sql1);
			
			$id=$row["id"];					
			$_SESSION["id"]= $id;
						
			$username=$row["username"];				
			$_SESSION["username"]= $username;
			
			$fullname=$row["fullname"];					
			$_SESSION["fullname"]= $fullname;
								
			header("location: ../home"); 
			
		}
		else {
			header("location: ../?login");
			 			 
		 }			
	}else if(isset($_GET["ac"])){
		if($_GET["ac"]=="thoat"){
			unset($_SESSION["username"]);		
			session_destroy();
			header("location:../index.php");
		}
	} 
?>
