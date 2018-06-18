<?php

include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();



use App\Message\Message;
use App\UserManagement\UserManagement;
use App\Utility\Utility;

if(!isset($_SESSION) )session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect("../frontPage/index.php");
}
if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}

//include_once('../../header_for_dashboard.php');
//require_once("slider.php");



$objuser=new UserManagement();
$objuser->setData($_REQUEST);
$objuser->store();
die("<script>location.href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/index.php'</script>");





?>