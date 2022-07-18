<?php
include 'includes\common.php';
require_once 'vendor/autoload.php';

require 'class/PHPMailer.php';
require 'class/SMTP.php';
require 'class/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Dompdf\Dompdf;
use Dompdf\Options;


header("Location:success.php");





$pnr=$_SESSION['pnr'];
$t_number=$_SESSION['t_number'];
$frm=$_SESSION['origin'];
$to=$_SESSION['dest'];

$email=$_SESSION['user_email'];

function get_details()
{
  global $con,$pnr;
  $sq="select *  from bookings INNER JOIN payment on bookings.pnr=payment.pnr INNER JOIN trains on bookings.t_number=trains.t_number  inner JOIN users on bookings.username=users.username where bookings.pnr='$pnr'";
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
function berth_type($s)
{
    if ($s > 0 && $s < 73)
    {
        if ($s % 8 == 1 ||
            $s % 8 == 4)
        {
            return 'LB';
           
        }
        else if ($s % 8 == 2 ||
                 $s % 8 == 5)
        {
            return 'MB';
           
        }
        else if($s % 8 == 3 ||
                $s % 8 == 6)
        {   
          return 'UB';
            echo sprintf("%d is upper " .
                          "berth\n", $s);
        }
        else if($s % 8 == 7)
        {
          return 'SL';
        }
        else
        {
          return 'SU';
        }
    }
    else
    {   return 'Invalid seat';
       ;
    }
}

function bs($s,$name)
{
  global $con,$pnr;
  $sq="update bookings set booking_status='$s' where pnr='$pnr' and psng_name='$name'";
  $sqr=mysqli_query($con,$sq);

  return $s;
}
function cs($s,$name)
{
  global $con,$pnr;
  $sq="update bookings set current_status='$s' where pnr='$pnr' and psng_name='$name'";
  $sqr=mysqli_query($con,$sq);

  return $s;
}

function dateName($dates) {

  $result = "";

  $convert_date = strtotime($dates);
  $month = date('F',$convert_date);
  $year = date('Y',$convert_date);
  $date = date('j',$convert_date);
  $name_day = date('l',$convert_date);
  $day = date('D',$convert_date);


  $result = $day . ", " . $date . "-" . $month. "-".$year ;

  return $result;
}


$total=0;

$html='<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="data:image/vnd.microsoft.icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAD9/Pz//////9u6uf+5enj/woqJ/8KKif/CjIr/r2hm/92/vv/Po6L/2rm4/8ucmv+waWf/48nJ///////+/f3//fz8///////Uraz/sGpo/6NRT/+rX13/sGln/8qbmf/dv7//tnVz/8GJh/+0cG7/z6Sj/+LHxv///////v39//7+/v//////7Nra/+LIx//XsrH/2rm4/+/h4P/Gk5H/4cTD/9Clo//Xs7L/6NTU/8mYlv/x5eT///////7+/v///////v7+///////t3dz/7Nzc//7+/v///////////+/y8f/t8vL/8uXl/+bR0P/27u3///////7+/v////////////////+9goH/xJCP//jy8v///v7/9/T0/9rV1P/Z1dT/8vX1/7Z4dv9/DQn/hhoX/7Nwbv/+/Pz////////////PpKP/m0JA////////////9fb2/+ft7P/5/Pz////////////v5uX/0ayq/9Gnpv+RMC3/0Kel////////////s29s/6BMSf//////9/j4/+DX1//YtbT/1Kuq/+rY2P/u3t7/8+vq//f7+///////4cbF/72CgP///////////8qamf+EFhP/1LKx//z////kzMz/hRcU/6VVU//NoJ//lTc0/+nU1P/w8vL/+/v6//Tq6v/Uraz////////////17ez/ljc0/8uiof//////5c7O/48sKf/iycj/yJiW/4khHf/w4OD/8vX1//Lz8v/48PD/7d7e///////+/v7//////+TU1P/18PD//////+XOzf+NJyT/iB0a/8qbmv+nWFb/6NDQ//f7+//o5uX///////37+//////////////////k5eX/1NHQ//f7+//r2Nj/nkZE/51FQv/TrKv/rmdl/+vX1//4+/v/4d/e///////+/v7//////////////////Pv7/+rp6P/Z19b/4N7d/+7r6v/7+fn//fv7//z5+f//////8fHw/9vZ2f////////////////////////////////////////////Pz8//o5+b/6Ofm//Dv7v/y7u3/8OXl/+zo6P/i4eH///////////////////////////////////////v39//79vb/////////////////plpY/5Q3NP/38fH///////7+/v/////////////////////////////////+/v7/2rq5/9/Cwf/z6en/wIeF/4MUEP/JmZf///////78/P///////////////////////////////////v7///////r29v/HlJP/nENA/44qJ//Bion//v39////////////////////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==" rel="icon" type="image/x-icon" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://kit.fontawesome.com/25b021be14.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<title>Ticket.php</title>
<link rel="stylesheet" href="css/style.css" type="text/css"> 

<style>
table
{
  border-collapse:collapse;
  width:100%;
}
td,th
{
  border:1px solid black;
  padding:8px;
  text-align:left;
}
text-center
{
  text-align:center;
}
td
{
  font-size:15px;
}
html { margin: 10px}

.row
{
  display:flex;
}

.column { 
  margin-top:20px;
  }
.column1 { 
  margin-top:25px;
  }
</style>  

</head>
<body>


  
<div class="container-fluid ">
  <div class="row">
  <div class="column">
    
  <center><img src="http://localhost/railway/images/secondry-logo.jpg" width="100" height="100" class="image-top"></center>

    </div>
    <div class=" column1">
    
      <center><h2>E-Ticket</h2></center>

    </div>
    
   
  </div>

</div>
  
<div class="container mt-4">
<table class="table table-bordered">
  <tbody>';
  $sqr= get_details();
  $sqr1= get_details1();
  
  while($row=mysqli_fetch_array($sqr))
  {
  while($row1=mysqli_fetch_array($sqr1))
  {
    $html.='
    <tr>
      
    <th scope="col">PNR NO. : '. $row['pnr'].'</th>
    <th scope="col">Train No. : '. $row['t_number'].'</th>
    <th scope="col">Train Name: '. $row['name'].'</th>
  </tr>
  
  <tr>
    
  <td>Transaction Id : '. $row['payment_id'].'</td>
  <td>Date & Time of Booking : '. $row['added_on'].'</td>
  <td>Class : '. $row['class'].'</td>
</tr>
<tr>
  
  <td>From : '. $row['fromstn'].'</td>
  <td>Date Of Journey : '. dateName($row['doj']).' </td>
  <td>To : '. $row['tostn'].'</td>
</tr>
<tr>
 
  <td>Schedule Departure: '. $row1['depart_time'].'</td>
  <td>Schedule Arrival :'. $row1['arrival_time'].'</td>
  <td>Phone : '. $row['phone'].'</td>
</tr>';
break;
  }
  }

  $html.='</tbody>
  </table>
  </div>
  
  
  
    
  <div class="container mt-4">
    <h4>PASSENGER DETAILS</h4>
  <table class="table table-bordered">
    <tbody>
    <tr>
      
      <th scope="col">S NO.</th>
      <th scope="col">NAME </th>
      <th scope="col">AGE </th>
      <th scope="col">SEX</th>
      <th scope="col">BOOKING STATUS</th>
      <th scope="col">CURRENT STATUS</th>
      
    </tr>';
    $sqr= get_details();
    $i=1;
    $c=rand(1,8);
    $num=rand(1,60);
    
    while($row=mysqli_fetch_array($sqr))
    {
     
      
     
     $html.='<tr>
    
      <td>'. $i++.'</td>
      <td>'. ucwords($row['psng_name']).'</td>
      <td>'. $row['Age'].'</td>
      <td>'. $row['gender'].'</td>';
      if($row['class']=='1A')
      {
        $html.='<td>'.bs("CNF/H$c/$num/".berth_type($num)."",$row['psng_name']).'</td>
        <td>'.cs("CNF/H$c/".$num++."/".berth_type($num-1)."",$row['psng_name']).'</td> </tr>';
      }elseif($row['class']=='2A')
      {
        $html.='<td >'.bs("CNF/A$c/$num/".berth_type($num)."",$row['psng_name']).'</td>
        <td>'.cs("CNF/A$c/".$num++."/".berth_type($num-1)."",$row['psng_name']).'</td> </tr>';
      }elseif($row['class']=='3A')
      {
        $html.='<td>'.bs("CNF/B$c/$num/".berth_type($num)."",$row['psng_name']).'</td>
        <td>'.cs("CNF/B$c/".$num++."/".berth_type($num-1)."",$row['psng_name']).'</td> </tr>';
      }
      elseif($row['class']=='CC')
      {
        $html.='<td>'.bs("CNF/C$c/".$num."",$row['psng_name']).'</td>
        <td>'.cs("CNF/C$c/".$num++."",$row['psng_name']).'</td> </tr>';
      }
      elseif($row['class']=='SL')
      {
        $html.='<td>'.bs("CNF/S$c/$num/".berth_type($num)."",$row['psng_name']).'</td>
        <td>'.cs("CNF/S$c/".$num++."/".berth_type($num-1)."",$row['psng_name']).'</td> </tr>';
      }
      
      
   
  
  
    
    
    }
    $html.='    
    </tbody>
  </table>
  </div>
  
  
  <div class="container mt-4 mb-4">
    <h4>FARE DETAILS</h4>
  <table class="table table-bordered">
    <tbody>
      <tr>
        
        <th scope="col">Desciption</th>
        <th scope="col">Amount (in Rupees) </th>
        
      </tr>
    
    
      <tr>
      
        <td>Ticket Fare* :</td>';
        $sqr=  get_details();

      $row=mysqli_fetch_array($sqr);
      $total= $row['amount'];
      $html.='<td>'. $total.'</td>';
       
   
        $html.='</tr>
      <tr>
      
      
        <td>Convenience Fee* :</td>
        <td>0</td>
       
        
        
      </tr>
      <tr>
      
       
        <td>Payment Gateway charge**  : </td> 
        <td>0</td>
       
        
        
      </tr>
      <tr>
      <td>Total  : </td>
      <td>'.$total.'</td>
     
    </tr>
   
    
  </tbody>
</table>
</div>

</body>
</html>';

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);


