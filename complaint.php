<?php
 if(isset($_POST["submit"]))
 {
 	session_start();
 	$type=$_POST["complaint_type"];
 	$content=$_POST["comment"];
 	$name=$_SESSION["username"];
 	$email=$_SESSION["email"];
 	$hall=$_SESSION["hall"];
 	$room=$_SESSION["room"];
 	$a=0;
 }
 $conn=new mysqli('localhost','root','','hmc');
 $sql='INSERT INTO complaint(NAME, EMAIL_ID, HALL, ROOM, COM_TYPE, COM_DESCP, COM_STATUS) VALUES("'.$name.'","'.$email.'","'.$hall.'","'.$room.'","'.$type.'","'.$content.'","'.$a.'")';
 if ($conn->query($sql) === TRUE) {
  echo "done";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location:".$_SESSION["user_type"].".php");
?>