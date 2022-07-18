<?php 
include 'includes\common.php';

if(!isset($_SESSION['admin_email'])){
  echo("<script>alert('Admin is not Logged in !! Log in First.....')</script>");
  echo("<script>location.href='index.php'</script>");
}


function getProfilePicture($name){
  $name_slice = explode(' ',$name);
    $name_slice = array_filter($name_slice);
    $initials = '';
  $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
  $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
  return '<div class="profile-pic ">'.$initials.'</div>';
}
function getProfilePicture1($name){
  $name_slice = explode(' ',$name);
    $name_slice = array_filter($name_slice);
    $initials = '';
  $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
  $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
  return '<div class="profile-pic mx-5">'.$initials.'</div>';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link
        href="data:image/vnd.microsoft.icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAD9/Pz//////9u6uf+5enj/woqJ/8KKif/CjIr/r2hm/92/vv/Po6L/2rm4/8ucmv+waWf/48nJ///////+/f3//fz8///////Uraz/sGpo/6NRT/+rX13/sGln/8qbmf/dv7//tnVz/8GJh/+0cG7/z6Sj/+LHxv///////v39//7+/v//////7Nra/+LIx//XsrH/2rm4/+/h4P/Gk5H/4cTD/9Clo//Xs7L/6NTU/8mYlv/x5eT///////7+/v///////v7+///////t3dz/7Nzc//7+/v///////////+/y8f/t8vL/8uXl/+bR0P/27u3///////7+/v////////////////+9goH/xJCP//jy8v///v7/9/T0/9rV1P/Z1dT/8vX1/7Z4dv9/DQn/hhoX/7Nwbv/+/Pz////////////PpKP/m0JA////////////9fb2/+ft7P/5/Pz////////////v5uX/0ayq/9Gnpv+RMC3/0Kel////////////s29s/6BMSf//////9/j4/+DX1//YtbT/1Kuq/+rY2P/u3t7/8+vq//f7+///////4cbF/72CgP///////////8qamf+EFhP/1LKx//z////kzMz/hRcU/6VVU//NoJ//lTc0/+nU1P/w8vL/+/v6//Tq6v/Uraz////////////17ez/ljc0/8uiof//////5c7O/48sKf/iycj/yJiW/4khHf/w4OD/8vX1//Lz8v/48PD/7d7e///////+/v7//////+TU1P/18PD//////+XOzf+NJyT/iB0a/8qbmv+nWFb/6NDQ//f7+//o5uX///////37+//////////////////k5eX/1NHQ//f7+//r2Nj/nkZE/51FQv/TrKv/rmdl/+vX1//4+/v/4d/e///////+/v7//////////////////Pv7/+rp6P/Z19b/4N7d/+7r6v/7+fn//fv7//z5+f//////8fHw/9vZ2f////////////////////////////////////////////Pz8//o5+b/6Ofm//Dv7v/y7u3/8OXl/+zo6P/i4eH///////////////////////////////////////v39//79vb/////////////////plpY/5Q3NP/38fH///////7+/v/////////////////////////////////+/v7/2rq5/9/Cwf/z6en/wIeF/4MUEP/JmZf///////78/P///////////////////////////////////v7///////r29v/HlJP/nENA/44qJ//Bion//v39////////////////////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=="
        rel="icon" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/25b021be14.js" crossorigin="anonymous"></script>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Indian Railway User Register</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <style>
    .profile-pic {
        background: rgba(255, 0, 0, 0.6);
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

    .bg-color,
    .dropdown-menu-dark,
    .card-header {
        background-color: #213d77;
    }

    .dropdown-menu1[data-bs-popper] {
        top: 100%;
        right: 0;
        left: auto;
        margin-top: 0.125rem;
    }

    .btn:focus {
        box-shadow: none !important;
    }

    .btn-success {
        background-color: green;
    }

    .btn-primary:hover {

        transform: scale(1.05);
    }

    .btn-success:hover {

        transform: scale(1.05);
    }

    .card {

        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
    }

    .table-bordered {
        border-color: #213d77;
    }

    .feedback,
    .complaint {
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        padding: 20px 15px;
        background-color: #7FFFD4;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #213d77;
    }

    .nav-pills .nav-link {
        background: #7FFFD4;
        border: 0;
        color: black;
        border-radius: 0.25rem;
    }

 
    </style>
</head>

<body>

    <?php include "includes\Login_modal.php" ?>
    <?php include "includes\header.php" ?>
    <?php include "includes\contactus.php" ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-color">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class='fa-solid fa-gauge-high text-white'></i> Admin Dashboard</a>

            <div class="float-end">
                <ul class="nav justify-content-end">


                    <li class="nav-item">
                        <!-- <a href=""><img src="images\123.png" class='rounded-circle ' width="40" height="40"></a> -->
                        <?php echo getProfilePicture($_SESSION['name']);?>
                    </li>

                    <li class="nav-item  ">
                        <div class="btn-group ">
                            <button type="button" class="btn btn-1 dropdown-toggle text-white" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">

                            </button>
                            <ul class="dropdown-menu dropdown-menu1 dropdown-menu-dark">
                                <!-- <li><button class="dropdown-item fw-bold" type="button">Change Password</button></li> -->
                                <li><a href="logout.php" class="text-decoration-none"><button
                                            class="dropdown-item fw-bold" type="button">Logout</button></a></li>
                                <!-- <li><button class="dropdown-item" type="button">Something else here</button></li> -->
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>



    <div class="my-4 ">
        <div class="card-body">


            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3 mx-2   " id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link  btn-lg active px-5" id="v-pills-feed-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-feed" type="button" role="tab" aria-controls="v-pills-feed"
                        aria-selected="true">Feedbacks</button>
                    <button class="nav-link btn-lg px-5" id="v-pills-complaint-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-complaint" type="button" role="tab" aria-controls="v-pills-complaint"
                        aria-selected="false">Complaints</button>

                </div>
                <div class="tab-content mx-3" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-feed" role="tabpanel"
                        aria-labelledby="v-pills-feed-tab">

                        <div class="card" style="width:77rem">
                            <div class="card-header">
                                <h4 class="text-white fw-bold text-center">Feedbacks</h4>
                            </div>
                            <div class="card-body">

                                <div class="feedbacks">

                                    <?php 

$sq="select * from feedbacks";
$sqr=mysqli_query($con,$sq);


while($row=mysqli_fetch_array($sqr))
{
?>
                                    <!-- feedback -->



                                    <div class="feedback my-5">
                                        <div class="row">
                                            <div class="col-1">
                                                <!-- <a href=""><img src="images\123.png" class='rounded-circle mx-5' width="40" height="40"></a> -->
                                                <?php echo getProfilePicture1($row['name']);?>
                                            </div>
                                            <div class="col-11">


                                                <div class="row">
                                                    <div class="col-6 text-start">
                                                        <h5 class="name fw-bold text-success my-2">
                                                            <?php echo ucwords($row['name'])?></h5>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <p class="name fw-bold text-danger"><?php echo $row['email']?>
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="reviews mx-5 my-2">
                                            <p class="review fw-bold"><?php echo $row['feedback']?></p>
                                        </div>
                                    </div>




                                    <?php } ?>






                                    <!-- ends feedback -->
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="v-pills-complaint" role="tabpanel"
                        aria-labelledby="v-pills-complaint-tab">


                        <div class="card " style="width:77rem">
                            <div class="card-header">
                                <h4 class="text-white fw-bold text-center">Complaints</h4>
                            </div>
                            <div class="card-body">


                                <div class="complaints">

                                    <!-- complaints -->
                                    <?php 

$sq="select * from complaint";
$sqr=mysqli_query($con,$sq);


while($row=mysqli_fetch_array($sqr))
{
?>
                                    <div class="complaint my-5">
                                        <div class="row">
                                            <div class="col-1">
                                                <!-- <a href=""><img src="images\123.png" class='rounded-circle mx-5' width="40" height="40"></a> -->
                                                <?php echo getProfilePicture1($row['name']);?>
                                            </div>
                                            <div class="col-11">


                                                <div class="row">
                                                    <div class="col-6 text-start">
                                                        <h5 class="name fw-bold text-success my-2">
                                                            <?php echo ucwords($row['name'])?></h5>
                                                        <!-- <h6 class="name fw-bold text-success"><?php echo $row['pnr']?></h6> -->
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <p class="name fw-bold text-danger"><?php echo $row['email']?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6 text-start">
                                                <p class="fw-bold text-primary px-5">PNR: <span
                                                        class="text-danger"><?php echo $row['pnr']?></span></p>
                                                <p class="fw-bold text-primary px-5">Train/Birth number: <span
                                                        class="text-danger"><?php echo $row['birth_t_number']?></span>
                                                </p>
                                                <p class="fw-bold text-primary mx-5">Against Department :<span
                                                        class="text-danger"> <?php echo $row['department']?></span></p>
                                            </div>

                                        </div>



                                        <div class="complaint-div mx-5 my-2">
                                            <p class="complaint-div-inner text-success fw-bold">Complaint : <span
                                                    class="text-danger"><?php echo $row['complaint']?></span></p>
                                        </div>
                                    </div>





                                    <?php }?>


                                    <!-- ends feedback -->
                                </div>




                            </div>

                        </div>
                    </div>



                </div>
            </div>









            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
            <script>
            // $('.btn-group').hover(function(){ 
            //   $('.dropdown-toggle', this).trigger('click'); 
            // });
            </script>

</body>


</html>