<?php
	$user_type="";
	$hall_dues;
	$conn=new mysqli("localhost","root","","hmc");
	if(isset($_POST['submit']))
	{
		session_start();
		$user_type=$_POST["user_type"];
		$name=$_POST["name"];
		$email=$_POST["email"];
		$hall=$_POST["hall"];
		$pwd=$_POST["password"];
		$address=$_POST["address"];
		$contact=$_POST["contact"];
		$staff_type=$_POST["staff_type"];
		$extra=$_POST["customRadioInline11"];
		$gender=$_POST["customRadioInline12"];
		$room_sharing=$_POST["customRadioInline1"];
		$mess_dues=2500;
		$balance=10000;
	}//===================================================== MESS MANAGER ====================================================
	if($extra==1 && $room_sharing==1)
	{
			$hall_dues=3500;
	}
	else if($extra==1 && $room_sharing==0)
	{
		$hall_dues=4500;
	}
	else if($extra==0 && $room_sharing==0)
	{
		$hall_dues=4000;
	}
	else
	{
		$hall_dues=3000;
	}
	if($user_type=='warden')
	{
		if(checkuser($email,$user_type)==1)
		{
			$_SESSION["exist"] ="User existed";
			header("location:login.php");	
		}
		else{
			$sql="INSERT INTO warden(NAME,EMAIL_ID,PASSWORD,CONTACT,HALL) VALUES('".$name."','".$email."','".$pwd."','".$contact."','".$hall."')";
			if($conn->query($sql)=== true)
			{
				$_SESSION["exist"]="Successfully Register";
				header("location:login.php");
			}
			else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}//====================================== STUDENT ============================================
	else if($user_type=='student')
	{
         $sql="SELECT MAX(ROOM) FROM student WHERE HALL='".$hall."'";
         $result = $conn->query($sql);
         $room_num;
         while($row = $result->fetch_assoc()) {
           $room_num=$row["MAX(ROOM)"];
         }
         	
        if(checkuser($email,$user_type)==1)
		{
			$_SESSION["exist"] ="User existed";
			header("location:login.php");	
		}
		else{
			$sql="INSERT INTO student(NAME,GENDER,EMAIL_ID,PASSWORD,PERMANENT_ADDRESS,CONTACT,ROOM,HALL,AMENITIES,MESS_DUES,HALL_DUES,BALANCE,TWIN_SHARE) VALUES('".$name."','".$gender."','".$email."','".$pwd."','".$address."','".$contact."','".($room+1)."','".$hall."','".$extra."','".$mess_dues."','".$hall_dues."','".$balance."','".$room_sharing."')";	
			if ($conn and $conn->query($sql)) {
			 $_SESSION["exist"] ="Successfully Registered";
				header("location:login.php");
			} 
			else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
	//================================================= A & G=========================================================
	else if($user_type=='attendant_and_gardener')
	{
		if(checkuser($email,$user_type)==1)
		{
			$_SESSION["exist"] ="User existed";
			header("location:login.php");	
		}
		else{
			$sql="INSERT INTO attendant_and_gardener(NAME,EMAIL_ID,PASSWORD,CONTACT,TYPE,JOINING_DATE) VALUES('".$name."','".$email."','".$pwd."','".$contact."','".$staff_type."','".date('Y-m-d')."')";
			if($conn->query($sql)=== true)
			{
				$_SESSION["exist"]="Successfully Register";
				header("location:login.php");
			}
			else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}

	//===================================== CLERK =================================================
	else if($user_type=='clerk')
	{
		if(checkuser($email,$user_type)==1)
		{
			$_SESSION["exist"] ="User existed";
			header("location:login.php");	
		}
		else{
			dataInsertion($user_type,$name,$email,$pwd,$contact);
			$_SESSION["exist"] ="Successfully Registered";
			header("location:login.php");
		}
	}

	//====================================================== MESS MANAGER =======================================================
	else if($user_type=='mess_manager'){
			if(checkuser($email,$user_type)==1)
		{
			$_SESSION["exist"] ="User existed";
			header("location:login.php");	
		}
		else{
			dataInsertion($user_type,$name,$email,$pwd,$contact);
			$_SESSION["exist"] ="Successfully Registered";
			header("location:login.php");
		}
	}
	function checkuser($email,$user)
	{
		$conn = new mysqli("localhost","root", "", "hmc");
		$sql="SELECT * FROM ".$user." WHERE EMAIL_ID='$email'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		$rowcount=mysqli_num_rows($result);
		return $rowcount;
	}
	function dataInsertion($user_type,$name,$email,$pwd,$contact){

		$conn = new mysqli("localhost","root", "", "hmc");
		echo $sql="INSERT INTO ".$user_type."(NAME,EMAIL_ID,PASSWORD,CONTACT) VALUES('".$name."','".$email."','".$pwd."','".$contact."')";
			if($conn->query($sql)=== true)
			{
				$_SESSION["register"]="Successfully Register";
				$_SESSION["register1"]=true;
				header("location:login.php");
			}
			else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}
?>
