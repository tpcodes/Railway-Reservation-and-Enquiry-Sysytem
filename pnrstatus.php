<?php
include 'includes\common.php';
if(isset($_POST['pnr']))
{

    $pnr= $_POST['pnr'];

    function get_details()
    {   
        global $con,$pnr;
        $s_q="select * from bookings inner join trains on trains.t_number=bookings.t_number where pnr='$pnr'";
        $sqr=mysqli_query($con,$s_q);
        return $sqr;

    }

}else{
  echo("<script>location.href='index.php'</script>");
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
<title>Indian Railway User Register</title>
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
.table-bordered
{
    border:2px solid #213d77;
}
.card{
border:1px solid #213d77;
}
.text-danger1
{
    color:#213d77;
    font-weight:bold;
}
.row
{
    padding:5px 0;
}

.btn-success
{
  background-color:darkorange ;
  border:transparent;
  box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.5);
  
  border-radius: 45px;
  

}
.btn-success:hover
{
  transform: scale(1.05);
  /* transform: translateY(-70px); */
  background-color:darkorange ;
}
th,td
{
    color:#213d77;
}
.card
{
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
}
</style>  
</head>
<body>

<?php include "includes\Login_modal.php" ?>
<?php include "includes\header.php" ?>
<?php include "includes\contactus.php" ?>






<div class="card m-5 ">
  <div class="card-header text-white">






  <div class="row">
    <div class="col">
    <h5 class="my-2">PNR Status</h5>
    </div>
    <div class="col text-end">
    <?php
      $select_query= "select ticket ,ticket_path from payment where pnr='$pnr'";
      $sqr=mysqli_query($con,$select_query);
      while ($info=mysqli_fetch_array($sqr)) {
        

    ?>
  <button class="btn btn-success "><a href="download.php?name=<?php echo $info['ticket']?>" class="text-decoration-none fw-bold text-white">Ticket <i class="fas fa-download text-white px-2"></i></a></button>



<?php
  }?>

    </div>
  
   
  </div>
  


</div>
  <div class="card-body px-5 py-4">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
    <?php 
    $sqr=get_details();
    $n=mysqli_num_rows($sqr);
    if($n==0)
    {?>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Error : Invalid PNR/PNR doesn't exist!!. 
  </div>
</div>
    <?php 
    }else{ ?>


   
<div class=" text-start mb-5 ">

<?php 
  
  $row=mysqli_fetch_array($sqr);
  ?>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
  <thead>
    <tr >
      
      <th scope="col">PNR No.</th>
      <th scope="col">Train number</th>
      <th scope="col">Train Name</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Date of journey</th>
      <th scope="col">Class</th>
      
    </tr>
  </thead>
  <tbody>
  <tr>
      
      <td><?php echo $row['pnr']; ?></td>
      <td><?php echo $row['t_number']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['fromstn']; ?></td>
      <td>  <?php echo $row['tostn']; ?></td>
      <td><?php echo $row['doj'] ;?></td>
      <td><?php echo $row['class'] ;?></td>
         
      
    </tr>


    </tbody>
</table>
    </div>




<!-- 

<div class="row">
    <div class="col">
      <span class="fw-bold">PNR no. </span><span class="text-danger1"> <?php echo $row['pnr']; ?></span>
    </div>
   
   
  </div>
  <div class="row">
    <div class="col">
      <span class="fw-bold">Train number: </span><span class="text-danger1"> <?php echo $row['t_number']; ?></span>
    </div>
  
   
  </div>
  <div class="row">
  <div class="col">
    <span class="fw-bold">Train Name:</span><span class="text-danger1">  <?php echo $row['name']; ?></span>
    </div>
   
   
  </div>
  <div class="row">
    <div class="col">
      <span class="fw-bold">From: </span><span class="text-danger1"> <?php echo $row['fromstn']; ?></span>
    </div>
   
   
  </div>
  <div class="row ">
  <div class="col">
    <span class="fw-bold">To:</span><span class="text-danger1">  <?php echo $row['tostn']; ?></span>
    </div>
  </div>
  <div class="row ">
    <div class="col">
    <span class="fw-bold">Date of journey : </span><span class="text-danger1"> <?php echo $row['doj'] ;?></span>
    </div>

  </div>
  <div class="row mb-3">
    <div class="col">
    <span class="fw-bold">Class: </span><span class="text-danger1"> <?php echo $row['class'] ;?></span>
    </div>

  </div> -->

</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
  <thead>
    <tr >
      
      <th scope="col">S No.</th>
      <th scope="col">Passenger Name</th>
      <th scope="col">Age</th>
      <th scope="col">Sex</th>
      <th scope="col">Booking Status</th>
      <th scope="col">Current Status</th>
      
    </tr>
  </thead>
  <tbody>
   <?php
     $i=1;
     $sqr=get_details();
    while($row=mysqli_fetch_array($sqr))
    {

       ?>

<tr>
      
      <td><?php echo $i++ ?></td>
      <td><?php echo ucwords($row['psng_name']) ?></td>
      <td><?php echo $row['Age'] ?></td>
      <td><?php echo $row['gender'] ?></td>
      <td><?php echo $row['booking_status'] ?></td>
      <td><?php echo $row['current_status'] ?></td>
         
      
    </tr>
  

    <?php } 
    }?>
   
    
  </tbody>
</table>



  </div>
  </div>
</div>


  


    


<?php include "settings.php" ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
// $('.btn-group').hover(function(){ 
//   $('.dropdown-toggle', this).trigger('click'); 
// });

</script>

</body>


</html>