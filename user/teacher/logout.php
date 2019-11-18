<?php 
    ob_start();
    session_start();
    session_destroy();
    header("Location:teacher_login.php");
?>
