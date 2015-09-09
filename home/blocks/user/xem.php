<?php 
	
	$ei		=$energy->select_by_id('*', $_id);
	$inform=$user->select_by_id('*', $_id);
	
	$picture=$inform["anhdaidien"];
	
	if($picture==""){
		$picture="../images/profile/photo.jpg";
	}

	
?>
<link href="../../../css/style.css" rel="stylesheet" type="text/css">

<div class="inform-left">
	<div class="tieu-de grey2">
    	  <h2><span>Sơ lược tiểu sử</span></h2> 	
    </div>    
  
  <div id="basic-profile">
    	<div id="picture-profile">
        	<h1 style="margin-bottom:8px;"><?php echo $inform["fullname"] ?></h1>
            <div class="picture">
                <img src="<?php echo $picture ?>" alt="<?php echo $inform["fullname"] ?>">
                 <a class="edit-picture btn-file" href="?ctr=user&ac=edit-picture"> 
                		Thay đổi ảnh
                 </a>               
            </div>
            <?php
				if(isset($_GET["ac"])&&$_GET["ac"]=="edit-picture"){ ?>
            <form action="blocks/user/xuli.php?id=<?php echo $_id?>" method="post" enctype="multipart/form-data" 		class="edit-pic"> 
                	<input type="file" name="edit-picture" class="btn" ><br /><br />
                    <input type="submit" name="change-picture" value="Apply" class="btn btn-success"/>
                    <a href="index.php?ctr=user" class="btn btn-danger">Hủy</a> 
             </form>
             <?php
				}
			?>  
              
        </div>
        <div id="basic-info">
        	<a href="index.php?ctr=user&ac=edit" class="btn btn-default" style="margin-bottom:10px;float: right">Chỉnh sửa</a>
        	<table width="100%" class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width="40%"><strong>Tên</strong></td>
                  <td width="60%"><?php echo $inform["fullname"]?></td>
                </tr>
                <tr>
                  <td><strong>Giới tính</strong></td>
                  <td><?php echo $inform["gioitinh"] ?></td>
                </tr>
                <tr>
                  <td><strong>Ngày sinh</strong></td>
                  <td><?php echo $inform["ngaysinh"] ?></td>
                </tr>
                <tr>
                  <td><strong>Tuổi</strong></td>
                  <td><?php echo getAge($inform["ngaysinh"]) ?></td>
                </tr>
                <tr>
                  <td><strong>Vị trí đá hay nhất</strong></td>
                  <td><?php echo $inform["position"] ?></td>
                </tr>
                <tr>
                  <td><strong>Vị trí đá tệ nhất</strong></td>
                  <td><?php echo $inform["position2"] ?></td>
                </tr>
                <tr>
                  <td><strong>Công việc</strong></td>
                  <td><?php echo $inform["job"] ?></td>
                </tr>
                <tr>
                  <td><strong>Địa điểm công tác</strong></td>
                  <td><?php echo $inform["place"] ?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td><?php echo $inform["email"]?></td>
                </tr>
                <tr>
                  <td><strong>Số điện thoại</strong></td>
                  <td><?php echo $inform["sodienthoai"]?></td>
                </tr>
                 <tr>
                  <td><strong>Facebook</strong></td>
                  <td><?php echo $inform["facebook"]?></td>
                </tr>
              </tbody>
            </table>

      </div>
  </div>
  
	<div class="xoa"></div>
      <div class="box-inform">
            <div class="tieu-de red">
                <span>Miêu tả về bản thân</span>
              <?php  if(!isset($_GET["ac"])||($_GET["ac"]!="descript")) { ?>
			  	<a href="index.php?ctr=user&ac=descript" class="btn btn-default right">Edit</a>
                <div class="xoa"></div>
                <?php
			  }
			  ?>
                               
           </div>
           <?php
			if(isset($_GET["ac"])&&$_GET["ac"]=="descript") {?>
							
				<div class="form-group">
                <form action="blocks/user/xuli.php?id=<?php echo $_id ?> " method="post">	
                  <textarea class="form-control" rows="5" name="descript" 
                  value="<?php echo $inform["descript"] ?>"></textarea>
                  <input type="submit" name="desciption"  value="Submit" class="btn btn-info"/>
                  </form>
                </div>				
		<?php	}else{
			?>
            <div class="noidung">
            	<?php echo $inform["descript"] ?>
            </div>	
            <?php
			}
        ?>            
  </div> 
  
    
    
</div>
<div class="inform-right">
  <a href="?ctr=match&ac=taotran" class="btn btn-info right" >Tạo trận</a>
  <div class="xoa"></div>	
  <div class="box-inform">
	<div class="tieu-de red"><h4><span>Chỉ số sức mạnh</span></h4></div>
		<?php include("blocks/user/energy.php") ?>

  </div> 
	
</div>