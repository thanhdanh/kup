<div id="menu">
	<div class="box_menu_logo">
    	<img src="../images/logo/kup_b.gif" height="70" width="70"  />
    </div>
    <?php
		$ctr=isset($_GET["ctr"])? $_GET["ctr"] :"";
	?>
    <div class="list_option">
    	 <a href="index.php?ctr=match">
            <div class="box_menu <?php if($ctr=="match"){ ?> menu_selected <?php } ?>">
              <img src="../images/logo/Football-Academy-icon-2.png" width="auto" height="54" >  
             <p>  Danh sách các trận</p>
            </div>
        </a>
        
        <a href="index.php?ctr=stadium">
            <div class="box_menu <?php if($ctr=="stadium"){ ?> menu_selected <?php } ?>"> 
            	<img src="../images/icon/ball.png"  width="auto" height="54"> 
              <p>Thông tin sân bóng</p>
            </div>
        </a>
        <a href="index.php?ctr=team">
            <div class="box_menu <?php if($ctr=="team"){ ?> menu_selected <?php } ?>">   
            	<img src="../images/icon/group.png"  width="auto" height="54"> 
              <p>Đội của tôi</p>
            </div>
        </a>
         <a href="index.php?ctr=user">
            <div class="box_menu <?php if($ctr=="user"){ ?> menu_selected <?php } ?>">
            	<img src="../images/logo/Personal information.png"  width="auto" height="54">    
              <p>Thông tin cá nhân</p>
            </div>
        </a>
    </div>
</div>