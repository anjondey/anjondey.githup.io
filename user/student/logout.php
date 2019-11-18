<?php 
    ob_start();
    session_start();
    session_destroy();
    header("Location:student_login.php");
?>
