<?php

include 'includes\common.php';

$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
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
 // Query checks if the email and password are present in the database.
$select_query= "select id,email,username,fname,lname from users where email='$email' or username='$email' and password='$p'";
$user_result=mysqli_query($con,$select_query);
$no_of_users=mysqli_num_rows($user_result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if($no_of_users == 0){

//   echo("<script>alert('User not Login successfully!!')</script>");
  echo("<script>alert('Please enter correct E-mail/Username and Password')</script>");

  echo("<script>location.href='index.php'</script>");
  

  // $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
  // header('location:#myModal?error=$error');
  
}
else{
    $row=mysqli_fetch_array($user_result) ;  
    $_SESSION['user_email']=$row['email'];
    $_SESSION['username']=$row['username'];
    $_SESSION['name']=$row['fname'].' '.$row['lname'];
    $_SESSION['id']= $row[0];
    echo("<script>alert('User Login successfully!!')</script>");
    echo("<script>location.href='user_panel.php'</script>");
}

}
else{
    echo("<script>alert('Invalid captcha')</script>");

    echo("<script>location.href='index.php'</script>");
}









 ?>