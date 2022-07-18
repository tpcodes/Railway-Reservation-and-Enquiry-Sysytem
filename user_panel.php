<?php 
include 'includes\common.php';

if(isset($_SESSION['username'])){
    $user=$_SESSION['username'];
    $select_query= "SELECT DISTINCT bookings.pnr,bookings.fromstn,bookings.tostn,bookings.status,bookings.doj,payment.ticket,trains.name,trains.t_number FROM bookings inner join payment on bookings.pnr=payment.pnr inner join trains on bookings.t_number=trains.t_number where bookings.username='$user';";
    $user_result=mysqli_query($con,$select_query);
    $no=mysqli_num_rows($user_result);
    
    
}
else{
    echo("<script>location.href='index.php'</script>");
}

function dateName($dates) {

  $result = "";

  $convert_date = strtotime($dates);
  $month = date('F',$convert_date);
  $year = date('y',$convert_date);
  $date = date('j',$convert_date);
  $name_day = date('l',$convert_date);
  $day = date('D',$convert_date);


  $result = $day . ", " . $date . "-" . $month.'-'.$year ;

  return $result;
}

function cancel($date)
{
  $date1 = date($date);
  $date2 = date("Y-m-d");
// echo $date1;
// echo $date2;
// Compare the dates
if ($date1 >= $date2)
    return true;
else
return false;
  

}


