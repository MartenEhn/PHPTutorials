<html>
<head>
<title>Password Test</title>
</head>
<body>
<?php

function xml2array ( $xmlObject, $out = array () )
{
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

    return $out;
}


function xmlstring2array($string)
{
    $xml   = simplexml_load_string($string, 'SimpleXMLElement', LIBXML_NOCDATA);

    $array = json_decode(json_encode($xml), TRUE);

    return $array;
}
// Funktionen h�mtar anv�ndarnamn och l�senord fr�n config-fil f�r anv�ndaren		
function ReadFromXML($xmlfile)
{
	$config = simplexml_load_file($xmlfile);
	return $config;
}
	



function validateUser($username, $password)
{
	//Den associativa arrayens utseende
	//static $logindata = array ("starman"=>"gk", "TestUser"=>"Password");
	

	
//	$credentials = ReadFromXML('appconfig.xml');//Läs in data configurationsfil 
	$credentials = ReadFromXML('write2.xml');//L�s in data configurationsfil d�r l�senordet �r krypterat
	
	
	
	$array = xml2array($credentials); //Konvertera XML-objekt till array
	
	
	echo "Detta �r inneh�llet i filen med konfigureringsdata i formen xml2array: <br> ";
	print_r($array);
	echo '<br>';
	
	
	echo "Validate user: " . $array['db_username'][0];  //Objekt vet inte egenrtligen hur man plockar ut ur det 
	echo '<br>';
	
	if ($array['db_password'][0] == crypt($password, 'rl') )
	{
		echo "successful validation <br>";
		
		return true;
	
	}
	else
	{
		echo "Felaktigt l&ouml;senord!";
		echo '<br>';
		echo "Ska vara:" . $array['db_password'][0];
		echo '<br>';
		echo "Men &auml;r:" . $password;
		return false;
	}
}





?>
</body>
</html>