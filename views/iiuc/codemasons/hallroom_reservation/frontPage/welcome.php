<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Hall Reservation </title>

    <link href="../../../../../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../../resource/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../../../resource/animate.css" rel="stylesheet">
    <link href="../../../../../resource/master.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../../../../resource/images/codemasons.ico" />

    <script src="../../../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../../resource/js/jquery.js"></script>
    <script type="text/javascript" src="../../../../../resource/js/jssor.slider.min.js"></script>
    <style>
        .welcomeHeading{
            padding:20px;
            text-align:center;
            background:rgba(24, 140, 24, 0.7);
            color:#fff;
            margin:0;
            border-bottom:1px solid #fff;
            text-shadow: 3px 3px 10px black;
        }
        .teamHeading{
            color:#fff;
        }
        .logo{
            width:30%;
        }
        .memberName{
            background-color: #fff;
            padding:5px;
            border-radius:3px;
        }

    </style>
</head>
<body>

    <h1 class="welcomeHeading wow slideInDown" data-wow-delay="300ms" data-wow-duration="1.5s" > Welcome to Hall Management System </h1>
    <div class="fireWors">
        <div class="continer text-center">
            <h2 class="teamHeading wow fadeInDown" data-wow-delay="600ms" data-wow-duration="1s"> Done By </h2>
            <img class="logo wow fadeInDown" data-wow-delay="600ms"  src="../../../../../resource/images/logo-codemasons_black.gif" alt="">

            <!-- Team Member Thumbnail -->
<!--            <div class="row">-->
<!--                <div class="col-md-6 col-sm-6 wow fadeInRight" data-wow-delay="900ms">-->
<!--                    <img src="../../../../../resource/images/teammembers/tajbir.jpg" alt="" class="img-thumbnail">-->
<!--                    <h4 class="memberName"> Sheikh Muhammad Maruful Islam </h4>-->
<!--                </div>-->

                <div class="col-md-12 col-sm-6 wow fadeInRight" data-wow-delay="1500ms">
                    <img src="../../../../../resource/images/teammembers/maruf.jpg" alt="" class="img-thumbnail">
                    <h2 style="color: blue;" class="memberName"> Sheikh Muhammad Maruful Islam </h2>
                </div>
            </div>
            <!-- Team Member Thumbnail -->

        </div>

    </div>

    <nav class="navbar navbar-fixed-bottom">
        <div class="container text-center">
            <a href="index.php" class="btn btn-success btn-lg wow fadeInDown" data-wow-delay="3s"> Go to Site &raquo; </a>
        </div>
    </nav>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../../../../resource/bootstrap/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../../resource/js/wow.min.js"></script>

<script src="../../../../../resource/js/jquery.fireworks.js"></script>
<script>
    new WOW().init();
</script>

<!-- This script for fireworks -->

<script>
    $('.fireWors').fireworks({
        sound: true,
        opacity:0.2,
        width: '100%',
        height: '100%'
    });
</script>
<!-- This script for fireworks -->

</body>
</html>