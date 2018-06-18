<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\UserManagement\UserManagement;
use App\UserManagement\Authentication;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Authentication();
$status= $auth->log_out();

session_destroy();
session_start();

Message::message("
                <div class=\"alert alert-success\">
                            <strong>Logout!</strong> You have been logged out successfully.
                </div>");
Utility::redirect('../frontPage/index.php');