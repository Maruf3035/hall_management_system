
<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\HallManagement\HallManagement;
include_once ("../../header.php")
?>
<div class="container">
    <div class="tableBackground col-md-12 forTopMargin">

        <h1 class=" wow fadeInDown" data-wow-duration="1s" data-wow-delay="500ms" style="text-align: center">Convention Event Gallery</h1><hr>

        <div class="col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1000ms">
            <div class="thumbnail" >
                    <img src="../../../../../resource/images/hall_images/top-banner.jpg" alt="" style="width:100%">
                    <div class="caption">
                        <h6 style="text-shadow: none">  <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=5' ?>">
                                City Convention Hall </a> </h6>
                    </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/image1.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=2' ?>">
                            Zinnurine Convention Centre </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="1000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/cityHall_4.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=6' ?>">
                            Hall 24 Convention Center </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="2000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/zinnu_2.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"><a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=7' ?>">
                            K B Convention Hall </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/image3.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none">  <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=10' ?>">
                            Swiss Park </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="2000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/zinnu_3.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=11' ?>">
                            Rupnagar Community Center </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/banner2.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none">  <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=15' ?>">
                            Kings Park </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="2000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/weddings-3-024.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=16' ?>">
                            Safa Arched </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/KB_5.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none">  <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=17' ?>">
                            Western Park </a></h6>
                </div>
            </div>
        </div>

        <div class="col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="3000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/hall24_4.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> <a href="<?php echo 'http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/hall-scs/view.php?hall_id=21' ?>">
                            Shomabesh Community Center </a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="3000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/banner6.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> Western Park Community Centre.</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="3000ms">
            <div class="thumbnail" >
                <img src="../../../../../resource/images/hall_images/CretaceousCC-Banquet-sm.jpg" alt="" style="width:100%">
                <div class="caption">
                    <h6 style="text-shadow: none"> The heart of chittagong.</h6>
                </div>
            </div>
        </div>


    </div>
</div>


<?php
include_once("../../footer.php")
?>
