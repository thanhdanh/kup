<?php 	
	ob_start();
	$ei		=$energy->select_by_id('*', $_id);
	$inform=$user->select_by_id('*', $_id);
	
	
	if(isset($_POST["edit"])){
		
		$fullname = $_POST["name"];
		$bd_d = $_POST["bd_d"];
		$bd_m = $_POST["bd_m"];
		$bd_y = $_POST["bd_y"];				
		$phone = $_POST["phone"];
		$facebook=$_POST["facebook"];
		$position1=$_POST["position1"];
		$position2=$_POST["position2"];
		$job	=$_POST["job"];
		$place= $_POST["place"];
		$email=$_POST["email"];
		$sex=$_POST["gioitinh"];
		
		$error = array();
		// kiểm tra ngày hợp lệ
		if(($bd_d != "" || $bd_m != "" || $bd_y != "") && !checkdate($bd_m,$bd_d,$bd_y)){
			$error[] = "Ngày sinh không hợp lệ!";
		}
		else{
			$bd = $bd_y."-".$bd_m."-".$bd_d; // định dạng insert vào mysql
		}
		if($email == ""){
			$error[] = "Chưa điền Email!";
		}
		else{
			// Dùng Regular Expression kiểm tra định dạng email
			if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)){
				$error[] = "Email không hợp lệ!";
			}
			else{
				// Kiểm tra Username tồn tại trong CSDL
				$check=$user->check_by_key($email, "email");
				if( $check!= 0 && $email!=$inform["email"]){
					$error[] = "Email ".$email." đã tồn tại! ";
			   }
			}
		}
		// Kiểm tra lỗi và thông báo
		$tb = "";
		if(count($error)!= 0){
			foreach($error as $e){
				$tb .= "<br>".$e;
			}
		}
		else{			
			$user->update_by_id(array('fullname'=>$fullname, 'ngaysinh'=>$bd, 'sodienthoai'=>$phone,
				'position'=>$position1, 'position2'=>$position2,'email'=>$email, 'job'=>$job,
				'place'=>$place, 'facebook'=>$facebook, 'gioitinh'=>$sex
			), $_id);	
				
			header("location: index.php?ctr=user");	
			ob_flush();	
		}	
	}	
?>
<div class="inform-left">
	<div class="tieu-de grey2">
    	  <h2><span>Sơ lược tiểu sử</span></h2> 	
    </div>    
  
  <div id="basic-profile">
    	<div id="picture-profile">
        	
        	<h1 style="margin-bottom:8px;"><?php echo $inform["fullname"] ?></h1>
            <div class="picture">
                <img src="<?php echo $picture ?>" alt="<?php echo $inform["fullname"] ?>">                         
            </div>    
        </div>
        <div id="basic-info">			
        <form action=" " method="post" name="dangky">
        	<a href="index.php?ctr=user" class="btn btn-danger">Quay lại</a>	
        	<input type="submit" value="Apply" class="btn btn-success" name="edit">
          <div><?php if(isset($tb) && $tb!="")echo $tb; ?></div>
            <table width="368" class="table table-striped table-bordered">
              <tbody>
           
                <tr>
                  <td width="130"><strong>Tên</strong></td>
                  <td width="226"><input type="text" value="<?php echo $inform["fullname"] ?>" name="name"></td>
                </tr>
                <tr>
                  <td><strong>Giới tính</strong></td>
                  <td><select name="gioitinh">
                  		<option value="Nam" <?php if($inform["gioitinh"]=="Nam"){ ?> selected="selected" <?php }?>>Nam</option>
                        <option value="Nữ" <?php if($inform["gioitinh"]=="Nữ"){ ?> selected="selected" <?php }?>>Nữ</option>
                  		</select>
                  </td>
                </tr>
                <tr>
                  <td><strong>Ngày sinh</strong></td>
                  <td>
                  <?php $ns = explode("-",$inform["ngaysinh"]);?>
                  	<select name="bd_d">
                <?php 
				
                    for($i = 1; $i <=31 ; $i++)
                    {    
                ?>
                <option value="<?php echo $i; ?>" <?php if($ns[2]== $i){?> selected="selected"<?php }?>><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                <?php
                    }
                ?>
              </select>
                <select name="bd_m">
                  <?php 
                    for($i = 1; $i <=12 ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>" <?php if($ns[1]== $i){?> selected="selected"<?php }?>><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                  <?php
                    }
                ?>
              </select>
              <select name="bd_y">
                  <?php 
                    for($i = (date("Y") - 40); $i <= (date("Y") - 8) ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>" <?php if($ns[0]== $i){?> selected="selected"<?php }?>><?php echo $i; ?></option>
                  <?php
                    }
                ?>
              </select>
			</td>
                </tr>               
                <tr>
                  <td><strong>Vị trí đá hay nhất</strong></td>
                  <td>
                  	<input name="position1" type="radio" value="Tiền đạo" checked="checked" /> Tiền đạo &nbsp; &nbsp; &nbsp; &nbsp;
                    <input name="position1" type="radio" value="Tiền vệ giữa" /> Tiền vệ giữa<br>                    
                    <input name="position1" type="radio" value="Đá cánh trái" /> Đá cánh trái &nbsp;
                    <input name="position1" type="radio" value="Đá cánh phải" /> Đá cánh phải<br>
                    <input name="position1" type="radio" value="Hậu vệ" /> Hậu vệ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="position1" type="radio" value="Thủ môn" /> Thủ môn 
                  </td>
                </tr>
                <tr>
                  <td><strong>Vị trí đá tệ nhất</strong></td>
                  <td><input name="position2" type="radio" value="Tiền đạo"  /> Tiền đạo &nbsp; &nbsp; &nbsp; &nbsp;
                    <input name="position2" type="radio" value="Tiền vệ giữa" /> Tiền vệ giữa<br>                    
                    <input name="position2" type="radio" value="Đá cánh trái" /> Đá cánh trái &nbsp;
                    <input name="position2" type="radio" value="Đá cánh phải" checked="checked" /> Đá cánh phải<br>
                    <input name="position2" type="radio" value="Hậu vệ" /> Hậu vệ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="position2" type="radio" value="Thủ môn" /> Thủ môn</td>
                </tr>
                <tr>
                  <td><strong>Công việc</strong></td>
                  <td><input type="text" value="<?php echo $inform["job"]?>" name="job"></td>
                </tr>
                <tr>
                  <td><strong>Địa điểm công tác</strong></td>
                  <td><input type="text" value="<?php echo $inform["place"]?>" name="place"></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td><input type="text" value="<?php echo $inform["email"]?>" name="email"></td>
                </tr>
                <tr>
                  <td><strong>Số điện thoại</strong></td>
                  <td><input type="text"  name="phone" value="<?php echo $inform["sodienthoai"]?>" ></td>
                </tr>
                 <tr>
                  <td><strong>Facebook</strong></td>
                  <td><input type="text" name="facebook" value="<?php echo $inform["facebook"]?> "></td>
                </tr>
              </tbody>
            </table>
		</form>
      </div>
  </div>
  
	<div class="xoa"></div>
    
   <div class="box-inform">
   		<div class="tieu-de red"><span>Miêu tả về bản thân</span>
         
              
        </div>
        
   </div> 
    
    
</div>
<div class="inform-right">
  <div class="box-inform">
	<div class="tieu-de red"><h4><span>Chỉ số sức mạnh</span></h4></div>
     <?php include("blocks/user/energy.php") ?>

   </div> 	
</div>
<?php ob_flush()?>