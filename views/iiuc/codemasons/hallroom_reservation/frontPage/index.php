<?php
include_once('../../../../../vendor/autoload.php');

if (!isset($_SESSION)) session_start();
use App\Message\Message;
use App\Hall\Hall;

$msg = Message::message();

include_once('../../header.php');
//require_once("slider.php");
include_once("../../slider2.php");


//object create for class
$hallIndex = new Hall();
$bookData = new \App\bookNow\bookNow();

$all_hall = $hallIndex->index();

//$bookedDate=$bookData->date_booking(1);
?>
<?php echo "<div style='height: 30px; text-align: center'> <div class='alert-success ' id='message'> $msg </div> </div>";


################## search  block 1 of 5 start ##################
if (isset($_REQUEST['search']) )

    $somePage = $hallIndex->search($_REQUEST);
//for better user experience...for suggestion
$availableKeywords = $hallIndex->getAllKeywords();
$comma_separated_keywords = '"' . implode('","', $availableKeywords) . '"';


#################################search block 1 0f 5 end#########################

//pagination code block 1
if (isset($_GET['page'])) {
    $page = $_GET['page'];//pagination button tek page er value neya gele kaj korbe
} elseif (isset($_SESSION['page'])) {
    $page = $_SESSION['page'];//session e jeta set takbe oita page e set korbe
} else {
    $page = 1;//when user visit first time
}
$_SESSION['page'] = $page;// oporer tek current page ta  session e raklam

if (isset($_GET['itemPerPage'])) {
    $itemPerPage = $_GET['itemPerPage'];
} elseif (isset($_SESSION['itemPerPage'])) {
    $itemPerPage = $_SESSION['itemPerPage'];
} else {
    $itemPerPage = 3;
}
$_SESSION['itemPerPage'] = $itemPerPage;
$totalRecord = count($all_hall);
$pages = ceil($totalRecord / $itemPerPage);//for paginatin code block 2 need for loop....this is total page

$somePage = $hallIndex->indexPaginator($page, $itemPerPage);//comment color testing!!!!!!

/*
$objUser= new App\UserManagement\UserManagement();
$user=$objUser->view();
App\Utility\Utility::dd($user);
*/


//search code
################## search  block 2 of 5 start ##################

if (isset($_REQUEST['search'])) {
    $somePage = $hallIndex->search($_REQUEST);
    $serial = 1;

}


####################################search block 2 of 5 end#############
?>

<div class="hall_list">
    <div class="container">


        <!--        search block 4 of 5 start-->
        <form id="searchForm" action="" method="get" style="margin-top: 45px; text-align:right">
            <input class="glyphicon-search searchBox" type="text" value="" id="searchID" name="search"
                   placeholder="Search" style="color: blue"; >
            <input type="checkbox" name="hall_name" checked id="checkbox">By Hall Name
            <input type="checkbox" name="hall_address" checked id="checkbox">By Location
            <input hidden type="submit" class="btn-primary" value="search">
        </form>
        <!--        search block 4 end -->
        <br>


        <?php // \App\Utility\Utility::dd($_GET) ?>

        <h1 class="available_convention_title wow slideInUp"> Available Convention Hall </h1>
        <?php

        foreach ($somePage as $singleHall) { ?>

            <div class="single_hall wow slideInUp single_hall" data-wow-duration="1s" data-wow-delay="200ms">
                <div class="row">
                    <div class="col-md-5">
                        <div class="single_hall_image wow fadeInLeft">
                            <div id="hall_thumb_image_slide_<?php echo $singleHall->hall_id ?>" class="carousel slide"
                                 data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <?php
                                    $allImages = $singleHall->hall_images;
                                    $imageArray = explode(',', $allImages);

                                    //echo '<pre>'; print_r($imageArray);echo '<pre>';

                                    $totalImage = count($imageArray);
                                    for ($i = 0; $i < $totalImage; $i++) {
                                        if ($i == 0) {
                                            echo "
                                        <div class='item active'>
                                            <img src='$imageArray[$i]' alt='' class='img-thumbnail'>
                                        </div>
                                    ";
                                        } else {
                                            echo "
                                        <div class='item'>
                                            <img src='$imageArray[$i]' alt='' class='img-thumbnail'>
                                        </div>
                                    ";
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control"
                                   href="#hall_thumb_image_slide_<?php echo $singleHall->hall_id ?>" role="button"
                                   data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control"
                                   href="#hall_thumb_image_slide_<?php echo $singleHall->hall_id ?>" role="button"
                                   data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div> <!-- single_hall_image wow fadeInLeft -->
                    </div><!-- end col-md-5 -->


                    <div class="col-md-7 wow fadeInRight">
                        <div class="hall_summary_box">
                            <h3 class="hall_title">
                                <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=<?php echo $singleHall->hall_id ?>"> <?php echo $singleHall->hall_name ?> </a>
                            </h3>
                            <p class="hall_summary">
                                <?php echo $singleHall->hall_summary ?>
                            </p>


                            </p>
                            <?php
                            echo "
                <a href='../bookNow/booknow.php?hall_id=$singleHall->hall_id' class='btn btn-info pull-right summary_btn'> BookNow </a>
                <a href='../hall-scs/view.php?hall_id=$singleHall->hall_id' class='btn btn-warning pull-right summary_btn'> Details </a>
 "; ?>
                        </div> <!-- end hall_summary_box -->
                    </div> <!-- end col-md-7 -->
                </div><!-- end row -->
            </div> <!-- end single_hall -->
        <?php }

        ?>
        <!-- Pagination start from here-->
        <nav aria-label="Page navigation">
            <ul class="pagination pull-right pagination-lg wow fadeInUp" data-wow-delay="500ms">
                <?php
                $previous = $page - 1;
                $next = $page + 1;

                if ($page > 1) {
                    echo "<li><a href='?page=$previous' aria-label='Previous'><span aria-hidden='true'> &laquo; Previous </span></a></li>";
                }

                for ($i = 1; $i <= $pages; $i++) {
                    if ($i == $page) {
                        echo "<li class='active'><a href='?page=$i'> $i </a></li>";
                    } else {
                        echo "<li><a href='?page=$i'> $i </a></li>";
                    }
                }

                if ($page < $pages) {
                    echo "<li><a href='?page=$next' aria-label='Next'><span aria-hidden='true'> Next &raquo;</span></a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-offset-10 col-md-2">
                <select class="form-control" onchange="javascript:location.href=this.value" name="itemPerPage">
                    <?php
                    if ($itemPerPage == 3) {
                        echo "<option value='?itemPerPage=3' selected> 3 Hall Per Page </option>";
                    } else {
                        echo "<option value='?itemPerPage=3'> 3 Hall Per Page </option>";
                    }
                    if ($itemPerPage == 5) {
                        echo "<option value='?itemPerPage=5' selected> 5 Hall Per Page </option>";
                    } else {
                        echo "<option value='?itemPerPage=5'> 5 Hall Per Page </option>";
                    }
                    if ($itemPerPage == 10) {
                        echo "<option value='?itemPerPage=10' selected> 10 Hall Per Page </option>";
                    } else {
                        echo "<option value='?itemPerPage=10'> 10 Hall Per Page </option>";
                    }

                    ?>
                </select>

            </div>  <!-- col-md-offset-8 col-md-4 -->
        </div>  <!-- end row -->


        <!-- Pagination End here-->

    </div> <!-- end container -->
</div> <!-- end hall_list -->


<?php include_once('../../footer.php'); ?>


