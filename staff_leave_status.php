<?php
$key=$_GET["key"];
	session_start();
	$conn =new mysqli('localhost','root','','hmc');
	$sql="UPDATE staff_leaves SET STATUS=1 WHERE ID='$key'";
	if($conn->query($sql)===true)
	{
		$_SESSION["key"]=true;
		$_SESSION["com_solved"]="Complaint solved";
		header("Location:warden.php");
	}
	else
	{
		echo "Error updating record: " . $conn->error;
	}
	$conn->close();
?>