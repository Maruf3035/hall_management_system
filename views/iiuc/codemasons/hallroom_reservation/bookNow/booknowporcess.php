<?php

require_once("../../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Message\Message;
//\App\Utility\Utility::dd($_POST);






$objBookNow = new App\bookNow\bookNow();



$objBookNow->setData($_REQUEST);
$current_date=$_REQUEST['booking_date'];
$current_time=$_REQUEST['booking_time'];
//var_dump($current_time);
$result=$objBookNow->date_checking($_REQUEST['hall_id'],$current_date);

    if($result) {
        Message::message("Failed! :)Your selected date or time on this day was already booked!! please check the availabe date and time from hall details!<br>");
        \App\Utility\Utility::redirect("http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/index.php");


    }

else{
    $objBookNow->store();
            $customer_id = $_REQUEST['customer_id']    ;

        \App\Utility\Utility::redirect("http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/user_profile.php?customer_id=$customer_id");
    }


//var_dump(array_keys($allDate,"$current_date",true));
//var_dump($var);
