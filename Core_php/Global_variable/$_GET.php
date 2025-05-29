<html>
<head>
<title> </title>
</head>
<body>

<!-- 
Method  get => $_GET['']

-->
<form action="" method="get">
    
	<p>Name: <input type="text" name="name"/></p>
	<p>Age: <input type="text" name="age"/></p>
	<p><input type="submit" name="save" value="Click"/></p>
	
</form>


<?php

session_start();
echo $_SESSION['user'];

echo $_COOKIE['user'];


	if(isset($_GET['save']))
	{
		echo $_GET['name'];
		echo $_REQUEST['age'];
	}
?>






</body>
</html>
