<?php
if(isset($_POST['submit']))
	{
		$user_type=$_POST["user_type"];
		$email=$_POST['email'];
		$pwd=$_POST['password'];
		session_start();
		if(!$email || !$pwd)
		{
			$_SESSION["error"]="Please check your Email Id and Password";
			header('Location:login.php');
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$_SESSION["error"]=" Please check your Email Id";
			header('Location:login.php');
		}
		else{
			$conn=new mysqli("localhost","root","","hmc");
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			$sql="SELECT * FROM ".$user_type." WHERE EMAIL_ID='$email' and PASSWORD='$pwd'";
			$result=$conn->query($sql);
			$row=$result->fetch_assoc();
			$rowcount=mysqli_num_rows($result);
			$username=$row["NAME"];
			$hall=$row["HALL"];
			$room=$row["ROOM"];
			//echo $rowcount."  ".$sql;
			$conn->close();
			if($rowcount==1)
			{
				if($user_type=="student")
				{
					$_SESSION["room"]=$room;
					$_SESSION["hall"]=$hall;
					$_SESSION["username"]=$username;
					$_SESSION["email"]=$email;
					$_SESSION["user_type"]=$user_type;
					$_SESSION["address"]=$row["PERMANENT_ADDRESS"];
					$_SESSION["contact"]=$row["CONTACT"];
					$_SESSION["login"]=true;
				//echo $_SESSION["user_type"];
				header("Location:".$_SESSION["user_type"].".php");
				}
				elseif($user_type=="warden"){
					$_SESSION["username"]=$username;
					$_SESSION["email"]=$email;
					$_SESSION["user_type"]=$user_type;
					$_SESSION["hall"]=$hall;
					$_SESSION["contact"]=$row["CONTACT"];
					$_SESSION["login"]=true;
					//echo $_SESSION["user_type"];
					header("Location:".$_SESSION["user_type"].".php");
				}
				else{
					$_SESSION["username"]=$username;
					$_SESSION["email"]=$email;
					$_SESSION["user_type"]=$user_type;
					$_SESSION["contact"]=$row["CONTACT"];
					$_SESSION["login"]=true;
					//echo $_SESSION["user_type"];
					header("Location:".$_SESSION["user_type"].".php");
				}
			}
			else{
				$_SESSION["abc"]=true;
				$_SESSION["error"]="Entered Password or email is not valid.";
				header("Location:login.php");
			}
		}
	}
?>