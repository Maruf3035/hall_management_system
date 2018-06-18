<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use
    App\Message\Message;
use App\UserManagement\UserManagement;
use App\Utility\Utility;

if(!isset($_SESSION['role'])=='ADMIN') {
    Message::message("Please Login");
    Utility::redirect("index.php");
}

include_once('../../header_for_dashboard.php');
//require_once("slider.php");
//include_once("../../slider_by_sumon.php");
// dear masons member add your php code here...

$objUserManagement=new UserManagement();
$objUserManagement->setData($_GET);
$oneData=$objUserManagement->userView();
//echo '<pre>';   var_dump($oneData);  echo '</pre>';

//\App\Utility\Utility::dd($oneData);

if(isset($_GET['Yes']) && $_GET['Yes']==1) {
    $objUserManagement->delete();
    $_GET['Yes'] = 0;

    die("<script>location.href='index.php'</script>");

    die("<script>location.href = 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/bookNow/admin_booking_delete.php'</script>");

}

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
            <td> $oneData->id </td>
            <td> $oneData->first_name $oneData->last_name</td>
            <td>$oneData->email</td>
            <td>$oneData->address</td>
            <td>$oneData->phone</td>
            <td>$oneData->role_id</td>
            <td>
                <a href='delete.php?id=$oneData->id&Yes=1' class='btn btn-block btn-warning'>Yes</a>
                <a href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/index.php' class='btn btn-block btn-success'>No</a>
            </td>
        </tr>

    
    </table>
    
    
    
" ;


        ?>

</div>

<?php
//include_once("../../footer.php");
?>
