<?php include ("myfunctions.php"); ?>

<html>
<head>
<title>IntroPHP</title>
</head>
<body>
	<form id='login' action='processlogin.php' method='post' accept-charset='UTF-8'>
	<label for='username' >UserName:</label>
	<?php echo "<input type='text' name='username' id='username' maxlength='50' />"; ?>
	<label for='password' >Password:</label>
	<input type='password' name='password' id='password' maxlength="50" />
	<input type='submit' name='Submit' value='Submit' />
	
	
	
	<?php 
	require_once("processlogin.php");
	?>
</body>
</html>