<?php
	$conn = mysqli_connect("localhost","root","","studentinfo");
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<link rel="stylesheet" href="css/admin.css" />

	<title>Signup</title>

</head>
<body >
		<div class = "header">
			<h3><b>Welcome to Admin Panel</b></h3>
		</div>
		<div class="imgcontainer" align = "center">
		<br />

			<img src="images/login.jpg" alt="Avatar" style = "max-width: 25%; height: 20%; border-radius: 50%;">
		</div>
		<br />
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Admin Signup Form</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<br />


		<div class = "container-fluid">

			<div class = "row justify-content-center">

				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 ">
					<form name = "adminloginform"  method = "POST" class = "form-container">
						<div class="form-group">
							<label for=""><b>Username:</b></label>

							<input class="form-control"  type="text" name="username"  placeholder="Username" required=""/>
						</div>

						<div class="form-group">
							<label for=""><b >Password:</b></label>

							<input class="form-control"  type="password" name="password"  placeholder="Password" required=""/>
						</div>

						<div style = "text-align:center;">

							<input class="btn btn-primary submit" type="submit" name="submit" value="Submit" style = "width: 250px; max-width:80%">

						</div>
					</form>
				</div>
			</div>

		</div>

		<?php
			if(isset($_POST['submit']))
			{
				$name = $_POST['username'];
				$pass = $_POST['password'];
				$pass = base64_encode($pass);

				$qry = "INSERT INTO `admin_login`( `username`, `password`) VALUES ('$name', '$pass')";
				$run = mysqli_query($conn, $qry);
				header("location:login.php");
			}
		 ?>

</body>
</html>
