<?php

include_once('../../../../../vendor/autoload.php');

use App\Message\Message;
use App\Hall\Hall;
use App\Utility\Utility;
use App\Communication;

    $object =new Communication();
    $object->setData($_REQUEST);
    $object->store();

