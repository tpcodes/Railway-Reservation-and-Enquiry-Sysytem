
<style>
.dropdown-menu-dark
{
    background-color:#213d77;
    /* border:2px solid red; */
    box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.3);
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="images\secondry-logo.png" alt="" width="80" height="80" class="d-inline-block align-text-top mx-5  my-2">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <!-- <div class="navbar-nav nav-fill">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">Login</a>
              <a class="nav-link" href="#">Register</a>
              <a class="nav-link" href="#" >Admin Login</a>
              <a class="nav-link" href="#" >Contact us</a>
            </div> -->
            <ul id="menu-main-nav" class="navbar-nav nav-fill w-100">
              <li  class="nav-item "><a href="index.php" class="nav-link"> <i class="fa-solid fa-house-chimney"></i> HOME </a></li>
              <?php if(isset($_SESSION['user_email']))
              {
                echo("<li  class='nav-item '><a href='logout.php' class='nav-link' ><i class='fas fa-sign-out'></i> LOG OUT</a></li>");
                echo("<li  class='nav-item '><a href='user_panel.php' class='nav-link' ><i class='fa-solid fa-gauge-high'></i> DASHBOARD</a></li>");
             }elseif(isset($_SESSION['admin_email']))
             {
              echo("<li  class='nav-item '><a href='logout.php' class='nav-link' ><i class='fas fa-sign-out'></i> LOG OUT</a></li>");
              echo("<li  class='nav-item '><a href='admin_panel.php' class='nav-link' ><i class='fa-solid fa-gauge-high'></i> DASHBOARD</a></li>");
             }
             
             else
              {
                echo("<li  class='nav-item'><a href='' class='nav-link' data-bs-toggle='modal' data-bs-target='#login_modal'><i class='fa-solid fa-right-to-bracket'></i> LOGIN</a></li>");
                echo("<li class='nav-item'><a href='register.php' class='nav-link' ><i class='fa-solid fa-user'></i> REGISTER</a></li>");
                echo("<li class='nav-item'><a href='' class='nav-link' data-bs-toggle='modal' data-bs-target='#admin_modal'><i class='fa-solid fa-user-tie'></i> ADMIN LOGIN</a></li>");
              }?>
              

              
              <li  class="nav-item"><a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-phone"></i> CONTACT US</a></li>
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MORE
          </a>
          <ul class="dropdown-menu dropdown-menu-dark " aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item fw-bold " href="index.php#feedback">Feedback</a></li>
            <li><a class="dropdown-item fw-bold" href="complaint.php">Complaint Register</a></li>
       
          </ul>
        </li>
            </ul>
          </div>
         
          <img src="images\RDSO.png" alt="" width="150" height="120" class="d-inline-block align-text-top mx-3 	d-none d-sm-none d-md-none d-lg-block">
        </div>
</nav>
