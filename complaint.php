<?php
include 'includes\common.php';
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $birth=$_POST['birth'];
    $pnr=$_POST['pnr'];
    $depart=$_POST['depart'];
    $comp=$_POST['Complaint_message'];
    $select_query= "insert into complaint(name,email,birth_t_number,pnr,department,complaint) values('$name','$email','$birth','$pnr','$depart','$comp')";
    $user_result=mysqli_query($con,$select_query);

    echo("<script>alert('complaint registered successfully!!')</script>");
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
    .card,
    .btn-sub {

        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
        border-radius: 45px;
    }

    .form-control {
        border-radius: 45px;
    }

    .form-control2 {
        border-radius: 20px;
    }
    </style>
</head>

<body class="bg-light">
    <?php include "includes\Login_modal.php" ?>
    <?php include "includes\header.php" ?>
    <?php include "includes\contactus.php" ?>



    <div class="my-5 conatiner " id="feedback">

        <div class=" d-flex align-items-center justify-content-center ">
            <div class="bg-white col-md-4 card">
                <div class="p-4 rounded shadow-md">
                    <div class="text-center">
                        <h3 class="text-primary">Complaint Register</h3>

                    </div>

                    <form action="" method="post">

                        <div>
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Your PNR</label>
                            <input type="text" name="pnr" class="form-control" placeholder="Your PNR no."
                                id="category-dropdown" required>
                        </div>
                        <div class="mt-3">
                            <label for="depart" class="form-label">Birth and Train number </label>
                            <select class="form-select form-control" aria-label="Default select example" name="birth"
                                id='birth'>

                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="depart" class="form-label">Department</label>
                            <select class="form-select form-control" aria-label="Default select example" name="depart">
                                <option selected hidden>Complaint Against</option>
                                <option value="Electric">Electric</option>
                                <option value="Food Quality">Food Quality</option>
                                <option value="Staff">Staff</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Washroom Hygiene">Washroom Hygiene</option>
                            </select>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="message" class="form-label">Complaint</label>
                            <textarea cols="20" rows="6" class="form-control form-control2" placeholder="Complaint"
                                style="resize: none" name="Complaint_message"></textarea>
                        </div>
                        <button class="btn btn-primary btn-sub" type="submit" name="submit">
                            Submit Complaint
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var pnr = this.value;
            $.ajax({
                url: "complaint_script.php",
                type: "POST",
                data: {
                    pnr: pnr
                },
                cache: false,
                success: function(result) {
                    $("#birth").html(result);
                }
            });
        });
    });
    </script>







</body>

</html>