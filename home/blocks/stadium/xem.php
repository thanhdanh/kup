<?php
	//---------------------------------------------	
	$num=6;
	if(isset($_GET["trang"])){	
		$trang=$_GET["trang"];
	}else{
		$trang=1;
	}
	$batdau=$num*($trang-1);
	//---------------------------------------------

	class stadium_a extends DB_Business{
		function __construct()
    	{
			// Khai báo tên bảng
			$this->_table_name = 'sanbong';			 
			// Khai báo tên field id
			$this->_key = 'id';			 
			// Gọi hàm khởi tạo cha
			parent::__construct();
    	}	
	}
	$stadium= new stadium_a();	
	
	$sql="select * from sanbong limit $batdau, $num";
	
	if(isset($_POST["search"])){		
		$quan=$_POST["quan"];		
		if($quan!="") 
				$sql="select * from sanbong where quan like '$quan' order by id ASC limit $batdau, $num";				
	}
	$san=array();
	$san=$stadium->get_list($sql);	
	
	?>
<div id="list-stadium">	
    <div class="tieu-de">
       <h1><span>Danh sách các sân bóng</span> </h1>        
        <div> 
        <?php include("blocks/stadium/search.php"); ?> 
            <a href="index.php?ctr=stadium" class="btn btn-info">Tất cả sân</a>
            <a href="index.php?quanly=stadium&amp;ac=add&amp;step=2" class="btn btn-success">Thêm sân</a> 
        </div>      
        <div class="xoa"></div>      
    </div>
     <div class="list-sanbong">
        <?php if(isset($_POST["search"])&&($quan!="")){?>
        <div class="result">
            <h4> Các sân bóng tại:</h4>
                <?php               
                if($quan!="") echo ($quan."   <br> ");
                ?>
        </div>
        <?php 
            }
        ?>
        <?php
             while ($row=mysqli_fetch_array($san))
              { 	
			  $picture=$row["anhdaidien"];
			  if($picture=="") {$picture="../images/logo/stadium_default.jpg"; }
        ?>
            <div class="box-sanbong">
                <img src="<?php echo $picture ?>" alt="<?php echo $row["name"]?>">
                <div class="caption">
                    <h3><?php echo $row["name"]?></h3><br>
                    <p><em><u>Địa chỉ:</u></em> <?php echo $row["duong"]." ,Phường ".$row["phuong"]." ,".$row["quan"] ?></p>
                    <p style="  margin: 5px 0 "><br>
                        <a href ="#" class="btn btn-primary">Chi tiết</a>                   
                    </p>
                </div>	
            </div>
            <?php
              }
            ?>    
      </div> 
</div>
<div class="xoa"></div>
