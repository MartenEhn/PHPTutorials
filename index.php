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

var yourName = prompt (" as?");

if (yourName != null ) //not empty
{
	document.getElementById("mctext").innerHTML = "You will log in as " + yourName;
}

</script>


	<?php include "login.php";?>
</div>
</div>
</body>
</html>