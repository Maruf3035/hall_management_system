<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;
use App\Calender\Calender;
include_once('../../header.php');
?>

<html>
    <head>
        <meta charset='utf-8' />
        <title>Select Booking Date</title>

        <style>
            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                color: #2aabd2;
                font-size: 14px;
            }
            .tableBackground {
                margin-top: 100px;;
            }
            #calendar {
                max-width: 800px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
    <div class="container tableBackground wow slideInUp">
    <div id='calendar'>
        <form action='calender.php' method='post'>
<?php
$calender= new Calender();
$month = idate('m');
$year = idate('Y');

//if(isset($_POST['Previous'])==1)$month=$month-1;
//if(isset($_POST['Next'])==1)$month=$month+1;

//$calender->call_month($month);
$date = $calender->draw_calender($month, $year);
echo $date;
?>

            <button name='Previous' value=1>Previous Month</button>
            <button name='Next' value=-1>Next Month</button>
        </form>

          </div>
        </div>

    </body>
</html>
