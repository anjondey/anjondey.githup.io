<?php
ob_start();
session_start();
include("../../database/connection.php");

if($_SESSION['email'] == "" || $_SESSION['password'] == ""){
    header("Location:student_login.php");
    exit();
}else{ include("include/header.php"); ?>


<br>

<?php
  $data = json_decode($_SESSION['data'],true);
 ?>
<div class="container">
<center>
<img src="<?php echo  $data['photo']; ?>" width="100" class="img img-responsive img-thumbnail" alt="">
</center>
  <h2>Profile</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th><?php echo  $data["name"]; ?></th>
      </tr>
      <tr>
        <th>village</th>
        <th><?php echo  $data["village"]; ?></th>
      </tr>
      <tr>
        <th>Email</th>
        <th><?php echo  $data["email"]; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Admission</td>
        <td><?php echo  $data["session"]; ?></td>
      </tr>
      <tr>
        <td>Job Title</td>
        <td><?php echo  $data["job"]; ?></td>
      </tr>
      <tr>
        <td>Acount number</td>
        <td><?php echo  $data["account"]; ?></td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td><?php echo  $data["mobile"]; ?></td>
      </tr>
    </tbody>
  </table>
</div>
<?php  include("include/footer.php"); } ?>
