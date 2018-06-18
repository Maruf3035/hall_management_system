<head>
    <link rel="stylesheet" href="../../../../../resource/js/jquery-ui.css">
    <script type="text/javascript" src="../../../../../resource/js/jquery.js"></script>
    <script type="text/javascript" src="../../../../../resource/js/jquery-ui.js"></script>

</head>
<script>
    $( function() {
        $( "#datepicker" ).datepicker({ minDate: -0, maxDate: "+1M +10D" });
        $( "#format" ).on( "change", function() {
            $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
        });
    } );
</script>
<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();

use App\Message\Message;
use App\UserManagement\UserManagement;
use App\Hall\Hall;
use App\Utility\Utility;

$msg = Message::message();


if (!isset($_SESSION['email'])) Utility::redirect("../frontPage/");
if(!isset($_SESSION) )session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect("../frontPage/index.php");
}

include_once('../../header.php');
//require_once("slider.php");
//include_once("../../slider2.php");
// dear masons member add your php code here...

$objBook= new Hall();
$objBook->setHallData($_GET);
$oneData=$objBook->view();

$objUser= new UserManagement();
$objUser->setData($_SESSION);
$userDetails=$objUser->booking_view();
//Utility::dd($objUser->booking_view());

?>

<div class="container-fluid">
    <h3 style="margin-top: 12%; color: white" class="client_logo_heading wow fadeInUp"data-wow-duration="1s" data-wow-delay="700ms"> Booking Information of <?php  echo $oneData->hall_name ?> </h3>
    <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>"; ?>

</div>

<div class="container-fluid tableBackground wow slideInUp">

    <div class="row">

        <div class="col-md-6">
