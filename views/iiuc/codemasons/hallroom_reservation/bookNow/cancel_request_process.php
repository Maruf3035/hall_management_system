<?php
require_once("../../../../../vendor/autoload.php");


$object = new \App\bookNow\bookNow();

$object->setData($_GET);

$object->cancel_request();