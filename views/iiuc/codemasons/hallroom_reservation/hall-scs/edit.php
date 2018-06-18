<?php
include_once('../../../../../vendor/autoload.php');
use App\Message\Message;

use App\Utility\Utility;
use App\Hall\Hall;

if(!isset($_SESSION) )session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect("../frontPage/index.php");
}
if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}
$msg = Message::message();
include_once('../../header_for_dashboard.php');

include_once('../../header.php');
$objHall=new Hall();
$objHall->setHallData($_GET);
$oneData=$objHall->view();



?>

<div class="container tableBackground wow slideInUp forTopMargin">
    <h2 class="wow slideInUp" style="text-align: center"> Update Hall  Inforamtion</h2><hr>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <form action="update.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Hall Name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="hall_name" value="<?php  echo $oneData->hall_name  ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label"> Contact Number </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="number" name="hall_contact" value="<?php echo $oneData->hall_contact?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label">Hall Rent </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rent" name="hall_rent" value="<?php echo $oneData->hall_rent  ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label"> Hall Capacity  </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="capacity" name="hall_capacity" value="<?php echo $oneData->hall_capacity  ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label"> Email </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="hall_email" value="<?php echo $oneData->hall_email  ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Address </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="address" name="hall_address" rows="4" ><?php echo $oneData->hall_address   ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hall_content" class="col-sm-2 control-label"> Hall Summary </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="hall_content" name="hall_summary" rows="6"><?php  echo $oneData->hall_summary     ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="floor" class="col-sm-2 control-label"> Avilable Floor  </label>
                    <div class="col-sm-10">
<?php

$stringToArray = explode(',',$oneData->hall_floor);
$result = array_count_values($stringToArray);

    if(isset($result['1st Floor']) && $result['1st Floor']==1){
        echo "<label class='checkbox-inline'><input type='checkbox' value='1st Floor' name='hall_floor[]' checked> 1st Floor </label>";
    }else{
        echo "<label class='checkbox-inline'><input type='checkbox' value='1st Floor' name='hall_floor[]'> 1st Floor</label>";
    }

    if(isset($result['2nd Floor']) && $result['2nd Floor']==1){
        echo "<label class='checkbox-inline'><input type='checkbox' value='2nd Floor' name='hall_floor[]' checked> 2nd Floor</label>";
    }else{
        echo "<label class='checkbox-inline'><input type='checkbox' value='2nd Floor' name='hall_floor[]'> 2nd Floor</label>";
    }

    if(isset($result['3rd Floor']) && $result['3rd Floor']==1){
        echo "<label class='checkbox-inline'><input type='checkbox' value='3rd Floor' name='hall_floor[]' checked> 3rd Floor</label>";
    }else{
        echo "<label class='checkbox-inline'><input type='checkbox' value='3rd Floor' name='hall_floor[]'> 3rd Floor</label>";
    }

    if(isset($result['4th Floor']) && $result['4th Floor']==1){
        echo "<label class='checkbox-inline'><input type='checkbox' value='4th Floor' name='hall_floor[]' checked> 4th Floor</label>";
    }else{
        echo "<label class='checkbox-inline'><input type='checkbox' value='4th Floor' name='hall_floor[]'> 4th Floor</label>";
    }

    if(isset($result['5th Floor']) && $result['5th Floor']==1){
        echo "<label class='checkbox-inline'><input type='checkbox' value='5th Floor' name='hall_floor[]' checked> 5th Floor</label>";
    }else{
        echo "<label class='checkbox-inline'><input type='checkbox' value='5th Floor' name='hall_floor[]'> 5th Floor</label>";
    }

?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hall_logo" class="col-sm-2 control-label"> Logo </label>
                    <div class="col-sm-10">
                        <input type="file" id="hall_logo" name="hall_logo" class="form-control" accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>

                <div class="form-group">
                    <label for="hall_image" class="col-sm-2 control-label"> Hall Images </label>
                    <div class="col-sm-10">
                        <input type="file" id="hall_image" name="hall_images[]" class="form-control" multiple="multiple" accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>


                <h3 class="avilable_service text-center text-uppercase">  Avilable Services  </h3>
                <div class="row">

