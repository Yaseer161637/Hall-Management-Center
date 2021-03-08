<?php
/*
session_start();
	if($_SESSION["email"])
	{
		header("Location:".$_SESSION["user_type"].".php");
	}*/session_start();
	if($_SESSION["key"]===true)
	{
		echo "<script>alert('".$_SESSION["com_solved"]."');</script>";
		$_SESSION["key"]=false;
	}if($_SESSION["user_type"]==null)
  		{
  			header("Location:login.php");
  		}
  		if($_SESSION["user_type"]!="warden")
  		{
  			header("Location:".$_SESSION["user_type"].".php");
  		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>WARDEN</title>
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
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" style="background: linear-gradient(to left, #000046, #1cb5e0);">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-bars"></i> </button>
        		</div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.php" class="logo">HMC</a></h1>
		        <ul class="list-unstyled components mb-5">
		          <li class="active">   	
		           <span onclick="showTab(0)">Home</span>
		          <li>
		              <span onclick="showTab(1)">View Complaint</span>
		          </li>
		          <li>
	              	<span onclick="showTab(2)">Hall & Room Details</span>
		          </li>
		          <li>
	             	 <span onclick="showTab(3)">Tools Status</span>
		          </li>
		          <li>
	             	 <span onclick="showTab(4)">Profile</span>
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
				<h3>Welcome to Hall Management Center</h3>
			</div>
			<div class="tab">
				<h3>Complaints</h3>
				<!-- ------------------View Complaints---------------------------->
				<table class="table table-border table-hover">
					<thead class="table-primary">
						<th>SLNO</th>
						<th>COMPLAINNER</th>
						<th>COMPLAINT TYPE</th>
						<th>COMPLAINT DESCRIPTION</th>
						<th>STATUS</th>
						<th></th>
					</thead>
				<?php
					$conn =new mysqli('localhost','root','','hmc');
					$q="SELECT * FROM warden WHERE EMAIL_ID='".$_SESSION["email"]."'";
					$result=$conn->query($q);
					$r=$result->fetch_assoc();
					$hall=$r["HALL"];
					$sql="SELECT * FROM complaint WHERE HALL='".$hall."'";
					$result=$conn->query($sql);
					if($result->num_rows >0)
					{
						while($row = $result->fetch_assoc())
						{
							//echo "<input name='id' type='name' value='".$row["ID"]."'  style='visibility:hidden;width:0px;'>";
							echo "<tr class='table-striped'><td>".$row["ID"]."</td><td>".$row['NAME']."</td><td>".$row['COM_TYPE']."</td><td>".$row['COM_DESCP']."</td><td>".($row["COM_STATUS"]?"Solved":"Pending....")."</td><td><a href='warden_complaint.php?key=".$row["ID"]."' class='btn btn-link'>".($row["COM_STATUS"]?"":"Click to Solve")."</a></td></tr>"
							;

						}
					}
					$conn->close();
				?>
				</table>
			</div>
			<div class="tab">
				<?php
					echo "<h2 align='center'>Hall   ".$_SESSION['hall']."</h2>";
				?>
				<table class="table table-border table-hover">
					<thead>
						<th class="table-primary">SLNO</th>
						<th class="table-primary">ROOM NUMBER</th>
						<th class="table-primary">NAME</th>
						<th class="table-primary">ROOM SHARED</th>
						<th class="table-primary">CONTACT</th>
					</thead>
					<tbody>
						<?php
							session_start();
							$conn =new mysqli('localhost','root','','hmc');
							$sql="SELECT * FROM student WHERE HALL='".$_SESSION['hall']."' ORDER BY ROOM ASC";
							$result=$conn->query($sql);
							if($result->num_rows >0)
							{	$i=1;
								while($row = $result->fetch_assoc())
								{
									echo "<tr class='table-light'><td>".$i."</td><td>".$row["ROOM"]."</td><td>".$row["NAME"]."</td><td>".($row["TWIN_SHARE"]?"Yes":"No")."</td><td>".$row["CONTACT"]."</td></tr>";
									$i=$i+1;
								}
							}
							$conn->close();
						?>

					</tbody>
				</table>
			</div>
			<div class="tab">
				<!--===============================Requesting tools-->
				<div style="width: 30vw;">
					<h3>Tools Requested</h3>
					<table class="table table-striped table-hover table-md">
						<thead class="table-primary">
							<td>NAME</td>
							<td>TOOLS</td>
							<td>STATUS</td>
						</thead>
						<tbody>
							<?php
								$conn=new mysqli('localhost','root','','hmc');
								$sql="SELECT * FROM tools";
								$result=$conn->query($sql);
								if ($result->num_rows > 0) {
 									 while($row = $result->fetch_assoc()){
 									 	echo "<tr><<td>".$row["NAME"]."</td><td>".$row["TOOL"]."</td><td><a href='tool_status.php?key=".$row["ID"]."' class='btn btn-link'>".($row["STATUS"]?"Approved":"Pending")."</a></td></tr>";
 									 }
								}
								$conn->close();	
							?>
						</tbody>
					</table>
				</div>
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