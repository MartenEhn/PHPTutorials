<?PHP
function curlingPage($status, $user, $pass)
{

	require_once 'webscrape.php';
	
	
	$debug = true;//false;
	$ch = curl_init();
//	curl_setopt($ch, CURLOPT_URL, 'https://login.facebook.com/login.php?m&amp;amp;next=http%3A%2F%2Fm.facebook.com%2Fhome.php');
	curl_setopt($ch, CURLOPT_URL, 'http://localhost/PHPTutorials/login.php');
	
//	curl_setopt($ch, CURLOPT_POSTFIELDS, 'email=' . urlencode($login_email) . '&pass=' . urlencode($login_pass) . '&amp;login=' . urlencode("Log in"));
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=' . urlencode($user) . '&password=' . urlencode($pass));
	
	
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
//	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //OK, men det tar tid
	curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0); // Om satt till 1 ingen sida
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.12) Gecko/2009070611 Firefox/3.0.12 Chrome/50.0.2661.102");
	
	
	//t curl_exec($ch);
	
	
	curl_setopt($ch, CURLOPT_POST, 0);
//	curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com');

	curl_setopt($ch, CURLOPT_URL, 'http://localhost/PHPTutorials/login.php');
//t	$page = curl_exec($ch);
	
 	$page = 'http://localhost/PHPTutorials/login.php';
	
	//$out_url =  mycurl($page);
	
	//echo  "cURL via mycurl" . $out_url;
	
    //Kolla HTML	
	
	curl_setopt($ch, CURLOPT_POST, 1);
//	preg_match("/input type=\"hidden\" name=\"post_form_id\" value=\"(.*?)\"/", $page, $form_id);


	$subject = file_get_contents($page);
	$pattern = '/password/';
	
		
	//if (preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE))
	if (preg_match($pattern, $subject, $matches))
	{
		echo "Utskrift via print_r:";
		print_r($matches);
		echo "<br>";
	
		echo "form_id[0]:" . $matches[0] . "<br>";
		echo "form_id[1]:" . $matches[1] . "<br>";
	}
	else
	{
		echo "NOK pregmatch 2";
	}
	//preg_match("/form action=\"(.*?)\"/", $page, $form_num);
	
	//echo $form_num;	
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=' . "starman" . '&password=' . "gk");	
	//curl_setopt($ch, CURLOPT_POSTFIELDS, 'post_form_id=' . $form_id[1] . '&status=' . urlencode($status) . '&update=' . urlencode("Update status"));	
	
	
	//curl_setopt($ch, CURLOPT_URL, $page . $form_num[1]);
	//curl_setopt($ch, CURLOPT_URL, 'http://localhost/PHPTutorials/login.php');
	//curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com');	
	
	curl_exec($ch); // Det är denna som publicerar sidan
	
	/*
	$out_url =  mycurl($page);
	
	echo "cURL:ed page:" . $out_url;
	
	
	if ($debug) {
	echo "Status Updated.";
	}

	
	$curl_scraped_page = mycurl($page);
	
	echo $curl_scraped_page;
	
	curl_close($ch);
	*/
}
?>