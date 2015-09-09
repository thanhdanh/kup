<link href="../css/style.css" rel="stylesheet" type="text/css">
<div id="banner">
     <ul class="nav left">
        <li><a href="index.php">Trang Chủ</a></li>
        <li><a href="index.php?quanly=stadium">Sân Bóng</a></li>
        <li><a href="index.php?quanly=about">Giới Thiệu</a></li>
        <li><a href="#">Liên Hệ</a></li>
     </ul>
     <ul class="nav right">     
        <li><a href="login/register.php" >Tạo tài khoản</a></li>
        <?php 
			if(isset($_GET["login"])){
				?>
   	   <form action="login/login.php" method="post" class="nav-login">
                		<input type="text" name="email" placeholder="Your Email" size="15" >
                    	<input type="password" name="password" placeholder="Password" size="10" >	
         				<input type="submit" name="dangnhap" value="Đăng nhập" class="btn btn-primary" >
                        <a href="?" class="btn btn-danger">Hủy</a>
       </form>                    
                <?php	
			}
			else{ ?>	
			<li><a href="?login" >Đăng nhập</a></li>
			<?php
			}
			?>       
  </ul>
      <div class="xoa"></div>
</div>