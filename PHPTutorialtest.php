<head>
<title>IntroPHP</title>
</head>
<body>
<?php
	require "PHPTutorialValidateUser.php";
	include "PHPTutorialfunktioner.php";

	$pi = 3.14159;
	$radius = 10;
    $c = 0;

    circumference($pi, $radius, $c);	
		
	echo "Om radien är $radius cm så är omkretsen $c cm ";	

//	phpinfo();
	
	$hej = "Hej";
	
	setcookie($hej, '234234234' ); //Lägger i detta fall en cookie från "localhost"
	
	$whatsincookie = $_COOKIE['Hej'];
	
	echo "COOKIE contains" . $whatsincookie;
	
	
	static $spaceships = array("StarTrek"=>"Enterprise", "Firefly"=>"Serenity", "LostInSpace"=>"Jupiter 2");
	
	echo "Kirk was the captain of the starship " . GetSpaceShip("StarTrek") . "<br>";
	echo "................<br>";
	
	$name = "www.dansstudio.nu";
	$dsnRec = dns_get_record($name);
	print_r($name);
	
	try  {
		if (!validateUser("Marten","Losenord"))
			throw new Exception();
		
	}
	catch (Exception $ex) {
		
		echo "Exception" . $ex->getMessage();
		
	}
	
	OpenFile();
	
	
?>


</body>
</html>