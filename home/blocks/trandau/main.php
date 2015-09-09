<?php
	$id=(isset($_GET["id"]))?$_GET["id"]:'';
	$ac	= (isset($_GET["ac"]))?$_GET["ac"]:'';
	
		
	if( $ac=="taotran")
		include("blocks/trandau/demo.php");	
	else if( $ac=="thamgia")		
		include("blocks/trandau/thamgia.php");	
	else include("blocks/trandau/xem.php");		
		
		
?>