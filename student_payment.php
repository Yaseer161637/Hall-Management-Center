<?php
session_start();
if(isset($_POST['pay']))
{
	$conn=new mysqli('localhost','root','','hmc');
	$email=$_SESSION["email"];
	$sql="SELECT * FROM student WHERE EMAIL_ID='".$email."'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$sum=$row["HALL_DUES"]+$row["MESS_DUES"];
	$a=$row["BALANCE"]-$sum;
	$update="UPDATE student SET MESS_DUES=0 , HALL_DUES=0 , BALANCE='$a' WHERE EMAIL_ID='".$email."' ";
	$up1="INSERT INTO mess_fee(NAME,EMAIL_ID,AMOUNT) VALUES ('".$_SESSION["username"]."','".$_SESSION["email"]."','".$row["MESS_DUES"]."') ";
	if(($conn->query($update)===TRUE ) and ($conn->query($up1)===TRUE))
	{
		$_SESSION["payment"]=true;
		$_SESSION["error"]="Succesfully paid";
		header("location:student.php");
	}
	else{
		echo "Failed ".$conn->errro;
	}
	$conn->close();
}
if($_SESSION["login"]===true){
	header("Location:".$_SESSION["user_type"].".php");
}
?>