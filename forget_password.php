<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="student/css/style.css">
</head>
<body>
<style type="text/css">
	body form{
		padding-top: 5vh;
		padding-left: 42vw;
	}
	h3
	{
		padding-top: 25vh;
	}

</style>
<h3 align="center">Forget password</h3>
<form method="POST" action="send_email.php">
	<div class="form-group">
	<label style="font-size: 17px;">Enter Mail Id:</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" style="border: 2px solid black; width:15vw;">
  </div>
  <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Submit</button>
</form>
</body>
</html>