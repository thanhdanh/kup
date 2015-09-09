<?php	
 		include("../libs/DB_Business.php"); 
        $xuly=(isset($_POST['xuly']))?1:0;
		if($xuly){  // Nếu ấn nút Xác nhận
            // Lấy giá trị các field từ form
			
				$fullname = $_POST["fullname"];
				$bd_d = $_POST["bd_d"];
				$bd_m = $_POST["bd_m"];
				$bd_y = $_POST["bd_y"];				
				$city = $_POST["city"];
				$username = $_POST["username"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$phone = $_POST["phone"];	
						
				// Ngày đăng ký
				$ngaydk = date("Y-m-d");
				// Khai báo mảng lỗi
				$error = array();
				// kiểm tra ngày hợp lệ
				if(($bd_d != "" || $bd_m != "" || $bd_y != "") && !checkdate($bd_m,$bd_d,$bd_y)){
					$error[] = "Ngày sinh không hợp lệ!";
				}
				else{
					$bd = $bd_y."-".$bd_m."-".$bd_d; // định dạng insert vào mysql
				}
				class user_a extends DB_Business{
				function __construct()
					{
						// Khai báo tên bảng
						$this->_table_name = 'users';			 
						// Khai báo tên field id
						$this->_key = 'id';			 
						// Gọi hàm khởi tạo cha
						parent::__construct();
					}
				}	
				$user=new user_a();
				
				class energy_a extends DB_Business{
				function __construct()
					{
						// Khai báo tên bảng
						$this->_table_name = 'energy';			 
						// Khai báo tên field id
						$this->_key = 'email';			 
						// Gọi hàm khởi tạo cha
						parent::__construct();
					}
				}	
				$energy=new energy_a();
				
				// Kiểm tra username 
				if($username == ""){
						$error[] = "Chưa điền username!";
					}
					else{
						$check=$user->check_by_key($username, "username");
						
						if( $check!= 0){
							$error[] = "Username ".$username." đã tồn tại! ";
							
						}
					}
				
				// Kiểm tra email
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
						if( $check!= 0){
							$error[] = "Email ".$email." đã tồn tại! ";
					   }
					}
				}
				if($password == ""){
					$error[] = "Chưa nhập mật khẩu!";
				}				
				else{
					$password = md5($password); // mã hóa md5 password
				}			
				// Kiểm tra lỗi và thông báo
				$tb = "";
				if(count($error)!= 0){
					foreach($error as $e){
						$tb .= "<br>".$e;
					}
				}
				else{
					$dich="";
					$user->add_new(array('fullname'=>$fullname, 'ngaysinh'=>$bd, 'sodienthoai'=>$phone,
						'noisong'=>$city, 'username'=>$username, 'email'=>$email, 'password'=>$password,
						'ngaydangky'=>$ngaydk
					));
															
					$id=$user->check_by_key($email, 'email');					
					$id=$id["id"];
					if(count($id)!=0){
						$energy->add_new(array('id'=>$id));	
						$energy->__destruct();
					}					
					header("location:../?r=success");	
				}					} 
			else{
				$xacnhan="<font color='#000000' style='font-size:18px' > Mã xác nhận sai, vui lòng nhập lại thông tin </font>";
			}
        
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link type="text/css" rel="stylesheet" href="dangky.css" />

</head>

