<?php
include 'includes\common.php';
$_SESSION['search']=$_POST['search'];
if(!isset($_SESSION['search']))
{
  header("location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">






<link href="data:image/vnd.microsoft.icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAD9/Pz//////9u6uf+5enj/woqJ/8KKif/CjIr/r2hm/92/vv/Po6L/2rm4/8ucmv+waWf/48nJ///////+/f3//fz8///////Uraz/sGpo/6NRT/+rX13/sGln/8qbmf/dv7//tnVz/8GJh/+0cG7/z6Sj/+LHxv///////v39//7+/v//////7Nra/+LIx//XsrH/2rm4/+/h4P/Gk5H/4cTD/9Clo//Xs7L/6NTU/8mYlv/x5eT///////7+/v///////v7+///////t3dz/7Nzc//7+/v///////////+/y8f/t8vL/8uXl/+bR0P/27u3///////7+/v////////////////+9goH/xJCP//jy8v///v7/9/T0/9rV1P/Z1dT/8vX1/7Z4dv9/DQn/hhoX/7Nwbv/+/Pz////////////PpKP/m0JA////////////9fb2/+ft7P/5/Pz////////////v5uX/0ayq/9Gnpv+RMC3/0Kel////////////s29s/6BMSf//////9/j4/+DX1//YtbT/1Kuq/+rY2P/u3t7/8+vq//f7+///////4cbF/72CgP///////////8qamf+EFhP/1LKx//z////kzMz/hRcU/6VVU//NoJ//lTc0/+nU1P/w8vL/+/v6//Tq6v/Uraz////////////17ez/ljc0/8uiof//////5c7O/48sKf/iycj/yJiW/4khHf/w4OD/8vX1//Lz8v/48PD/7d7e///////+/v7//////+TU1P/18PD//////+XOzf+NJyT/iB0a/8qbmv+nWFb/6NDQ//f7+//o5uX///////37+//////////////////k5eX/1NHQ//f7+//r2Nj/nkZE/51FQv/TrKv/rmdl/+vX1//4+/v/4d/e///////+/v7//////////////////Pv7/+rp6P/Z19b/4N7d/+7r6v/7+fn//fv7//z5+f//////8fHw/9vZ2f////////////////////////////////////////////Pz8//o5+b/6Ofm//Dv7v/y7u3/8OXl/+zo6P/i4eH///////////////////////////////////////v39//79vb/////////////////plpY/5Q3NP/38fH///////7+/v/////////////////////////////////+/v7/2rq5/9/Cwf/z6en/wIeF/4MUEP/JmZf///////78/P///////////////////////////////////v7///////r29v/HlJP/nENA/44qJ//Bion//v39////////////////////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==" rel="icon" type="image/x-icon" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://kit.fontawesome.com/25b021be14.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>


<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<title>Train List</title>
<link rel="stylesheet" href="css/style.css" type="text/css"> 

<style>





#section1
{
    margin:0;
    padding: 0;
    background: url("images/home_page_banner1.ab4db3998511d52c6612.jpg");
   
    background-repeat: no-repeat;
    background-size:cover;
    width: 100%;
    
    height: 79vh;
}
.cols {
    /* margin-left: -20px; */
    margin-right: -80px;
    position:relative;
}
.header-dec
{
  background-color:#213d77;
  color:white;
}
.input-group-text
{
    background-color: white;
    border-right: transparent;
   
}
td
{
  padding:10px;
}

.class-name{
  color: #213d77;
  font-size:18px;
  font-weight:bold;
  margin:0;
}

.avlbl-status
{
  color:green;
  font-size:14px;
  font-weight:bold;

}
.btn-outline-primary1:hover
{
background-color:rgba(33, 61, 119, 0.2);
color:white;
}
.btn-check:active+.btn-outline-primary, .btn-check:checked+.btn-outline-primary, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show, .btn-outline-primary:active {
    color: #fff;
    background-color: rgba(33, 61, 119, 0.1);
    /* border-color: #0d6efd; */
    border:2px solid #213d77;
}
.btn-check:active+.btn-outline-primary:focus, .btn-check:checked+.btn-outline-primary:focus, .btn-outline-primary.active:focus, .btn-outline-primary.dropdown-toggle.show:focus, .btn-outline-primary:active:focus {
    box-shadow: none!important;
}
.btn-check:focus+.btn-outline-primary, .btn-outline-primary:focus {
    box-shadow: none !important;
}
.close-icon {
  cursor: pointer;
  margin:-10px  -5px ;
}
.btn-success
{
  border-radius: 45px;
  background-color:#fb792b;
  box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.3);
}

.btn-check:focus+.btn-success, .btn-success:focus {
    color: #fff;
    background-color: #fb792b;
    border-color: #fb792b;
    box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.3);
}
.btn-success:hover
{
  transform: scale(1.05);
  background-color:darkorange;
  transition: all 0.2s ease 0s;
}
.card
{
  /* border-radius: 45px; */
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
}
.card2
{
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
}
.hidden
{
  display:none;
}
  </style>  

