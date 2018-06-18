<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;

include_once('../../header.php');
//require_once("slider.php");
include_once("../../header_for_dashboard.php");
// dear masons member add your php code here...


use App\Hall\Hall;
$objHall=new Hall();
$objHall->setHallData($_GET);
$oneData=$objHall->view();

?>

<div class="container tableBackground wow slideInUp">
    <h2 class="wow slideInUp" style="text-align: center;padding-top: 50px;"> Details of <?php  echo $oneData->hall_name ?> </h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="padding: 30px">
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall ID </td> <td class="col-md-9"> <?php  echo $oneData->hall_id ?>  </td>   </tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Name </td>   <td class="col-md-9"> <?php  echo $oneData->hall_name ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Logo  </td><td class="col-md-9"><img src="<?php  echo $oneData->hall_logo ?>" alt="Logo not uploaded">  </td></tr>

            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Capacity </td><td class="col-md-9"> <?php  echo $oneData->hall_capacity ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Rent </td><td class="col-md-9"> <?php  echo $oneData->hall_rent ?>  </td></tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Email </td><td class="col-md-9"> <?php  echo $oneData->hall_email ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Avilable Floor  </td><td class="col-md-9"> <?php  echo $oneData->hall_floor ?>  </td></tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Avilable Serivces </td><td class="col-md-9"> <?php  echo $oneData->hall_services ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Summary </td><td class="col-md-9"> <?php  echo $oneData->hall_summary ?>  </td></tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Contact </td><td class="col-md-9"> <?php  echo $oneData->hall_contact ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Address </td><td class="col-md-9"> <?php  echo $oneData->hall_address ?>  </td></tr>

        </table><br>
 <?php
        echo "<a href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin' class='btn  btn-primary'> Back </a>

"; ?>
    </div>

</div>  <!-- end container -->

<?//php include_once("../../footer.php"); ?>
