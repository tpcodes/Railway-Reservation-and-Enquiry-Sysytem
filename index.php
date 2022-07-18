<?php
include 'includes\common.php';

if(isset($_POST['feedback_submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    
    $feed=$_POST['feedback'];
    $select_query= "insert into feedbacks(name,email,feedback) values('$name','$email','$feed')";
    $user_result=mysqli_query($con,$select_query);

    echo("<script>alert('Thank you!! Feedback submitted successfully!!')</script>");
    echo("<script>location.href='index.php'</script>");


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
    <script src="https://unpkg.com/feather-icons"></script>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>


    <title>Indian Railway Home</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
    #section1 {
        margin: 0;
        padding: 0;
        margin-top: -10px;
        background: url("images/home_page_banner1.ab4db3998511d52c6612.jpg");

        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;

        height: 79vh;
    }

    .btn-pnr {
        background-color: #213d77;
        border: transparent;
        box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.5);
        transition: all 0.3s ease 0s;
        border-radius: 45px;


    }

    .btn-pnr:hover {
        transform: scale(1.05);
        /* transform: translateY(-70px); */
        background-color: #213d77;
    }

    .btn-pnr:focus {


        background-color: #213d77 !important;
        box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.5);
    }

    .marq {
        background-color: #213d77;

    }

    .card {
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
        border-radius: 45px;
    }

    .btn-3d {
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-3d:hover {
        transform: scale(1.05);
        transition: all 0.2s ease 0s;


    }

    .divs {

        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        z-index: 16;
        height: 79vh;
    }

    .form-control3 {
        border-radius: 45px;
    }

    .form-control2 {
        border-radius: 20px;
    }
    </style>
</head>

<body class="bg-light">
    <?php include "includes\Login_modal.php" ?>
    <?php include "includes\pnr-modal.php" ?>
    <?php include "includes\admin_modal.php" ?>
    <?php include "includes\header.php" ?>
    <?php include "includes\contactus.php" ?>
    <?php include "includes\stationName.php" ?>
    <marquee class="marq fw-bold py-3 text-white m-0" behavior=alternate direction="right" loop="" scrollamount=10>
        Welcome to Indian Railways !!

    </marquee>
    <!--               
<marquee class="marq fw-bold py-3 text-white m-0" behavior=alternate direction="right" loop="" scrollamount=10> Welcome to Indian Railways !!
  
</marquee>
               -->

    <section id="section1">
        <div class="container">
            <div class="row">

                <div class="col-md-6 my-5">
                    <div class="card p-4 mt-5">

                        <div class="card-body">

                            <div class="card-title  d-flex justify-content-center"></div>
                            <!-- <div class="p-2"><img src="images\logo_top_eng.jpg" alt="" width="80" height="60" class=""></div> -->
                            <div class="book" style="color: #213d77;font-weight: bold;">
                                <h3 class="text-center book ">BOOK TICKET</h3>
                            </div>
                        </div>

                        <form method="post" action="train-list.php">
                            <div class="row mb-2 mt-3">
                                <div class="col-7">
                                    <!-- <input type="text" class="form-control" placeholder="From"> -->

                                    <div class="input-group ">
                                        <label class="input-group-text" for="fstation"><i
                                                class="fa-solid fa-paper-plane"></i></label>
                                        <?php echo stationSelector("IN", "fstation", "fstation", "form-select  form-control form-control1"); ?>

                                    </div>


                                </div>
                                <div class="col-5">


                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa-solid fa-calendar-days"></i></span>
                                        <input type="date" id="date_picker" name="date"
                                            class="form-control form-control1" placeholder="Date" aria-label="Date"
                                            aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>


                            </div>
                            <div class="row ">
                                <div class="col-7 text-center">
                                    <button type="button" class="flip-btn"
                                        onClick="swapByOptionValue('select[name=\'fstation\']', 'select[name=\'dstation\']')"><i
                                            class="fa-solid fa-exchange fa-rotate-90"></i></button>



                                </div>

                            </div>


                            <div class="row  mt-2">
                                <div class="col-7">

                                    <!-- 
                        <div class="input-group flex-nowrap">
                          <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-location-dot"></i></span>
                          <input type="text" class="form-control form-control1" placeholder="To" aria-label="To" aria-describedby="addon-wrapping">
                        </div> -->


                                    <div class="input-group ">
                                        <label class="input-group-text" for="dstation"><i
                                                class="fa-solid fa-location-dot"></i></label>
                                        <?php echo stationSelector1("IN", "dstation", "dstation", "form-select  form-control form-control1"); ?>

                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa-solid fa-briefcase"></i></span>
                                        <select class="form-select form-control form-control1" id="floatingSelectGrid"
                                            aria-label="Floating label select example" name="class">
                                            <option selected hidden>All classes</option>
                                            <option value="SL">Sleeper (SL)</option>
                                            <option value="1A">AC First class (1A)</option>
                                            <option value="2A">AC 2 Tier (2A)</option>
                                            <option value="3A">AC 3 Tier (3A)</option>
                                            <option value="CC">AC Chair car (CC)</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3 mt-4">

                                <div class="col-7">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa-solid fa-list-ul"></i></span>
                                        <select class="form-select form-control form-control1" id="floatingSelectGrid"
                                            aria-label="Floating label select example" name="quota">
                                            <option selected active value="GENERAL">GENERAL</option>
                                            <option value="LADIES">LADIES</option>
                                            <option value="TATKAL">TATKAL</option>
                                            <option value="PREMIUM TATKAL">PREMIUM TATKAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning search-btn px-4 mt-2 btn-3d"
                                name="search">Search</button>
                        </form>


                    </div>
                </div>

                <div class="col-md-6  text-white  mt-5 container-column">

                    <div class="column-2 text-center">
                        <h1>INDIAN RAILWAYS</h1>
                        <h5>SAFETY | SECURITY | PUNCTUALITY</h5>
                        <div class="pnr-btn">
                            <button type="button" class="btn btn-primary btn-pnr btn-lg px-4 text-white fw-bold"
                                data-bs-toggle='modal' data-bs-target='#pnr-modal'>PNR STATUS</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>




    </section>

    <div class="my-5 conatiner " id="feedback">
        <div class="">

            <div class=" d-flex align-items-center justify-content-center ">
                <div class="bg-white col-md-4 card">
                    <div class="text-center my-4">
                        <h3 class="text-primary">How Can We Improve us?</h3>
                        <p class="lead">Your feedback is important for us !! </p>
                    </div>
                    <div class="p-4 rounded shadow-md">
                        <form method="post" action="">
                            <div>
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control form-control3"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="mt-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="text" name="email" class="form-control form-control3"
                                    placeholder="Your Email" required>
                            </div class="mt-3">

                            <div class="mt-3 mb-3">
                                <label for="message" class="form-label">Feedback</label>
                                <textarea name="feedback" cols="20" rows="6" class="form-control form-control2"
                                    placeholder="Feedback" style="resize: none"></textarea>
                            </div>

                            <button class="btn btn-primary btn-3d" name="feedback_submit">
                                Submit Feedback
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





    <?php include "includes/footer.php" ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script language="javascript">
    $(document).ready(function() {
        setCurrentDate()
    });

    function setCurrentDate() {
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + (month) + "-" + (day);
        $('#date_picker').val(today);
    }



    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min', today);


    // 



    function getSelectedOption(elem) {
        return elem.options[elem.selectedIndex].value;
    }

    function setSelectedOption(elem, value) {
        for (let i = 0; i < elem.options.length; i++) {
            elem.options[i].selected = value === elem.options[i].value;
        }
    }

    function swapByOptionValue(selector1, selector2) {
        var elem1 = document.querySelector(selector1),
            elem2 = document.querySelector(selector2),
            selectedOption1 = getSelectedOption(elem1),
            selectedOption2 = getSelectedOption(elem2);
        setSelectedOption(elem1, selectedOption2);
        setSelectedOption(elem2, selectedOption1);
    }
    </script>



</body>

</html>