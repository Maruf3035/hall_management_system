<?php
include_once('../../../../../vendor/autoload.php');
use App\Message\Message;
use App\Utility\Utility;

if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect(["../frontPage/index.php"]);
}
//if //($_SESSION['role'] == "USER") {
// Message::message("You do not have access");
// Utility::redirect($_SERVER["../frontpage/index.php"]);
//}


//use App\Message\Message;
use App\UserManagement\UserManagement;
use App\Hall\Hall;

use App\bookNow\bookNow;


$msg = Message::message();

include_once('../../header_for_dashboard.php');
if (!isset($_SESSION['email'])) Utility::redirect("../frontPage/");

//Utility::dd($_SESSION);

$objInvoice = new bookNow();
$objInvoice->setData($_GET);
$oneData = $objInvoice->view_by_booking_id();
?>

<form method="post">

    <div class="container tableBackground wow slideInUp forTopMargin">
        <h3 class="wow fadeInDown" style="text-align: center"><?php echo $oneData->hall_name; ?> Booked
            by <?php echo $oneData->customer_name; ?> in <?php echo $oneData->booking_date; ?>
            ( <?php echo $oneData->booking_time; ?>)</h3>
        <hr>
        <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>"; ?>

        <div class="table-responsive">
            <h3 style="text-align: center">Customer Information</h3>


            <table class="table table-bordered table-hover">

                <tr>


                    <td> ID</td>
                    <td> Booking ID</td>
                    <td> Customer Name</td>
                    <td> Phone Number</td>
                    <td> Address</td>


                </tr>
                <tr>


                    <td> <?php echo $oneData->customer_id; ?> </td>
                    <td>  <?php echo $oneData->booking_id; ?></td>
                    <td>  <?php echo $oneData->customer_name; ?></td>
                    <td>  <?php echo $oneData->phone_number; ?></td>
                    <td> <?php echo $oneData->customer_address; ?></td>

                </tr>

            </table>
            <h3 style="text-align: center">Convention Hall Information</h3>
            <table class="table table-bordered table-hover">
                <tr>

                    <td> Hall ID</td>

                    <td> Hall Name</td>
                    <td> Booking Date</td>
                    <td> Booking Time</td>
                    <td> Event Type</td>
                    <td> Total Person</td>
                    <td> Floor Number</td>
                    <td> Hall Address</td>
                    <td> Hall Contact</td>


                </tr>
                <tr>

                    <td><?php echo $oneData->hall_id; ?></td>


                    <td>  <?php echo $oneData->hall_name; ?></td>
                    <td> <?php echo $oneData->booking_date; ?></td>
                    <td> <?php echo $oneData->booking_time; ?></td>
                    <td>
                        <?php echo $oneData->event_name; ?></td>
                    <td> <?php echo $oneData->total_person ?></td>

                    <td>  <?php echo $oneData->floor_number; ?></td>

                    <td>  <?php echo $oneData->hall_address; ?> </td>

                    <td><?php echo $oneData->hall_contact; ?></td>

                </tr>

            </table>