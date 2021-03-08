<?php

	session_start();
	$email=$_GET["email"];
	$type=$_GET["type"];
	$conn=new mysqli('localhost','root','','hmc');
	$sql="DELETE FROM attendant_and_gardener WHERE EMAIL_ID='$email' AND TYPE='$type'";
	if($conn->query($sql)=== true)
	{
		$_SESSION["register"]="Staff Account Deleted.";
		$_SESSION["register1"]=true;
		header("location:clerk.php");
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>