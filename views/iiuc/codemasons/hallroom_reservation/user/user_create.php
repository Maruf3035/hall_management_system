<head>
<script>
    function ValidateContactForm()
    {
        var first_name = document.ContactForm.first_name;
        var last_name = document.ContactForm.last_name;
        var email = document.ContactForm.email;
        var phone = document.ContactForm.phone;
        var address = document.ContactForm.address;
        var role = document.ContactForm.role_id;

        if (first_name.value == "")
        {
            window.alert("Please enter First name.");
            first_name.focus();
            return false;
        }
         if (last_name.value.length < 6 )
        {
            window.alert("Please enter min 6 character last name");
            last_name.focus();
            return false;
        }
        if(  last_name.value.length >10){
            window.alert("Please enter max 10 character last name");
            last_name.focus();
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

        if (phone.value == "")
        {
            window.alert("Please enter your telephone number.");
            phone.focus();
            return false;
        }

        if (address.value == "")
        {
            window.alert("Please provide a address.");
            address.focus();
            return false;
        }


        if (role_id.value == "")
        {
            window.alert("Please enter role.");
            role_id.focus();
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
            <form action="create_process.php" name="ContactForm" method="post" onsubmit="return ValidateContactForm();" enctype="multipart/form-data" class="form-horizontal">
                <h2 style="text-align: center;padding-top: 5px;"> Create User(Admin/Moderator) </h2>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> First Name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               placeholder="Enter  first name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Last Name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               placeholder="Enter  last name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label"> Contact Number </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="number" name="phone"
                               placeholder="Enter Contact Number">
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label"> Email </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter email">
                    </div>
                </div><div class="form-group">
                    <label for="password" class="col-sm-2 control-label"> Password </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Address </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="address" name="address" rows="4"
                                  placeholder="Enter Address"></textarea>
                    </div>
                </div><div class="form-group">
                    <label for="role_id" class="col-sm-2 control-label"> User Role </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="role_id" name="role_id" rows="4"
                               placeholder="Enter user role">                    </div>
                    <!-- end row -->

                    <br>
                    <br>
                    <br>
                    <br>
                    <div style="float: left;position: relative;left: 50%;">
                        <button class="btn btn-danger " type="reset"> Reset</button>
                        <button class="btn btn-success " type="submit"> Submit</button>
                    </div>
                </div>
        </div>

        </form> <!-- end create form here -->
    </div> <!-- end col-sm-8 -->
</div> <!-- end row -->
</div>  <!-- end container -->

<?php // include_once("../../footer.php"); ?>
