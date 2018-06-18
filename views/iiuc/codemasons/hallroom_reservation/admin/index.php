<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\UserManagement\RoleManagement;
use App\Utility\Utility;
use App\Message\Message;
$msg = Message::message();
if (!isset($_SESSION['role'])=='ADMIN') Utility::redirect("../frontpage/");

$menu= new RoleManagement();
$menu->setData(array('role_name'=>$_SESSION['role']));
$menu_set=$menu->module_array();

//Utility::dd($menu_set);

?>

<!doctype html>
<html lang="en" xmlns:http="http://www.w3.org/1999/xhtml">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resource/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../../resource/bootstrap/css/main.min.css">


    <style>
        #wrapper .sidebar {
            position: relative;
        }
        .dropdown {
            background-color: #20262E;
        }
        .dropdown:hover {
            background-color: #0AF;;
        .memberName{
            background-color: #fff;
            padding:5px;
            border-radius:3px;
        }

    </style>
</head>

<body>
<!-- WRAPPER -->

<div id="wrapper">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage"><img src="../../../../../resource/images/logo-codemasons_black.gif" alt=""> </a>
        </div>
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li ><a href="index.php" class="active"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a></li>
                    <li ><a href="" ><i class="glyphicon glyphicon-cog"></i> <span style="color: #00aa00;font-weight: bold">Hall Management</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/create.php"  class="glyphicon glyphicon-plus-sign"></> <span>Create Hall</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_view.php" class="glyphicon glyphicon-eye-open"></> <span>View Hall</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_edit.php" class="glyphicon glyphicon-edit"></> <span>Update Hall</span></a></li>


                        <li ><a href="" ><i class="glyphicon glyphicon-cog"></i> <span  style="color: #00aa00;font-weight: bold">Manage Booking</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/pending_bookingList.php" class="glyphicon glyphicon-pushpin"></> <span> Pending  booking list</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/approved_bookingList.php" class="glyphicon glyphicon-pushpin"></> <span> Approved Booking List</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/admin_booking_delete.php" class="glyphicon glyphicon-pushpin"></> <span>Delete Booking </span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/pending_cancel_bookingList.php" class="glyphicon glyphicon-pushpin"></> <span>Cancel Booking </span></a></li>

                    <li ><a href="" ><i class="glyphicon glyphicon-cog"></i> <span  style="color: #00aa00;font-weight: bold">User Management</span></a></li>
                    <li ><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/user_create.php"  class="glyphicon glyphicon-plus-sign"></> <span>Create User</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/multiple_view.php" class="glyphicon glyphicon-eye-open"></> <span>View User</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/multiple_edit.php" class="glyphicon glyphicon-edit"></> <span>Update User</span></a></li>


                    <li ><a href="" ><i class="glyphicon glyphicon-cog"></i> <span  style="color: #00aa00;font-weight: bold">Manage Invoices</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/view_booking_invoice.php" class="glyphicon glyphicon-usd"></> <span>Invoice</span></a></li>
                    <li><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/contact_information.php" class="glyphicon glyphicon-usd"></> <span>Customer Message</span></a></li>


                    <?php
/*
        foreach ($menu_set as $menu){

            echo $menu['role_module'];
            echo "<li class='dropdown'><a href=".$menu['create_link']." class=''>Create</a></li>" ;
            echo "<li class='dropdown'><a href=".$menu['view_link']." class=''>View</button></a></li>" ;
            echo "<li class='dropdown'><a href=".$menu['edit_link']." class=''>Edit</button></a></li>" ;
        }
  */
        ?>

                </ul>
            </nav>
        </div>
    </div>

    <!-- END SIDEBAR -->
    <!-- MAIN -->
    <div class="main">

        <!-- NAVBAR -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-bars icon-nav"></i>
                    </button>
                </div>
                <div id="navbar-menu" class="navbar-collapse collapse">

                    <?php
                    if(!isset($_SESSION['role'])){
                        echo "
                <li> <button type='button' class='btn btn-primary navbar-btn'data-toggle='modal' data-target='#SignIn'> Sign in </button> </li>
                <li> <button type='button' class='btn btn-success navbar-btn'data-toggle='modal' data-target='#SignUp'> Sign Up </button> </li>
    ";
                    } else{
                        echo " <li> <a href='../../hallroom_reservation/user/logout.php'><button type='button'  style='float: left;position: relative;left: 80%';  class='btn btn-primary navbar-btn'data-toggle='modal'  data-target='#LogOut'> Log Out </button> </a></li>
    ";
                    }
                    ?>
                        <h4 style="position:relative;float: left;left: 20%;";><?php echo "Welcome ".$_SESSION['email']." as ".$_SESSION['role']; ?></php></h4>


                </div>
                <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>";?>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="fireWors">
                <div class="continer text-center">


                    <!-- Team Member Thumbnail -->
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 wow fadeInRight" data-wow-delay="900ms">
                            <div class="bs-example" data-example-id="striped-table">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <caption class="text-center btn-success">Hall Management</caption>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Add Hall</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/create.php">Click</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>View Hall</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_view.php" >Click</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Update Hall</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_edit.php" >Click</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Pending booking list</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/pending_bookingList.php">Click</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Approved booking list</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/approved_bookingList.php">Click </a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Delete booking</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/admin_booking_delete.php">Click </a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Cancel booking list</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/pending_cancel_bookingList.php">Click </a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Create User</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/user_create.php">  Click</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>View User</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/multiple_view.php">Click</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Update User</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/multiple_edit.php" >Click</a></td>

                                    </tr>

                                    <tr>
                                        <th scope="row">11</th>
                                        <td>View Invoice</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/view_booking_invoice.php">Click</a></td>

                                    </tr>

                                    <tr>
                                        <th scope="row">12</th>
                                        <td>Customer Message</td>
                                        <td class="btn-primary btn-lg"><a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/contact_information.php">Click</a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>

                    <!-- Team Member Thumbnail -->

                </div>





                </div>

            </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="../../../../../resource/bootstrap/js/jquery-2.1.0.min.js"></script>
<script src="../../../../../resource/bootstrap/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../../resource/js/wow.min.js"></script>
    <script>
        jQuery(function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        })
    </script>
</body>

</html>
