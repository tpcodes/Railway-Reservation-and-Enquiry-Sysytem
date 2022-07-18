<?php
require 'includes\common.php';



$Username=mysqli_real_escape_string($con,$_POST['Username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
$Language = mysqli_real_escape_string($con,$_POST['Language']);
$secQues = mysqli_real_escape_string($con,$_POST['secQues']);
$secAns = mysqli_real_escape_string($con,$_POST['secAns']);



$fname = mysqli_real_escape_string($con,$_POST['fname']);
$mname = mysqli_real_escape_string($con,$_POST['mname']);
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$occupation = mysqli_real_escape_string($con,$_POST['occupation']);
$DOB = mysqli_real_escape_string($con,$_POST['DOB']);
$MarritalStatus = mysqli_real_escape_string($con,$_POST['MarritalStatus']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$nationality = mysqli_real_escape_string($con,$_POST['nationality']);

$Flat = mysqli_real_escape_string($con,$_POST['Flat']);
$Street = mysqli_real_escape_string($con,$_POST['Street']);
$Area = mysqli_real_escape_string($con,$_POST['Area']);
$Pincode = mysqli_real_escape_string($con,$_POST['Pincode']);


$address=$Flat." ".$Street." "." ".$Area." ".$Pincode;

$State = mysqli_real_escape_string($con,$_POST['State']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$postoffice = mysqli_real_escape_string($con,$_POST['postoffice']);
$phone = $_POST['phone'];  


$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$regex_password = "/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
$regex_num = "/^[789][0-9]{9}$/"; 
$p=md5($password);





// reCaptcha code

$secretkey="6LffrWwgAAAAAMU2b8vqC0Bg1bSAajBcAvhfmqeO";
$responseKey=$_POST['g-recaptcha-response'];
$userIP=$_SERVER['REMOTE_ADDR'];
$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responseKey&remoteip=$userIP";

$response=file_get_contents($url);
$response=json_decode($response);

if($response->success)
{


    $sq="select email from users where email='$email'"  or die(mysqli_error($con));
    $sqr=mysqli_query($con,$sq);
    $n=mysqli_num_rows($sqr);
    
    
    if($n>0){
        echo("<script>alert('Email address is already registered!')</script>");
       echo("<script>location.href='register.php'</script>");   
    }else if (!preg_match($regex_email, $email)) {
       echo("<script>alert('Not a valid Email Id')</script>");
       echo("<script>location.href='register.php'</script>");
     } else if (!preg_match($regex_password, $password)) {
        echo("<script>alert('Password must contain UpperCase, LowerCase, Number/SpecialChar and min 6 Characters')</script>");
        echo("<script>location.href='register.php'</script>");
     }else if (!preg_match($regex_num, $phone)) {
       echo("<script>alert('Not a valid phone number')</script>");
       echo("<script>location.href='register.php'</script>");
     } 
     else if($password !=$confirm_password){
        echo("<script>alert('Password did not match!!')</script>");
       echo("<script>location.href='register.php'</script>");

     }
    else{
    $user_registration_query = "insert into users(username,password,language,sec_ques,sec_ans,fname,mname,lname,occupation,dob,marital_status,country,gender,email,phone,nationality,address,state,city,postoffice)
    values ('$Username', '$p', '$Language','$secQues','$secAns','$fname','$mname','$lname','$occupation','$DOB','$MarritalStatus','$country','$gender','$email','$phone','$nationality','$address','$State','$city','$postoffice')";
    $user_registration_submit = mysqli_query($con, $user_registration_query) or
    die(mysqli_error($con));


    if($user_registration_submit)
   {
     $to_email=$email;
     $subject="User Registered Successfully . ";

     $htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to Indian Railways</title> 
    </head> 
    <body> 
        <h2>Welcome to Indian Railways !!</h2> 
        <h3>Thanks '. ucwords($fname).' for Registering with us!</h3> 
        
    </body> 
    </html>'; 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
     $headers.="From:tusharpandey586@gmail.com";

     if(mail($to_email,$subject,$htmlContent ,$headers))
     {
  
      // $_SESSION['user_email']=$email;
      // $_SESSION['id']= mysqli_insert_id($con);
      echo("<script>alert('User successfully registered! Login to continue Bookings....')</script>");
      echo("<script>location.href='index.php'</script>"); 
    }
     
     else{
      echo("<script>alert('Invalid captcha : Verify captcha first.')</script>");
     }
    }
   }








  

    
    
}
else{
    echo("<script>alert('Invalid captcha')</script>");
    header('location:register.php');
}







?>