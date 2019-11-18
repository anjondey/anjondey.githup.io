<?php
$conn = mysqli_connect("localhost","root","","studentinfo");

if(!$conn){
    echo "Can't Connect to Database!".mysqli_connect_error($conn);
}
