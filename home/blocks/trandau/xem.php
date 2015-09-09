<?php	
	//---------------------------------------------		
		
	$idcauthu=get_User_Id();
	$sql=mysql_query("select * from trandau where trangthai=1  and iddoia not in (select id from doibong join doibongvacauthu on doibong.id=doibongvacauthu.iddoibong where 
	doibongvacauthu.idcauthu ='$idcauthu')  order by id desc" );
	?>
  <div id="trandau"> 
	<div class="match-top">    	
		<?php all_Match($sql, "BẠN CÓ MUỐN THAM GIA CÁC TRẬN ĐẤU MỚI")  ?>  
  	</div>      

<?php 
	$sql="select * from trandau where trandau.iddoia in(select id from doibong join doibongvacauthu on doibong.id=doibongvacauthu.iddoibong where 
	doibongvacauthu.idcauthu ='$idcauthu') and trangthai=1";
	$query=mysql_query($sql);
	
 ?>
 <div class="match-bottom">
 	<div class="match-bottom-left">
   	  <div class="header">CÁC TRẬN ĐẤU CÓ NGƯỜI THAM GIA</div>
        <table width="94%" border="0" class="inform-table" >
      <tbody>
        <tr>
          <td width="6%"><div align="center"><strong><em>STT</em></strong></div></td>
          <td width="22%"><div align="center"><strong><em>Đội của bạn</em></strong></div></td>
          <td width="18%"><div align="center"><strong><em>Thời gian</em></strong></div></td>
          <td width="17%"><div align="center"><strong><em>Địa điểm</em></strong></div></td>
          <td width="37%"><div align="center"><strong><em>Các đội muốn tham gia</em></strong></div></td>
        </tr>
        <?php $i=1;
		 while ($dong=mysql_fetch_array($query)){
			 $doi=get_Team($dong["iddoia"]);
			 $san=get_San($dong["idsanbong"]);	
		?>
        <tr>
          <td height="53"><div align="center"><?php echo $i;?></div></td>
          <td><div class="box_team">
            <div align="center">
              <?php  echo $doi["name"]?><br />
              <img src="<?php echo $doi["anhdaidien"]?>" width="30%" />
            </div>
          </div></td>
          <td><div align="center"><?php echo $dong["time"]?><br /><?php echo $dong["date"]?></div></td>
          <td><div align="center">Sân <?php echo $san["name"]?></div></td>
          <td style="overflow:auto"><?php 
		  $qr=get_doi_thamgia($dong["id"]);
		  	while ($row=mysql_fetch_array($qr)){  ?>
				<div class="box_team1">
                <div align="center">
                  <?php  $team=get_Team($row["iddoib"]);
				  echo $team["name"] ; ?><br />
              <img src="<?php echo $team["anhdaidien"]?>" width="30%" /><br />
				<a href="blocks/trandau/xuli.php?ac=dongy&idtran=<?php echo $dong["id"]?>" class="button">Đồng ý</a>  
                  
                </div>
              </div>
			<?php } ?>
		  </td>
        </tr>
        <?php $i++;} ?>
      </tbody>
    </table>

    </div>
    <?php 
	$sql="select *from trandau where trangthai=2";
	$query=mysql_query($sql);
	
 ?>
    <div class="match-bottom-right">
        <div class="header">CÁC TRẬN ĐẤU SẮP DIỄN RA</div>
        <table width="100%" border="1" class="inform">
      <tbody>    
        <?php if(mysql_num_rows($query)==0){
                include("modules/no-content.php");
            }
            else{
        ?>
        <tr>
          <td width="32" height="38"><div align="center"><strong>STT</strong></div></td>
          <td width="111"><div align="center"><strong>Đội thách đấu</strong></div></td>
          <td width="54">&nbsp;</td>
          <td width="129"><div align="center"><strong>Đội tham chiến</strong></div></td>
        </tr>
            <?php
            $i=1;
            while ($dong=mysql_fetch_array($query)){
            ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php
             
            ?></td>
          <td><div align="center"><strong>VS</strong></div></td>
          <td>&nbsp;</td>
        </tr>
        <?php }
        }?>
      </tbody >
    </table>
    
    
    </div>
    </div>
</div>