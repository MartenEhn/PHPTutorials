<html>
<head>
<title>IntroPHP</title>
</head>
<body>
	<form id='login' action='processCurlingApage.php' method='post' accept-charset='UTF-8'>
	<label for='status' >Status:</label>
	<input type='text' name='status' id='status' maxlength="50" />
	<input type='submit' name='Submit' value='Submit' />
	
	<?php 
	require_once("processCurlingApage.php");
	?>
</body>
</html>