<?php


$stringToArray = explode(',',$oneData->hall_services);
$service_result = array_count_values($stringToArray);

echo "<div class='col-sm-4 wow fadeInRight' data-wow-duration='1s'>";
    if(isset($service_result['Food & Beverage']) && $service_result['Food & Beverage'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Food & Beverage' checked> Food & Beverage </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Food & Beverage'> Food & Beverage </label></div>";
    }

    if(isset($service_result['Water Service']) && $service_result['Water Service'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Water Service' checked> Water Service </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Water Service'> Water Service </label></div>";
    }

    if(isset($service_result['Decoration']) && $service_result['Decoration'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Decoration' checked> Decoration </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Decoration'> Decoration </label></div>";
    }
    if(isset($service_result['Lighting']) && $service_result['Lighting'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Lighting' checked> Lighting </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Lighting'> Lighting </label></div>";
    }
    if(isset($service_result['Staging']) && $service_result['Staging'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Staging' checked> Staging </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Staging'> Staging </label></div>";
    }
    if(isset($service_result['Catering']) && $service_result['Catering'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Catering' checked> Catering </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Catering'> Catering </label></div>";
    }
echo "</div>";



echo "<div class='col-sm-4 wow fadeInRight' data-wow-duration='1s'>";

    if(isset($service_result['Flower']) && $service_result['Flower'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Flower' checked> Flower </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Flower'> Flower </label></div>";
    }
    if(isset($service_result['Beauty Parlour']) && $service_result['Beauty Parlour'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Beauty Parlour' checked> Beauty Parlour </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Beauty Parlour'> Beauty Parlour </label></div>";
    }
    if(isset($service_result['Photography']) && $service_result['Photography'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Photography' checked> Photography </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Photography'> Photography </label></div>";
    }
    if(isset($service_result['Exhibition']) && $service_result['Exhibition'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Exhibition' checked> Exhibition </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Exhibition'> Exhibition </label></div>";
    }
    if(isset($service_result['Sound System']) && $service_result['Sound System'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Sound System' checked> Sound System </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Sound System'> Sound System </label></div>";
    }

    if(isset($service_result['HD Projector']) && $service_result['HD Projector'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='HD Projector' checked> HD Projector </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='HD Projector'> HD Projector </label></div>";
    }

echo "</div>";




echo "<div class='col-sm-4 wow fadeInRight' data-wow-duration='1s'>";
    if(isset($service_result['Wifi']) && $service_result['Wifi'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Wifi' checked> Wifi </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Wifi'> Wifi </label></div>";
    }
    if(isset($service_result['Air Condition']) && $service_result['Air Condition'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Air Condition' checked> Air Condition </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Air Condition'> Air Condition </label></div>";
    }
    if(isset($service_result['Parking']) && $service_result['Parking'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Parking' checked> Parking </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Parking'> Parking </label></div>";
    }
    if(isset($service_result['Generator']) && $service_result['Generator'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Generator' checked> Generator </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Generator'> Generator </label></div>";
    }
    if(isset($service_result['Transportation Service']) && $service_result['Transportation Service'] = 1){
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Transportation Service' checked> Transportation Service </label></div>";
    }else{
        echo "<div class='checkbox wow bounce'><label> <input type='checkbox' name='hall_services[]' value='Transportation Service'> Transportation Service </label></div>";
    }

?>
                    <input type="hidden" name="hall_id" value="<?php echo $oneData->hall_id ?>">
                </div> <!-- last column -->

                </div> <!-- end row -->
                <div class="clearfix"></div>
                <div class="col-sm-offset-2 col-sm-offset-8" id="submitHallForm">
                    <button class="btn btn-danger col-xs-3" type="reset"> Reset </button>
                    <button class="btn btn-success col-xs-offset-1 col-xs-3" type="submit"> Submit  </button><span>&nbsp;&nbsp;&nbsp;</span>
        <a href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/' class='btn  btn-primary'> Back </a>
                </div>

            </form> <!-- end create form here -->
        </div> <!-- end col-sm-8 -->
    </div> <!-- end row -->
</div>  <!-- end container -->

<?php// include_once("../../footer.php"); ?>
