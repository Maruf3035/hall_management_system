<?php

include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();



use App\Message\Message;



use App\Hall\Hall;
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

include_once('../../header.php');
//require_once("slider.php");



$objHall=new Hall();
$objHall->setHallData($_GET);
$objHall->recover();
die("<script>location.href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/multiple_edit.php'</script>");





?>