</head>
<body>

<!-- <div class="preloader"></div> -->
<?php include "includes\Login_modal.php" ?>
<?php include "includes\header.php" ?>
<?php include "includes\contactus.php" ?>
<?php include "includes\stationName.php" ?>
<?php 

include "search_script.php" ;
// if(!isset($_SESSION['search']))
// {
//   header("location:index.php");
// }







?>

<div class="card card2 p-2">
  <div class="card-header header-dec p-4 ">
 
            <form method="post" action="train-list.php">
            <div class="row g-3 mx-auto">
                      <div class="col">
                        <!-- <input type="text" class="form-control" placeholder="From"> -->
                    
                        <div class="input-group ">
                          <label class="input-group-text" for="fstation"><i class="fa-solid fa-paper-plane"></i></label>
                          <?php echo stationSelector("IN", "fstation", "fstation", "form-select  form-control form-control1"); ?>

                        </div>

        
                      </div>
                              
                      <div class="col-1 cols pt-2 ">
                        <button type="button" class="flip-btn" onClick="swapByOptionValue('select[name=\'fstation\']', 'select[name=\'dstation\']')" class="mx-4"><i class="fa-solid fa-exchange "></i></button>
                      </div>
                      <div class="col">
                        <div class="input-group ">
                          <label class="input-group-text" for="dstation"><i class="fa-solid fa-location-dot"></i></label>
                          <?php echo stationSelector1("IN", "dstation", "dstation", "form-select  form-control form-control1"); ?>

                        </div>
                        
                      </div>




                      <div class="col">
                        
                        
                        <div class="input-group flex-nowrap">
                          <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-calendar-days"></i></span>
                          <input type="date" id="date_picker" name="date" class="form-control form-control1" placeholder="Date" aria-label="Date" aria-describedby="addon-wrapping">
                        </div>
                      </div>

                   
                    
                   
                    
                   

                  
            

                      <div class="col">
                        <div class="input-group flex-nowrap">
                          <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-briefcase"></i></span>
                          <select class="form-select form-control form-control1" id="floatingSelectGrid" aria-label="Floating label select example" name="class">
                            <option selected hidden>All classes</option>
                            <option value="SL">Sleeper (SL)</option>
                            <option value="1A">AC First class (1A)</option>
                            <option value="2A">AC 2 Tier (2A)</option>
                            <option value="3A">AC 3 Tier (3A)</option>
                            <option value="CC">AC Chair car (CC)</option>
                          </select>
                        </div>
                      
                      </div>
                   
                    
                     
                      <div class="col">
                        <div class="input-group flex-nowrap">
                          <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list-ul"></i></span>
                          <select class="form-select form-control form-control1"   id="floatingSelectGrid" aria-label="Floating label select example"  name="quota">
                            <option selected active value="GENERAL">GENERAL</option>
                            <option value="LADIES">LADIES</option>
                            <option value="TATKAL">TATKAL</option>
                            <option value="PREMIUM TATKAL">PREMIUM TATKAL</option>
                          </select>
                        </div>
                      </div>
                  


                    
                  <div class="col">
                  <button type="submit" class="btn btn-warning search-btn px-5 btn-success" name="search">Modify Search</button>
                  </div>
    

</div>


</form>
</div>

  
  
  <div class="card-body">

  
    <div class="card-title">
      <p class="results-details border border-success p-2"><?php 
      $q=get_train_by_date1();
      $n=mysqli_num_rows($q);
      $row=mysqli_fetch_array($q);
      
        echo " $n results For <strong>  ".$fstation." <i class='fa-solid fa-arrow-right'></i> ".$dstation. "  ".dateName($date)."</strong> | For Quota | ".$quota." </p>";
      
      
      
    

      ?>
    </div>
    