function getProfilePicture($name){
  $name_slice = explode(' ',$name);
    $name_slice = array_filter($name_slice);
    $initials = '';
  $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
  $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
  return '<div class="profile-pic">'.$initials.'</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link href="data:image/vnd.microsoft.icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAD9/Pz//////9u6uf+5enj/woqJ/8KKif/CjIr/r2hm/92/vv/Po6L/2rm4/8ucmv+waWf/48nJ///////+/f3//fz8///////Uraz/sGpo/6NRT/+rX13/sGln/8qbmf/dv7//tnVz/8GJh/+0cG7/z6Sj/+LHxv///////v39//7+/v//////7Nra/+LIx//XsrH/2rm4/+/h4P/Gk5H/4cTD/9Clo//Xs7L/6NTU/8mYlv/x5eT///////7+/v///////v7+///////t3dz/7Nzc//7+/v///////////+/y8f/t8vL/8uXl/+bR0P/27u3///////7+/v////////////////+9goH/xJCP//jy8v///v7/9/T0/9rV1P/Z1dT/8vX1/7Z4dv9/DQn/hhoX/7Nwbv/+/Pz////////////PpKP/m0JA////////////9fb2/+ft7P/5/Pz////////////v5uX/0ayq/9Gnpv+RMC3/0Kel////////////s29s/6BMSf//////9/j4/+DX1//YtbT/1Kuq/+rY2P/u3t7/8+vq//f7+///////4cbF/72CgP///////////8qamf+EFhP/1LKx//z////kzMz/hRcU/6VVU//NoJ//lTc0/+nU1P/w8vL/+/v6//Tq6v/Uraz////////////17ez/ljc0/8uiof//////5c7O/48sKf/iycj/yJiW/4khHf/w4OD/8vX1//Lz8v/48PD/7d7e///////+/v7//////+TU1P/18PD//////+XOzf+NJyT/iB0a/8qbmv+nWFb/6NDQ//f7+//o5uX///////37+//////////////////k5eX/1NHQ//f7+//r2Nj/nkZE/51FQv/TrKv/rmdl/+vX1//4+/v/4d/e///////+/v7//////////////////Pv7/+rp6P/Z19b/4N7d/+7r6v/7+fn//fv7//z5+f//////8fHw/9vZ2f////////////////////////////////////////////Pz8//o5+b/6Ofm//Dv7v/y7u3/8OXl/+zo6P/i4eH///////////////////////////////////////v39//79vb/////////////////plpY/5Q3NP/38fH///////7+/v/////////////////////////////////+/v7/2rq5/9/Cwf/z6en/wIeF/4MUEP/JmZf///////78/P///////////////////////////////////v7///////r29v/HlJP/nENA/44qJ//Bion//v39////////////////////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==" rel="icon" type="image/x-icon" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/25b021be14.js" crossorigin="anonymous"></script>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>User Panel</title>
<link rel="stylesheet" href="css/style.css" type="text/css"> 
<!-- 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<style>
.bg-color,.dropdown-menu-dark,.card-header
{
    background-color:#213d77;
}

.dropdown-menu1[data-bs-popper] {
    top: 100%;
    right: 0 ;
    left:auto;
    margin-top: 0.125rem;
}
.btn:focus
{
    box-shadow: none !important;
}
.btn-success
{
    background-color:green;
}
.btn-3d:hover 
{
    
    transform: scale(1.05); 
}

.card{
border:1px solid #213d77;
box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
border-radius:20px;
}
.card-header
{
  /* border-radius: 45px; */
  border-top-left-radius:20px!important;
  border-top-right-radius:20px!important;
}
.table-bordered
{
    border-color:#213d77;
    
}
.profile-pic{
    background: darkseagreen;
    color: #eeeeee;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.1rem;
    -webkit-box-shadow: 0 3px 5px rgb(54 60 241);
    box-shadow: 0 3px 5px rgb(54 60 241);
  }

</style>  
</head>
<body>

<?php include "includes\Login_modal.php" ?>
<?php include "includes\header.php" ?>
<?php include "includes\contactus.php" ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-color">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class='fa-solid fa-gauge-high text-white'></i> Dashboard</a>
    
<div class="float-end">
    <ul class="nav justify-content-end">

    
  <li class="nav-item">
    <!-- <a href=""><img src="images\123.png" class='rounded-circle ' width="40" height="40"></a> -->
    <?php echo getProfilePicture($_SESSION['name']);?>
  </li>

  <li class="nav-item  " >
    <div class="btn-group ">
  <button type="button" class="btn btn-1 dropdown-toggle text-white" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
    
  </button>
  <ul class="dropdown-menu dropdown-menu1 dropdown-menu-dark">
    <li><a href="" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#changePassModal"><button class="dropdown-item fw-bold" type="button">Change Password</button></a></li>
    <li><a href="logout.php" class="text-decoration-none"><button class="dropdown-item fw-bold" type="button">Logout</button></a></li>
    <!-- <li><button class="dropdown-item" type="button">Something else here</button></li> -->
  </ul>
</div>
  </li>
 
</ul>
  </div>
  </div>
</nav>










<div class="card m-5 ">
  <div class="card-header text-white"><h5 class="my-2">Your Bookings</h5></div>
  <div class="card-body p-5">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
    <?php 
    if($no==0)
    {?>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Oops: No bookings yet. <a href="index.php" class="alert-link">Book Now !!</a>
  </div>
</div>
    <?php 
    }else{ ?>


   
    <div class="table-responsive">
    <table class="table table-bordered text-center ">
  <thead>
    <tr >
      
      <th scope="col">S No.</th>
      <th scope="col">PNR No.</th>
      <th scope="col">Train number</th>
      <th scope="col">Train Name</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Date of Journey</th>
      <th scope="col">Ticket</th>
    </tr>
  </thead>
  <tbody>
   <?php
     $i=1;
    while($row=mysqli_fetch_array($user_result))
    {

       ?>

<tr>
      
      <td><?php echo $i++ ?></td>
      <td><?php echo $row['pnr'] ?></td>
      <td><?php echo $row['t_number'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['fromstn'] ?></td>
      <td><?php echo $row['tostn'] ?></td>
      <td><?php echo dateName($row['doj']) ?></td>    
      <!-- <td><?php echo $row['status'] ?></td>     -->
      <td> <?php
      $select_query= "select ticket ,ticket_path from payment where pnr='".$row['pnr']."'";
        $sqr=mysqli_query($con,$select_query);
      while ($info=mysqli_fetch_array($sqr)) {
        

    ?>
  
  
  
  <button class="btn btn-primary btn-3d mx-2"><a href='http://localhost/railway/Tickets/<?php echo $info['ticket']?>' class="text-decoration-none fw-bold text-white">View  <i class="fa-solid fa-eye text-white"></i></a></button>
 
  <button class="btn btn-success btn-3d mx-2"><a href="download.php?name=<?php echo $info['ticket']?>" class="text-decoration-none fw-bold text-white">Download <i class="fas fa-download text-white px-2"></i></a></button>
  <?php 
  if($row['status']=='confirmed')
  {
    if(cancel($row['doj'])){?>
  <button class="btn btn-danger  btn-3d mx-2 cancel"  value='<?php echo $row['pnr'] ?>' data-bs-toggle="modal" data-bs-target="#confirm"><a href='' class="text-decoration-none fw-bold text-white" data-bs-toggle="modal" data-bs-target="#confirm">Cancel  <i class="fa-solid fa-xmark text-white px-1"></i></a></button>

   <?php }else{?>
    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Train Departed">
    <button class="btn btn-danger  btn-3d mx-2 cancel" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" disabled><a href='' class="text-decoration-none fw-bold text-white" data-bs-toggle="modal" data-bs-target="#confirm">Cancel  <i class="fa-solid fa-xmark text-white px-1"></i></a></button>
   </span>
   <?php }
    
    ?>
<!-- <button class="btn btn-danger  btn-3d mx-2 cancel"  value='<?php echo $row['pnr'] ?>' data-bs-toggle="modal" data-bs-target="#confirm"><a href='' class="text-decoration-none fw-bold text-white" data-bs-toggle="modal" data-bs-target="#confirm">Cancel  <i class="fa-solid fa-xmark text-white px-1"></i></a></button> -->

  <?php }else{?>

    <button class="btn btn-danger  btn-3d mx-2 "  value='<?php echo $row['pnr'] ?>' disabled><a href='' class="text-decoration-none fw-bold text-white">Cancelled  </a></button>


  <?php } ?>
  

<?php
  }
?>
        
      
      
      
      </td>
      
    </tr>
  

    <?php } 
    }?>
   
    
  </tbody>
</table>
  </div>



  </div>
</div>


  


    


<?php include "settings.php" ?>
<?php include "includes/confirm.php" ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>

 $(document).ready(function() {
    $('.cancel').on('click', function() {
    
        var pnr = this.value;
        $('#yes').on('click', function() {
        $.ajax({
            url: "cancel_ticket.php",
            type: "POST",
            data: {
                pnr: pnr
            },
            cache: false,
            success: function(result) {
              
            }
        });
        });
    });
});

</script>

</body>


</html>