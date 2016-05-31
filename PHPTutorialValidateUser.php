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
// Funktionen hämtar användarnamn och lösenord från config-fil för användaren		
function ReadFromXML($xmlfile)
{
	$config = simplexml_load_file($xmlfile);
	return $config;
}
	



function validateUser($username, $password)
{
	
	$credentials = ReadFromXML('appconfig.xml');//LÃ¤s in data configurationsfil 
	
	
	$array = xml2array($credentials); //Konvertera XML-objekt till array
	
	 //Den associativa arrayens utseende
	/*
	echo "Detta är innehållet i filen med konfigureringsdata i formen xml2array: <br> ";
	echo '<pre>';
	print_r($array);
	echo '</pre>';
	echo '<br>';
	*/
	
	$user = $array['db_database'][0]; //Denna del är inte en array utan ett "SimpleXMLElement Object"
	$user = xml2array($user); //Konvertera XML-objekt till array
	
	print_r ("Validate user: " . $username . " as " . $user['db_username']);  //Objekt vet inte egenrtligen hur man plockar ut ur det 
	echo '<br>';
	
	if ($user['db_password'] == crypt($password, 'rl') )// Kolla om samma
	{
		echo "successful validation <br>";
		
		return true;
	}
	else
	{
		echo "Felaktigt l&ouml;senord!";
		echo '<br>';
		echo "Ska vara:" . $user['db_password'];
		echo '<br>';
		echo "Men &auml;r:" . $password;
		return false;
	}
}

?>
</body>
</html>