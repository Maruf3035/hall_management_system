<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();

use App\bookNow\bookNow;
use App\Utility\Utility;
use App\Message\Message;

$objBookingDelete=new bookNow;
///$objBookingDelete->setData($_POST['id']);
$result=$objBookingDelete->delete_booking($_POST['delete']);
if($result==TRUE){
    Message::message("Selected booking deleted");
    Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    Message::message("Selected booking can't be deleted");
    Utility::redirect($_SERVER['HTTP_REFERER']);
}