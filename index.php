<?php include "processCurlingApage.php";?>
<?php /* $x = 1;*/?>	

<html>
<head>
<title>Ramen</title>
</head>
<body>

<div id="container">
<!-- <?php include "includes/header.php";?> -->
<div id="maincont">
<p id="mctext"></p>

<script>

var yourName = prompt ("Your username?");


if (yourName != null ) //not empty
{
	document.getElementById("mctext").innerHTML = "You will log in as " + yourName + using cURL;
	//$x = 2;

}
else
{
	alert("Please enter a name next time!");
}

</script>
	<?php /*
	if ($x == 2 )
	{
		curlingPage($status, yourname ,"gk",$debug=false); 
		
	}*/
	?>
<!--  <?php include "login.php";?> -->	
</div>
</div>
</body>
</html>