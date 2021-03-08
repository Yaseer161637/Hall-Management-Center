<?php
if(isset($_POST["submit"]))
{
	session_start();
	$email=$_SESSION["email"];
	$name=$_SESSION["username"];
	$tool1=$_POST["checkbox1"];
	$tool2=$_POST["checkbox2"];
	$tool3=$_POST["checkbox3"];
	$tool4=$_POST["checkbox4"];
	$tool5=$_POST["checkbox5"];
	$tools=$tool1." ".$tool2." ".$tool3." ".$tool4." ".$tool5;
	$conn= new mysqli("localhost","root","","hmc");
	$sql="INSERT INTO tools(NAME,EMAIL_ID,TOOL) VALUES('$name',$email','$tools')";
	if($conn->query($sql)){
		$_SESSION['error']="Success";
		header("location:attendant_and_gardener.php");
	}
	else{
		echo "adavi".$conn->error;
	}
}			
?>