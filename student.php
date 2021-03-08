<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>STUDENT</title>
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
  <?php
  		session_start();
  		if($_SESSION["payment"])
  		{
  			echo "<script>alert('".$_SESSION["error"]."')</script>";
  			$_SESSION["payment"]=false;
  		}
  		if($_SESSION["user_type"]==null)
  		{
  			header("Location:login.php");
  		}
  		if($_SESSION["user_type"]!="student")
  		{
  			header("Location:".$_SESSION["user_type"].".php");
  		}
  	?>
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" style="background: linear-gradient(to left, #1a2980, #26d0ce);">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-bars"></i> </button>
        		</div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.php" class="logo">HMC</a></h1>
		        <ul class="list-unstyled components mb-5">
		          <li class="active">   	
		           <span onclick="showTab(0)">Home</span>
		          <li>
		              <span onclick="showTab(1)">Complaint</span>
		          </li>
		          <li>
	              	<span onclick="showTab(2)">Pending Dues</span>
		          </li>
		          <li>
	             	 <span onclick="showTab(3)">Profile</span>
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
				<!-- -----------------WLCOME PAGE ----------------------->
				<?php
					session_start();
					echo "<h1> WELCOME ".$_SESSION["username"]."</h1>"; 
				?>
			</div>
			<div class="tab">
				
					<!----------------------------- Student Complaints  -----------------------  -->
					<div >
						<h2>Old complaints</h2>
						<div style="height: 30vh; overflow: auto;">
							<table class="table table-borderd table-hover ">
							<thead class="tableFixHead">
							<tr class="table-primary">
								<th scope="row">COMPLAINT TYPE</th>
								<th scope="row">COMPLAINT DESCRIPTION</th>
								<th scope="row">STATUS</th>
							</tr>
							</thead>
							<tbody >
								<?php
								$conn =new mysqli('localhost','root','','hmc');
								$sql="SELECT * FROM complaint WHERE EMAIL_ID='".$_SESSION['email']."'";
								$result=$conn->query($sql);
								if($result->num_rows >0)
								{
									while($row = $result->fetch_assoc())
									{
										echo "<tr class='table-primary'><td>".$row["COM_TYPE"]."</td><td>".$row["COM_DESCP"]."</td><td id='status_id'>".($row["COM_STATUS"]?"Solved":"Pending")."</td></tr>";
									}
								}
								$conn->close();
								?>
							</tbody>
						</table>
						</div>
					</div>
						<!-- -----------Complaint Form-------------->
					<div class="form-row col-auto" >
						<form action="complaint.php" method="post" >
						<fieldset>
							<legend>COMPLAINT BOX</legend>
							<select class="form-control border border-dark" name="complaint_type" style="width: 30vw;">
								<option>SELECT TYPE OF COMPLAINT</option>
								<option>MESS</option>
								<option>ROOM</option>
								<option>WATER</option>
								<option>STAFF</option>
								<option>OTHER</option>
							</select>
							<br/>
							<label style="color: #000;">DESCRIBE YOUR COMPLAINT</label>
							<br/>
							<textarea name="comment" class="form-control" rows=5 cols="50" style="border:solid 1px black; resize: none; width: 30vw;"></textarea>
							<br/>
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" >
						</fieldset>
						</form>
					</div>
			</div>
			<div class="tab">
				<!--------------------Pending Dues------------------->
				<h2>PENDING DUES</h2>
				<form action="student_payment.php" method="post">
				<table class="table table-borderd table-hover">
					<tbody>
						<?php
							$conn =new mysqli('localhost','root','','hmc');
							$sql="SELECT * FROM student WHERE EMAIL_ID='".$_SESSION['email']."'";
							$result=$conn->query($sql);
							if($result->num_rows >0)
							{
								while($row = $result->fetch_assoc())
								{
									$sum=$row["MESS_DUES"]+$row["HALL_DUES"];
									if($sum>0)
									{
										echo "<tr class='table-warning'><th>MESS DUE</th><th>HALL DUE</th><th>TOTAL</th><th>PAY</th></tr>";
										echo "<tr class='table-primary'><td>".$row["MESS_DUES"]."</td><td>".$row["HALL_DUES"]."</td><td>".$sum."</td><td> <input type='submit' name='pay' value='Pay' class='btn btn-dark'> </td></tr>";
									}
									else{
										echo "<h2 align='center'>No Dues</h2>";
									}
								}
							}
							$conn->close();
						?>
					</tbody>
				</table>
				</form>
			</div>
			<div class="tab">
				<h1>Profile</h1>
				<table class="table table-borderd table-hover" style="width: 50vw;">
					<tbody>
						<tr>
							<th class="table-primary">Name</th><?php echo "<td>".$_SESSION['username']."</td>" ;?>
						</tr>
						<tr>
							<th class="table-primary">Email Id</th><?php echo "<td>".$_SESSION['email']."</td>" ;?>
						</tr>
						<tr>
							<th class="table-primary">Hall</th><?php echo "<td>".$_SESSION['hall']."</td>" ;?>
						</tr>
						<tr>
							<th class="table-primary">Room Number</th><?php echo "<td>".$_SESSION['room']."</td>" ;?>
						</tr>
						<tr>
							<th class="table-primary">Permanent Adress</th><?php echo "<td>".$_SESSION['address']."</td>" ;?>
						</tr>
						<tr>
							<th class="table-primary">Contact</th><?php echo "<td>".$_SESSION['contact']."</td>" ;?>
						</tr>
					</tbody>
				</table>
			</div>
      </div>
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
  </body>
</html>