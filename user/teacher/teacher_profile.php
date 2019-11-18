<?php
ob_start();
session_start();
include("../../database/connection.php");

if($_SESSION['email'] == "" || $_SESSION['password'] == ""){
    header("Location:teacher_login.php");
    exit();
}else{ include("include/header.php"); ?>



<?php  include("include/footer.php"); } ?>
