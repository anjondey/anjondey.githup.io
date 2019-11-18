<?php
ob_start();
session_start();
include("../../database/connection.php");

if($_SESSION['email'] == "" || $_SESSION['password'] == ""){
    header("Location:teacher_login.php");
    exit();
}else{
    include("include/header.php");
    $sql = "SELECT * FROM students";
    $res = mysqli_query($conn,$sql);
 ?>

<div class="container">
<h3 class="py-2 text-center">All Alumni</h3>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Village</th>
            <th scope="col">Email</th>
            <th scope="col">Admission year</th>
            <th scope="col">job</th>
            <th scope="col">Account</th>
            <th scope="col">Mobile</th>
            <th colspan="2" scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
    <?php
      $i = 0;
      while($row = mysqli_fetch_assoc($res)) {
      $i++;
    ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['village']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['session']; ?></td>
            <td><?php echo $row['job']; ?></td>
            <td><?php echo $row['account']; ?></td>
            <td><?php echo $row['mobile']; ?></td>

            <td>
             <a onclick="return confirm('Are you sure want to delete?');" href="question_delete.php?id=<?php echo $row['id'];?>">
               <i class="btn btn-danger fa fa-trash-o"></i>
            </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>

<?php
  include("include/footer.php");
  mysqli_close($conn);
} ?>
