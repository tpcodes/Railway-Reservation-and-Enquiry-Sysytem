<?php
include 'includes\common.php';
$pnr=$_POST['pnr'];


$select_query= "update bookings set status='cancelled' where pnr='$pnr'";
$user_result=mysqli_query($con,$select_query);


?>