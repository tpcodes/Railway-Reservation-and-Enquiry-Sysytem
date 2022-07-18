<?php
include 'includes\common.php';

$pnr=$_POST['pnr'];

if(isset($_POST['amt']) && isset($_POST['username'])){
    $amt=$_POST['amt'];
    $pnr=$_POST['pnr'];
    $_SESSION['pnr']=$pnr;
    $username=$_POST['username'];
    $payment_status="pending";
    date_default_timezone_set('Asia/Kolkata');
    $added_on=date('Y-m-d h:i:s');

    $select_query="insert into payment(username,amount,payment_status,added_on,pnr) values('$username','$amt','$payment_status','$added_on','$pnr')";
    mysqli_query($con,$select_query) or die(mysqli_error($con));
    $_SESSION['OID']=mysqli_insert_id($con);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $pnr= $_SESSION['pnr'];
    $payment_id=$_POST['payment_id'];
   
    mysqli_query($con,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."' and pnr='$pnr'");
    mysqli_query($con,"update bookings set status='confirmed' where pnr='$pnr'");
    mysqli_query($con,"delete from bookings where status='pending'");


  
  
   
}
?>
