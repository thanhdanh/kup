<?php
/*=======================================================
		UPLOAD_IMAGE
========================================================*/
function upload_image($file_name,$filedir){	
	$maxsize = 1024000; // Max File Size In Bytes
	$accepted = array('png', 'jpg', 'jpeg','JPEG', 'gif', 'ico', 'tif', 'bmp'); // Accepted Extensions
	 
	
	preg_match('/\.([a-zA-Z]+?)$/', $_FILES[$file_name]["name"], $matches);
	
	if(in_array(strtolower($matches[1]), $accepted)) {
        if($_FILES[$file_name]['size'] <= $maxsize) {
								
			$newname = date("Ymdhis").substr($_FILES[$file_name]['name'],1,3).'.'.$matches[1];
			
			$filedir = $filedir.$newname; 
            copy($_FILES[$file_name]["tmp_name"],$filedir);// Copy noi dung cua anh toi vi tri dich
			return $filedir;
        } else 
            echo '<p>Sorry, Max Picture size is 1MB</p>';
    } else
        echo '<p>Sorry, File Type Not Allowed</p>';	
}

//------------------------------------------------------------------------------------
//GET YOUR AGE	
//------------------------------------------------------------------------------------
function getAge($birthdate = '0000-00-00') {
	if ($birthdate == '0000-00-00') return 'Unknown'; 
	$bits = explode('-', $birthdate);
	$age = date('Y') - $bits[0] - 1;

   $arr[1] = 'm';
	$arr[2] = 'd';

	for ($i = 1; $arr[$i]; $i++) {
		$n = date($arr[$i]);
		if ($n < $bits[$i])
			break;
		if ($n > $bits[$i]) {
			++$age;
			break;
		}
	}
	return $age;
}
//------------------------------------------------------------------------------------
//ENERGY
//------------------------------------------------------------------------------------
function energy($streng){
	?>
    <div class="energy-bar">
    	<div class="streng" style="width:<?php echo $streng ?>% ">
        	
        </div>
    </div>    
    <?php
}
?>