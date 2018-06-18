<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\HallManagement\HallManagement;
include_once ("../../header.php");

?>


<div class="container">
    <div class="container col-md-12 wow slideInUp about forTopMargin">
        <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="600ms">About Us</h1> <hr>
        <div class="col-md-7">
        <p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="1000ms">
            The main object of our website is managing hall,community centre etc.Here people can get the different services of conventional HALL in chittagong.
            This website is specialized for providing the services of any type of social and family gathering such as Marriage ceremony , Birthday Party, conference,  Seminar or any program by any people or any organization.
            As this is the era of Technology we developed our website incorporating all sorts of technological suppot.
        </p><br>
        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2000ms"> This website facilitates the user to have the services to hire any Conventional HALL any place from any time just clicking our website.
            Here the owner of any conventional hall as well as the website firm both will be benifitted same.
        </p><br>
        <p class="wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="3000ms">
            Our website is basically developed by using the programming languages and secured database such as oop php,mysql,js and fornend technology
            We are working hard to reach the website more useful to the people as they get more convenient and satisfactory servic from us.
        </p><br>

        </div>
        <div class="col-md-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="4000ms">
            <img class="img-responsive" src="../../../../../resource/images/group.png">
        </div>
    </div>

</div>


<?php
    include_once ("../../footer.php");
?>
