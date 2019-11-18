<?php
  ob_start();
  session_start();
  include("../../database/connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src = "js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
  <link rel="stylesheet" href="css/admin.css">
  <title>Teacher Panel</title>
</head>
<body>
  <h1 class = "header">Welcome To Teacher Panel</h1>

  <!-- Image -->

  <div align = "center">
      <br />
    <img src="images/login.jpg" alt="Avatar" style = "max-width: 20%; height: 20%; border-radius: 50%;">
  </div>

  <!-- End of Image -->
  <!-- login text -->

  <div class = "logintext">
    <h2 style = "color:#3871F6; width: auto;"><b>Teacher Login Form</b></h2>
    <b><hr class = "hrline"/></b>
  </div>

  <!-- End of login text -->


  <!-- Form -->

  <div class = " container-fluid">

    <div class = "row justify-content-center">

      <div class = "form col-lg-3 col-sm-6 col-md-4 col-8">

        <form  method = "POST" class = "form-container">

          <div class="form-group">
            <label for=""><b>Email:</b></label>
            <input class="form-control" type="text" name="email"  placeholder = "Enter Your Email" value ="<?php if(isset($_POST['email']))
            {
              echo $_POST['email'];
            } ?>" required=""/>
          </div>


          <div class="form-group">
            <label for=""><b>Password:</b></label>
            <input  class="form-control" type="password" name="password" placeholder = "Password" value = "<?php if(isset($_POST['password']))
            {
              echo $_POST['password'];
            }
             ?>" required=""/>
          </div>
          <!-- Submit Button -->

          <div style = "text-align:center;">

            <input class="btn btn-primary submit" type="submit" name="submit" value="Login" style = "width: 250px; max-width:80%">

          </div>

          <!-- End of Submit Button -->

        </form>
      </div>


    </div>

  </div>

  <!--End of Form -->

  <?php
    if(isset($_POST['submit'])){
      $email  = $_POST['email'];
      $pass   = $_POST['password'];
      $pass   = base64_encode($pass);
      $login  = 0;

      $qry = "SELECT * FROM `teacher_signup` WHERE `email` = '$email' && `password` = '$pass'";
      $res = mysqli_query($conn, $qry);
      $count = mysqli_num_rows($res);

      if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['name']        = $row['name'];
        $_SESSION['designation'] = $row['designation'];
        $_SESSION['email']       = $row['email'];
        $_SESSION['password']    = $row['password'];

        $login=1;
      }


      if($login == 1){
        	header("Location:teacher_profile.php");
      } else { ?>
  		<script>
  			var res = alert("Invalid Username or Password!");
  			window.location = "teacher_login.php";
  		</script>
  		<?php }  } ?>
</body>
</html>
