<html>
<head>
<title>IntroPHP</title>
</head>
<body>
	<form id='login' action='processCurlingPage.php' method='post' accept-charset='UTF-8'>
	<label for='status' >Status:</label>
	<input type='text' name='status' id='status' maxlength="50" />
	<input type='submit' name='Submit' value='Submit' />
	
	<?php 
	require_once("processCurlingPage.php");
	?>
</body>
</html>