<!-- form started -->
            <form action="booknowporcess.php" method="post" ">
                <div class="table-responsive">
                    <table class="wow slideInUp table-bordered" data-wow-duration="1s" data-wow-delay="100ms">
                        <h2 style="background-color: grey;height:40px;border-radius: 15px;text-align: center; ">Customer Information</h2><hr>

                        <tr>
                            <td class="col-md-3">   Event Name  </td>
                            <td class="col-md-9">  <select name="event_name" required="1" class=" input form-control"style="background-color: white">
                                    <option > Select A Event Type </option>
                                    <option > Wedding Program</option>
                                    <option> Meeting </option>
                                    <option> Birth Day Party </option>
                                    <option> Family Party </option>
                                    <option> Seminar</option>
                                    <option> </option>
                                </select>
                        </tr>

                        <tr>
                            <td class="col-md-3">

                                Booking Date </td>
                            <td class="col-md-9">

                                    <select id="format" required="1" class="input form-control" style="background-color: white">

                                        <option >Select Date Format</option>
                                        <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>

                                    </select>
                                <input class="input form-control" type="text" id="datepicker" value="mm/dd/yy" name="booking_date" style="
                            background-color: white">  </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">  Booking Time  </td>
                            <td class="col-md-9">  <select name="booking_time" required="1" class=" input form-control "style="background-color: white">
                                    <option > Select Booking Time </option>
                                    <option > Day</option>
                                    <option > Night</option>
                                    <option> </option>
                                </select>
                        </tr>
                        <tr>
                            <td class="col-md-3">   Number of Person </td>
                            <td class="col-md-9">   <input name="total_person" type="number" required="1" class="input form-control" type="text" style="background-color: white"placeholder="Enter your number of guest..."> </td>
                        </tr>

                        <tr>
                            <td class="col-md-3">   Number of Floor </td>
                            <td class="col-md-9">   <input name="floor_number" type="number" required="1" class="input form-control"style="background-color: white" type="text"  </td>
                        </tr>

                        <tr>
                            <td class="col-md-3">   Customer Name </td>
                            <td class="col-md-9">   <input class="input form-control"  required="1" type="text" name="customer_name" value=" <?php echo $userDetails['first_name']." ".$userDetails['last_name']?>" readonly> </td>
                        </tr>

                            <td class="col-md-3">   Customer Phone Number</td>
                            <td class="col-md-9">   <input class="input form-control" type="number" required="1" name="phone_number" value="<?php echo $userDetails['phone'] ?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="col-md-3">   Customer Email</td>
                            <td class="col-md-9">   <input class="input form-control" type="email" required="1" name="customer_email" value="<?php echo $userDetails['email'] ?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="col-md-3">   Customer Address</td>
                            <td class="col-md-9">   <input class="input form-control" type="text" required="1" name="customer_address" value="<?php echo $userDetails['address'] ?>" readonly></td>
                        </tr>
                        <tr>




                        <tr>
                            <td class="col-md-3">   Choose your Services</td>
                            <td class="col-md-9">   <input class="input form-control" name="customer_service" required="1" style="background-color: white" type="text"  </td>
                        </tr>

                    </table>

                </div> <!-- end table responsive -->
            <input type="hidden" name="hall_id" value="<?php echo $oneData->hall_id ?>">
            <input type="hidden" name="hall_name"value="<?php echo $oneData->hall_name ?>">
            <input type="hidden" name="hall_address"value="<?php echo $oneData->hall_address ?>">
            <input type="hidden" name="hall_contact"value="<?php echo $oneData->hall_contact ?>">
            <input type="hidden" name="hall_rent"value="<?php echo $oneData->hall_rent ?>">
            <input type="hidden" name="customer_id"value="<?php echo $userDetails['id'] ?>">
                <div class="col-md-offset-2 col-md-10 button">
                    <input type="reset" class="btn btn-danger btn-lg login-button col-sm-offset-1 col-sm-3" value="Reset">
                    <a href="../frontPage/index.php" class="btn btn-primary btn-lg col-sm-offset-1 col-sm-3"> Go Back </a>
                    <input type="submit" value="Check Out" class="btn btn-success btn-lg col-sm-offset-1 col-sm-3">
                </div> <!-- end button div -->


            </form>


        </div>  <!-- end col-md-6 for customer information -->



        <div class="col-md-6">
            <h2 style="background-color: grey;height:40px;border-radius: 15px;text-align: center; ">Hall Information</h2><hr>
            <table class="table table-bordered">
                <tr><td class="col-md-3"> Hall ID </td> <td class="col-md-9"> <?php  echo $oneData->hall_id ?>  </td>   </tr>
                <tr><td class="col-md-3"> Hall Name </td>   <td class="col-md-9"> <?php  echo $oneData->hall_name ?>  </td></tr>
                <tr><td class="col-md-3"> Hall Logo  </td><td class="col-md-9"><img src="<?php  echo $oneData->hall_logo ?>" alt="Logo not uploaded">  </td></tr>
                <tr><td class="col-md-3"> Hall Summary </td><td class="col-md-9"> <?php  echo $oneData->hall_summary ?>  </td></tr>
                <tr><td class="col-md-3"> Hall Contact </td><td class="col-md-9"> <?php  echo $oneData->hall_contact ?>  </td></tr>
                <tr><td class="col-md-3"> Hall Address </td><td class="col-md-9"> <?php  echo $oneData->hall_address ?>  </td></tr>
                <tr><td class="col-md-3"> Hall Capacity </td><td class="col-md-9"> <?php  echo $oneData->hall_capacity ?>  </td></tr>
                <tr><td class="col-md-3"> Hall Rent </td><td class="col-md-9"> <?php  echo $oneData->hall_rent ?>  </td></tr>
                <tr><td class="col-md-3"> Hall Email </td><td class="col-md-9"> <?php  echo $oneData->hall_email ?>  </td></tr>
                <tr><td class="col-md-3"> Avilable Floor  </td><td class="col-md-9"> <?php  echo $oneData->hall_floor ?>  </td></tr>
                <tr><td class="col-md-3"> Avilable Serivces </td><td class="col-md-9"> <?php  echo $oneData->hall_services ?>  </td></tr>

            </table>
        </div> <!-- end col-md-6 -->


    </div> <!-- end row  -->







</div>


<?php
include_once("../../footer.php")
?>