// $dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->setPaper('A4','portrait');




$pdfname='ticket_'."$pnr".'.pdf';
$output = $dompdf->output();


$file_location = $_SERVER['DOCUMENT_ROOT']."/railway/Tickets/$pdfname";

file_put_contents($file_location,$output);



$sq="update payment set ticket='$pdfname', ticket_path='$file_location' where pnr='$pnr'";
$sqr=mysqli_query($con,$sq);


	

$mail = new PHPMailer();
$mail->IsSMTP();								//Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = 587;								//Sets the default SMTP server port
$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'tusharpandey586@gmail.com';					//Sets SMTP username
$mail->Password = 'fwvujbzyfxmonugv';					//Sets SMTP password
$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = 'tusharpandey586@gmail.com';			//Sets the From email address for the message
$mail->FromName = 'Indian Railways';			//Sets the From name of the message
$mail->AddAddress("$email");		//Adds a "To" address
$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);							//Sets message type to HTML				
$mail->AddAttachment($file_location);     				//Adds an attachment from a path on the filesystem
$mail->Subject = "Your train booking from $frm - $to is successful. PNR:$pnr";			//Sets the Subject of the message
$mail->Body = '<html> 
<body> 
    <h2 style="color:green">Hey, <br> Greetings from Indian Railways.</h2> 
    <h3>Hello,  '. ucwords($_SESSION['username']).'. <br>We are attaching your ticket.</h3> 
    <h3 style="color:red">Check It out!!</h3> 
    
</body> 
</html>';				//An HTML or plain text message body
if($mail->Send())								//Send an Email. Return true on success or false on error
{
  // $message = '<label class="text-success">Customer Details has been send successfully...</label>';
  echo "mail  send";
}else{
  echo "mail not send";
}
$mail->smtpClose();
// unlink($file_name);





?>

  
<script>
  var bs=document.getElementById("booking_status").innerHTML;

  alert(bs);

</script>
  
 
   

