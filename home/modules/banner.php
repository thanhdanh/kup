<?php
	session_start();
	$_id=$_SESSION["id"];
	$p= $user->select_by_id('anhdaidien', $_id);	
	if($p["anhdaidien"]==""){
		$picture="../images/profile/photo.jpg";
	}
	else $picture=$p["anhdaidien"];
?>
<link href="../../css/style.css" rel="stylesheet" type="text/css">

<div id="banner">
     <ul class="nav left">
        <li><a href="index.php">Trang Chủ</a></li>
        <li><a href="index.php?ctr=stadium">Sân bóng</a></li>
        <li><a href="index.php?quanly=about">Video</a></li>
        <li><a href="index.php?quanly=about">Giới Thiệu</a></li>
        <li><a href="#">Liên Hệ</a></li>
     </ul>      
        
   
      <ul class="nav right">    
      	 <li><a href="?ctr=match&ac=taotran"><strong>Tạo trận</strong></a></li> 	     	     	
     	<li><a href="?ctr=user"><img src="<?php echo $picture?>" alt="<? echo $_name ?>"/></a></li>
        <li><a href="../login/login.php?ac=thoat">Đăng xuất</a></li>
      </ul>
      <div class="xoa"></div>
</div>
