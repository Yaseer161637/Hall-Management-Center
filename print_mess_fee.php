<!DOCTYPE html>
<html>
<head>
	<title>Print Data</title>
	<link rel="stylesheet" type="text/css" href="student/css/style.css">
	<link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body onload="window.print()">
	<div class="container" align="center" style="padding-top: 20vh;">
		<table class="table table-borderd" style="width: 50vw;">
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
				session_start();
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
	<a href="mess_manager.php" class="btn" align="center" style="background:#6495ED;">Go Back</a>
	</div>
	
	</script>
</body>
</html>