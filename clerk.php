<?php
session_start();
if($_SESSION["register1"]==true)
{
	echo "<script>alert('".$_SESSION['register']."');</script>";
	$_SESSION["register1"]=false;
}
if($_SESSION["user_type"]==null)
  		{
  			header("Location:login.php");
  		}
  		if($_SESSION["user_type"]!="clerk")
  		{
  			header("Location:".$_SESSION["user_type"].".php");
  		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Clerk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="student/css/style.css">
  </head>
  <style type="text/css">
  	.tab{
  		display: none;
  	}
  	.tab:first-child{
  		display: block;
  	}
 
  </style>
  <body>
		
		<div class="wrapper d-flex align-items-stretch" >
			<nav id="sidebar" style="background: linear-gradient(to left, #2c3e50, #3498db);">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-bars"></i> </button>
        		</div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.php" class="logo">HMC</a></h1>
		        <ul class="list-unstyled components mb-5">
		          <li class="active">   	
		           <span onclick="showTab(0)">Home</span>
		          <li>
		              <span onclick="showTab(1)">Register New Staff</span>
		          </li>
		          <li>
	              	<span onclick="showTab(2)">Remove Staff</span>
		          </li>
		          <li>
	             	 <span onclick="showTab(3)">Staff Leave Form</span>
		          </li>
		          <li>
	             	 <a href="logout.php" > Logout</a>
		          </li>
		        </ul>
		      </div>
	    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
			<div class="tab">
				<!------------------------Calculate Staff Feeee----------------------->
				<div style="width: 45vw;" id="print">
				<h3>Staff Salary of This Month</h3>
				<table class="table table-striped" >
				<thead class="table-primary">
					<td>TYPE</td>
					<td>NAME</td>
					<td>TOTAL WORKING DAYS</td>
					<td>TOTAL LEAVES</td>
					<td>SALARY</td>
				</thead>		
					<tbody>
					<?php
					$array;
					$i=0;
					$conn=new mysqli('localhost','root','','hmc');
					$sql="SELECT * FROM attendant_and_gardener";
					$result=$conn->query($sql);
					if ($result->num_rows > 0) {

 						 while($row = $result->fetch_assoc()) {
 						 	$array[$i]=$row["NAME"]."_".$row["EMAIL_ID"]."_".$row["TYPE"]."_".$row["JOINING_DATE"];
 						 	$i=$i+1;
						  }
					}
					foreach ($array as $value) {
						$val=explode("_", $value);
						$val1=explode("-", $val[3]);
						$s="SELECT TYPE,NAME,SUM(NO_OF_DAYS) as absent FROM staff_leaves WHERE EMAIL_ID='".$val[1]."' AND MONTHS='".date('m')."'";
						$r=$conn->query($s);
						if($r->num_rows>0){
							while($row=$r->fetch_assoc()){
								$workingdays;
								if($val1[1]==date('m') && $val1[0]==date('Y'))
								{
									$workingdays=date('d')-$val1[2]-$row[$absent];
								}
								else
								{
									$workingdays=date('d')-$row["absent"];
								}
								
								if($row["TYPE"]=="Gardener")
								{
									echo "<tr><td>".$val[2]."</td><td>".$val[0]."</td><td>".$workingdays."</td><td>".($row["absent"]?$row["absent"]:0)."</td><td>".($workingdays*1000)."</td></tr>" ;
								}
								else{
									echo "<tr><td>".$val[2]."</td><td>".$val[0]."</td><td>".$workingdays."</td><td>".($row["absent"]?$row["absent"]:0)."</td><td>".($workingdays*1500)."</td></tr>" ;
								}
							}
						}
					}
					$conn->close();
				?>
					</tbody>
				</table>
				</div>
				<table>
					<tr><td></td><td></td><td></td><td></td><td><a  class="btn btn-primary" onclick="printing_table()" style="color: white;">Print</a></td></tr>
				</table>
			</div>
			<div class="tab">
				<!----------------------Register Temporary staff------------------------->
				<div class="form-group" style="width: 35vw;">
					<form action="staff_registration.php" method="post">
						<fieldset>
							<h3>Staff Temporary Registration</h3>
								<div class="form-group">
									<p>Select Type:</p>
								  <div class="form-group form-check-inline">
								  	<input type="radio" id="gardener" name="staff_type" value="Gardener" checked class="form-check-input">
								  <label for="gardener" class="form-check-label" for>Gardener</label>
								  </div>
								  <div class="form-group form-check-inline">
								  	<input type="radio" id="attendant" name="staff_type" value="Attendant" class="form-check-input">
								  <label for="Attendant" class="form-check-label" for>Attendant</label>
								  </div>
								</div>
								<div class="form-group">
								  <input type="name" name="staff_name" required placeholder="Name" class="form-control" style="border:1px solid black; font-size: 15px;">
								</div>
								<div class="form-group">
									<input type="email" name="staff_email" required placeholder="Email Id" class="form-control" style="border:1px solid black; font-size: 15px;">
								</div>
								<div class="form-group">
									<input type="number" name="contact" required placeholder="Contact Number" maxlength="10" class="form-control" style="border:1px solid black; -moz-appearance: textfield; font-size: 15px;">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" Value="Register" class="btn btn-primary">
								</div>
								
						</fieldset>
					</form>
				</div>
			</div>
			<div class="tab">
				<!-- --------------------------Remove Temporary Staff-----------------  -->
				<div style="width: 30vw;">
					<h3>Remove Temporary Staff</h3>
					<table class="table table-striped table-hover table-md">
						<thead class="table-primary">
							<td>TYPE</td>
							<td>NAME</td>
							<td>EMAIL</td>
							<td>CONTACT</td>
							<td></td>
						</thead>
						<tbody>
							<?php
								$conn=new mysqli('localhost','root','','hmc');
								$sql="SELECT * FROM attendant_and_gardener ORDER BY TYPE ASC";
								$result=$conn->query($sql);
								if ($result->num_rows > 0) {
 									 while($row = $result->fetch_assoc()){
 									 	echo "<tr><td>".$row["TYPE"]."</td><td>".$row["NAME"]."</td><td>".$row["EMAIL_ID"]."</td><td>".$row["CONTACT"]."</td><td><a href='staff_deletion.php?email=".$row["EMAIL_ID"]."&type=".$row["TYPE"]."' class='btn btn-primary'>DELETE</a></td></tr>";
 									 }
								}
								$conn->close();	
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab">
				<!------------------Staff Leaves Status-->
				<div >
						<h2>Leave Requets and Responded</h2>
						<div style="height: auto; overflow: auto;">
							<table class="table table-borderd table-hover ">
							<thead class="tableFixHead">
							<tr class="table-primary">
								<th scope="row">TYPE</th>
								<th scope="row">NAME</th>
								<th scope="row">NO. OF DAYS</th>
								<th scope="row">FROM DATE</th>
								<th scope="row">STATUS</th>
								<th>	</th>
								
							</tr>
							</thead>
							<tbody >
								<?php
								$conn =new mysqli('localhost','root','','hmc');
								$sql="SELECT * FROM staff_leaves";
								$result=$conn->query($sql);
								if($result->num_rows >0)
								{
									while($row = $result->fetch_assoc())
									{
										echo "<tr class='table-white'><td>".$row["TYPE"]."</td><td>".$row["NAME"]."</td><td>".$row["NO_OF_DAYS"]."</td><td>".$row["DATES"]."</td><td id='status_id'>".($row["STATUS"]?"Solved":"Pending")."</td><td><a href='staff_leave_status.php?key=".$row["ID"]."' class='btn btn-link'>".($row["STATUS"]?"Approved":"Pending.....")."</a></td></tr>";
									}
								}
								$conn->close();
								?>
							</tbody>
						</table>
						</div>
		<script type="text/javascript">
			var active=0,tabs=document.getElementsByClassName("tab");
			function showTab(tab){
				if(tab==active){
					return;
				}
				tabs[tab].style.display="block";
				tabs[active].style.display="none";
				active=tab;
			}
		</script>
    <script src="student/css/js/jquery.min.js"></script>
    <script src="student/css/js/popper.js"></script>
    <script src="student/css/js/bootstrap.min.js"></script>
    <script src="student/css/js/main.js"></script>
    <script type="text/javascript">
    	function printing_table()
    	{
    		var content=document.getElementById("print").innerHTML;
    		var main_body=document.body.innerHTML;
    		document.body.innerHTML=content;
    		window.print();
    		document.body.innerHTML=main_body;
    	}
    </script>
  </body>
</html>