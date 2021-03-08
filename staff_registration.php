<?php
if(isset($_POST["submit"]))
{
	session_start();
	$name=$_POST["staff_name"];
	$email=$_POST["staff_email"];
	$contact=$_POST["contact"];
	$type=$_POST["staff_type"];
}
	$conn=new mysqli('localhost','root','','hmc');
	$sql="INSERT INTO attendant_and_gardener(NAME,EMAIL_ID,CONTACT,TYPE,JOINING_DATE) VALUES('".$name."','".$email."','".$contact."','".$type."','".date('Y-m-d')."')";
	if($conn->query($sql)=== true)
	{
		$_SESSION["register"]="Successfully Register";
		$_SESSION["register1"]=true;
		header("location:clerk.php");
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>