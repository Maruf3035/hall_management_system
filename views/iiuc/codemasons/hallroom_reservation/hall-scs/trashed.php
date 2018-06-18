<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Hall\Hall;
use App\Utility\Utility;
use App\Message\Message;



if(!isset($_SESSION) )session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect("../frontPage/index.php");
}
if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}
//require_once("slider.php");
include_once("../../header_for_dashboard.php");
// dear masons member add your php code here...

$objHall= new Hall();
$someData=$objHall->trashed();
//Utility::dd($someData);

######################## pagination code block#1 of 2 start ######################################
//paginattion code block 1 out of 2
//set total records
$totalRecord = count($someData);
//set ***current page****.it can be come from if user select the page or if user previously set this page in session via selectin page
//or by defaulut current page

if (isset($_REQUEST['currentPage'])) $currentPage = $_REQUEST['currentPage'];
elseif (isset($_SESSION['currentPage'])) $currentPage = $_SESSION['currentPage'];
else $currentPage = 1;
$_SESSION['currentPage']=$currentPage;

//set *** item per page*** it can be come from if user select the page from dropdown option or if user previously  set current page then it store into  session or by default by programmer
if (isset($_REQUEST['itemsPerPage'])) $itemsPerPage = $_REQUEST['itemsPerPage'];
elseif (isset($_SESSION['itemsPerPage'])) $itemsPerPage = $_SESSION['itemsPerPage'];
else $itemsPerPage = 3;
$_SESSION['itemsPerPage']=$itemsPerPage;


//set the total page which will be shown  in button.total page == total button.

$totalPage = ceil($totalRecord / $itemsPerPage);



//  retieve the data from database depending on current page and itemsperpage
$someData = $objHall->indexPaginator($currentPage, $itemsPerPage);
//set the serial which is depend on current page and itemsperpage
$serial = (($currentPage - 1) * $itemsPerPage) + 1;
####################### pagination code block#1 of 2 end #########################################





?>

    <div class="container tableBackground wow slideInUp">
        <div class="test"  style="margin-top: 150px;>
        <div class="table-responsive">

            <table class="table table-bordered">
                <tr>
                    <th class="text-center"> Serial</th>
                    <th class="text-center"> Hall ID </th>
                    <th class="text-center"> Hall Name </th>
                    <th class="text-center"> Contact </th>
                    <th class="text-center"> Rent </th>
                    <th class="text-center"> Capacity </th>
                    <th class="text-center"> Email </th>
                    <th class="text-center"> Address </th>
                    <th class="text-center"> Floor </th>
                    <th class="text-center"> Logo </th>

                    <th class="text-center"> Action </th>
                </tr>

                <?php

                $serial=1;

                foreach($someData as $oneData){

                    echo "
            <tr class='text-center'>
                <td>$serial</td>
                <td>$oneData->hall_id</td>
                <td>$oneData->hall_name</td>
                <td> $oneData->hall_contact</td>
                <td> $oneData->hall_rent</td>
                <td> $oneData->hall_capacity</td>
                <td> $oneData->hall_email</td>
                <td> $oneData->hall_address</td>
                <td> $oneData->hall_floor</td>
                <td class='text-center'> <img src='$oneData->hall_logo' alt='Logo Not Uploaded' > </td>


                <td>


                    <a href='recover.php?hall_id=$oneData->hall_id' class='btn btn-block btn-success'> Recover</a>

                </td>

            </tr>
            ";
                    $serial++;

                }

                ?>
            </table>
        </div> <!-- end responsive table -->
    </div>



 <!--  ######################## pagination code block#2 of 2 start ###################################### -->
    <?php //pagination code block 2 out of 2.here use bootstrap container class and pagination class thats why pagination class should be inside into ul tag?>
    <div align="left" class="container">

        <ul class="pagination">

            <?php
            $pageMinusOne = $currentPage - 1;
            $pagePlusOne = $currentPage + 1;
            if ($currentPage > $totalPage) Utility::redirect("create.php?currentPage=$totalPage");

            //this code block execute when user click the previous button


            if ($currentPage > 1) echo "<li><a href='index.php?currentPage=$pageMinusOne'>" . "Previous" . "</a></li>";


            //this loop is used for echo the button according to total page.both are equal
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($i == $currentPage) echo '<li class="active"><a href="">' . $i . '</a></li>';//active the current page
                else  echo "<li><a href='?currentPage=$i'>" . $i . '</a></li>';

            }
            //this code block execute if user click the next button.

            if ($currentPage < $totalPage) echo "<li><a href='index.php?currentPage=$pagePlusOne'>" . "Next" . "</a></li>";

            //this code block execute for software testing like if user choose more items then page




            ?>
<?php  //this codeblcok for selecting itemsperpage from dropdown ?>

            <select class="form-control" name="itemsPerPage" id="itemsPerPage"
                    onchange="javascript:location.href = this.value;">
                <?php
                if ($itemsPerPage == 3) echo '<option value="?itemsPerPage=3" selected >Show 3 Items Per Page</option>';
                else echo '<option  value="?itemsPerPage=3">Show 3 Items Per Page</option>';

                if ($itemsPerPage == 4) echo '<option  value="?itemsPerPage=4" selected >Show 4 Items Per Page</option>';
                else  echo '<option  value="?itemsPerPage=4">Show 4 Items Per Page</option>';

                if ($itemsPerPage == 5) echo '<option  value="?itemsPerPage=5" selected >Show 5 Items Per Page</option>';
                else echo '<option  value="?itemsPerPage=5">Show 5 Items Per Page</option>';

                if ($itemsPerPage == 6) echo '<option  value="?itemsPerPage=6"selected >Show 6 Items Per Page</option>';
                else echo '<option  value="?itemsPerPage=6">Show 6 Items Per Page</option>';

                if ($itemsPerPage == 10) echo '<option  value="?itemsPerPage=10"selected >Show 10 Items Per Page</option>';
                else echo '<option  value="?itemsPerPage=10">Show 10 Items Per Page</option>';

                if ($itemsPerPage == 15) echo '<option  value="?itemsPerPage=15"selected >Show 15 Items Per Page</option>';
                else    echo '<option  value="?itemsPerPage=15">Show 15 Items Per Page</option>';
                ?>
            </select>
        </ul>
    </div>
    </div>
<!--  ######################## pagination code block#2 of 2 end ###################################### -->




</div>
<?php
//include_once("../../footer.php")
?>