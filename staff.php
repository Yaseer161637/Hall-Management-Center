<?php
session_start();
	if($_SESSION["email"])
	{
		header("Location:".$_SESSION["user_type"].".php");
	}
	else{
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>