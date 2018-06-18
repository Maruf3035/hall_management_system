<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();

use App\UserManagement\RoleManagement;
use App\Utility\Utility;

if (!isset($_SESSION['role'])=='ADMIN') Utility::redirect("../frontPage/");

$objRole=new RoleManagement();

$allRoles= $objRole->view_roles();

Utility::dd($allRoles);

include_once('../../header.php');
?>

<form method="post">
    <div class="container tableBackground wow slideInUp forTopMargin">
        <div class="table-responsive">
            <h1 class="wow fadeInDown" style="text-align: center">Booking List Show...</h1><hr>
            <table class="table table-bordered table-hover">
                <tr>
                    <th class="text-center"> Serial No</th>
                    <th class="text-center"> Booking ID</th>
                    <th class="text-center"> Hall ID </th>
                    <th class="text-center"> Invoice ID </th>
                    <th class="text-center"> Customer ID </th>
                    <th class="text-center"> Event Type </th>
                    <th class="text-center"> Guest Nos </th>
                    <th class="text-center"> Booking Date </th>
                    <th class="text-center"> Booking Time </th>
                    <th class='text-center'> Action </th>
                </tr>

                <?php

                $serial=1;

                foreach($allRoles as $oneRole){

                    echo "
            <tr class='text-center'>
                <td>$serial</td>
                <td>$oneData->id</td>
                <td>$oneData->hall_id</td>
                <td> $oneData->invoice_id</td>
                <td> $oneData->customer_id</td>
                <td> $oneData->event_type</td>
                <td> $oneData->guest_nos</td>
                <td> $oneData->booking_date</td>
                <td> $oneData->booking_time</td>";

                    if($_SESSION['role']=='ADMIN'){
                        echo" <td><button type='submit' name='delete' value='$oneData->id' class='btn btn-block btn-danger' formaction='booking_delete.php'> Delete </button></td> ";
                    }
                    echo "</tr>";
                    $serial++;
                }

                ?>
            </table>
        </div> <!-- end responsive table -->
    </div>
</form>
<?php
include_once ("../../footer.php");
?>

