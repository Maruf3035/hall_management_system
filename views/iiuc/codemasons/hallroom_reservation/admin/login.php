<?php
if (!isset($_SESSION)) session_start();
include_once('../../../../../vendor/autoload.php');
use App\UserManagement\Authentication;
use App\UserManagement\RoleManagement;
use App\Message\Message;
use App\Utility\Utility;


$auth = new Authentication();
$status = $auth->setData($_POST)->is_registered();
$role = $auth->select_role()->role_id;

/*
$objRole=new RoleManagement();
$objRole->select_role();*/
//\App\Utility\Utility::dd($role);

//set email and role in the session.
if ($status) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['role'] = $role;
    //\App\Utility\Utility::dd($_SESSION);
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    //echo "Admin Login Successful";
    //sleep(3);
    if ($role == 'ADMIN') {
        Utility::redirect('index.php');
    } elseif ($role == 'USER') {
        Utility::redirect('user_profile.php');
    }
} else {
    Utility::redirect('../frontPage/index.php');
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");
    echo "Login Unsuccessful";
    Utility::redirect('../frontPage/index.php');

}


