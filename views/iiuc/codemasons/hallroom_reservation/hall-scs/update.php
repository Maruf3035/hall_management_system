<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;



use App\Hall\Hall;
use App\Utility\Utility;

if(!isset($_SESSION) )session_start();
if (!isset($_SESSION['role'])) {
    Message::message("Please login");
    Utility::redirect("../frontPage/index.php");
}
if ($_SESSION['role'] == "USER") {
    Message::message("You do not have access");
    Utility::redirect("../frontPage/index.php");
}

$hallFloorString=implode(',',$_POST['hall_floor']);
$_POST['hall_floor']=$hallFloorString;

$hallServicesString=implode(',',$_POST['hall_services']);
$_POST['hall_services']=$hallServicesString;





$objHall= new Hall();
$objHall->setHallData($_REQUEST);

$singleItem=$objHall->view();
$oldLogo = $singleItem->hall_logo;
$oldHallImages = $singleItem->hall_images;


if(empty($_FILES['hall_logo']['name'])){
    $_POST['hall_logo']=$oldLogo;
}else{

    if(isset($_FILES['hall_logo']) && $_FILES['hall_logo']['type']=='image/jpeg' ||
        $_FILES['hall_logo']['type']=='image/gif' || $_FILES['hall_logo']['type']=='image/png'){

        $fileName=time().'_'.$_FILES['hall_logo']['name'];
        $tmpName=$_FILES['hall_logo']['tmp_name'];
        $destination="../../../../../resource/hallLogo/$fileName";
        move_uploaded_file($tmpName,$destination);

        //for sending file path into database
        $_POST['hall_logo']=$destination;

    }
}

if(empty($_FILES['hall_images']['name'][0])){
    $_POST['hall_images'] = $oldHallImages;
}else{

    //logo can't be empty & image type should be (jpeg, png, gif).
    $totalImage= count($_FILES['hall_images']['name']);

    for($i=0; $i < $totalImage; $i++){
        $hallImageTmpName=$_FILES['hall_images']['tmp_name']["$i"];
        $hallImageFileName=time().$_FILES['hall_images']['name']["$i"];
        $destination="../../../../../resource/clientGallery/$hallImageFileName";

        move_uploaded_file($hallImageTmpName, $destination);

        //for sending file path into database
        $hallImagePath[]=$destination;
    }

    $hallImageString = implode(',', $hallImagePath);
    $_POST['hall_images']=$hallImageString;

}

$objHall->setHallData($_POST);
$objHall->update();

