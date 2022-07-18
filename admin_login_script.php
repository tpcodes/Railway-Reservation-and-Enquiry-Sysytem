<?php

include 'includes\common.php';

$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);

// reCaptcha code

$secretkey="6LffrWwgAAAAAMU2b8vqC0Bg1bSAajBcAvhfmqeO";
$responseKey=$_POST['g-recaptcha-response'];
$userIP=$_SERVER['REMOTE_ADDR'];
$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responseKey&remoteip=$userIP";

$response=file_get_contents($url);
$response=json_decode($response);

if($response->success)
{

$select_query= "select id,email,name from admin where email='$email'  and password='$password'";
$user_result=mysqli_query($con,$select_query);
$no_of_users=mysqli_num_rows($user_result);

if($no_of_users == 0){


  echo("<script>alert('Please enter correct E-mail/Username and Password')</script>");

  echo("<script>location.href='register.php'</script>");
  


  
}
else{
    $row=mysqli_fetch_array($user_result) ;  
    $_SESSION['admin_email']=$email;
    $_SESSION['id']= $row[0];
    $_SESSION['name']= $row['name'];
    echo("<script>alert('Admin Login successfully!!')</script>");
    echo("<script>location.href='admin_panel.php'</script>");
}

}
else{
    echo("<script>alert('Invalid captcha')</script>");
    echo("<script>location.href='index.php'</script>");
}


 ?>