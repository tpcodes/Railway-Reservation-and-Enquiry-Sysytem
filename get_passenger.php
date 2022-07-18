<?php 
require 'includes\common.php';


// $pnr=$_SESSION['pnr'];
$t_number=$_SESSION['t_number'];
$frm=$_SESSION['origin'];
$to=$_SESSION['dest'];

    
    function get_passenger($pnr,$username)
{
    global $con;
    $sq="select * from bookings INNER JOIN trains on trains.t_number=bookings.t_number where username='$username' and pnr='$pnr' "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;

}


function get_details1()
{
  global $con,$t_number,$frm,$to;
  $sq="SELECT d1.stn_code as from_code,d1.stn_name as frm_stn,d2.stn_code as to_code,d2.stn_name as to_stn,d1.depart as depart_time ,d2.arr as arrival_time FROM train_route d1 INNER JOIN train_route d2 ON d2.t_number=d1.t_number WHERE d1.stn_name='$frm' and d2.stn_name='$to' and d1.t_number='$t_number';";
  $sqr=mysqli_query($con,$sq);
  return $sqr;
}






?>