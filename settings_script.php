<?php
include 'includes\common.php';
if (!isset($_SESSION['user_email'])) {
    header('location: index.php'); 
  }
    $new_password = mysqli_real_escape_string($con,$_POST['new_password']);
    $re_type_new_password = mysqli_real_escape_string($con,$_POST['re_type_new_password']);
    $passwords = mysqli_real_escape_string($con,$_POST['old_password']);
    $regex_password = "/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
    $new=md5($new_password);
    $p1=md5($passwords);
    $s_q="select password from users where email='".$_SESSION['user_email']."'";
$sqr=mysqli_query($con,$s_q);
$row=mysqli_fetch_array($sqr);
$r= $row[0];
  if($r==$p1)
  {
    if(!preg_match($regex_password, $new_password))
    {
      echo("<script>alert('Password must contain UpperCase, LowerCase, Number/SpecialChar and min 6 Characters!')</script>");
      echo("<script>location.href='settings.php'</script>"); 
    }  
    else if($new_password != $re_type_new_password)  
    {
      echo("<script>alert('New Password and Confirm New Password are different!')</script>");
      echo("<script>location.href='settings.php'</script>");  
    }
    else if($new_password == $re_type_new_password)  
    {
      $s_query="update users set password='$new' where  password='$p1' and email='".$_SESSION['user_email']."'";
      $sqr1=mysqli_query($con,$s_query);
      echo("<script>alert('Password Updated Successfully!! Please Login to continue...')</script>");
   echo("<script>location.href='user_panel.php'</script>");
   session_destroy();
    }
  }
  else{
    echo("<script>alert('Incorrect old password!')</script>");
      echo("<script>location.href='user_panel.php'</script>");
  }
?>