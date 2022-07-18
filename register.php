<?php 
include 'includes\common.php';

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

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    #Reg-sect {
        background-color: #e9eff5;

    }

    .btn-3d {
        border-radius: 20px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        border-color: transparent;
    }

    .btn-3d:hover {
        transform: scale(1.05);
        transition: all 0.2s ease 0s;
        border-color: transparent;

    }
    </style>

    <script type="text/javascript" src="js/man.js"></script>
</head>

<body>

    <?php include "includes\Login_modal.php" ?>
    <?php include "includes\admin_modal.php" ?>
    <?php include "includes\header.php" ?>
    <?php include "includes\contactus.php" ?>
    <?php include "includes\country.php" ?>




    <section id="Reg-sect" class="p-5 ">

        <div class="card p-3 py-5" style="border-radius: 20px;border-color:white;">
            <div class="card-body mx-5" style="width: 50%;">
                <div class="card-title mb-5">
                    <div class="float-start">
                        <h5>Create your Account</h5>
                    </div>
                    <div class="float-end">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#login_modal" style="color:#fb792b;"
                            class="fw-bold">Sign in</a>
                    </div>
                </div>



                <form action="Register_script.php" method="post" name="signup">




                    <nav>

                        <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
                            <button class="nav-link active fw-bold" id="nav-tab-1" data-bs-toggle="tab"
                                data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1"
                                aria-selected="true">Basic Details
                            </button>
                            <button class="nav-link fw-bold" id="nav-tab-2" data-bs-toggle="tab"
                                data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2"
                                aria-selected="false">Personal Details
                            </button>
                            <button class="nav-link fw-bold" id="nav-tab-3" data-bs-toggle="tab"
                                data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3"
                                aria-selected="false">Address
                            </button>
                        </div>
                    </nav>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="tabs-tab1">


                            <h6>GARBAGE/JUNK VALUES IN PROFILE MAY LEAD TO DEACTIVATION </h6>
                            <p>Please use a valid E-Mail ID and mobile number in registration.</p>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Username" name="Username"
                                    onblur="return name1()"><span id="fn"></span>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="password" name="password"
                                    onblur="return check1()"> <span id="ps"></span>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="confirm npassword"
                                    name="confirm_password" onblur="return confirm1()"> <span id="cps"></span>
                            </div>
                            <select class="form-select mb-3" name="Language">
                                <option selected disabled hidden>Preferred Language</option>
                                <option value="English">English</option>
                                <option value="हिन्दी">हिन्दी</option>

                            </select>

                            <select class="form-select mb-3" name="secQues">
                                <option selected disabled hidden>Security Question</option>
                                <option value="What is your pet name?">What is your pet name?</option>
                                <option value="What was the name of your first school?">What was the name of your first
                                    school?</option>
                                <option value="Who was your Childhood hero?">Who was your Childhood hero?</option>
                            </select>
                            <div class="mb-5">
                                <input type="text" class="form-control" placeholder="Security answer" name="secAns"
                                    onblur="return ans1()"><span id="an" class="p-0"></span>
                            </div>





                            <button type="button" class="btn btn-primary float-start btn-3d"><a href="index.php"
                                    class="text-white text-decoration-none">Cancel</a></button>
                            <button type="button" class="btn btn-primary float-end search-btn btn-3d" id="mybut"
                                onclick="return valid1()">Continue <i
                                    class="fa-solid fa-arrow-right text-white"></i></button>


                        </div>



                        <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="tabs-2">


                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="First name"
                                        aria-label="First name" name="fname">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Middle name [optional]"
                                        aria-label="Middle name" name="mname">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Last name [optional]"
                                        aria-label="Last name" name="lname">
                                </div>
                            </div>

                            <p class="fw-bold">Info!Please provide your exact name as per Aadhaar to avail Aadhaar based
                                benefits on IRCTC eTicketing website.</p>

                            <div class="row mb-3">

                                <div class="col">
                                    <select class="form-select mb-3" name="occupation">
                                        <option selected disabled hidden>Select Occupation</option>
                                        <option value="Government">Government</option>
                                        <option value="Public">Public</option>
                                        <option value="Private">Private</option>
                                        <option value="Job">Job</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" placeholder="Date of birth" name="DOB">
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="MarritalStatus"
                                            id="inlineRadio1" value="Married">
                                        <label class="form-check-label" for="inlineRadio1">Married</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="MarritalStatus"
                                            id="inlineRadio2" value="Unmarried">
                                        <label class="form-check-label" for="inlineRadio2">Unmarried</label>
                                    </div>

                                </div>

                                <div class="col">

                                    <?php echo countrySelector("IN", "country", "country", "form-select mb-3 form-control"); ?>
                                    <!-- <select class="form-select mb-3" name="country" >
                          <option selected>India</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="USA">USA</option>
                        </select> -->
                                </div>


                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="gender" id="btnradio1"
                                            autocomplete="off" value="Male">
                                        <label class="btn btn-outline-primary" for="btnradio1">Male</label>

                                        <input type="radio" class="btn-check" name="gender" id="btnradio2"
                                            autocomplete="off" value="Female">
                                        <label class="btn btn-outline-primary" for="btnradio2">Female</label>

                                        <input type="radio" class="btn-check" name="gender" id="btnradio3"
                                            autocomplete="off" value="Transgender">
                                        <label class="btn btn-outline-primary" for="btnradio3">Transgender</label>
                                    </div>

                                </div>

                                <div class="col">
                                    <input type="email" class="form-control" placeholder="email" aria-label="email"
                                        name="email">

                                </div>


                            </div>
                            <div class="row mb-5">
                                <div class="col-2">
                                    <input type="text" class="form-control" value="91" disabled>

                                </div>
                                <div class="col-4">
                                    <input type="tel" class="form-control" placeholder="Mobile" name="phone1"
                                        onblur="return mobile1()"> <span id="mn"></span>

                                </div>
                                <div class="col-6">
                                    <!-- <select class="form-select mb-3" name="nationality"> -->
                                    <!-- <option selected>Select Nationality</option> -->
                                    <?php echo countrySelector1("", "nationality", "nationality", "form-select mb-3 form-control"); ?>

                                    <!--                         
                          <option selected>Select Nationality</option>
                          <option value="Indian">Indian</option>
                          <option value="Afganistan">Afganistan</option>
                          <option value="Pakistan">Pakistan</option> -->
                                    <!-- </select> -->
                                </div>


                            </div>

                            <button type="button" class="btn btn-primary float-start btn-3d" id="mybut1"> <i
                                    class="fa-solid fa-arrow-left text-white"></i> Back</button>
                            <button type="button" class="btn btn-primary float-end search-btn btn-3d" id="mybut2"
                                onclick="return valid2()">Continue <i
                                    class="fa-solid fa-arrow-right text-white"></i></button>



                        </div>



                        <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="tabs-3">

                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Flat/Door/Block no."
                                        name="Flat">

                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Street/Lane (optional)"
                                        name="Street">

                                </div>



                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Area/Locality (optional)"
                                        name="Area">

                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Pincode" name="Pincode">

                                </div>



                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="State" name="State">

                                </div>

                                <div class="col">
                                    <select class="form-select " name="city">
                                        <option selected>Select city</option>
                                        <option value="Lucknow">Lucknow</option>
                                        <option value="Kanpur">Kanpur</option>
                                        <option value="Unnao">Unnao</option>
                                    </select>
                                </div>


                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <select class="form-select " name="postoffice">
                                        <option selected>Select postoffice</option>
                                        <option value="Lucknow">Lucknow</option>
                                        <option value="Kanpur">Kanpur</option>
                                        <option value="Unnao">Unnao</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Phone" name="phone">

                                </div>



                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <p class="fw-bold">I have read and agree with the Terms and Conditions. and
                                                also agree to receive promotional emails/SMS/offers/announcements from
                                                IRCTC & associated partners</p>
                                        </label>
                                    </div>
                                </div>




                            </div>
                            <div class="g-recaptcha mb-5" data-sitekey="6LffrWwgAAAAAOrNpm5pZrVpv-0bDwDjTSNTf7_o"></div>

                            <div class="captcha-status">
                                <?php 
                    if(isset($_SESSION['msg']))
                    {
                      echo $_SESSION['msg'];
                    }
                    
                    ?>
                            </div>

                            <button type="button" class="btn btn-primary float-start btn-3d" id="mybut3"><i
                                    class="fa-solid fa-arrow-left text-white"></i> Back</button>
                            <button type="submit" class="btn btn-primary float-end search-btn btn-3d"
                                id="mybut4">Register</button>









                        </div>


                </form>



            </div>
        </div>





    </section>

    <?php include "includes/footer.php" ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    $("#mybut").click(function() {
        var sel = document.querySelector('#nav-tab-2')
        bootstrap.Tab.getOrCreateInstance(sel).show()
    })
    $("#mybut1").click(function() {
        var sel = document.querySelector('#nav-tab-1')
        bootstrap.Tab.getOrCreateInstance(sel).show()
    })
    $("#mybut2").click(function() {
        var sel = document.querySelector('#nav-tab-3')
        bootstrap.Tab.getOrCreateInstance(sel).show()
    })
    $("#mybut3").click(function() {
        var sel = document.querySelector('#nav-tab-2')
        bootstrap.Tab.getOrCreateInstance(sel).show()
    })
    </script>

</body>


</html>