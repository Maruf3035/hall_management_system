<?php

include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\Hall\Hall;


include_once('../../header.php');
//require_once("slider.php");

$objHall= new Hall();
$objHall->setHallData($_GET);
$objHall->trash();

die("<script>location.href='trashed.php'</script>");






?>



