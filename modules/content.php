<div id="content">
	<?php
		if(isset($_GET["ctr"])){
			$ctr= $_GET["ctr"];
			if($ctr=="football")	
				include("blocks/football/xem.php");				
		}			
	?>
</div>