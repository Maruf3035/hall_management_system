<?php
include_once('../../../../../vendor/autoload.php');

if (!isset($_SESSION)) session_start();

use App\Message\Message;
use App\UserManagement\UserManagement;
use App\Hall\Hall;
use App\Utility\Utility;
use App\bookNow\bookNow;


$objInvoice = new bookNow();
$objInvoice->setData($_GET);
$oneData = $objInvoice->view_by_booking_id_invoice();


/*foreach($recordSet as $row) {
    $id =  $row->id;
    $bookName = $row->book_name;
    $authorName =$row->author_name;

    $sl++;
    $trs .= "<tr>";
    $trs .= "<td width='50'> $sl</td>";
    $trs .= "<td width='50'> $id </td>";
    $trs .= "<td width='250'> $bookName </td>";
    $trs .= "<td width='250'> $authorName </td>";

    $trs .= "</tr>";
}
*/
$html= <<<BITM
<div class="container"  >
              <h3 style="text-align=center;">$oneData->hall_name</h3>
        <hr>
    <h4 style="backgound-color:cornflower;text-align=center;">Vendor Hall Management System</h4>
    <hr>

            <table align="center">
                <tr class="invoiceBill">
                    <td>Invoice No:</td>
                    <td>$oneData->invoice_id </td>
                </tr>

                <tr class="invoiceBill">
                    <td>Booking Id:</td>
                    <td> $oneData->booking_id </td>
                </tr>
                </tr><tr class="invoiceBill">
                    <td>Booking Hall: </td>
                    <td> echo $oneData->hall_name </td>
                </tr></tr><tr class="invoiceBill">
                    <td>Contact: </td>
                    <td> $oneData->hall_contact </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Hall Rent: </td>
                    <td> $oneData->hall_rent </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Paid:</td>

                    <td> echo $oneData->amount</td>
                </tr>

                <tr class="invoiceBill">
                    <td>Transaction Id:</td>

                    <td> $oneData->transaction_id</td>
                </tr>
                <tr class="invoiceBill">
                    <td>Hall Contact: </td>
                    <td> $oneData->hall_contact </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Hall Address: </td>
                    <td>$oneData->hall_address </td>
                </tr>



                <tr class="invoiceBill">
                    <td>Booking Time:</td>
                    <td> $oneData->booking_time </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Booking Date:</td>

                    <td> $oneData->booking_date </td>
                </tr>
<tr class="invoiceBill">
                    <td>Total person:</td>

                    <td> $oneData->total_person </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Floor NO:</td>
                    <td> $oneData->floor_number </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Event Name:</td>
                    <td> $oneData->event_name</td>
                </tr>
                <tr class="invoiceBill">
                    <td>Customer Name:</td>
                    <td> $oneData->customer_name </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Customer Email:</td>
                    <td>$oneData->customer_email </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Customer Address</td>
                    <td> echo $oneData->customer_address </td>
                </tr>
                <tr class="invoiceBill">
                    <td>Phone Number: </td>
                    <td> $oneData->phone_number </td>

                </tr>

            </table>



</div>

BITM;


// Require composer autoload
require_once ('../../../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('list.pdf', 'D');