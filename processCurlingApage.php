<?php

	require_once "curlingPage.php";
	
	//require_once "setFacebookStatusKOPIA.php";
	
	if(!empty($_POST['status']))
	{
		$status = trim($_POST['status']);
		
		
		echo "status:" . $status . "<br><br>";
		
		curlingPage($status, "starman" ,"gk",$debug=false);
		
	
		
	}
	
	?>