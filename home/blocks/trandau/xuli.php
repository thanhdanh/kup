<?php
	include("../../modules/config.php");
	include("../../modules/function.php");
	$date=$_POST["date"];
	$gio=$_POST["gio"];
	$phut=$_POST["phut"];
	$buoi=$_POST["buoi"];
	$time= $gio.":".$phut.":".$buoi;
	$howlong=$_POST["howlong"];
	
	if(isset($_POST["taotran"])){		
		$id=date("Ymdhis");
		$sql="insert into trandau(id,time, date, howlong) values('$id','$time','$date','$howlong')";
		mysql_query($sql);
		header("location:../../index.php?quanly=sanbong&ac=xem&datsan=true&id=$id");				
	}
	if(isset($_POST["sua"])){ 
		$doi=$_POST["doi"];
		$tinhdiem=$_POST["tinhdiem"];
		$iduser= get_User_Id();
		$sql="update trandau set time='$time', date='$date', howlong='$howlong', iddoia='$doi', idsanbong='$_GET[san]', nguoitao='$iduser', trangthai=1, tinhdiem='$tinhdiem'  WHERE id='$_GET[id]' ";
		mysql_query($sql);
		header("location:../../index.php");
	}
	if(isset($_POST["thamgia"])){
		$doi=$_POST["doi"];
		$message=$_POST["message"];
		$soluong=$_POST["soluong"];
		$idcauthu=get_User_Id();		
		$iddoia=$_GET["ida"];
		$phone=$_POST["phone"];
		$idtran=$_GET["idtran"];
		$sql="insert into thamgia(idtran,iddoia, iddoib, phone,nguoithamgia, message, soluong) values('$idtran','$iddoia','$doi','$phone','$idcauthu', '$message','$soluong')";
		mysql_query($sql);
		$sql="update trandau nguoithamgia = '$idcauthu' where id='$idtran'";
		mysql_query($sql);		
		header("location: ../../index.php?quanly=trandau&ac=xem");
	}
	if($_GET["ac"]=="dongy"){
		$id=$_GET["idtran"];
		$sql="update trandau set trangthai=2 where id='$id'";
		mysql_query($sql);	
		$sql="delete from thamgia where idtran='$id'";
		mysql_query($sql);		
		header("location: ../../index.php?quanly=trandau&ac=xem");
	}
?>