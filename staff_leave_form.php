<?php
if(isset($_POST["submit"]))
{
	 session_start();
	 echo $email=$_SESSION["email"];
	 echo $type=$_POST["staff_type"];
	 echo $name=$_SESSION["username"];
	 echo $days=$_POST["no_of_days"];
	 echo $reason=$_POST["reason"];
}
	$conn=new mysqli('localhost','root','','hmc');
	$s="SELECT * FROM attendant_and_gardener WHERE EMAIL_ID='$email'";
	$result=$conn->query($s);
	$rowcount=mysqli_num_rows($result);
	$row=$result->fetch_assoc();
	
	if($rowcount==1)
	{
		$d=$row["NO_OF_LEAVES"]+$days;
		$sql="INSERT INTO staff_leaves(TYPE,NAME,EMAIL_ID,NO_OF_DAYS,REASON,DATES,MONTHS) VALUES('".$type."','".$name."','".$email."','$days','".$reason."','".date('Y-m-d')."','".date('m')."')";
		$sql1="UPDATE attendant_and_gardener SET NO_OF_DAYS='$d' WHERE EMAIL_ID='".$email."'";
		if(($conn->query($sql)===true) and ($conn->query($sql1)===true))
		{
			$_SESSION["register"]="Leave Letter Submitted";
			$_SESSION["register1"]=true;
			header("location:clerk.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
			$_SESSION["register"]="Staff Not Existed";
			$_SESSION["register1"]=true;
			header("location:clerk.php");		
	}
	$conn->close();
?>