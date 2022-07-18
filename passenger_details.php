<?php
include 'includes\common.php';


if(!isset($_SESSION['username'])){
  echo("<script>location.href='index.php'</script>");
  
  
}

        $_SESSION['t_number']=$_POST['t_number'];
        
 
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


    <title>Pssenger details</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
    .header-dec {
        background-color: #213d77;
        color: white;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
    }

    .card-header {
        /* border-radius: 45px; */
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
    }

    .btn-3d {
        border-radius: 40px;
        border: #213d77;
        background-color: #213d77;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-3d:focus {
        border-radius: 40px;
        border: #213d77;
        background-color: #213d77;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-3d:hover {
        transform: scale(1.05);
        background-color: #213d77;
        transition: all 0.2s ease 0s;
    }
    </style>
</head>

<body>
    <?php include "includes\Login_modal.php" ?>
    <?php include "includes\header.php" ?>
    <?php include "includes\contactus.php" ?>
    <?php include "includes\stationName.php" ?>

    <div class="card m-3 mx-auto" style="width:60%">
        <div class='card-header header-dec'>
            <h5 class="card-title pt-2">Passenger Details</h5>
        </div>
        <div class="card-body mx-4 mx-auto pb-4">


            <form class="" method="post" action="book.php">
                <input type="hidden" name="date" value="<?php echo $_POST['date']?>">
                <input type="hidden" name="amt" value="<?php echo $_POST['amt']?>">
                <input type="hidden" name="t_number" value="<?php echo $_POST['t_number']?>">
                <input type="hidden" name="class" value="<?php echo $_POST['class']?>">
                <div id="passengers">
                    <div class="passenger row g-3 mt-2">

                        <div class="col-auto">
                            <input type="text" class="form-control" id="autoSizingInput" placeholder="Passenger Name"
                                name="psng-name1" required>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" id="autoSizingInput" placeholder="Age" min=1
                                name="age1" required>
                        </div>

                        <div class="col-auto">
                            <select class="form-select" id="autoSizingSelect" name="gender1" required>
                                <option hidden>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                        </div>
                        <div class="col-auto">

                            <select class="form-select" id="autoSizingSelect" name="pref1" required>
                                <option selected>No Preference</option>
                                <option value="Window Side">Window Side</option>
                                <option value="Lower Birth">Lower Birth</option>
                                <option value="Upper Birth">Upper Birth</option>
                            </select>
                        </div>


                    </div>
                </div>

                <button type="button" class="btn btn-primary mt-4 btn-3d " class="add" onclick='add_fields()'>+ Add
                    Passenger</button>
                <button type="submit" class="btn btn-primary mt-4 btn-3d mx-2 px-4 ">Confirm</button>
                <!-- <input type="hidden" value="1" name="number_of_psng" > -->
            </form>

        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script>
    var psng = 1;

    function add_fields() {
        psng++;
        var objTo = document.getElementById('passengers')
        var divtest = document.createElement("div");
        divtest.innerHTML =
            '<div class="passenger row g-3 mt-2"><div class="col-auto"><input type="text" class="form-control" id="autoSizingInput" placeholder="Passenger Name" name="psng-name' +
            psng +
            '" required></div><div class="col-auto"><input type="number" class="form-control" id="autoSizingInput" placeholder="Age" min=1 name="age' +
            psng +
            '"  required></div><div class="col-auto"><select class="form-select" id="autoSizingSelect" name="gender' +
            psng +
            '" required><option selected>Gender</option><option value="Male">Male</option><option value="Female">Female</option><option value="Transgender">Transgender</option></select></div><div class="col-auto"><select class="form-select" id="autoSizingSelect" name="pref' +
            psng +
            '" required ><option selected>NO Preference</option><option value="Window Side">Window Side</option><option value="Lower Birth">Lower Birth</option><option value="Upper Birth">Upper Birth</option></select></div><input type="hidden" value="' +
            psng + '" name="number_of_psng" /></div>';

        objTo.appendChild(divtest)
    }
    </script>



</body>

</html>