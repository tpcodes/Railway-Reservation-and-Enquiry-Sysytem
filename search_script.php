<?php 
require 'includes\common.php';

$fstation=mysqli_real_escape_string($con,$_POST['fstation']);
$date = mysqli_real_escape_string($con,$_POST['date']);
$dstation = mysqli_real_escape_string($con,$_POST['dstation']);
$class = mysqli_real_escape_string($con,$_POST['class']);
$quota = mysqli_real_escape_string($con,$_POST['quota']);

$_SESSION['search']=$_POST['search'];
$timestamp = strtotime($date);

$day = date('D', $timestamp);

// echo("<script>location.href='train-list.php'</script>");
// dateName($dateValue);





function get_train()
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    
    $sq="select * from trains where origin='$fstation' and dest='$dstation' "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
    // $n=mysqli_num_rows($sqr);
	
	return $sqr;

}
function get_train_by_date()
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    
    $sq="select * from trains inner join train_schedule on trains.t_number=train_schedule.t_number inner join seat_availability on seat_availability.t_number=train_schedule.t_number where (origin='$fstation' and dest='$dstation') and $day='Y' and doj='$date'  "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
    // $n=mysqli_num_rows($sqr);
    // print($n);
	
	return $sqr;




}
function get_train_by_date1()
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    // SELECT d1.*,* FROM train_route d1 INNER JOIN train_route d2 ON d2.t_number=d1.t_number inner join trains on train.t_number=d1.t_number inner join train_schedule on trains.t_number=train_schedule.t_number inner join seat_availability on seat_availability.t_number=train_schedule.t_number   WHERE d1.stn_code = 'HRI' and d2.stn_code = 'SPN' and  $day='Y' and doj='$date' AND d1.distance < d2.distance;
    
    $sq="SELECT d1.stn_code as from_code,d1.stn_name as frm_stn,d2.stn_code as to_code,d2.stn_name as to_stn,d1.depart as depart_time ,d2.arr as arrival_time, trains.* FROM train_route d1 INNER JOIN train_route d2 ON d2.t_number=d1.t_number inner join trains on trains.t_number=d1.t_number inner join train_schedule on trains.t_number=train_schedule.t_number WHERE d1.stn_name = '$fstation' and d2.stn_name = '$dstation' AND d1.distance < d2.distance and $day='Y'"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
    // $n=mysqli_num_rows($sqr);
    // print($n);
	
	return $sqr;




}



function get_seat_availibility($t_number)
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    
    $sq="select * from seat_availability inner join train_fair on seat_availability.t_number=train_fair.t_number where train_fair.t_number='$t_number' and doj='$date'"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;


}

function get_seat_availibility1($t_number)
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    // SELECT (d2.SL_P-d1.SL_P) as SL_P,d1.stn_code as from_code,d1.stn_name as frm_stn,d2.stn_code as to_code,d2.stn_name as to_stn,d1.depart as depart_time ,d2.arr as arrival_time, trains.* FROM train_route d1 INNER JOIN train_route d2 ON d2.t_number=d1.t_number inner join trains on trains.t_number=d1.t_number inner join train_schedule on trains.t_number=train_schedule.t_number WHERE d1.stn_name = 'HARDOI (HRI)' and d2.stn_name = 'SHAHJAHANPUR JN (SPN)' AND d1.distance < d2.distance and Tue='Y';
    $sq="SELECT (d2.SL_P-d1.SL_P) as SL_P,(d2.1A_P-d1.1A_P) as 1A_P,(d2.2A_P-d1.2A_P) as 2A_P,(d2.3A_P-d1.3A_P) as 3A_P,(d2.CC_P-d1.CC_P) as CC_P,d1.stn_code as from_code,d1.stn_name as frm_stn,d2.stn_code as to_code,d2.stn_name as to_stn,d1.depart as depart_time ,d2.arr as arrival_time, seat_availability.* FROM train_route d1 INNER JOIN train_route d2 ON d2.t_number=d1.t_number inner join seat_availability on seat_availability.t_number=d1.t_number WHERE d1.stn_name = '$fstation' and d2.stn_name = '$dstation' AND d1.distance < d2.distance and doj='$date' and d1.t_number='$t_number';"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;


}
function get_dates_of_journeys($t_number)
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    
    $sq="select doj from seat_availability where t_number='$t_number' and doj >= CURDATE()"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;


}
function get_train_fair($t_number)
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    
    $sq="select * from train_fair where t_number='$t_number' and doj='$date'"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;

}
function get_running_day($t_number)
{
    global $fstation,$date,$dstation,$class,$quota,$day,$con;
    $sq="select days from ( select days, case s.days when 'Mon' then Mon when 'Tue' then Tue when 'Wed' then Wed when 'Thu' then Thu when 'Fri' then Fri when 'Sat' then Sat when 'Sun' then Sun end AS val from train_schedule cross join ( select 'Mon' AS days union all select 'Tue' union all select 'Wed' union all select 'Thu' union all select 'Fri' union all select 'Sat' union all select 'Sun' ) s on t_number='$t_number' ) s where val ='Y';"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;

}



function get_passenger($pnr,$username)
{
    global $con;
    $sq="select * from bookings where username='$username' and pnr='$pnr' "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;

}







function dateName($dates) {

    $result = "";

    $convert_date = strtotime($dates);
    $month = date('F',$convert_date);
    $year = date('y',$convert_date);
    $date = date('j',$convert_date);
    $name_day = date('l',$convert_date);
    $day = date('D',$convert_date);


    $result = $day . ", " . $date . " " . $month ;

    return $result;
}

function get_duration($time1,$time2) {

    $time1 = strtotime($time1);
    $time2 = strtotime($time2);
    if($time2 < $time1) {
        $time2 += 24 * 60 * 60;
    }
    $minutes= ($time2 - $time1) / 60;
    $converted_time = date('H:i', mktime(0,$minutes));
   

return $converted_time;
}
function get_duration_min($time1,$time2) {

    $time1 = strtotime($time1);
    $time2 = strtotime($time2);
    if($time2 < $time1) {
        $time2 += 24 * 60 * 60;
    }
    $minutes= ($time2 - $time1) / 60;
    
   

return $minutes;
}

function get_day($dept,$arr)
{
    global $date;
    $minutes=get_duration_min($dept,$arr);
    $date1 = "$date"." " ."$dept";
    $date1 = strtotime($date1);
    $date1= strtotime("+$minutes minutes", $date1);
    return dateName(date('Y-m-d', $date1));
    
}


// $a=get_train_by_date();
// while($row=mysqli_fetch_array($a))
// {
 

//    echo $row['origin'];


// }
// echo($day);

// echo $fstation,$date ,$dstation,$class,$quota;

?>