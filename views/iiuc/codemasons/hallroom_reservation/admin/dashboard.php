<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\UserManagement\RoleManagement;
use App\Utility\Utility;
use App\Message\Message;
$msg = Message::message();
if (!isset($_SESSION['role'])=='ADMIN') Utility::redirect("../frontpage/");
if (!isset($_SESSION['role'])=='MODERATOR') Utility::redirect("../frontpage/");

$menu= new RoleManagement();
$menu->setData(array('role_name'=>$_SESSION['role']));
$menu_set=$menu->module_array();

//Utility::dd($menu_set);

?>

<!doctype html>
<html lang="en" xmlns:http="http://www.w3.org/1999/xhtml">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resource/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../../resource/bootstrap/css/main.min.css">


    <style>
        #wrapper .sidebar {
            position: relative;
        }
        .dropdown {
            background-color: #20262E;
        }
        .dropdown:hover {
            background-color: #0AF;;
        .memberName{
            background-color: #fff;
            padding:5px;
            border-radius:3px;
        }

    </style>
</head>

<body>
<!-- WRAPPER -->

<div id="wrapper">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage"><img src="../../../../../resource/images/logo-codemasons_black.gif" alt=""> </a>
        </div>


                    <?php

                            foreach ($menu_set as $menu){

                                echo $menu['role_module'];
                                echo "<li class='dropdown'><a href=".$menu['create_link']." class=''>Create</a></li>" ;
                                echo "<li class='dropdown'><a href=".$menu['view_link']." class=''>View</button></a></li>" ;
                                echo "<li class='dropdown'><a href=".$menu['edit_link']." class=''>Edit</button></a></li>" ;
                            }

                    ?>

        </div>
    </div>

    <!-- END SIDEBAR -->
    <!-- MAIN -->

