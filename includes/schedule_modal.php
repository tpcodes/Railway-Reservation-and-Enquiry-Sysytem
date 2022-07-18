
<?php

include 'common.php';


$t_number= $_POST['t_number'];
function get_train11()
{

    global $t_number,$con;
    $sq="select * from trains inner join train_schedule on trains.t_number=train_schedule.t_number where trains.t_number='$t_number'  "   or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
  
	return $sqr;




}

?>
<style>
    thead,.modal-header
    {
        background-color:#082b71;
        color:white;
        font-weight:bold;
        border-bottom:transparent;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="schedule_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" >
    <div class="modal-content">
      <div class="modal-header py-1">
        <h5 class="modal-title text-white fw-bold " id="staticBackdropLabel">Train Schedule</h5>
        <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark text-white fw-bold fs-4"></i></button>
      </div>
      <div class="modal-body">


      <!-- 1 -->
<div class="info-table my-5">
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
  <tbody>
    <?php
    $sqr=get_train11();
    while($row=mysqli_fetch_array($sqr))
    {?>
     <tr>
    
    <td><?php echo $row['name'] ?></td>
    <td>Otto</td>
    <td>@mdo</td>
  </tr>

    <?php } ?>
   
  </tbody>
</table>
</div>
<!-- 1 ends -->

      <!-- 2 -->
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
      <th scope="col">Day</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
</div>
<!-- 2 ends -->
        
      </div>
     
    </div>
  </div>
</div>