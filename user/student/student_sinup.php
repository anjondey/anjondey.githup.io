
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


	<title>HMUPHS-Alumni Registration</title>

	<script type="text/javascript">
	function changeinput(ip)
	{
		document.getElementById("inp").value = ip;
	}
	</script>

</head>
<body class="bg-light">

	<!-- Image -->

	<div  align = "center">

		<img src="images/login.jpg" alt="Avatar" style = "max-width: 20%; height: 20%; border-radius: 50%; margin-bottom: 10px;">
	</div>

	<!-- End of Image -->



		<!-- Header -->

		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Alumni Registration</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<!-- End of Header -->

		<!-- PHP code for submitting the form -->
		<?php
			if(isset($_POST['submit'])){
				include("../../database/connection.php");

				$name 			= $_POST['name'];
				$village 			= $_POST['village'];
				$session 		= $_POST['session'];
				$degree     = $_POST['degree'];
				$job        =$_POST['job'];
				$email 			= $_POST['email'];
				$account  	= $_POST['account'];
				$mob 			  = $_POST['mobile'];
				$pass 			= $_POST['password'];
				$repeat_pass 	= $_POST['repeat_password'];
				$password       = base64_encode($pass);
				$date           = date("Y-m-d");



				if($_FILES['image']['tmp_name'] != ""){
					$src = $_FILES['image']['tmp_name'];
					$des = "images/students/".strtotime('now').".jpg";
					copy($src,$des);
				}

				  if($pass  != $repeat_pass){ ?>
					<script>alert("Re-type password don't matched! Try again.");</script>
				<?php }else{

					$sql = "INSERT INTO students set date       = '$date',
													 name       = '$name',
													 village    = '$village',
													 session    = '$session',
													 degree     = '$degree',
													 job        = '$job',
													 account    = '$account',
													 email      = '$email',
													 mobile     = '$mob',
													 password   = '$password',
													 photo      = '$des'";
					$res = mysqli_query($conn,$sql);
					if($res){
						echo "<center><h3>Alumni's Data Successfully Saved</h3></center>";
					}else{
						echo "<center><h3>Error!</h3>".mysqli_error($conn)."</center>";
					}
				}

			}
		?>
	<!-- End of PHP code for submitting the form -->

		<!-- Form -->

		<div class ="container-fluid">

			<div class = "row justify-content-center">

				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 " >

					<form method = "POST" class = "form-container" enctype="multipart/form-data">

						<div class="form-group" >
							<label for=""><b>Name</b></label>
							<input type="text" class="form-control"  placeholder="Enter Your Name" required
							value = "<?php
										if(isset($_POST['name']))
										{
											echo $_POST['name'];
										}

										?>" name="name" />
						</div>

            <div class="form-group" >
							<label for=""><b>Village:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Your Village" name="village" required
							value = "<?php
										if(isset($_POST['village']))
										{
											echo $_POST['village'];
										}

										?>"
								>
						</div>

            <div class="form-group" >
              <label for=""><b>Admission year</b></label>
              <input type="text" class="form-control"  name="session" placeholder="Enter Your Admission Year" required
              value = "<?php
                    if(isset($_POST['session']))
                    {
                      echo $_POST['session'];
                    }

                    ?>"
									>
            </div>

						<div class="form-group">
							<label for=""><b>Bachalor of degree</b></label>
							<input type="text" class="form-control"  placeholder="Enter degree" name="degree" required=""
								value = "<?php
										if(isset($_POST['degree']))
										{
											echo $_POST['degree'];
										}

										?>"
							>
						</div>
						<div class="form-group">
							<label for=""><b>Job Title</b></label>
							<input type="text" class="form-control"  placeholder="Enter your job description" name="job" required=""
								value = "<?php
										if(isset($_POST['job']))
										{
											echo $_POST['job'];
										}

										?>"
							>
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


						<div class="form-group" >
							<label for=""><b>Acount number</b></label>
							<input type="text" class="form-control"  name="account" placeholder="Enter Your Account number of  ATM/BKSH" required
							value = "<?php
										if(isset($_POST['account']))
										{
											echo $_POST['account'];
										}

										?>"
									>
						</div>

            <div class="form-group" >
							<label for=""><b>Mobile Number</b></label>
							<input type="text" class="form-control"  name="mobile" placeholder="Enter Mobile Number" required
							value = "<?php
										if(isset($_POST['mobile']))
										{
											echo $_POST['mobile'];
										}

										?>" >
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
							<label for=""><b>Re-type Password</b></label>
							<input type="password" class="form-control"  placeholder="Repeat Password" name="repeat_password" required="" value = "<?php
										if(isset($_POST['repeat_password']))
										{
											echo $_POST['repeat_password'];
										}

										?>" >
						</div>

						<div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload Photo</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" accept="image/*" id="zip" required>
                  <label class="custom-file-label" for="">Choose file</label>
                </div>

            </div>

						<div style = "text-align:center;">

							<input class="btn btn-primary submit"  type="submit" name="submit" value="Submit" style = "width: 250px; max-width:80%">
							<a href="student_login.php" style="color:#000000;">Do you have an Account?</a>
						</div>
					</form>
				</div>
			</div>
		</div>

					<!-- End of Form -->
		</body>
</html>
