<?php
$con=mysqli_connect("localhost","root","","railway") or die(mysqli_error($con));
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>