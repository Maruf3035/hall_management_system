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
/*if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}*/
$msg = Message::message();
include_once('../../header_for_dashboard.php');

//include_once('../../header.php');
//require_once("slider.php");
include_once("../../header_for_dashboard.php");
// dear masons member add your php code here...



$objbook=new \App\bookNow\bookNow();
$objbook->setData($_GET);
$oneData=$objbook->view_by_booking_id();


if(isset($_GET['Yes']) && $_GET['Yes']==1){
    $objbook->delete_booking();
    $_GET['Yes'] = 0;
    if ($_SESSION['role'] == "ADMIN"){
    die("<script>location.href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/index.php'</script>");
}else{
        die("<script>location.href=pending_bookingList.php</script>");
    }
}if(isset($_GET['Yes']) && $_GET['Yes']==0){
    //pending_bookingList.phpdelete_booking();
    //$_GET['Yes'] = 0;
    if ($_SESSION['role'] == "USER"){
    die("<script>location.href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/index.php'</script>");
}else{
        die("<script>location.href=pending_bookingList.php</script>");
    }
}


?>

<div class="container tableBackground wow slideInUp">

    <div class="bg-primary">
        <h2 style="padding-topanding_bookingList.php="text-warning text-center"> You want to delete this hall! Are you sure? </h2>
        <?php
        echo "
          <a href='delete.php?booking_id=$oneData->booking_id&Yes=1' class='btn btn-danger'>Yes</a>
          <a href='delete.php?booking_id=$oneData->booking_id&Yes=0' class='btn btn-success'>NO</a>

        ";

        ?>
    </div>


<?//php include_once("../../footer.php"); ?>
