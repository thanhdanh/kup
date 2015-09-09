 <style>
 	#content{
		background-image:url(../../../stadium/images/background/back3.jpg);
		background-size:cover;
		background-repeat:no-repeat;
	}	
 </style>
 <?php 
 if(isset($_POST["them"])){		
	$name=$_POST["name"];	
	$so= $_POST["so"];
	$phuong= $_POST["phuong"];
	$duong= $so.' '.$_POST["duong"];
	$quan= $_POST["quan"];	
	$city= $_POST["city"];	
	$phone= $_POST["phone"];	
	
	class Stadium extends DB_Business{
		function __construct()
    	{
			// Khai báo tên bảng
			$this->_table_name = 'stadium';			 
			// Khai báo tên field id
			$this->_key = 'id';			 
			// Gọi hàm khởi tạo cha
			parent::__construct();
    	}
	}	
	$san = new Stadium();
	
		
	$url='';		
	$tenanh	=$_FILES["anhdaidien"]["name"];
	
	if($tenanh !='')
		upload_image("anhdaidien", &$url);
		
	$san->add_new(array('name'=>$name, 'duong'=>$duong, 'phuong'=>$phuong, 'quan'=>$quan,
		'phone'=>$phone, 'anhdaidien'=>$url, 'city'=>$city
	));
	header("location: index.php?ac=add&step=2");
	}
	
 ?>
 
 
 <div id="form-add">
 
 <div class="step">
 	Bước 1
 </div>
 
<form action="<?php $_SERVER['../../../stadium/PHP_SELF'] ?>" method ="post" enctype="multipart/form-data">

<table width="650" class="table table-bordered">
  <tbody>
    <tr>
    	
      <td height="48" colspan="4" class="tieu-de" >
      	<div align="center">
      	<strong>
        	<img src="../../../stadium/images/icon/ball.png" class="icon"/>
            	CHỨC NĂNG THÊM MỚI SÂN BÓNG</strong>
			<img src="../../../stadium/images/icon/ball.png" class="icon"/>                
                
      </td>
      
    </tr>
    <tr>
      <td width="202" height="43">
      <div align="center"><strong>Tên sân bóng</strong></div></td>
      <td colspan="3"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td height="41"><div align="center"><strong>Ảnh đại diện</strong></div></td>
      <td colspan="3">
      			<span class="btn btn-info btn-file">
    					Browse... <input type="file" name="anhdaidien">
				</span>
     </td>
    </tr>         
    <tr>
      <td height="94"><div align="center"><strong>Địa chỉ</strong></div></td>
      <td colspan="3">
        <p>Số:
          <input type="text" name="so" size="3"> 	
          &nbsp;Đường:<input type="text" name="duong" size="14">
          </p>
        <p><br />
          Phường:<input type="text" name="phuong" size="5">
          &nbsp;Quận:
          <select name="quan">
            <option value="Quận 1" selected="selected">Quận 1</option>
            <option value="Quận 12">Quận 12</option>
            <option value="Quận Thủ Đức">Quận Thủ Đức</option>
            <option value="Quận 9">Quận 9</option>
            <option value="Quận Gò vấp">Quận Gò vấp</option>
            <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
            <option value="Quận Tân Bình">Quận Tân Bình</option>
            <option value="Quận Tân Phú">Quận Tân Phú</option>
            <option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
            <option value="Quận 2">Quận 2</option>
            <option value="Quận 3">Quận 3</option>
            <option value="Quận 10">Quận 10</option>
            <option value="Quận 11">Quận 11</option>
            <option value="Quận 4">Quận 4</option>
            <option value="Quận 5">Quận 5</option>
            <option value="Quận 6">Quận 6</option>
            <option value="Quận 7">Quận 7</option>
            <option value="Quận 8">Quận 8</option>       
          </select>
        </p><br />
        <p>Thành phố:
        	 <select name="city">
             	<option value="Tp Hồ Chí Minh">Hồ Chí Minh</option>
                <option value="Hà Nội">Hà Nội</option>
                <option value="Đà Nẵng">Đà Nẵng</option>
             </select>
        </p>    
         
      </td>
    </tr>   
    <tr>
      <td height="50"><div align="center"><strong>Số điện thoại của sân</strong></div></td>
      <td colspan="3">
        <input type="text" name="phone" size="20" />
        </td>
    </tr>
    <tr>
      <td height="61"><div align="center"></div></td>
      <td width="84"><input type="submit" name="them" id="them" value="Thêm sân" class="btn btn-success"></td>
      <td width="110"><input type="reset" name="reset" id="reset" value=" Reset " class="btn btn-danger"></td>
      <td width="234"><a href="../../../stadium/index.php" title="Back">
    	<img src="../../../stadium/images/icon/return.png" width="50" height="50">
    </a></td>
      
    </tr>
  </tbody>
</table>
</form>
</div>



