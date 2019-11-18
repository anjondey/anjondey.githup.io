
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/admin.css" />


	<title>Admin Signup</title>

	<script type="text/javascript">
	function changeinput(ip)
	{
		document.getElementById("inp").value = ip;
	}
	</script>

</head>
<body >


		<!-- Image -->

		<div  align = "center">

			<img src="images/add teacher.jpg" alt="Avatar" style = "max-width: 20%; height: 20%; border-radius: 50%; margin-bottom: 10px;">
		</div>

		<!-- End of Image -->

		<!-- Header -->

		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Admin Signup</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<!-- End of Header -->

		<!-- Form -->

		<div class ="container-fluid">

			<div class = "row justify-content-center">

				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 " >

					<form method = "POST" class = "form-container">

						<div class="form-group" >
							<label for=""><b>Name:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Name" required
							value = "<?php
										if(isset($_POST['name']))
										{
											echo $_POST['name'];
										}

										?>" name="name" />
						</div>



						<div class="form-group">
							<label for=""><b>Email:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Email" name="email" required=""
								value = "<?php
										if(isset($_POST['email']))
										{
											echo $_POST['email'];
										}

										?>"
							>
						</div>

						<div class="form-group">
							<label for=""><b>Password:</b></label>
							<input type="password" class="form-control"  placeholder="Enter Password" name="password" required="" value = "<?php
										if(isset($_POST['password']))
										{
											echo $_POST['password'];
										}

										?>" >
						</div>

						<div class="form-group">
							<label for=""><b>Re-type Password:</b></label>
							<input type="password" class="form-control"  placeholder="Repeat Password" name="repeat_password" required="" value = "<?php
										if(isset($_POST['repeat_password']))
										{
											echo $_POST['repeat_password'];
										}

										?>" >
						</div>

						<div style = "text-align:center;">

							<input class="btn btn-primary submit" type="submit" name="submit1" value="Submit" style = "width: 250px; max-width:80%">

						</div>
					  </form>
				</div>
			</div>
		</div>

		<!-- End of Form -->

		<!-- PHP code for submitting the form -->

		<?php
			if(isset($_POST['submit1']))
			{
				$conn = mysqli_connect("localhost","root","","studentinfo");

				$name = $_POST['name'];
				$email = $_POST['email'];
				$pass = $_POST['password'];
				$repeat_pass = $_POST['repeat_password'];
				$repeat_pass = base64_encode($repeat_pass);
				$pass = base64_encode($pass);

				$exist_email = 0;

				if (!preg_match("/^[a-zA-Z ]*$/",$name))
				{
					?>
						<script type="text/javascript">
						window.alert("Invalid Teacher Name");

						</script>
					<?php
				}
				else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
				{
					?>
						<script type="text/javascript">
						window.alert("Invalid Email Address");

						</script>
					<?php
				}
				else
				{
					$qry2 = "select * from `teacher_signup`";
					$res2 = mysqli_query($conn,$qry2);
					while($row2 = mysqli_fetch_assoc($res2))
					{
						if($row2['email'] == $email)
						{
							$exist_email = 1;
							break;
						}
					}
					if($exist_email==1)
					{
						?>
							<script type="text/javascript">
								window.alert("Email Address already exist");

							</script>
						<?php
					}
					else if($pass!=$repeat_pass)
					{
						?>
							<script type="text/javascript">
								window.alert("Password not Matched");

							</script>
						<?php
					}
					else
					{
						$qry = "INSERT INTO `teacher_signup`(`name`, `email`,`password`,`repeat_password`) VALUES ('$name','$email','$pass','$repeat_pass')";
						$res = mysqli_query($conn,$qry);
						?>
						<script type="text/javascript">
							window.alert("Teacher Added Successfully");
							window.location = "teacher_details.php";
						</script>
						<?php
					}

				}
			}
		?>

		<!-- End of PHP code for submitting the form -->
</body>
</html>
