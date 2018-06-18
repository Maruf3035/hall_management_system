<?php

//store-sumon

require_once('../../../../../vendor/autoload.php');

$newHall= new \App\Hall\Hall();


//floor checkbox array to string
if(isset($_POST['hall_floor'])){
    $hallFloorString = implode(',', $_POST['hall_floor']);
    $_POST['hall_floor']=$hallFloorString;
}

//service checkbox array to string
if(isset($_POST['hall_services'])){
    $hallFloorString = implode(',', $_POST['hall_services']);
    $_POST['hall_services']=$hallFloorString;
}


//logo can't be empty & image type should be (jpeg, png, gif).
if(isset($_FILES['hall_logo']) && $_FILES['hall_logo']['type']=='image/jpeg' ||
    $_FILES['hall_logo']['type']=='image/gif' || $_FILES['hall_logo']['type']=='image/png'){

    $fileName=time().'_'.$_FILES['hall_logo']['name'];
    $tmpName=$_FILES['hall_logo']['tmp_name'];
    $destination="../../../../../resource/hallLogo/$fileName";
    move_uploaded_file($tmpName,$destination);

    //for sending file path into database
    $_POST['hall_logo']=$destination;

}/*else{
    echo 'Upload Failed. Image type should be png / jpeg / gif. Please go back by using Back Button on your browser. <br>';
}
*/

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

//data sending process into database.

$newHall->setHallData($_POST);
$newHall->storeHallData();