<?php

	include "mittprogram.php";

	require_once("PHPTutorialValidateUser.php");
	$DEBUG = 0;

	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		echo "Username:" . $username . "<br> Password:" . $password . "<br><br>";
		
		if (!ValidateUser($username, $password))
		{
			
			echo '<script>alert("Validation Failed!")</script>';
		}
		else
		{
	
			//Anslut till databas
			//DBConnection::setLoginData("localhost","root", "x", "Kalle Anka" );
			DBConnection::setLoginData("localhost",$username, $password, "Kalle Anka" );
			$DB = DBConnection::getInstance();
			
		
	
			$stmtselect = "CALL P()";//"SELECT * FROM chain";//"CALL P(5)";//
			$result = mysql_query( $stmtselect );
	
				echo "Antal kedjor = " . @mysql_num_rows($result);

			while($row=mysql_fetch_assoc($result))
			{ 
				$utdata="<p><br>".chr(9).$row['ChainCodeID']." is the ID of ".$row['ChainName'];
				echo $utdata; 		
			}	
		
			
			 
			
			//echo $hej->programmeName();
			
			var_dump(DBConnection::getInstance());
			
			//Introspection
			$classes = get_declared_classes();
			echo "The following classes are available:<br>";
			foreach ($classes as $hej)
				echo $hej. "<br>";
			if (in_array("myDBConnection", $classes))
			{
				
				//Reflection
				$child = new ReflectionClass("myDBConnection");
				
				$methods = $child->getMethods();
				foreach ($methods as $method)
					echo $method. "<br>";
			}
			
			
			
		}	
		
		
	}
	
	?>