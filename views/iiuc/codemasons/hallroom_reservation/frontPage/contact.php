<?php   include_once('../../header.php'); ?>
<style>
    p {color:blue;}
    </style>



    <div class="container forTopMargin" id="contactContainer">
        <div class="text-center animated fadeInDown">
            <h1 class="text-uppercase"> Contact Us </h1>
            <h4 class="text-muted"> Feel free to contact us. </h4>
            <hr>
        </div>
        <div class="col-md-8 well">
            <form action="contact_process.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group wow fadeInRight"  data-wow-duration="1s" data-wow-delay="600ms" >
                            <label for="contactName" style="color:blue"> Your Name </label>
                            <input type="text" class="form-control" id="contactName" name="name" placeholder="Enter your name here... ">
                        </div>
                        <div class="form-group  wow fadeInLeft"  data-wow-duration="1.5s" data-wow-delay="1000ms">
                            <label for="contactEmail" style="color:blue"> Your Email address </label>
                            <input type="email" class="form-control" id="contactEmail"  name="email" placeholder="Enter your email address here.. ">
                        </div>
                        <div class="form-group  wow fadeInRight"  data-wow-duration="2s"  data-wow-delay="1500ms">
                            <label for="contactSubject" style="color:blue"> Subject </label>
                            <input type="text" class="form-control" id="contactSubject" name="subject" placeholder="Enter subject here.. ">
                        </div><div class="form-group  wow fadeInRight"  data-wow-duration="2s"  data-wow-delay="1500ms">
                            <label for="contactSubject" style="color:blue"> Phone </label>
                            <input type="number" class="form-control" id="contactSubject" name="phone" placeholder="Enter Phone number here.. ">
                        </div>
                    </div> <!-- end col-md-6 -->
                    <div class="col-md-6">
                        <div class="form-group  wow fadeInUp"  data-wow-duration="1s"  data-wow-delay="2000ms">
                            <label for="contactMessage" style="color:blue"> Message </label>
                            <textarea name="message" id="contactMessage" class="form-control" rows="9"  placeholder="Enter your message here..."></textarea>
                        </div>
                    </div> <!-- end col-md-6 -->
                </div>
                <input type="submit" value="Submit" class="btn btn-success col-sm-2 btn-lg pull-right">

            </form> <!-- end contact form -->

        </div> <!-- end col-md-5  -->

        <div class="col-md-4">
            <h3 style="color:blue" class="text-uppercase text-center" id="contactAddress"> <i class="fa fa-globe"> </i> Contact Info </h3>
            <hr>
            <p> Address: International Islamic University Chittagong</p>
            <p> City: Chittagong </p>
            <p> Contact +880 01825484458</p>
            <p> Email: <a href="mailto:marufulislamtest@gmail.com">skmarufiiuc@gmail.com</a></p>

        </div>

    </div> <!-- enc container -->


<?php include_once('../../footer.php'); ?>