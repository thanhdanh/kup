<link href="../../../css/style.css" rel="stylesheet" type="text/css">
<form action="" method="post">
<table width="474" border="1" class="table table-hover">
  <tbody>
    <tr>
      <td height="48" colspan="2" style="background:#ED354C; font-size:19px">CHỨC NĂNG TẠO TRẬN ĐẤU</td>
    </tr>
    <tr>
      <td width="150" height="56">Chọn ngày</td>
      <td width="308">
      	<select name="date">
      	<?php			
        	for ($i=0; $i<=9; $i++){			
         ?> 
         	<option value="<?php echo date("d/m/Y",strtotime("+ $i day"))?>" ><?php echo date("d/m/Y",strtotime("+ $i day"))?></option> <?php } ?>
            
         </select>	  
        </td>
    </tr>
    <tr>
      <td height="58">Thời gian bắt dầu</td>
      <td>   
     	 <select name="gio">               
                 <?php 
                    for($i = 1; $i <=12 ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>"> <?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                  </option>
                  <?php
                    }
                ?>             
                   </select>&nbsp;:
                   <select name="phut">                    		             
                      <option value="00">00</option>
                      <option value="30">30</option>                  
                   </select>&nbsp;:
                    <select name="buoi">
                      <option value="AM" >AM</option>
                      <option value="PM" >PM</option>
                         
                  </select>
         
          
         
          </td>
    </tr>
    <tr>
      <td height="60">Trận đấu kéo dài</td>
      <td><select name="howlong">

        <option value="1h" >1 tiếng</option>
      <option value="1h30"> 1 tiếng rưỡi</option>
      <option value="2h"> 2 tiếng </option>              
      	</select>
      </td>
    </tr>
   
    <tr>
     
   
    </tr>
    <tr>
      <td height="70">Hình thức liên lạc: </td>
      <td ><input type="text" name="contact" id="contact"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td  height="70"><input type="submit" name="sua" id="sua" value="Đồng ý" class="btn btn-success">&nbsp;
      <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-danger">
       <a href="#" class="button">Hủy</a>
      </td>
    </tr>
  </tbody>
</table>
</form>
