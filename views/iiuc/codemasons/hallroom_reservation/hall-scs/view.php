<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\Hall\Hall;
include_once('../../header.php');

$hallIndex = new Hall();

$objHall=new Hall();
$objHall->setHallData($_GET);
$oneData=$objHall->view();

$bookData = new \App\bookNow\bookNow();
$all_hall = $hallIndex->view_by_hall_id($oneData->hall_id);

//require_once("slider.php");
//include_once("../../slider2.php");
// dear masons member add your php code here...




?>

<!--start-->

<div class="container">
    <div style="margin-top: 12%;" class="single_hall wow slideInUp single_hall" data-wow-duration="1s" data-wow-delay="200ms">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="single_hall_image wow fadeInLeft">
                    <div id="hall_thumb_image_slide_<?php echo $oneData->hall_id ?>" class="carousel slide"
                         data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="list">
                            <?php
                            $images=$all_hall->hall_images;
                            $image_array=explode(',', $images);
                            //echo '<pre>'; print_r($image_array);echo '<pre>';
                            $totalImage = count($image_array);
                            for ($i = 0; $i < $totalImage; $i++) {
                                if ($i == 0) {
                                    echo "
                                        <div class='item active'>
                                            <img src='$image_array[$i]' alt='' class='img-thumbnail'>
                                        </div>
                                    ";
                                } else {
                                    echo "
                                        <div class='item'>
                                            <img src='$image_array[$i]' alt='' class='img-thumbnail'>
                                        </div>
                                    ";
                                }
                            }

                            ?>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control"
                           href="#hall_thumb_image_slide_<?php echo $oneData->hall_id ?>" role="button"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control"
                           href="#hall_thumb_image_slide_<?php echo $oneData->hall_id ?>" role="button"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> <!-- single_hall_image wow fadeInLeft -->
            </div><!-- end col-md-5 -->


        </div><!-- end row -->
    </div> <!-- end single_hall -->
    </div> <!-- end single_hall -->


<!--end-->
<div class="container tableBackground wow slideInUp">
    <h2 class="wow slideInUp" style="text-align: center"> Details of <?php  echo $oneData->hall_name ?> </h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="padding: 30px">
            <?php $date = $bookData->date_booking($oneData->hall_id);



            ?>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Already Booked On This Time </td> <td class="col-md-9"><?php foreach ($date as $onedate) {

                    echo $onedate->booking_date;

                    echo "(".$onedate->booking_time.")";
                    echo " <br>";
                    } ?></td>   </tr>


            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall ID </td> <td class="col-md-9"> <?php  echo $oneData->hall_id ?>  </td>   </tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Name </td>   <td class="col-md-9"> <?php  echo $oneData->hall_name ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Logo  </td><td class="col-md-9"><img src="<?php  echo $oneData->hall_logo ?>" alt="Logo not uploaded">  </td></tr>

            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Capacity </td><td class="col-md-9"> <?php  echo $oneData->hall_capacity ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Rent </td><td class="col-md-9"> <?php  echo $oneData->hall_rent ?>  </td></tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Email </td><td class="col-md-9"> <?php  echo $oneData->hall_email ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Avilable Floor  </td><td class="col-md-9"> <?php  echo $oneData->hall_floor ?>  </td></tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Avilable Serivces </td><td class="col-md-9"> <?php  echo $oneData->hall_services ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Summary </td><td class="col-md-9"> <?php  echo $oneData->hall_summary ?>  </td></tr>
            <tr style="background-color: rgba(70,70,70,0.74)"><td class="col-md-3"> Hall Contact </td><td class="col-md-9"> <?php  echo $oneData->hall_contact ?>  </td></tr>
            <tr style="background-color: rgba(4,25,30,0.74)"><td class="col-md-3"> Hall Address </td><td class="col-md-9"> <?php  echo $oneData->hall_address ?>  </td></tr>

        </table><br>
 <?php
        echo "<a href='http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontpage/index.php' class='btn  btn-primary'> Back </a>
              <a href='../bookNow/booknow.php?hall_id=$oneData->hall_id' class='btn btn-info summary_btn'> Book Now </a>
"; ?>
    </div>

</div>  <!-- end container -->

<?php include_once("../../footer.php"); ?>
