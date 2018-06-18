

    <script>
        function Validate() {

            var first_name = document.registration.first_name;
            var last_name = document.registration.last_name;
            var email = document.registration.email;
            var passid = document.registration.password;
            var uadd = document.registration.address;
            {
                if (allLetter(first_name)) {
                }
                if (allLetter2(last_name)) {
                }
                if (ValidateEmail(email)) {
                }
                if (password_validation(passid)) {
                }
                if (address_validation(uadd)) {
                }
            }

            return false;

        }
        function allLetter(first_name) {
            var letters = /^[A-Za-z]+$/;
            if (first_name.value.match(letters)) {
                return true;
            }
            else if (first_name.value == "") {
                window.alert("First name should not be empty");
                first_name.focus();
                return false;
            }
            else {
                alert('First name must have alphabet characters only');
                first_name.focus();
                return false;
            }
        }
        function allLetter2(last_name) {
            var letters = /^[A-Za-z]+$/;
            if (last_name.value.match(letters)) {
                return true;
            }
            else if (last_name.value == "") {
                window.alert("Last name should not be empty");
                last_name.focus();
                return false;
            }
            else {
                alert('Last name must have alphabet characters only');
                last_name.focus();
                return false;
            }
        }
        function ValidateEmail(email) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (email.value.match(mailformat)) {
                return true;
            }
            else {
                alert("You have entered an invalid email address!");
                return false;
            }
        }
        function password_validation(passid, mx, my) {
            var passid_len = passid.value.length;
            if (passid_len == 0 || passid_len >10 || passid_len < 6) {
                alert("Password should not be empty / length be between " + 10 + " to " + 6);
                passid.focus();
                return false;
            }
            return true;
        }
        function address_validation(uadd) {
            var letters = /^[0-9a-zA-Z]+$/;
            if (uadd.value.match(letters)) {
                return true;
            }
            else if (uadd.value == "") {
                window.alert("Address should not be empty");
                uadd.focus();
                return false;
            }


            else if {
                alert('User address must have alphanumeric characters only');
                uadd.focus();
                return false;
            }
        else
            {
                alert('Form Succesfully Submitted');
                window.location.reload()
                return true;
            }


        }



    </script>

<?php

if (!isset($_SESSION)) session_start();
include_once('../../../../../vendor/autoload.php');

use App\Hall\Hall;
use App\UserManagement\UserManagement;

$objUser= new UserManagement();
$objUser->setData($_SESSION);
$userDetails=$objUser->booking_view();

$objHall = new Hall();
$hallIndex = new Hall();

$allHall = $objHall->menuData();
$all_hall = $hallIndex->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Vendor Hall Management System </title>


    <!-- Bootstrap -->
    <link href="../../../../../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../../resource/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../../../resource/animate.css" rel="stylesheet">
    <link href="../../../../../resource/master.css" rel="stylesheet">
<!--    <link rel="shortcut icon" href="../../../../../resource/images/codemasons.ico"/>-->
    <link href="../../../../../resource/deshboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../resource/jquery-ui/jquery-ui.css">


</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"
               href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/"> <img
                    src="../../../../../resource/images/logo-codemasons_black.gif" alt=""> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="main_menu">
                <li>
                    <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/index.php">Home </a>
                </li>
                <li>
                    <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/about.php">About
                        us </a></li>
                <li>
                    <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/gallery.php">Gallery </a>
                </li>
                <li>
                    <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/contact.php">Contact
                        us </a></li>

                <li class="dropdown" style="color: #00a0f0">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">List of Convention Hall<span class="caret" ></span></a>
                    <ul class="dropdown-menu">

                        <li >
                            <a  href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=5' ?>">
                                City Convention Hall </a></li>
                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=2' ?>">
                                Zinnurine Convention Centre </a></li>
                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=6' ?>">
                                Hall 24 Convention Center </a></li>
                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=7' ?>">
                                K B Convention Hall </a></li>
                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=10' ?>">
                                Swiss Park </a></li>

                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=11' ?>">
                                Rupnagar Community Center </a></li>


                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=12' ?>">
                                Hafez Park </a></li>

                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=15' ?>">
                                Kings Park </a></li>

                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=16' ?>">
                                Safa Arched </a></li>

                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=17' ?>">
                                Western Park </a></li>

                        <li>
                            <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=21' ?>">
                                Shomabesh Community Center </a></li>

                    </ul>
                </li>
<?php if(isset($_SESSION['role'])){

    echo " <li> <a href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/user_profile.php'><span style='color:greenyellow'>Profile</button></span> </li>
    </a></li>

 "; } ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!isset($_SESSION['role'])) {
                    echo "
                <li> <button type='button' class='btn btn-primary navbar-btn'data-toggle='modal' data-target='#SignIn'> Sign in </button> </li>
                <li> <button type='button' class='btn btn-success navbar-btn'data-toggle='modal' data-target='#SignUp'> Sign Up </button> </li>
    ";
                } else {
                    echo " <li> <a href='../../hallroom_reservation/user/logout.php'><button type='button' class='btn btn-primary navbar-btn'style='margin-top: -15px;' data-toggle='modal' data-target='#LogOut'> Log Out </button> </a></li>
    ";
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Trigger the modal with a button -->

<!-- Sign In Modal -->


<div id='SignIn' class='modal fade' role='dialog'>
    <div class='modal-dialog'>
        <!-- Modal content-->
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h3 style="color: white;font-weight: bold" class='modal-title'>Sign In Form</h3>
            </div>
            <div class='modal-body'>

                <form class='' method='post' action='../admin/login.php'>
                    <!--<div class='form-group-lg'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-user fa' aria-hidden='true'></i></span>
                            <input type='text' class='form-control' name='name'  placeholder='Enter your Name...'/>
                        </div>
                    </div><br> -->

                    <div class='form-group-lg'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-user fa' aria-hidden='true'></i></span>
                            <input type='text' class='form-control' name='email' placeholder='Enter Registerd  Email'
                                   required="1"/>
                        </div>
                    </div>
                    <br>

                    <div class='form-group-lg'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-user fa' aria-hidden='true'></i></span>
                            <input type='password' class='form-control' name='password'
                                   placeholder='Enter Password' required="1"/>
                        </div>
                    </div>
                    <br>

                    <div class='form-group '>
                        <input type='submit' id='button' class='btn btn-primary btn-lg btn-block login-button'
                               value='Sign in'>
                    </div>
                </form>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Sign Up Modal -->
<div id="SignUp" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="color:white;font-weight:bold" class="modal-title">Sign Up Form </h3>
            </div>
            <div class="modal-body">

                <form class="" action="../user/signup.php" name="registration" onsubmit="return Validate();" method="post"
                      >
                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="first_name"
                                   placeholder="Enter your First Name"/>
                        </div>
                    </div>
                    <br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="last_name"
                                   placeholder="Enter your Last Name"/>
                        </div>
                    </div>
                    <br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa"
                                                               aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email"
                                   placeholder="Enter your Email"/>
                        </div>
                    </div>
                    <br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="number" required="1" class="form-control" name="phone"
                                   placeholder="Enter your Phone Number"/>
                        </div>
                    </div>
                    <br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="password"  class="form-control" name="password"
                                   placeholder="Enter your Password"/>
                            <input type="hidden"  class="form-control" name="role_id" value="USER"/>
                        </div>
                    </div>
                    <br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <textarea class="form-control" name="address"
                                      placeholder="Enter your Address"></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="form-group ">
                        <input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button"
                               value="Sign Up">
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>

