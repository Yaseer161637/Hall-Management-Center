<?php
	session_start();
	if($_SESSION["user_type"]==null)
  		{
  			header("Location:login.php");
  		}
  		if($_SESSION["user_type"]!="mess_manager")
  		{
  			header("Location:".$_SESSION["user_type"].".php");
  		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>MESS MANAGER</title>
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
		              <span onclick="showTab(1)">Mess Fee Paid Students</span>
		          </li>
		          <li>
	              	<span onclick="showTab(2)">Mess Fee Dues Students</span>
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
				<h3>Welcome to Hall Management Center</h3>
			</div>
			<div class="tab">
				<div id="print">
				<h3 align="center">MESS FEE PAID STUDENTS</h3>
				<table class="table table-borderd" style="width: 50vw;" align="center">
							<thead>
							<tr class="table-primary">
								<th scope="row">SLNO</th>
								<th scope="row">NAME</th>
								<th scope="row">AMOUNT</th>
								<th scope="row">DATE</th>
							</tr>
							</thead>
							<tbody class="table-striped">
							<?php 
								$conn =new mysqli('localhost','root','','hmc');
								$sql="SELECT * FROM mess_fee";
								$result=$conn->query($sql);
								if($result->num_rows >0)
								{
									while($row = $result->fetch_assoc())
									{
										echo "<tr class='table-white'><td>".$row["ID"]."</td><td>".$row["NAME"]."</td><td>".$row["AMOUNT"]."</td><td>".$row["DATE"]."</td></tr>";
									}
								}
								$conn->close();
							?>
							</tbody>
				</table>
			</div>
				<table>
					<tr><td></td><td></td><td></td><td align='right'><a class='btn btn-white' style='background:#6495ED;' "color: white;" href="#" onclick="printing_table()"> Print </a></td>
				</table>
			</div>
			<div class="tab">
				<h3 align="center">MESS DUES STUDENTS</h3>
				<table class="table table-border table-hover " style="width: 50vw;" align="center">
					<thead class="table-primary">
						<th>SLNO</th>
						<th>NAME</th>
						<th>EMAIL ID</th>
						<th>CONTACT</th>
						<th>DUE BALANCE</th>
					</thead>
					<tbody>
						<?php
							session_start();
							$conn =new mysqli('localhost','root','','hmc');
							$q="SELECT * FROM student WHERE MESS_DUES>0";
							$result=$conn->query($q);
							if($result->num_rows >0)
							{	$i=1;
								while($row = $result->fetch_assoc())
								{
									echo "<tr class='table-light'><td>".$i."</td><td>".$row["NAME"]."</td><td>".$row["EMAIL_ID"]."</td><td>".$row["CONTACT"]."</td><td>".$row["MESS_DUES"]."</td></tr>";
									$i=$i+1;
								}
							}
							$conn->close();
							
						?>
					</tbody>
				</table>	
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