<!-- train card -->
<?php 
 $q=get_train_by_date1();
 $_SESSION['origin']=$fstation;
 $_SESSION['dest']=$dstation;
 $n=mysqli_num_rows($q);
 while($row=mysqli_fetch_array($q))
 {?>
  
<div class='card mb-5 '>
<div class='card-header header-dec'>
<div class='row'>
  <div class='col-sm-4 pt-2'><h4 class=''><?php echo $row['name'] ." ( ". $row['t_number'] ." )" ;  ?></h4></div>
  <div class='col-sm-4 text-center my-2 fw-bold'>Runs On :
  <?php $sqr=get_running_day( $row['t_number']);
  while($rows1=mysqli_fetch_array($sqr))
  {?>
    <span class="badge bg-success"><?php echo $rows1['days']; ?></span>
  
  <?php };
  
  
  ?></div>
  <div class='col-sm-4 text-end'>
    <!-- <form action="" method="post"> -->
      
     <button type="button" data-id="<?php echo $row['t_number'] ;?>" class="btn  btn-popup btn-success text-white fw-bold mt-1">Train Schedule</button>
 <!-- </form> -->
  </div>
</div>
</div>
<div class='card-body'>

<div class='row'>
  <div class='col-sm-5 '><h5 class=''><?php echo $row['depart_time']."  | ".$row['frm_stn']." | ".dateName($date) ?></h5></div>
  <div class='col-sm-2 text-center dur'><?php echo get_duration($row['depart_time'],$row['arrival_time']) ?></div>



  <div class='col-sm-5 text-end'><h5 class=''><?php echo $row['arrival_time']."  | ".$row['to_stn']."  | ".get_day($row['depart_time'],$row['arrival_time']) ?></h5></div>

  <div class='class-types mt-3 p-2 table-responsive'>
  <table>
 
    <tr>
<td>
<?php 
$res=get_seat_availibility1($row['t_number']);
$n=mysqli_num_rows($res);
// echo $n;
// echo $row['t_number'];
if($n==0)
{?>
  <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Sorry!! No Bookings Information Available now.
  </div>
</div>
<?php }
while($row1=mysqli_fetch_array($res)) { 
  ?>
 <ul class='nav nav-pills mb-3' id='pills-tab' role='tablist'>

  <li class='nav-item mx-3' role='presentation'>
  <button class='active btn btn-lg btn-outline-primary btn-outline-primary1 px-5 '  data-bs-toggle='pill' data-bs-target='#SL-<?php echo $row['t_number']?>' type='button' role='tab' aria-selected='true'><p class='class-name fw-bold'>Sleeper (SL) </p><span class=" text-black fs-6">Refresh <i class="fa-solid fa-arrow-rotate-right"></i><span></button>
  </li>
  <li class='nav-item mx-3' role='presentation'>
    <button class=' btn btn-lg btn-outline-primary btn-outline-primary1' data-bs-toggle='pill' data-bs-target='#A1-<?php echo $row['t_number']?>' type='button' role='tab'  aria-selected='false'><p class='class-name fw-bold'>AC 1 Tier (1A) </p><span class=" text-black fs-6">Refresh <i class="fa-solid fa-arrow-rotate-right"></i><span></button>
  </li>
  <li class='nav-item mx-3' role='presentation'> 
    <button class='btn btn-lg btn-outline-primary btn-outline-primary1' data-bs-toggle='pill'data-bs-target='#A2-<?php echo $row['t_number']?>'  type='button' role='tab'  aria-selected='false'><p class='class-name fw-bold'>AC 2 Tier (2A) </p><span class=" text-black fs-6">Refresh <i class="fa-solid fa-arrow-rotate-right"></i><span></button>
  </li>
  <li class='nav-item mx-3' role='presentation'>
    <button class=' btn btn-lg btn-outline-primary btn-outline-primary1'  data-bs-toggle='pill' data-bs-target='#A3-<?php echo $row['t_number']?>' type='button' role='tab'  aria-selected='false'><p class='class-name fw-bold'>AC 3 Tier (3A) </p><span class=" text-black fs-6">Refresh <i class="fa-solid fa-arrow-rotate-right"></i><span></button>
  </li>
  <li class='nav-item mx-3' role='presentation'>
    <button class=' btn btn-lg btn-outline-primary btn-outline-primary1'  data-bs-toggle='pill' data-bs-target='#CC-<?php echo $row['t_number']?>' type='button' role='tab'  aria-selected='false'><p class='class-name fw-bold'>AC Chair Car (CC) </p><span class=" text-black fs-6">Refresh <i class="fa-solid fa-arrow-rotate-right"></i><span></button>
  </li>
  
  </ul>
 


</td>
    </tr>

<tr class=''>
  <td>




<div class='card card-11 hidden'>
<div class='card-header py-3 header-dec'>
<span class='pull-right clickable close-icon' data-effect='fadeOut'><i class='fa fa-times'></i></span>
</div>
<div class='card-body py-0'>
  

  
  <div class='tab-content ' id='pills-tabContent'>
    <!-- <form action="book.php" method="post"> -->
    <div class='tab-pane fade show active ' id='SL-<?php echo $row['t_number']?>' role='tabpanel' aria-labelledby='pills-<?php echo $row['t_number']."-SL"?>'>
      <form method="post" action="passenger_details.php">
      <table>
        <tr>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <?php 
          $qr=get_dates_of_journeys($row['t_number']);
          while($row2=mysqli_fetch_array($qr)) { ?>
            <td >


           
  <input type="radio" class="btn-check" name="date" id="<?php echo $row1['SL_P'] ,dateName($row2['doj'] )?>"  autocomplete="off" value="<?Php echo $row2['doj'] ?>" required>
  <label class="btn btn-outline-primary btn-outline-primary1" for="<?php echo $row1['SL_P'] ,dateName($row2['doj'] )?>" ><p class='class-name'><?Php echo dateName($row2['doj']) ?><br><span class='avlbl-status'>AVAILABLE <?Php echo $row1['SL'] ?></span ></label>


              <!-- <button type='button' class='btn btn-outline-primary btn-outline-primary1 day-detail' name="book" id="day-detail" value="<?Php echo dateName($row2['doj']) ?>" ></button> -->
            </td>

          <?php } ?>
          </div>
        </tr>
      
    </table>
   
    <div class="card-footer mt-4">

    <?php if(!isset($_SESSION['user_email'])){?>
      <button type='button' class='btn btn-warning search-btn   fs-6'  data-bs-toggle='modal' data-bs-target='#login_modal'>BOOK NOW</button>

  <?php } 
  else{ ?>
  <button type='submit' class='btn btn-warning search-btn   fs-6'  class="book-btn" name="book-btn">BOOK NOW</button>

  <?php } ?>
     
      
      <span class='price fw-bold' > &nbsp; ₹ <?php echo $row1['SL_P'] ?></span></div>
      <input type="hidden" value="<?php echo $row1['SL_P']?>" name="amt">
      <input type="hidden" value="<?php echo $row['t_number']?>" name="t_number">
      <input type="hidden" value="SL" name="class">
  </form>
  
  </div>









    
    <div class='tab-pane fade' id='A1-<?php echo $row['t_number']?>' role='tabpanel' aria-labelledby='pills-1A-tab'>

    <form method="post" action="passenger_details.php">
      <table>
        <tr>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <?php 
          $qr=get_dates_of_journeys($row['t_number']);
          while($row2=mysqli_fetch_array($qr)) { ?>
            <td >


           
  <input type="radio" class="btn-check" name="date" id="<?php echo $row1['1A_P'] ,dateName($row2['doj'] )?>"  autocomplete="off" value="<?Php echo $row2['doj']?>" required>
  <label class="btn btn-outline-primary btn-outline-primary1" for="<?php echo $row1['1A_P'] ,dateName($row2['doj'] )?>" ><p class='class-name'><?Php echo dateName($row2['doj']) ?><br><span class='avlbl-status'>AVAILABLE <?Php echo $row1['1A'] ?></span ></label>


              <!-- <button type='button' class='btn btn-outline-primary btn-outline-primary1 day-detail' name="book" id="day-detail" value="<?Php echo dateName($row2['doj']) ?>" ></button> -->
            </td>

          <?php } ?>
          </div>
        </tr>
      
    </table>
   
    <div class="card-footer mt-4">
      
    
    <?php if(!isset($_SESSION['user_email'])){?>
      <button type='button' class='btn btn-warning search-btn   fs-6'  data-bs-toggle='modal' data-bs-target='#login_modal'>BOOK NOW</button>

  <?php } 
  else{ ?>
  <button type='submit' class='btn btn-warning search-btn   fs-6'  class="book-btn" name="book-btn">BOOK NOW</button>

  <?php } ?>
     
      
      <span class='price fw-bold' > &nbsp; ₹ <?php echo $row1['1A_P'] ?></span></div>
     
    
    
    <input type="hidden" value="<?php echo $row1['1A_P']?>" name="amt">
      <input type="hidden" value="<?php echo $row['t_number']?>" name="t_number">
      <input type="hidden" value="1A" name="class">
  </form>

    
    </div>

    <div class='tab-pane fade' id='A2-<?php echo $row['t_number']?>' role='tabpanel' >

    <form method="post" action="passenger_details.php">
      <table>
        <tr>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <?php 
          $qr=get_dates_of_journeys($row['t_number']);
          while($row2=mysqli_fetch_array($qr)) { ?>
            <td >


           
  <input type="radio" class="btn-check" name="date" id="<?php echo $row1['2A_P'] ,dateName($row2['doj'] )?>"  autocomplete="off" value="<?Php echo $row2['doj'] ?>" required>
  <label class="btn btn-outline-primary btn-outline-primary1" for="<?php echo $row1['2A_P'] ,dateName($row2['doj'] )?>" ><p class='class-name'><?Php echo dateName($row2['doj']) ?><br><span class='avlbl-status'>AVAILABLE <?Php echo $row1['2A'] ?></span ></label>


              <!-- <button type='button' class='btn btn-outline-primary btn-outline-primary1 day-detail' name="book" id="day-detail" value="<?Php echo dateName($row2['doj']) ?>" ></button> -->
            </td>

          <?php } ?>
          </div>
        </tr>
      
    </table>
   
    <div class="card-footer mt-4">
    <?php if(!isset($_SESSION['user_email'])){?>
      <button type='button' class='btn btn-warning search-btn   fs-6'  data-bs-toggle='modal' data-bs-target='#login_modal'>BOOK NOW</button>

  <?php } 
  else{ ?>
  <button type='submit' class='btn btn-warning search-btn   fs-6'  class="book-btn" name="book-btn">BOOK NOW</button>

  <?php } ?>
     
      
      <span class='price fw-bold' > &nbsp; ₹ <?php echo $row1['2A_P'] ?></span></div>
      
      <input type="hidden" value="<?php echo $row1['2A_P']?>" name="amt">
      <input type="hidden" value="<?php echo $row['t_number']?>" name="t_number">
      <input type="hidden" value="2A" name="class">
  </form>

    
    </div>



    <div class='tab-pane fade' id='A3-<?php echo $row['t_number']?>' role='tabpanel' aria-labelledby='pills-3A-tab'>
    <form method="post" action="passenger_details.php">
      <table>
        <tr>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <?php 
          $qr=get_dates_of_journeys($row['t_number']);
          while($row2=mysqli_fetch_array($qr)) { ?>
            <td >


           
  <input type="radio" class="btn-check" name="date" id="<?Php echo $row1['3A_P'] ,dateName($row2['doj'] )?>"  autocomplete="off" value="<?Php echo $row2['doj'] ?>" required>
  <label class="btn btn-outline-primary btn-outline-primary1" for="<?php echo $row1['3A_P'] ,dateName($row2['doj'] )?>" ><p class='class-name'><?Php echo dateName($row2['doj']) ?><br><span class='avlbl-status'>AVAILABLE <?Php echo $row1['3A'] ?></span ></label>


              <!-- <button type='button' class='btn btn-outline-primary btn-outline-primary1 day-detail' name="book" id="day-detail" value="<?Php echo dateName($row2['doj']) ?>" ></button> -->
            </td>

          <?php } ?>
          </div>
        </tr>
      
    </table>
   
    <div class="card-footer mt-4">
      
    <?php if(!isset($_SESSION['user_email'])){?>
      <button type='button' class='btn btn-warning search-btn   fs-6'  data-bs-toggle='modal' data-bs-target='#login_modal'>BOOK NOW</button>

  <?php } 
  else{ ?>
  <button type='submit' class='btn btn-warning search-btn   fs-6'  class="book-btn" name="book-btn">BOOK NOW</button>

  <?php } ?>
     
      
     
    
    
    <span class='price fw-bold' > &nbsp; ₹ <?php echo $row1['3A_P'] ?></span></div>
     
    
    
    <input type="hidden" value="<?php echo $row1['3A_P']?>" name="amt">
      <input type="hidden" value="<?php echo $row['t_number']?>" name="t_number">
      <input type="hidden" value="3A" name="class">
  </form>
    
    </div>


    
    <div class='tab-pane fade' id='CC-<?php echo $row['t_number']?>' role='tabpanel' aria-labelledby='pills-CC-tab'>
      <form method="post" action="passenger_details.php">
        <table>
          <tr>
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <?php 
            $qr=get_dates_of_journeys($row['t_number']);
            while($row2=mysqli_fetch_array($qr)) { ?>
              <td >
  
  
             
    <input type="radio" class="btn-check" name="date" id="<?php echo $row1['CC_P'] ,dateName($row2['doj'] )?>"  autocomplete="off" value="<?Php echo $row2['doj'] ?>" required>
    <label class="btn btn-outline-primary btn-outline-primary1" for="<?php echo $row1['CC_P'], dateName($row2['doj']) ?>" ><p class='class-name'><?Php echo dateName($row2['doj']) ?><br><span class='avlbl-status'>AVAILABLE <?Php echo $row1['CC'] ?></span ></label>
  
  
                <!-- <button type='button' class='btn btn-outline-primary btn-outline-primary1 day-detail' name="book" id="day-detail" value="<?Php echo dateName($row2['doj']) ?>" ></button> -->
              </td>
  
            <?php } ?>
            </div>
          </tr>
        
      </table>
     
      <div class="card-footer mt-4">
        
      <?php if(!isset($_SESSION['user_email'])){?>
      <button type='button' class='btn btn-warning search-btn   fs-6'  data-bs-toggle='modal' data-bs-target='#login_modal'>BOOK NOW</button>

  <?php } 
  else{ ?>
  <button type='submit' class='btn btn-warning search-btn fs-6'  class="book-btn" name="book-btn">BOOK NOW</button>

  <?php } ?>
     
      
     
      
      <span class='price fw-bold' > &nbsp; ₹ <?php echo $row1['CC_P'] ?></span></div>
        <input type="hidden" value="<?php echo $row1['CC_P']?>" name="amt">
        <input type="hidden" value="<?php echo $row['t_number']?>" name="t_number">
        <input type="hidden" value="CC" name="class">
    </form>

    
    </div>

  </div>






</div>
</div>




</td>
    </tr>


  <?php }?>

  
  </table>

  </div>
</div>


 



</div>
</div>
<?php };
?>

