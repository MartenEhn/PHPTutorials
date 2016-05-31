<?php
	require_once 'webscrape.php';

	

	//$url = "http://www.unt.se";
	$url = "http://localhost/PHPTutorials/login.php";
	
	
	$curl_scraped_page = mycurl($url);
	
	echo $curl_scraped_page;
	
	?>
	