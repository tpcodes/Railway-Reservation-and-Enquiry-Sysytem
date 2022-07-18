<?php
include 'includes\common.php';

if(!isset($_SESSION['user_email'])){
  echo("<script>alert('user is not Logged in !! Log in First.....')</script>");
  echo("<script>location.href='index.php'</script>");
}


        $doj = $_POST['date'];
        $amt1 = $_POST['amt'];
        $t_number = $_POST['t_number'];
        $class= $_POST['class'];



        $pnr=rand(1111111111,9999999999);
      
    
        if(isset($_POST['number_of_psng']))
        {
            $number_of_psng = $_POST['number_of_psng'];
            $amt=$number_of_psng *$amt1;
            // echo $number_of_psng;

            for($i=1;$i<=$number_of_psng;$i++)
            {   
                $psng_name = $_POST["psng-name"."$i"];
                $age = $_POST["age"."$i"];
                $gender = $_POST["gender"."$i"];
                $pref = $_POST["pref"."$i"];
                $select_query= "insert into bookings(pnr,t_number,username,psng_name,age,gender,preference,class,amount,doj,fromstn,tostn,status) values('$pnr','$t_number','".$_SESSION['username']."','$psng_name','$age','$gender','$pref','$class','$amt1','$doj','".$_SESSION['origin']."','".$_SESSION['dest']."','pending')";
                $user_result=mysqli_query($con,$select_query);
                // $no_of_users=mysqli_num_rows($user_result);
            }
        }
        else{
            $amt=$amt1;
            $psng_name = $_POST["psng-name1"];
            $age = $_POST["age1"];
            $gender = $_POST["gender1"];
            $pref = $_POST["pref1"];
            $select_query= "insert into bookings(pnr,t_number,username,psng_name,age,gender,preference,class,amount,doj,fromstn,tostn,status) values('$pnr','$t_number','".$_SESSION['username']."','$psng_name','$age','$gender','$pref','$class','$amt1','$doj','".$_SESSION['origin']."','".$_SESSION['dest']."','pending')";
            $user_result=mysqli_query($con,$select_query);
        }
    
        // echo $_SESSION['t_number'];


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
        
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="data:image/vnd.microsoft.icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAD9/Pz//////9u6uf+5enj/woqJ/8KKif/CjIr/r2hm/92/vv/Po6L/2rm4/8ucmv+waWf/48nJ///////+/f3//fz8///////Uraz/sGpo/6NRT/+rX13/sGln/8qbmf/dv7//tnVz/8GJh/+0cG7/z6Sj/+LHxv///////v39//7+/v//////7Nra/+LIx//XsrH/2rm4/+/h4P/Gk5H/4cTD/9Clo//Xs7L/6NTU/8mYlv/x5eT///////7+/v///////v7+///////t3dz/7Nzc//7+/v///////////+/y8f/t8vL/8uXl/+bR0P/27u3///////7+/v////////////////+9goH/xJCP//jy8v///v7/9/T0/9rV1P/Z1dT/8vX1/7Z4dv9/DQn/hhoX/7Nwbv/+/Pz////////////PpKP/m0JA////////////9fb2/+ft7P/5/Pz////////////v5uX/0ayq/9Gnpv+RMC3/0Kel////////////s29s/6BMSf//////9/j4/+DX1//YtbT/1Kuq/+rY2P/u3t7/8+vq//f7+///////4cbF/72CgP///////////8qamf+EFhP/1LKx//z////kzMz/hRcU/6VVU//NoJ//lTc0/+nU1P/w8vL/+/v6//Tq6v/Uraz////////////17ez/ljc0/8uiof//////5c7O/48sKf/iycj/yJiW/4khHf/w4OD/8vX1//Lz8v/48PD/7d7e///////+/v7//////+TU1P/18PD//////+XOzf+NJyT/iB0a/8qbmv+nWFb/6NDQ//f7+//o5uX///////37+//////////////////k5eX/1NHQ//f7+//r2Nj/nkZE/51FQv/TrKv/rmdl/+vX1//4+/v/4d/e///////+/v7//////////////////Pv7/+rp6P/Z19b/4N7d/+7r6v/7+fn//fv7//z5+f//////8fHw/9vZ2f////////////////////////////////////////////Pz8//o5+b/6Ofm//Dv7v/y7u3/8OXl/+zo6P/i4eH///////////////////////////////////////v39//79vb/////////////////plpY/5Q3NP/38fH///////7+/v/////////////////////////////////+/v7/2rq5/9/Cwf/z6en/wIeF/4MUEP/JmZf///////78/P///////////////////////////////////v7///////r29v/HlJP/nENA/44qJ//Bion//v39////////////////////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=="
        rel="icon" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/25b021be14.js" crossorigin="anonymous"></script>



    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <title>Booking confirmation</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
    .table-bordered {
        border: 2px solid #213d77;
    }

    .card-header {
        /* border-radius: 45px; */
        border-top-left-radius: 45px !important;
        border-top-right-radius: 45px !important;
    }

    .bg-color {
        background-color: #213d77;
    }

    .card {
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
    }

    .btn-3d {
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-3d:hover {
        transform: scale(1.05);
        transition: all 0.2s ease 0s;
    }
    </style>
</head>

<body>
    <?php include "includes\Login_modal.php" ?>
    <?php include "includes\header.php" ?>
    <?php include "includes\contactus.php" ?>
    <?php include "includes\stationName.php" ?>
    <?php include "get_passenger.php" ?>





    <div class="card text-center mx-auto my-auto mt-5 mb-5" style="width:80%;">
        <div class="card-header bg-color text-white fw-bolder">
            <h5 class="card-title fw-bold pt-1">Payment Confirmation</h5>
        </div>
        <div class="card-body text-center">

            <div class=" text-start">

                <?php 
        $res=get_passenger($pnr,$_SESSION['username']);
        $res1=get_details1();
        $row=mysqli_fetch_array($res);
        $row1=mysqli_fetch_array($res1);
        ?>

                <table class="table caption-top table-bordered table-hover table-striped">
                    <caption class="cap fw-bold fs-5 text-success">Train Details</caption>
                    <thead>
                        <tr>

                            <!-- <th scope="col">PNR No.</th> -->
                            <th scope="col">Train number</th>
                            <th scope="col">Train Name</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Date of journey</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Arrival</th>
                            <th scope="col">Class</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <!-- <td><?php echo $row['pnr']; ?></td> -->
                            <td><?php echo $row['t_number']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['fromstn']; ?></td>
                            <td> <?php echo $row['tostn']; ?></td>
                            <td><?php echo dateName($row['doj']) ;?></td>
                            <td><?php echo $row1['depart_time'] ;?></td>
                            <td><?php echo $row1['arrival_time'] ;?></td>
                            <td><?php echo $row['class'] ;?></td>


                        </tr>


                    </tbody>
                </table>



            </div>
            <table class="table caption-top text-start table-bordered">
                <caption class="cap fw-bold fs-5 text-success">Passengers Details</caption>


                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Preference</th>
                        <th scope="col">Price (Individual)</th>
                    </tr>


                </thead>
                <tbody>
                    <?php 
    $res=get_passenger($pnr,$_SESSION['username']);
    while($row=mysqli_fetch_array($res)){
  ?>
                    <tr>

                        <td><?php echo ucwords($row['psng_name']) ?></td>
                        <td><?php echo $row['Age'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['preference'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                    </tr>


                    <?php } ?>


                    <tr>
                        <th scope="row">Total Ticket Price:</th>
                        <td colspan="5" class="text-start fw-bold">₹ <?php echo $amt;?> </td>
                        <!-- <td>@twitter</td> -->
                    </tr>
                </tbody>
            </table>

            <button class='btn btn-warning btn-lg search-btn   fs-6 text-center btn-3d' name="book-btn"
                onclick='pay_now()'>Pay ₹ <?php echo $amt;?></button>
        </div>
    </div>








    <script>
    function pay_now() {



        var amt = <?php echo $amt ?>;
        // var amt=1;
        var username = "<?php echo $_SESSION['username'] ;?>";
        var pnr = "<?php echo $pnr ;?>";

        jQuery.ajax({
            type: 'POST',
            url: 'payment_process.php',
            data: "amt=" + amt + "&username=" + username + "&pnr=" + pnr,
            success: function(result) {
                var options = {
                    "key": "rzp_test_boXrmHfaUNEHlA",
                    // "key": "rzp_live_CYcyUSZVVEC59I", 
                    "amount": amt * 100,
                    "currency": "INR",
                    "name": "RDSO TICKET COLLECTION",
                    "description": "Ticket Transaction",
                    "image": "images/RDSO.png",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'POST',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "ticket.php";
                            }
                        });
                    }

                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });


    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>