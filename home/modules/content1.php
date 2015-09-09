<div id="content1">
	<?php	
		if(isset($_GET['ctr']))
			$tam=	$_GET['ctr'];
		else $tam="";
		
		if($tam=="user")
			include("blocks/user/main.php");
		else if($tam=="doibong")
			include("team/main.php");	
		else if($tam=="stadium")		
			include("blocks/stadium/main.php");
		else if($tam=="match")
			include("blocks/trandau/main.php");
		else if($tam=="page_user")
			include("page/users/xem.php");
		else include("home.php");			
	?>
</div>