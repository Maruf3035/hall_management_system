<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\Hall\Hall;
use App\Utility\Utility;
use App\Communication;
if (!isset($_SESSION['email'])) Utility::redirect("../frontPage/");
if(!isset($_SESSION) )session_start();

if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect(["../frontPage/index.php"]);
}
if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}
include_once('../../header_for_dashboard.php');
$msg = Message::message();


$object= new Communication();
$allData=$object->view();
?>
<div class="container-fluid tableBackground wow slideInUp forTopMargin">

    <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>"; ?>

<div class="table-responsive">
    <h1 class="wow fadeInDown" style="text-align: center">Customer Message</h1><hr>
    <table class="table table-bordered table-hover">
        <tr>

            <th class="text-center">  ID</th>
            <th class="text-center"> Customer Name </th>
            <th class="text-center">  Email</th>
            <th class="text-center">  Phone Number </th>

            <th class="text-center"> Subject </th>
            <th class="text-center"> Message </th>
            <th class="text-center"> Action </th>

        </tr>

        <?php

        foreach($allData as $oneData){

            echo "
        <tr class='text-center'>

                <td> $oneData->id </td>
                <td> $oneData->name </td>
                <td> $oneData->email</td>
                <td> $oneData->phone</td>

              <td> $oneData->subject</td>
                <td> $oneData->message</td>

<td>




                     <a href='tel:$oneData->phone' class='btn btn-block btn-info'>Call</a>
                </td>
     </tr>
            ";


        }

        ?>
    </table>
