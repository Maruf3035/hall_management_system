<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();

if ((isset($_SESSION['role'])) && ($_SESSION['role'] != 'ADMIN')) {
    //Message::message("Please Login");
    die("<script>location.href='../frontPage/'</script>");
}

use App\Message\Message;
use App\UserManagement\UserManagement;

include_once('../../header.php');
//require_once("slider.php");
//include_once("../../slider2.php");
// dear masons member add your php code here...

$objUserManagement=new UserManagement();
$objUserManagement->setData($_GET);
$oneData=$objUserManagement->userView();

//\App\Utility\Utility::dd($oneData);

?>

<div class="container tableBackground wow slideInUp" style="margin-top: 100px">

    <h1 style="text-align: center">Our Client View</h1><hr>

    <table class="table table-bordered ">
        <tr style="background-color: rgba(4,25,30,0.74)">
            <th class="text-center"> ID </th>
            <th class="text-center"> User Name </th>
            <th class="text-center"> Email ID </th>
            <th class="text-center"> Address </th>
            <th class="text-center"> Mobile No </th>
            <th class="text-center"> User Role </th>
            <th class="text-center"> Action Button </th>
        </tr>



<?php

    echo "

        <tr>
            <td>$oneData->id</td>
            <td>$oneData->first_name $oneData->last_name</td>
            <td>$oneData->email</td>
            <td>$oneData->address</td>
            <td>$oneData->phone</td>
            <td>$oneData->role_id</td>
            <td>
                <a href='edit.php?hall_id=$oneData->id' class='btn btn-block btn-warning'>Edit This User</a> 
                <a href='index.php' class='btn btn-block btn-success'> Back To Active List </a>
            </td>
        </tr>

    
    </table>
    
    
    
" ;


    ?>
</div>

<?php
include_once("../../footer.php")
?>
