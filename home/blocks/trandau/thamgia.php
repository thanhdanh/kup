<title>Tham gia</title>
<link type="text/css" rel="stylesheet" href="blocks/trandau/thamgia.css" />
<?php 		
		$idcauthu=get_User_Id();
		$doibong=mysql_query("select name, id from doibong join doibongvacauthu on doibong.id=doibongvacauthu.iddoibong where 
		doibongvacauthu.idcauthu ='$idcauthu' order by doibong.ngaythanhlap desc");
		$iddoia=$_GET["id"];
		$idtran=$_GET["idtran"];
?>
<div id="form_wapper">
<form action="blocks/trandau/xuli.php?ida=<? echo $iddoia?>&idtran=<? echo $idtran?>" method="post" >
	<h3 id="form_head1">Bạn muốn tham gia trận đấu này? <br />Mời bạn điền các thông tin để đội thách đấu liên lạc khi cần</h3>
    <table width="96%" border="0" class="inform" style="font-size:18px">
  <tbody>
    <tr>
      <td width="34%" height="40">Số lượng người tham gia</td>
      <td width="66%"><input type="number" name="soluong"></td>
    </tr>
    <tr>
      <td height="64">Số điện thoại của tôi</td>
      <td><input type="text" name="phone"></td>
    </tr>
    <tr>
      <td height="96"><div align="center">Tin nhắn</div></td>
      <td><textarea name="message" rows="7" cols="40"></textarea></td>
    </tr>
    <tr>
      <td height="63"><div align="center">Tôi muốn tham gia trận đấu này!</div></td>
      <td><input type="submit" class="button green" value="  Đồng ý " name="thamgia">
      	<a href="index.php?quanly=trandau&ac=xem" class="button red">Hủy</a>
      </td>
    </tr>
  </tbody>
</table>

 
</form>
</div>
