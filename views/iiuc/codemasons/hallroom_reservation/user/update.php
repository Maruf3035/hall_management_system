<?php

require_once("../../../../../vendor/autoload.php");

if ((isset($_SESSION['role'])) && ($_SESSION['role'] != 'ADMIN')) {
    //Message::message("Please Login");
    die("<script>location.href='../frontPage/'</script>");
}
use App\UserManagement\UserManagement;

$objUser = new UserManagement();
$objUser->setData($_REQUEST);

$objUser->update();
