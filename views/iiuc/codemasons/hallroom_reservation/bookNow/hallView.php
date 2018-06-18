<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\HallManagement\HallManagement;

include_once('../../header.php');
//require_once("slider.php");



?>


    <div id="carousel-example-generic" class="carousel slide clearfix" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../../../../../resource/images/carousel/slide_1.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="bg-success"> Chittagong Convention Hall </h2>
                </div>
            </div>
            <div class="item">
                <img src="../../../../../resource/images/carousel/slide_1.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            ...
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


<div class="container" id="hallInformation">
    <h2 class="hallName wow headShake infinite"> Chittagong Convention Hall </h2>
    <hr class="hallDetailsHR" style="border-color:#286090; height: 2px">
    <div class="row">
        <div class="col-md-6 wow slideInLeft">
            <p class="hallDetails">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,..
            </p>
        </div>
        <div class="col-md-6 wow fadeInRight">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.336058898571!2d91.80944801420516!3d22.378685145701834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd85ded8166e3%3A0x3692d4b258df5c!2sTextile+Cir%2C+Chittagong!5e0!3m2!1sen!2sbd!4v1488736204096" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        </div>
    </div>
    <div class="clearfix"></div>
    <table class="table table-bordered table-hover wow ">
        <h3 class="serviceTitle wow fadeInUp"> Available Services & Contact Information </h3>
        <tr>
            <td class="text-center hallDetailsItem wow fadeInUp">  Hall Name    </td>
            <td class="hallDetailsItem wow fadeInUp">  Chittagong Conventional Hall   </td>
        </tr>

        <tr>
            <td class="text-center hallDetailsItem wow fadeInUp">  Contact    </td>
            <td class="hallDetailsItem wow fadeInUp">  01861-857750 </td>
        </tr>

        <tr>
            <td class="text-center hallDetailsItem wow fadeInUp">  Address:    </td>
            <td class="hallDetailsItem wow fadeInUp">  CDA Avenue, Bayezid Bostami Road, 2 No. Gate, Chittagong, Bangladesh. </td>
        </tr>

        <tr>
            <td class="text-center hallDetailsItem wow fadeInUp">  Floor    </td>
            <td class="hallDetailsItem wow fadeInUp">  1st Floor, 2nd Floor, 3rd Floor   </td>
        </tr>

        <tr>
            <td class="text-center hallDetailsItem wow fadeInUp">  Rent    </td>
            <td class="hallDetailsItem wow fadeInUp">  85,000/-   </td>
        </tr>


    </table>


</div>  <!-- end container -->

<?php
include_once("../../footer.php")
?>

