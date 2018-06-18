<?php

require_once("../../../../../vendor/autoload.php");


//\App\Utility\Utility::dd($_POST);


$objBookNow = new App\bookNow\bookNow();
//$objBookNow->setData($_POST);
//var_dump($_REQUEST);
 $objBookNow->setData($_REQUEST);
$objBookNow->invoice();
//$objBookNow->setPayment();

/*if(isset($_REQUEST)) {
    $customer_id = $_REQUEST['customer_id']    ;

    \App\Utility\Utility::redirect("booking_view_by_customer.php?customer_id=$customer_id");
}*/