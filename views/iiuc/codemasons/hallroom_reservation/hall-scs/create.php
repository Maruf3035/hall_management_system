<head>
    <script>
        function ValidateContactForm()
        {
            var hall_name = document.ContactForm.hall_name;
            var hall_contact = document.ContactForm.hall_contact;
            var hall_rent= document.ContactForm.hall_rent;
            var hall_capacity = document.ContactForm.hall_capacity;
            var hall_email = document.ContactForm.hall_email;
            var hall_address= document.ContactForm.hall_address;
            var hall_floor= document.ContactForm.hall_floor;
            var hall_summary= document.ContactForm.hall_summary;
            var hall_logo= document.ContactForm.hall_logo;
            var hall_images= document.ContactForm.hall_images;

            if (hall_name.value == "")
            {
                window.alert("Please enter Hall name.");
                hall_name.focus();
                return false;
            }
            if (hall_rent.value=="" )
            {
                window.alert("Please enter Hall Rent");
                hall_rent.focus();
                return false;
            }
            if(  hall_capacity.value=""){
                window.alert("Please enter Capacity of hall");
                hall_capacity.focus();
                return false;
            }



            if (email.value == "")
            {
                window.alert("Please enter a valid e-mail address.");
                email.focus();
                return false;
            }
            if (email.value.indexOf("@", 0) < 0)
            {
                window.alert("Please enter a valid e-mail address.");
                email.focus();
                return false;
            }
            if (email.value.indexOf(".", 0) < 0)
            {
                window.alert("Please enter a valid e-mail address.");
                email.focus();
                return false;
            }

            if (hall_contact.value == "")
            {
                window.alert("Please enter hall contact.");
                hall_contact.focus();
                return false;
            }

            if (hall_address.value == "")
            {
                window.alert("Please provide a hall address.");
                hall_address.focus();
                return false;
            }


            if (hall_summary.value == "")
            {
                window.alert("Please enter about hall.");
                hall_summary.focus();
                return false;
            }


            if (hall_logo.value == "")
            {
                window.alert("Please select hall logo.");
                hall_logo.focus();
                return false;
            }if (hall_floor.checked =="")
            {
                window.alert("Please select available hall floor.");
                hall_floor.focus();
                return false;
            }if (hall_images.value == "")
            {
                window.alert("Please select available hall floor.");
                hall_images.focus();
                return false;
            }
            return true;
        }

        function EnableDisable(chkbx)
        {
            if(chkbx.checked == true)
            {
                document.ContactForm.Telephone.disabled = true;
            }
            else
            {
                document.ContactForm.Telephone.disabled = false;
            }
        }
        function stringlength(inputtxt, minlength, maxlength)
        {
            var field = inputtxt.value;
            var mnlen = minlength;
            var mxlen = maxlength;

            if(field.length<mnlen || field.length> mxlen)
            {
                alert("Please input the userid between " +mnlen+ " and " +mxlen+ " characters");
                return false;
            }
            else
            {
                alert('Your userid have accepted.');
                return true;
            }
        }
    </script>
    </head>
<?php

include_once('../../../../../vendor/autoload.php');

if (!isset($_SESSION)) session_start();
use App\Message\Message;
use App\UserManagement\RoleManagement;


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


include_once('../../header_for_dashboard.php');
//require_once("slider.php");

?>


<div class="container tableBackground wow slideInUp">
    <h2 class="wow slideInUp text-center"></h2>
    <hr>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <form action="store.php" method="post" enctype="multipart/form-data" name="ContactForm" onsubmit="return ValidateContactForm();" class="form-horizontal">
                <h2 style="text-align: center;padding-top: 5px;"> Create Hall </h2>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Hall Name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="hall_name"
                               placeholder="Enter Hall Name Here.....">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label"> Contact Number </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="number" name="hall_contact"
                               placeholder="Enter Hall Official Contact Number">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label">Hall Rent </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rent" name="hall_rent"
                               placeholder="Enter Hall Rent Here....">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label"> Hall Capacity </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="capacity" name="hall_capacity"
                               placeholder="Enter Hall Capacity Here.....">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label"> Email </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="hall_email"
                               placeholder="Enter Hall Official Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Address </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="address" name="hall_address" rows="4"
                                  placeholder="Hall Address"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hall_content" class="col-sm-2 control-label"> Hall Summary </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="hall_content" name="hall_summary" rows="6"
                                  placeholder="Enter Hall Summary"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="floor" class="col-sm-2 control-label"> Avilable Floor </label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="1st Floor" name="hall_floor[]"> 1st Floor
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="2nd Floor" name="hall_floor[]"> 2nd Floor
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="3rd Floor" name="hall_floor[]"> 3rd Floor
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="4th Floor" name="hall_floor[]"> 4th Floor
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="5th Floor" name="hall_floor[]"> 5th Floor
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hall_logo" class="col-sm-2 control-label"> Logo </label>
                    <div class="col-sm-10">
                        <input type="file" id="hall_logo" name="hall_logo" class="form-control"
                               accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>

                <div class="form-group">
                    <label for="hall_image" class="col-sm-2 control-label"> Hall Images </label>
                    <div class="col-sm-10">
                        <input type="file" id="hall_image" name="hall_images[]" class="form-control" multiple="multiple"
                               accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>


                <h3 class="avilable_service text-center text-uppercase"> Avilable Services </h3>
                <div class="row">
                    <div class="col-sm-4 wow fadeInRight" data-wow-duration="1s">
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Food & Beverage'> Food &
                                Beverage </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Water Service'> Water Service
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Decoration'> Decoration
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Lighting'> Lighting </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Staging'> Staging </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Catering'> Catering </label>
                        </div>
                    </div> <!-- end col-md-4 -->

                    <div class="col-sm-4 wow fadeInRight" data-wow-duration="1.5s">
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Flower'> Flower </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Beauty Parlour'> Beauty Parlour
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Photography'> Photography
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Exhibition'> Exhibition
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Sound System'> Sound System
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='HD Projector'> HD Projector
                            </label>
                        </div>
                    </div> <!-- end col-md-4 -->

                    <div class="col-sm-4 wow fadeInRight" data-wow-duration="2s">
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Wifi'> Wifi </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Air Condition'> Air Condition
                            </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Parking'> Parking </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Generator'> Power / Generator
                                24x7 </label>
                        </div>
                        <div class='checkbox wow bounce'>
                            <label> <input type='checkbox' name='hall_services[]' value='Transportation Service'>
                                Transportation Service </label>
                        </div>
                    </div> <!-- end col-md-4 -->
                </div> <!-- end row -->

                <br>
                <div class="col-sm-offset-2 col-sm-offset-8">
                    <button class="btn btn-danger col-xs-offset-5 col-xs-3" type="reset"> Reset</button>
                    <button class="btn btn-success col-xs-offset-1 col-xs-3" type="submit"> Submit</button>
                </div>

            </form> <!-- end create form here -->
        </div> <!-- end col-sm-8 -->
    </div> <!-- end row -->
</div>  <!-- end container -->

<?php // include_once("../../footer.php"); ?>
