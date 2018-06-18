<?php

if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\Hall\Hall;


$objHall= new Hall();

$allHall=$objHall->menuData();

$hallIndex = new Hall();
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
    <link rel="shortcut icon" href="../../../../../resource/images/codemasons.ico" />
    <link href="../../../../../resource/deshboard.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../../../resource/jquery-ui/jquery-ui.css">



</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/"> <img src="../../../../../resource/images/logo-codemasons_black.gif" alt=""> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="main_menu">

                <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/index.php">Dashboard </a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION['role'])){
                    echo "
                <li> <button type='button' class='btn btn-primary navbar-btn'data-toggle='modal' data-target='#SignIn'> Sign in </button> </li>
                <li> <button type='button' class='btn btn-success navbar-btn'data-toggle='modal' data-target='#SignUp'> Sign Up </button> </li>
    ";
                } else{
                    echo " <li> <a href='../../hallroom_reservation/user/logout.php'><button type='button' class='btn btn-primary navbar-btn'data-toggle='modal' data-target='#LogOut'> Log Out </button> </a></li>
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
                            <input type='text' class='form-control' name='email'  placeholder='Enter your Email...'/>
                        </div>
                    </div><br>

                    <div class='form-group-lg'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-user fa' aria-hidden='true'></i></span>
                            <input type='password' class='form-control' name='password'  placeholder='Enter your Password...'/>
                        </div>
                    </div><br>

                    <div class='form-group '>
                        <input type='submit' id='button' class='btn btn-primary btn-lg btn-block login-button' value='Sign in'>
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

                <form class="" method="post" action="../user/signup.php">
                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="first_name"  placeholder="Enter your First Name..."/>
                        </div>
                    </div><br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="last_name"  placeholder="Enter your Last Name..."/>
                        </div>
                    </div><br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="email"  placeholder="Enter your Email..."/>
                        </div>
                    </div><br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="phone"  placeholder="Enter your Phone Number..."/>
                        </div>
                    </div><br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password"  placeholder="Enter your Password..."/>
                        </div>
                    </div><br>

                    <div class="form-group-lg">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <textarea class="form-control" name="address" placeholder="Enter your Address... "></textarea>
                        </div>
                    </div><br>

                    <div class="form-group ">
                        <input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" value="Sign Up">
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

