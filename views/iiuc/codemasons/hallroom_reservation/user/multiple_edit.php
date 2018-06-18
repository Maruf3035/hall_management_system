<?php
include_once('../../../../../vendor/autoload.php');

if (!isset($_SESSION)) session_start();
use App\Message\Message;
use App\Hall\Hall;
use App\Utility\Utility;

//Utility::dd($_SESSION);

if ((!isset($_SESSION['role'])) && ($_SESSION['role'] != 'ADMIN')) {
    Message::message("Please Login");
    die("<script>location.href='../frontPage/'</script>");
}

if ((isset($_SESSION['role'])) && ($_SESSION['role'] != 'ADMIN')) {
    //Message::message("Please Login");
    die("<script>location.href='../frontPage/'</script>");
}


$msg = Message::message();

include_once('../../header_for_dashboard.php');


//object create
$objUserManagement = new \App\UserManagement\UserManagement();
$allData = $objUserManagement->index();
$objHall = new Hall();

###############################Serach########################################
################## search  block 1 of 5 start ##################

if (isset($_REQUEST['search'])) $someData = $objUserManagement->search($_REQUEST);


$availableKeywords = $objUserManagement->getAllKeywords();
$comma_separated_keywords = '"' . implode('","', $availableKeywords) . '"';


#################################search block 1 0f 5 end#########################


//search code
################## search  block 2 of 5 start ##################

if (isset($_REQUEST['search'])) {
    $someData = $objUserManagement->search($_REQUEST);
    $serial = 1;
}
####################################search block 2 of 5 end#############


######################## pagination code block#1 of 2 start ######################################
//paginattion code block 1 out of 2
//set total records
$totalRecord = count($allData);
//set ***current page****.it can be come from if user select the page or if user previously set this page in session via selectin page
//or by defaulut current page

if (isset($_REQUEST['currentPage'])) $currentPage = $_REQUEST['currentPage'];
elseif (isset($_SESSION['currentPage'])) $currentPage = $_SESSION['currentPage'];
else $currentPage = 1;
$_SESSION['currentPage'] = $currentPage;

//set *** item per page*** it can be come from if user select the page from dropdown option or if user previously  set current page then it store into  session or by default by programmer
if (isset($_REQUEST['itemsPerPage'])) $itemsPerPage = $_REQUEST['itemsPerPage'];
elseif (isset($_SESSION['itemsPerPage'])) $itemsPerPage = $_SESSION['itemsPerPage'];
else $itemsPerPage = 3;
$_SESSION['itemsPerPage'] = $itemsPerPage;


//set the total page which will be shown  in button.total page == total button.

$totalPage = ceil($totalRecord / $itemsPerPage);


//  retieve the data from database depending on current page and itemsperpage
$someData = $objUserManagement->indexPaginator($currentPage, $itemsPerPage);
//set the serial which is depend on current page and itemsperpage
$serial = (($currentPage - 1) * $itemsPerPage) + 1;
####################### pagination code block#1 of 2 end #########################################


?>

    <div class="container tableBackground wow slideInUp" style="margin-top: 100px">

        <?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>"; ?>

        <?php //search form?>
        <form id="searchForm" action="index.php" method="get" style="margin-top: 45px; text-align: right">
            <input class="glyphicon-search searchBox" type="text" value="" id="searchID" name="search"
                   placeholder="Search">
            <input type="checkbox" name="byUserName" checked>By User Name
            <input type="checkbox" name="byEmail" checked>By Email
            <input hidden type="submit" class="btn-primary" value="search">
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr style="background-color: rgba(4,25,30,0.74)">
                    <th class="text-center">Serial</th>
                    <th class="text-center"> ID</th>
                    <th class="text-center"> User Name</th>
                    <th class="text-center"> Email ID</th>
                    <th class="text-center"> Address</th>
                    <th class="text-center"> Mobile No</th>
                    <th class="text-center"> User Role</th>
                    <th class="text-center"> Action Button</th>
                </tr>

                <?php

                $serial = ($currentPage - 1) * $itemsPerPage + 1;

                foreach ($someData as $oneData) {
                    if ($serial % 2) $bgColor = "rgba(70,70,70,0.74)";
                    else $bgColor = "rgba(4,25,30,0.74)";

                    $li = "
                <tr  style='background-color: $bgColor' class='text-center'>
                    <td>$serial</td>
                    <td>$oneData->id</td>
                    <td>$oneData->first_name $oneData->last_name</td>
                    <td>$oneData->email</td>
                    <td>$oneData->address</td>
                    <td>$oneData->phone</td>
                    <td>$oneData->role_id</td>
                ";
                    $li .= "
                <td>

                 <a href='edit.php?id=$oneData->id' class='btn btn-block btn-primary'> Edit </a>
                 <a href='delete.php?id=$oneData->id' class='btn btn-block btn-danger'> Delete </a>
                </td>
            </tr>
            ";
                    echo $li;

                    $serial++;

                }

                ?>
            </table>
        </div>  <!-- end Table Responsive -->
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
            <?php //this codeblcok for selecting itemsperpage from dropdown ?>

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


<?php
//include_once("../../footer.php")
?>