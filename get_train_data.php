<style>
thead,
.modal-header {
    background-color: #082b71;
    color: white;
    font-weight: bold;
    border-bottom: transparent;
}

.badge {
    margin-right: 5px;
    font-size: .75rem;
}
</style>

<?php
include 'includes\common.php';



if(isset($_POST['custId'])){
	$t_number = $_POST['custId'];

    function get_train_det()
    {

    global $con,$t_number;
    $sq="select * from trains inner join train_schedule on trains.t_number=train_schedule.t_number where trains.t_number='$t_number'  "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
    return $sqr;

    }
    function get_train_route()
    {

    global $con,$t_number;
    $sq="select * from train_route where t_number='$t_number' "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
    return $sqr;

    }

    function get_running_day()
{
    global $t_number,$con;
    $sq="select days from ( select days, case s.days when 'Mon' then Mon when 'Tue' then Tue when 'Wed' then Wed when 'Thu' then Thu when 'Fri' then Fri when 'Sat' then Sat when 'Sun' then Sun end AS val from train_schedule cross join ( select 'Mon' AS days union all select 'Tue' union all select 'Wed' union all select 'Thu' union all select 'Fri' union all select 'Sat' union all select 'Sun' ) s on t_number='$t_number' ) s where val ='Y';"   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
	return $sqr;

}




    function get_duration_min($time1,$time2) {
        if($time1!='--' && $time2!='--')
        {

       
        $time1 = strtotime($time1);
        $time2 = strtotime($time2);
        if($time2 < $time1) {
            $time2 += 24 * 60 * 60;
        }
        $minutes= ($time2 - $time1) / 60;
        
       
    
        return $minutes;
    }
    else{
        return '--';
    }
    }

    $response = '  <div class="info-table my-5">
    <table class="table">
<thead>
  <tr>
    <th scope="col">Train number</th>
    <th scope="col">Train Name</th>
    <th scope="col">From Station</th>
    <th scope="col">Destination Station</th>
    <th scope="col">Runs On</th>
  </tr>
</thead>
<tbody>';
    $sqr=get_train_det();
	while( $row = mysqli_fetch_array($sqr) ){
	

		$response .= '<tr>';
		$response .= '<td>'.$row['t_number'].'</td>';
		$response .= '<td>'.$row['name'].'</td>';
		$response .= '<td>'.$row['origin'].'</td>';
		$response .= '<td>'.$row['dest'].'</td><td>';
		
        $sqr=get_running_day( $row['t_number']);
        while($rows1=mysqli_fetch_array($sqr))
        {
            $response .= '<span class="badge bg-success mr-2">'. $rows1['days'] .'</span>';
        
        }
        
        
        
		$response .= '</td></tr>';

		
	}
	$response .= ' </tbody>
    </table>
    </div>
    <div class="info-table-1 mt-5">
    <table class="table">
<thead>
  <tr>
    <th scope="col">S.N.</th>
    <th scope="col">Station Code</th>
    <th scope="col">Station Name</th>
    <th scope="col">Route Number</th>
    <th scope="col">Arrival Time</th>
    <th scope="col">Departure Time</th>
    <th scope="col">Halt Time(In min)</th>
    <th scope="col">Distance(In Km)</th>
    <th scope="col">Day</th>
  </tr>
</thead>
<tbody>';
    $sqr=get_train_route();
    $i=1;
	while( $row1 = mysqli_fetch_array($sqr) ){

        $response .= '<tr>';
		$response .= '<td>'.$i++.'</td>';
		$response .= '<td>'.$row1['stn_code'].'</td>';
		$response .= '<td>'.$row1['stn_name'].'</td>';
		$response .= '<td>'.$row1['route_num'].'</td>';
		$response .= '<td>'.$row1['arr'].'</td>';
		$response .= '<td>'.$row1['depart'].'</td>';
		$response .= '<td>'.get_duration_min($row1['arr'],$row1['depart']).'</td>';
		$response .= '<td>'.$row1['distance'].'</td>';
		$response .= '<td>'.$row1['day'].'</td>';
		$response .= '</tr>';
	

    }
    $response .= '  </tbody>
    </table>
    </div>';
	echo $response;
	exit;



  
    
    
   

  
   
 


 
    
     
    



}

   








?>