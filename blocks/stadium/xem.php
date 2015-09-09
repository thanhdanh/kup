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
		$phuong=$_POST["phuong"];
		$quan=$_POST["quan"];		
		if($quan!="" && $phuong!="")		
			$sql="select * from sanbong where phuong like '$phuong' and quan like '$quan' order by id ASC limit $batdau, $num";
		else if($quan==""&& $phuong!="") 
			$sql="select * from sanbong where phuong like '$phuong' order by id ASC limit $batdau, $num";	
		else if($phuong==""&&$quan!="") 
			$sql="select * from sanbong where quan like '$quan' order by id ASC limit $batdau, $num";				
	}
	$san=array();
	$san=$stadium->get_list($sql);	
	
	?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<div id="list-stadium">	
    <div class="tieu-de">
        <div style="float: left; margin-right: 60px;"><h2>Danh sách các sân bóng </h2></div>
        <?php include("blocks/stadium/search.php"); ?>  
        <a href="index.php" class="btn btn-default">Tất cả sân</a>
        <a href="#" class="btn btn-success right">Thêm sân</a>       
        <div class="xoa"></div>      
    </div>
     <div class="list-sanbong">
        <?php if(($_POST["search"])&&($phuong!="" || $quan!="")){?>
        <div class="result">
            <h2> Các sân bóng tại 
                <?php
                if($phuong !="") echo (" &nbsp; Phường: ".$phuong. " &nbsp; ");
                if($quan!="") echo ($quan."   <br> ");
                ?>
            </h2>
        </div>
        <?php 
            }
        ?>
        <?php
             while ($row=mysqli_fetch_array($san))
              { 	
			  $picture=$row["anhdaidien"];
			  if($picture=="") {$picture="images/logo/stadium_default.jpg"; }
        ?>
            <div class="box-sanbong">
                <img src="<?php echo $picture ?>" alt="<?php echo $row["name"]?>" height="110" width="110">                
                <h4 class="ten-san"><?php echo $row["name"]?></h4><br>
                <p><?php echo $row["diachi"]?></p>
              	<p>
                    <a href ="#" class="btn btn-primary" style="margin-left: 10px">Chi tiết</a>                   
                </p>
                	
      		 </div>
            <?php
              }
            ?>    
      </div> 
</div>
<div class="xoa"></div>
