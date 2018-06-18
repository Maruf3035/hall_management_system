<?php
include_once('../../../../../vendor/autoload.php');


use App\bookNow\bookNow;
use App\Utility\Utility;
use App\Message\Message;
if(!isset($_SESSION) )session_start();

if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect(["../frontPage/index.php"]);
}
/*if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}*/

$msg = Message::message();

if (!isset($_SESSION['email'])) Utility::redirect("../frontPage/");

$objBooking= new bookNow();
$objBooking->setData($_GET);
$someData=$objBooking->view_bookings_by_customer();
//if($_SESSION['role']=='ADMIN'){
//  $someData=$objBooking->view_bookings();
//}else{
//$objBooking->setData($_SESSION['em']);
//$someData=$objBooking->view_bookings_by_id();
//}


//\App\Utility\Utility::dd($someData);
include_once('../../header.php');
?>

    <form method="post">
        <div class="container tableBackground wow slideInUp forTopMargin">
            <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>"; ?>

            <div class="table-responsive">
                <h4 class="wow fadeInDown" style="text-align: center">Hall Booking by <?php foreach($someData as $oneData)
                echo $oneData->customer_name ;

                 ?> </h4><hr>
                <table class="table table-bordered table-hover table-responsive">
                    <tr>

                        <th class="text-center"> Booking ID</th>
                        <th class="text-center"> Hall ID </th>
                        <th class="text-center"> Customer ID </th>
                        <th class="text-center"> Hall Name </th>
                        <th class="text-center"> Hall Address </th>
                        <th class="text-center"> Hall Contact </th>
                        <th class="text-center"> Booking Date </th>
                        <th class="text-center"> Booking Time </th>
                        <th class="text-center"> Event Type </th>
                        <th class="text-center"> Total Person </th>
                        <th class="text-center"> Floor Number </th>
                        <th class="text-center"> Customer Name </th>
                        <th class="text-center">  Phone </th>
                        <th class="text-center">  Address</th>
                        <th class="text-center"> Action</th>

                    </tr>

                    <?php

                    $serial=1;

                    foreach($someData as $oneData){

                        echo "
        <tr class='text-center'>
        <!--    <td> $serial</td>-->
                <td> $oneData->booking_id </td>
                <td> $oneData->hall_id </td>
                <td> $oneData->customer_id</td>
                <td> $oneData->hall_name</td>
                <td> $oneData->hall_address</td>
                <td> $oneData->hall_contact</td>
                <td> $oneData->booking_date</td>
                <td> $oneData->booking_time</td>
                <td> $oneData->event_name</td>
                <td> $oneData->total_person</td>
                <td>  $oneData->floor_number</td>
                <td> $oneData->customer_name</td>
                <td> $oneData->phone_number</td>
                <td> $oneData->customer_address</td>

<td>
                    <a href='invoice.php?booking_id=$oneData->booking_id' class='btn btn-block btn-success'> Get Invoice </a>
                    <a href='delete.php?booking_id=$oneData->booking_id' class='btn btn-block btn-success'>Cancel booking </a>


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
    </form>
<?php
//include_once ("../../footer.php");
?>