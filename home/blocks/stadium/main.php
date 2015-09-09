<?php	
	
	$ac	= isset($_GET['ac'])?$_GET['ac']:"";
	if($ac=="sua")
		include("blocks/stadium/sua.php");
	else if($ac=="add"){
		
		if($_GET["step"]==1)
			include("blocks/stadium/them.php");
		else if ($_GET["step"]==2)
			include("blocks/stadium/giasan.php");
	}
	else		
		include("blocks/stadium/xem.php");		
	
		
?>