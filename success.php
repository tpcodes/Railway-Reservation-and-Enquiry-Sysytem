<?php
include 'includes\common.php';
if(!isset($_SESSION['username'])){
  echo("<script>location.href='index.php'</script>");
  
  
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

<title>Success</title>
<link rel="stylesheet" href="css/style.css" type="text/css"> 
<style>
  .btn-primary:hover 
{
    
    transform: scale(1.05); 
}
.btn-success:hover
{
    
    transform: scale(1.05); 
}

  </style>  
</head>
<body onload=" autoNotify()">
<?php
include 'includes\header.php';
?>


<div class="card border-success mb-3 ax-auto text-center mx-auto my-5 " style="max-width: 50rem;">
  <div class="card-header bg-success text-white fw-bold"><h3>Payment Success</h3></div>
  <div class="card-body text-success">
    <h5 class="card-title"><h4>Hello, <?php echo ucwords($_SESSION['name']) ?>.<p class="">Thank You for booking train ticket with us!!<p></h4></h5>
    <p class="text-danger fw-bold">Note:<span class="text-primary"> Booking details is sent to your Email.</span></p>

    <?php
      $select_query= "select ticket ,ticket_path from payment where pnr='".$_SESSION['pnr']."'";
        $sqr=mysqli_query($con,$select_query);
      while ($info=mysqli_fetch_array($sqr)) {
        

    ?>
  
  
  
  <button class="btn btn-primary mx-2 my-3"><a href='http://localhost/railway/Tickets/<?php echo $info['ticket']?>' class="text-decoration-none fw-bold text-white">View  <i class="fa-solid fa-eye text-white"></i></a></button>
  <button class="btn btn-success mx-2 my-3"><a href="download.php?name=<?php echo $info['ticket']?>" class="text-decoration-none fw-bold text-white">Download <i class="fas fa-download text-white px-2"></i></a></button>



<?php
  }
?>
    
  </div>
</div>
<audio id="notifypop"> <!--Source the audio file. -->
            <source src="music/Rail.ogg" type="audio/ogg">
            
  </audio>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script>
 var popupsound = document.getElementById("notifypop");

function autoNotify() {
   popupsound.play(); //play the audio file
}
  
</script>



</body>
</html>