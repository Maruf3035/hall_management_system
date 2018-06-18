<?php
require_once('../../../../../vendor/autoload.php');

if (!isset($_SESSION)) session_start();

use App\Message\Message;
//use App\HallManagement\HallManagement;
use App\UserManagement\UserManagement;


if ((!isset($_SESSION['role'])) && ($_SESSION['role'] != 'ADMIN')) {
    Message::message("Please Login");
    die("<script>location.href='../frontPage/'</script>");
}
if ((isset($_SESSION['role'])) && ($_SESSION['role'] != 'ADMIN')) {
    //Message::message("Please Login");
    die("<script>location.href='../frontPage/'</script>");
}

require_once('../../header.php');
//require_once("slider.php");
// dear masons member add your php code here...


$objUser = new UserManagement();
$objUser->setData($_GET);
$singleData = $objUser->userView();


//App\Utility\Utility::dd($singleData);

?>
    <div class="container tableBackground wow slideInUp" style="margin-top: 100px">
        <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
            <h1>Update User</h1>
            <hr>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="first_name"
                               value="<?php echo $singleData->first_name ?>"/>
                    </div>
                </div>
                <br>

                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="last_name"
                               value="<?php echo $singleData->last_name ?>"/>
                    </div>
                </div>
                <br>

                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                        <input type="email" class="form-control" name="email" value="<?php echo $singleData->email ?>"/>
                    </div>
                </div>
                <br>

                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="number" class="form-control" name="phone"
                               value="<?php echo $singleData->phone ?> placeholder=" Enter Phone Number"/>
                    </div>
                </div>
                <br>

                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password"
                               value="<?php echo $singleData->password ?>" "/>
                    </div>
                </div>
                <br>
                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="role_id"
                               value="<?php echo $singleData->role_id ?>" "/>
                    </div>
                </div>
                <br>

                <div class="form-group-lg">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="address"
                               value="<?php echo $singleData->address ?>"'/>
                    </div>
                </div>

                    <div class="form-group ">
                        <input type="submit" id="button" class="btn btn-primary btn-lg  login-button" value="Update">
                        <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/index.php" class="btn btn-primary btn-lg login-button" >Back</a>
                    </div>
            </form>
        </div>
        </div>


<?php
//include_once("../../footer.php");
?>