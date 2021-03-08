<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="student/css/style.css">
</head>
<body onload="window.print()">
	<div style="width: 45vw; padding: 20vh 25vw;" align="center">
				<h3>Staff Salary of This Month</h3>
				<table class="table table-striped">
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
 						 	$array[$i]=$row["NAME"]."_".$row["EMAIL_ID"]."_".$row["TYPE"];
 						 	$i=$i+1;
						  }
					}
					foreach ($array as $value) {
						$val=explode("_", $value);
						$s="SELECT TYPE,NAME,SUM(NO_OF_DAYS) as absent FROM staff_leaves WHERE EMAIL_ID='".$val[1]."' AND MONTHS='".date('m')."'";
						$r=$conn->query($s);
						if($r->num_rows>0){
							while($row=$r->fetch_assoc()){
								$workingdays=date('d')-$row["absent"];
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
				<a href="clerk.php" class="btn" align="center" style="background:#6495ED;">Go Back</a>
	</div>
</body>
</html>