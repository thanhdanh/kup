 <table width="100%" class="table table-hover">
  <tbody>
    <tr>
      <td width="277">Tấn công</td>
      <td width="676">
      		<?php energy($ei["tancong"])?>
       </td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=tancong&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["tancong"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=tancong&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=tancong&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Phòng thủ</td>
      <td><?php energy($ei["phongthu"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=phongthu&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["phongthu"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=phongthu&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=phongthu&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
       
    </tr>
    <tr>
      <td>Dứt điểm</td>
      <td><?php energy($ei["dutdiem"])?></td>
     <td width="50">
      		<form action="blocks/user/xuli.php?ac=dutdiem&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["dutdiem"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=dutdiem&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=dutdiem&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Chuyền</td>
      <td><?php energy($ei["chuyen"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=chuyen&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["chuyen"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=chuyen&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=chuyen&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Rê bóng</td>
      <td><?php energy($ei["rebong"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=rebong&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["rebong"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=rebong&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=rebong&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Kỹ thuật</td>
      <td><?php energy($ei["kythuat"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=kythuat&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["kythuat"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=kythuat&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=kythuat&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Đánh đầu</td>
      <td><?php energy($ei["danhdau"])?></td>
     <td width="50">
      		<form action="blocks/user/xuli.php?ac=danhdau&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["danhdau"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=danhdau&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=danhdau&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td height="23">Phản xạ</td>
      <td><?php energy($ei["phanxa"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=phanxa&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["phanxa"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=phanxa&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=phanxa&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Tốc độ</td>
      <td><?php energy($ei["tocdo"])?></td>
       <td width="50">
      		<form action="blocks/user/xuli.php?ac=tocdo&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["tocdo"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=tocdo&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=tocdo&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Đồng đội</td>
      <td><?php energy($ei["dongdoi"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=dongdoi&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["dongdoi"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=dongdoi&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=dongdoi&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td height="31">Tâm lý thi đấu</td>
     <td><?php energy($ei["tamly"])?></td>
     <td width="50">
      		<form action="blocks/user/xuli.php?ac=tamly&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["tamly"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=tamly&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=tamly&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
    <tr>
      <td>Bắt bóng</td>
      <td><?php energy($ei["batbong"])?></td>
      <td width="50">
      		<form action="blocks/user/xuli.php?ac=batbong&id=<?php echo $_id?>" method="post">
	  			<input type="text" value="<?php echo $ei["batbong"] ?>" name="streng"  />
            	<input type="submit" name="submit" hidden="true"  />
        	</form>      		
      </td>
      <td width="17">
      	<div class="fun">        	
           <a href="blocks/user/xuli.php?ac1=batbong&ac2=inc&id=<?php echo $_id?>" class="small-btn">+</a>
      		<a href="blocks/user/xuli.php?ac1=batbong&ac2=desc&id=<?php echo $_id?>" class="small-btn">-</a>       
        </div>
        </td>
    </tr>
  </tbody>
</table>