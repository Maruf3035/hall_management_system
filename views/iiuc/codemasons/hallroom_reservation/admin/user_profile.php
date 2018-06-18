<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
include_once('../../header.php');
use App\UserManagement\RoleManagement;
use App\UserManagement\UserManagement;
use App\bookNow\bookNow;
use App\Utility\Utility;
use App\Message\Message;
$msg = Message::message();



//if (!isset($_SESSION['role'])=='ADMIN') Utility::redirect("../frontpage/");


//Utility::dd($menu_set);


$objUser= new UserManagement();
$objUser->setData($_SESSION);
$userDetails=$objUser->booking_view();


$objBooking= new bookNow();
    //$objBooking->setData($_GET);
    //$objBooking->setData($userDetails['id']);
    $someData=$objBooking->booking_view_by_customer($userDetails['id']);








include_once('../../header.php');

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

</head>

<body>
<div class="table-responsive" style="margin-top: 160px;">


    <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>"; ?>
    <table class="table table-bordered table-hover">
        <h2 style="background-color:white;height:40px;border-radius: 15px; text-align: center">Profile</h2><hr>

        <tr>
            <td style="color: yellow" >    Name :</td>
            <td style="color: yellow">  <?php echo $userDetails['first_name']." ".$userDetails['last_name']?></td>
        </tr>

        <td style="color: yellow" >    Phone Number :</td>
        <td style="color: yellow" ><?php echo $userDetails['phone'] ?></td>
        </tr>
        <tr>
            <td style="color: yellow">    Email :</td>
            <td style="color: yellow">  <?php echo $userDetails['email'] ?></td>
        </tr>
        <tr>
            <td style="color: yellow" >    Address :</td>
            <td style="color: yellow" >  <?php echo $userDetails['address'] ?></td>
        </tr>
        <tr>




    </table>

</div>
<div class="table-responsive" style="font-style: normal;">



    <h3 style="background-color:white;height:40px;border-radius: 15px; text-align: center">Hall Booking information</h3><hr>


             </h2>
<table class="table table-bordered table-hover table-responsive">
    <tr>

        <th style="color: yellow" class="text-center"> Booking ID</th>
        <th style="color: yellow" class="text-center"> Hall ID </th>
        <th style="color: yellow" class="text-center"> Customer ID </th>
        <th style="color: yellow" class="text-center"> Hall Name </th>
        <th style="color: yellow" class="text-center"> Hall Address </th>
        <th style="color: yellow" class="text-center"> Hall Contact </th>
        <th style="color: yellow" class="text-center"> Booking Date </th>
        <th style="color: yellow" class="text-center"> Booking Time </th>
        <th style="color: yellow" class="text-center"> Event Type </th>
        <th style="color: yellow" class="text-center"> Total Person </th>
        <th style="color: yellow" class="text-center"> Floor Number </th>

        <th style="color: yellow" class="text-center"> Action</th>

    </tr>

    <?php
    $serial=1;
//var_dump($_REQUEST);

    foreach($someData as $oneData){

        echo "
        <tr class='text-center'>
        <!--    <td> $serial</td>-->
                <td style=\"color: white\" > $oneData->booking_id </td>
                <td style=\"color: white\"> $oneData->hall_id </td>
                <td style=\"color: white\"> $oneData->customer_id</td>
                <td style=\"color: white\"> $oneData->hall_name</td>
                <td style=\"color: white\"> $oneData->hall_address</td>
                <td style=\"color: white\"> $oneData->hall_contact</td>
                <td style=\"color: white\"> $oneData->booking_date</td>
                <td style=\"color: white\"> $oneData->booking_time</td>
                <td style=\"color: white\"> $oneData->event_name</td>
                <td style=\"color: white\"> $oneData->total_person</td>
                <td style=\"color: white\">  $oneData->floor_number</td>


<td>
                    <a href='../bookNow/invoice.php?booking_id=$oneData->booking_id' class='btn btn-block btn-success'> Payment </a>
                    <a href='../bookNow/cancel_request_process.php?booking_id=$oneData->booking_id' class='btn btn-block btn-success'>Cancel booking </a>


                     <a href='tel:$oneData->hall_contact' class='btn btn-block btn-info'>Call</a>
                </td>
     </tr>
            ";
        $serial++;

    }

    ?>
</table>

    </div> <!-- end responsive table -->
</div>
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
<?php // include_once('../../footer.php'); ?>