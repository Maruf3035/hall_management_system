<head>
    <script>
        function Validate() {

            var amount = document.registration.amount;
           // var transaction_id = document.registration.transaction_id;
            {
                if (allNumber(amount)) {
                }
            }

            return false;

        }
        function allNumber(amount) {

             if (amount.value == "") {
                window.alert("Amount  should not be empty");
                amount.focus();
                return false;
            }
        }



    </script>
</head>
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
$oneData = $objInvoice->view_by_booking_id();


?>
<form action="invoice_process.php" name="registration" onsubmit="return Validate();" method="post">
<div class="wow fadeInUp container tableBackground" style="margin-top: 100px">

    <h3 class="wow fadeInDownBig " data-wow-duration="2s" style="text-align: center"> Complete the form</h3>
    <hr>

    <div class="wow fadeInRightBig col-lg-offset-1 col-lg-10" data-wow-duration="1.5s"
         style="background-color: rgba(70,70,70,0.74)">
        <div class="col-lg-offset-1 col-lg-5">
            <table class="invoiceCustomer">
                <tr>
                    <td>Hall Name: <?php echo $oneData->hall_name; ?></td>
                </tr>

                <tr>
                    <td>Address: <?php echo $oneData->hall_address; ?></td>
                </tr>
                <tr>
                    <td>Contact: <?php echo $oneData->hall_contact ?> </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-5">
            <table align="right" class="invoiceCompany">

                <tr>
                    <td> Name:</td>
                    <td><?php echo $oneData->customer_name; ?></td>
                </tr>
                <tr>
                    <td>Address:</td> <td><?php  echo $oneData->customer_address; ?></td>
                </tr>
                <tr>
                    <td>Contact:</td><td><?php  echo $oneData->phone_number; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-lg-10 col-lg-offset-1">
        <table align="right" class="bill">
            <tr class="invoiceBill">
                <td>Invoice No:</td>
                <td><?php  echo $oneData->customer_id; ?></td>
            </tr>
            <tr class="invoiceBill">
            <td>Booking Id:</td>
                <td><?php  echo $oneData->booking_id; ?></td>
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
        </table>





    </div>
      <div class="col-lg-offset-1 col-lg-10">
        <table class="invoiceTable wow fadeInLeft table-hover " data-wow-duration="2s">
            <table class="invoiceTable wow fadeInLeft table-hover wow" data-wow-duration="2s">
                <!--
                 <tr>
                     <th style="width: 15%">Serial No</th>
                     <th>Particular</th>
                     <th style="width: 15%; text-align: right; padding-right: 30px">Amount</th>
                 </tr>

                 <tr style="background-color: rgba(70,70,70,0.74)">
                     <td>01</td>
                     <td>particular 1</td>
                     <td style="text-align: right; padding-right: 30px">10,000/-</td>
                 </tr>
                 <tr style="background-color: rgba(4,25,30,0.74)">
                     <td>02</td>
                     <td>Service 1</td>
                     <td style="text-align: right; padding-right: 30px">10,000/-</td>
                 </tr>
                 <tr style="background-color: rgba(70,70,70,0.74)">
                     <td>03</td>
                     <td>Service 3</td>
                     <td style="text-align: right; padding-right: 30px">10,000/-</td>
                 </tr>
                 <tr style="background-color: rgba(4,25,30,0.74)">
                     <td>02</td>
                     <td>Service 1</td>
                     <td style="text-align: right; padding-right: 30px">10,000/-</td>
                 </tr>
                 <tr style="background-color: rgba(70,70,70,0.74)">
                     <td>03</td>
                     <td>Service 3</td>
                     <td style="text-align: right; padding-right: 30px">10,000/-</td>
                 </tr>
                 <tr style="background-color: rgba(4,25,30,0.74)">
                     <td>01</td>
                     <td>Service 4</td>
                     <td style="text-align: right; padding-right: 30px">10,000/-</td>
                 </tr>
             </table>
             -->
                <table class="invoiceTotal" align="center">
                <!--<tr>
                    <td>Total</td>
                    <td></td>
                    <td>10,000/-</td>
                </tr>
                <tr>
                    <td>Service Charge</td>
                    <td>(+)</td>
                    <td>5,000/-</td>
                </tr>
                <tr>
                    <td style="border-bottom: 2px solid white">Tax Include</td>
                    <td style="border-bottom: 2px solid white">(+)</td>
                    <td style="border-bottom: 2px solid white">1,000/-</td>
                </tr>-->
                <tr>
                    <td>Grand Total: </td>
                        <td><?php echo $oneData->hall_rent; ?></td>
                </tr>
                <!--
                    <tr>
                    <td style="border-bottom: 2px solid white">Advance Payment</td>
                    <td style="border-bottom: 2px solid white">(-)</td>
                    <td style="border-bottom: 2px solid white">10,000/-</td>
                </tr>
                <tr>
                    <td>Total Due</td>
                    <td>(=)</td>
                    <td>6,000/-</td>
                </tr>
                -->
            </table>

                <h3 > Payment via bkash: 01825484458</h3>
                <input type="text" name="amount" placeholder="Enter Amount"  style="border-radius: 3px;color: #00a0f0;width: 930px;height: 40px;">

                <input type="text" name="transaction_id" placeholder="Transaction Id" required="1" style="border-radius: 3px;color: #00a0f0;width: 930px;height: 40px;"><h5 style="color: white">Transaction Required</h5>
                <input type="submit" class='btn btn-block btn-success'/>
                <input type="hidden" name="hall_id" value="<?php echo $oneData->hall_id; ?>"/>
                <input type="hidden" name="booking_id" value="<?php echo $oneData->booking_id; ?>"/>
                <input type="hidden" name="customer_id" value="<?php echo $oneData->customer_id; ?>"/>
                <input type="hidden" name="event_name" value="<?php echo $oneData->event_name; ?>"/>
                <input type="hidden" name="booking_time" value="<?php echo $oneData->booking_time; ?>"/>
                <input type="hidden" name="booking_date" value="<?php echo $oneData->booking_date; ?>"/>
                <input type="hidden" name="total_person" value="<?php echo $oneData->total_person; ?>"/>
                <input type="hidden" name="floor_number" value="<?php echo $oneData->floor_number; ?>"/>
                <input type="hidden" name="customer_name" value="<?php echo $oneData->customer_name; ?>"/>
                <input type="hidden" name="customer_email" value="<?php echo $oneData->customer_email; ?>"/>
                <input type="hidden" name="customer_address" value="<?php echo $oneData->customer_address; ?>"/>
                <input type="hidden" name="customer_service" value="<?php echo $oneData->customer_service; ?>"/>
                <input type="hidden" name="phone_number" value="<?php echo $oneData->phone_number; ?>"/>
                <input type="hidden" name="hall_name" value="<?php echo $oneData->hall_name; ?>"/>
                <input type="hidden" name="hall_address" value="<?php echo $oneData->hall_address; ?>"/>
                <input type="hidden" name="hall_contact" value="<?php echo $oneData->hall_contact; ?>"/>
                <input type="hidden" name="hall_rent" value="<?php echo $oneData->hall_rent; ?>"/>

</form>

    </div>



</div>
<?php
//include_once('../../footer.php');
?>