<body> 
    <div class="wrap">	
    <form name="dangky" action="" method="post">
    <div id="form_wapper">
      <div id="form_head">
            Đăng ký tài khoản</div> 
         <div class="notify"><? echo $tb;?> </div>          
        <div class="form_title">
               Thông tin đăng ký
        </div>
       <div class="form_field">
         <table width="100%" class="table table-bordered">
           <tr>
              <td height="30" colspan="2">Bạn phải khai báo đầy đủ mục có đánh dấu (*).</td>
            </tr>
            <tr>
              <td width="30%" height="32">Tên đầy đủ: </td>
              <td width="70%"><input name="fullname" type="text" size="30" /></td>
            </tr>
            <tr>
              <td height="32" >Ngày sinh: </td>
              <td height="32" ><select name="bd_d">
                <?php 
                    for($i = 1; $i <=31 ; $i++)
                    {    
                ?>
                <option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                <?php
                    }
                ?>
              </select>
                <select name="bd_m">
                  <?php 
                    for($i = 1; $i <=12 ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                  <?php
                    }
                ?>
              </select>
                <select name="bd_y">
                  <?php 
                    for($i = (date("Y") - 40); $i <= (date("Y") - 8) ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php
                    }
                ?>
              </select></td>
            </tr>
            <tr>
              <td height="32" >Điện thoại:</td>
              <td><input type="text" name="phone" id="phone" /></td>
            </tr>
            <tr>
              <td height="32">Nơi sống: </td>
              <td ><select class="city" name="city">
                <option>[Chọn tỉnh]</option>
                <option value="An Giang">An Giang </option>
                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu </option>
                <option value="Bắc Giang">Bắc Giang </option>
                <option value="Bắc Kạn">Bắc Kạn </option>
                <option value="Bạc Liêu">Bạc Liêu </option>
                <option value="Bắc Ninh">Bắc Ninh </option>
                <option value="Bến Tre">Bến Tre </option>
                <option value="Bình Định">Bình Định </option>
                <option value="Bình Dương">Bình Dương </option>
                <option value="Bình Phước">Bình Phước </option>
                <option value="Bình Thuận">Bình Thuận </option>            
                <option value="Cà Mau">Cà Mau </option>
                <option value="Cao Bằng">Cao Bằng </option>
                <option value="Đắk Lắk">Đắk Lắk </option>
                <option value="Đắk Nông">Đắk Nông </option>
                <option value="Điện Biên">Điện Biên </option>
                <option value="Đồng Nai">Đồng Nai </option>
                <option value="Đồng Tháp">Đồng Tháp </option>
                <option value="Đồng Tháp">Đồng Tháp </option>
                <option value="Gia Lai">Gia Lai </option>
                <option value="Hà Giang">Hà Giang </option>
                <option value="Hà Nam">Hà Nam </option>
                <option value="Hà Tĩnh">Hà Tĩnh </option>
                <option value="Hải Dương">Hải Dương </option>
                <option value="Hậu Giang">Hậu Giang </option>
                <option value="Hòa Bình">Hòa Bình </option>
                <option value="Hưng Yên">Hưng Yên </option>
                <option value="Khánh Hòa">Khánh Hòa </option>
                <option value="Kiên Giang">Kiên Giang </option>
                <option value="Kon Tum">Kon Tum </option>
                <option value="Lai Châu">Lai Châu </option>
                <option value="Lâm Đồng">Lâm Đồng </option>
                <option value="Lạng Sơn">Lạng Sơn </option>
                <option value="Lào Cai">Lào Cai </option>
                <option value="Long An">Long An </option>
                <option value="Nam Định">Nam Định </option>
                <option value="Nghệ An">Nghệ An </option>
                <option value="Ninh Bình">Ninh Bình </option>
                <option value="Ninh Thuận">Ninh Thuận </option>
                <option value="Phú Thọ">Phú Thọ </option>
                <option value="Quảng Bình">Quảng Bình </option>
                <option value="Quảng Bình">Quảng Bình </option>
                <option value="Quảng Ngãi">Quảng Ngãi </option>
                <option value="Quảng Ninh">Quảng Ninh </option>
                <option value="Quảng Trị">Quảng Trị </option>
                <option value="Sóc Trăng">Sóc Trăng </option>
                <option value="Sơn La">Sơn La </option>
                <option value="Tây Ninh">Tây Ninh </option>
                <option value="Thái Bình">Thái Bình </option>
                <option value="Thái Nguyên">Thái Nguyên </option>
                <option value="Thanh Hóa">Thanh Hóa </option>
                <option value="Thừa Thiên Huế">Thừa Thiên Huế </option>
                <option value="Tiền Giang">Tiền Giang </option>
                <option value="Trà Vinh">Trà Vinh </option>
                <option value="Tuyên Quang">Tuyên Quang </option>
                <option value="Vĩnh Long">Vĩnh Long </option>
                <option value="Vĩnh Phúc">Vĩnh Phúc </option>
                <option value="Yên Bái">Yên Bái </option>
                <option value="Phú Yên">Phú Yên </option>
                <option value="Tp.Cần Thơ">Tp.Cần Thơ </option>
                <option value="Tp.Đà Nẵng">Tp.Đà Nẵng </option>
                <option value="Tp.Hải Phòng">Tp.Hải Phòng </option>
                <option value="Tp.Hà Nội">Tp.Hà Nội </option>
                <option value="TP  HCM">TP HCM </option>
              </select></td>
            </tr>
          </table>
      </div>
         <div class="form_title">
               Thông tin tài khoản
        </div>
       <div class="form_field">
         <p>
            <table width="100%" border="0" class="table table-bordered">
              <tbody>
                <tr>
                  <td width="146" height="32">Tên đăng nhập:</td>
                  <td width="226" height="32">
                  <input type="text" name="username" id="username" />
				  
                        </td>
                  <td width="17" class="tick">(*)</td>
                  <td width="93" class="tick"></td>
                </tr>
                <tr>
                  <td height="37">Mật khẩu:</td>
                  <td><input type="password" name="password" id="password" size="17" /></td>
                  <td class="tick">(*)</td>
                  <td class="tick">&nbsp;</td>
                </tr>
                <tr>
                  <td height="42">Địa chỉ Email:</td>
                  <td><input type="email" name="email" id="email" /></td>
                  <td class="tick">(*)</td>
                  <td class="tick">&nbsp;</td>
                </tr>
              </tbody>
            </table>

         </p>      
             <div class="control">
               <input type="submit" name="send" value="  Đăng ký  " class="btn btn-success"/>    
                <input  type="reset" name="reset" value="  Nhập lại  " class="btn btn-danger"/>
               <input name="xuly" type="hidden" value="1" />
         </div>
           </blockquote>
         </blockquote>
      </div>
    </div>
    </form> 

	</div>
</body>
</html>