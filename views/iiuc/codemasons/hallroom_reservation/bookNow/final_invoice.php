<?php
include_once('../../../../../vendor/autoload.php');

if (!isset($_SESSION)) session_start();

use App\Message\Message;
use App\UserManagement\UserManagement;
use App\Hall\Hall;
use App\Utility\Utility;
use App\bookNow\bookNow;


$msg = Message::message();

if ($_SESSION['role'] == "USER") {
    include_once('../../header.php');
}
else{    include_once('../../header_for_dashboard.php');
}
if (!isset($_SESSION['email'])) Utility::redirect("../frontPage/");

//Utility::dd($_SESSION);

$objInvoice = new bookNow();
$objInvoice->setData($_GET);
$oneData = $objInvoice->view_by_booking_id_invoice();


?>

    <div class="wow fadeInUp container tableBackground" style="margin-top: 9%">

        <h3 class="wow fadeInDownBig " data-wow-duration="2s" style="text-align: center">
             <?php echo $oneData->hall_name; ?></h3>
        <hr>

        <div class="wow fadeInRightBig col-lg-offset-1 col-lg-10" data-wow-duration="1.5s"
             style="background-color: rgba(70,70,70,0.74)">

        </div>
        <div class="col-lg-10 col-lg-offset-1">
            <table align="left" class="bill">
                <tr class="invoiceBill">
                    <td>Invoice No:</td>
                    <td><?php  echo $oneData->invoice_id; ?></td>
                </tr>

                <tr class="invoiceBill">
                    <td>Booking Id:</td>
                    <td><?php  echo $oneData->booking_id; ?></td>
                </tr>
                </tr><tr class="invoiceBill">
                    <td>Booking Hall: </td>
                    <td><?php  echo $oneData->hall_name; ?></td>
                </tr></tr><tr class="invoiceBill">
                    <td>Contact: </td>
                    <td><?php  echo $oneData->hall_contact; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Hall Rent: </td>
                    <td><?php  echo $oneData->hall_rent; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Paid:</td>

                    <td><?php echo $oneData->amount; ?></td>
                </tr>

                <tr class="invoiceBill">
                    <td>Transaction Id:</td>

                    <td><?php echo $oneData->transaction_id; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Hall Contact: </td>
                    <td><?php  echo $oneData->hall_contact; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Hall Address: </td>
                    <td><?php  echo $oneData->hall_address; ?></td>
                </tr>


            </table>
            <table align="left" class="bill">
                <tr class="invoiceBill">
                    <td>Booking Time:</td>
                    <td><?php  echo $oneData->booking_time; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Booking Date:</td>

                    <td><?php echo $oneData->booking_date; ?></td>
                </tr>
<tr class="invoiceBill">
                    <td>Total person:</td>

                    <td><?php echo $oneData->total_person; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Floor NO:</td>
                    <td><?php  echo $oneData->floor_number; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Event Name:</td>
                    <td><?php  echo $oneData->event_name; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Customer Name:</td>
                    <td><?php  echo $oneData->customer_name; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Customer Email:</td>
                    <td><?php  echo $oneData->customer_email; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Customer Address</td>
                    <td><?php  echo $oneData->customer_address; ?></td>
                </tr>
                <tr class="invoiceBill">
                    <td>Phone Number: </td>
                    <td><?php  echo $oneData->phone_number; ?></td>

                </tr>
<tr class="invoiceBill">
                    <td> </td>
                    <td  style="width: 20px; "><a href="pdf.php?booking_id=<?php echo $oneData->booking_id?>" class="  btn-group-lg " >Download Invoice</td>
                </tr>

            </table>




        </div>

</div>


</div>
<?php
//include_once('../../footer.php');
?>