<!-- train card ends -->


  </div>
</div>









<div class="modal fade" id="schedule_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" >
    <div class="modal-content">
      <div class="modal-header py-1">
        <h5 class="modal-title text-white fw-bold " id="staticBackdropLabel">Train Schedule</h5>
        <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark text-white fw-bold fs-4"></i></button>
      </div>
      <div class="modal-body">


      <!-- 1 -->

<!-- 2 ends -->
        
      </div>
     
    </div>
  </div>
</div>




























  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script language="javascript">







$(document).ready(function() { 
   setCurrentDate()
});

function setCurrentDate()
{
var now = new Date();
var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);
var today = now.getFullYear() + "-" + (month) + "-" + (day);
$('#date_picker').val(today);
}









        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);


        // 



function getSelectedOption( elem ) {
  return elem.options[elem.selectedIndex].value;
}

function setSelectedOption( elem, value ) {
  for (let i = 0; i < elem.options.length; i++) {
    elem.options[i].selected = value === elem.options[i].value;
  }
}

function swapByOptionValue( selector1, selector2 ) {
  var elem1 = document.querySelector(selector1),
      elem2 = document.querySelector(selector2),
      selectedOption1 = getSelectedOption( elem1 ),
      selectedOption2 = getSelectedOption( elem2 );
  setSelectedOption( elem1, selectedOption2 );
  setSelectedOption( elem2, selectedOption1 );
}






$('.close-icon').on('click',function() {
 $(this).closest('.card-11').slideUp();
})

$('.btn-outline-primary1').on('click',function() {
  // $(this).closest('.card-11').slideDown();
  $('.card-11').slideDown();
})





$(document).ready(function () {

$('.btn-popup').click(function () {
  var custId = $(this).data('id');
  $.ajax({
    url: 'get_train_data.php',
    type: 'post',
    data: { custId: custId },
    success: function (response) {
      $('.modal-body').html(response);
      $('#schedule_modal').modal('show');
    }
  });
});

});




    </script>



</body>
</html>