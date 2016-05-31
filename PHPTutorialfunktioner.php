<?php

function circumference($PI, $R, &$result  )
	{
		$result = 2 * $PI * $R;
		
		return true;
	}

function GetSpaceShip($NameofShow = "Firefly")
	{
		echo __FUNCTION__ . " Called with arg: $NameofShow<br>";
	}
	
function OpenFile()
	{
		$filename = 'hej.txt';
		
	/*	$file = fopen("hej.txt","r");
		print_r(fgetcsv($file));
		fclose($file);
*/
		
		$file = fopen($filename, "r");
	/*	$sizeoffile = filesize($filename);
		$text = fread($file, $sizeoffile);
		fclose($file);
		$file = fopen($filename, "a");
		fwrite($file, "Hejsan!");
		fclose($file);
		print_r($text);*/
	
		$i = 0;
		while (!feof($file))
		{
		$contents[$i++] = fgetcsv($file);
		}
		print_r($contents);
		
	}

