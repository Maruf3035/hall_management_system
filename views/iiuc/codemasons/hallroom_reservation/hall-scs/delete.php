<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Utility\Utility;
use App\Hall\Hall;
use App\Message\Message;

if(!isset($_SESSION) )session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect("../frontPage/index.php");
}
if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}
$msg = Message::message();
include_once('../../header_for_dashboard.php');

//include_once('../../header.php');
//require_once("slider.php");
include_once("../../header_for_dashboard.php");
// dear masons member add your php code here...



$objHall=new Hall();
$objHall->setHallData($_GET);
$oneData=$objHall->view();


if(isset($_GET['Yes']) && $_GET['Yes']==1){
   $objHall->delete();
    unlink("$oneData->hall_logo");
    unlink("$oneData->hall_images");
    $_GET['Yes'] = 0;
    die("<script>location.href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_edit.php'</script>");
}


?>

<div class="container tableBackground wow slideInUp">

    <div class="bg-primary">
        <h2 style="padding-top: 50px;" class="text-warning text-center"> You want to delete this hall! Are you sure? </h2>
        <?php
        echo "
          <a href='delete.php?hall_id=$oneData->hall_id&Yes=1' class='btn btn-danger'>Yes</a>
          <a href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_edit.php' class='btn btn-success'>No</a>
        ";

        ?>
    </div>


    <h2 class="wow slideInUp" style="text-align: center"> Hall Details </h2>
    <div class="table-responsive">
        <table class="table table-bordered">

            <tr><td class="col-md-3"> Hall ID </td> <td class="col-md-9"> <?php  echo $oneData->hall_id ?>  </td>   </tr>
            <tr><td class="col-md-3"> Hall Name </td>   <td class="col-md-9"> <?php  echo $oneData->hall_name ?>  </td></tr>
            <tr><td class="col-md-3"> Hall Logo  </td><td class="col-md-9"><img src="<?php  echo $oneData->hall_logo ?>" alt="Logo not uploaded">  </td></tr>
            <tr><td class="col-md-3"> Hall Contact </td><td class="col-md-9"> <?php  echo $oneData->hall_contact ?>  </td></tr>
            <tr><td class="col-md-3"> Hall Address </td><td class="col-md-9"> <?php  echo $oneData->hall_address ?>  </td></tr>
            <tr><td class="col-md-3"> Hall Capacity </td><td class="col-md-9"> <?php  echo $oneData->hall_capacity ?>  </td></tr>
            <tr><td class="col-md-3"> Hall Rent </td><td class="col-md-9"> <?php  echo $oneData->hall_rent ?>  </td></tr>
            <tr><td class="col-md-3"> Hall Email </td><td class="col-md-9"> <?php  echo $oneData->hall_email ?>  </td></tr>
            <tr><td class="col-md-3"> Avilable Floor  </td><td class="col-md-9"> <?php  echo $oneData->hall_floor ?>  </td></tr>
            <tr><td class="col-md-3"> Avilable Serivces </td><td class="col-md-9"> <?php  echo $oneData->hall_services ?>  </td></tr>
            <tr><td class="col-md-3"> Hall Summary </td><td class="col-md-9"> <?php  echo $oneData->hall_summary ?>  </td></tr>
            <tr><td><a href='update.php?hall_id=<?php echo $oneData->hall_id?>' class='btn btn-group-lg btn-info'>Edit</a></td></tr>
        </table>
    </div>

</div>  <!-- end container -->


<?//php include_once("../../footer.php"); ?>
