<?php
include_once('../../../../../vendor/autoload.php');

use App\UserManagement\UserManagement;
use App\UserManagement\Authentication;
use App\Message\Message;
use App\Utility\Utility;

$auth= new Authentication();
$status= $auth->setData($_POST)->is_exist();

if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect("../frontPage/index.php");
    }
else {

    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new UserManagement();
    $obj->setData($_POST)->store();
    Message::setMessage("<div class='alert alert-success'>
    <strong>Taken!</strong> Successful.Now Login to continue. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
//
//    require '../../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
//    $mail = new PHPMailer();
//    $mail->IsSMTP();
//    $mail->SMTPDebug  = 0;
//    $mail->SMTPAuth   = true;
//    $mail->SMTPSecure = "ssl";
//    $mail->Host       = "smtp.gmail.com";
//    $mail->Port       = 465;
//    $mail->AddAddress($_POST['email']);
//    $mail->Username="skmarufiiuc@gmail.com";
//    $mail->Password="1331510040519gmail1";
//    $mail->SetFrom('skmarufiiuc@gmail.com','Hall Management');
//    $mail->AddReplyTo("skmarufiiuc@gmail.com","Hall Management");
//    $mail->Subject    = "Your Account Activation Link";
//    $message =  "
//       Please click this link to verify your account:
//       http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/user/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
//    $mail->MsgHTML($message);
//    $mail->Send();
}
