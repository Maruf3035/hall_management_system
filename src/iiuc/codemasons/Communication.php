<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 7/16/2017
 * Time: 4:23 PM
 */

namespace App;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;
class Communication extends DB
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $subject;
    private $message;
    public function setData($postData){
        if (array_key_exists("name", $postData)) {

            $this->name = $postData["name"];
        }
        if (array_key_exists("email", $postData)) {
            $this->email = $postData["email"];
        }

        if (array_key_exists("phone", $postData)) {

            $this->phone = $postData["phone"];
        }if (array_key_exists("subject", $postData)) {

            $this->subject = $postData["message"];
        }if (array_key_exists("message", $postData)) {

            $this->message = $postData["message"];
        }
    }
    public function store()



    {
        $dataArray = array($this->name, $this->email, $this->phone, $this->subject,$this->message);

        $sql = "insert into customer_info(name,email,phone,subject,message)VALUES (?,?,?,?,?)";
        $STH = $this->DBH->prepare($sql);
        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("Success! :) Messsage Has Been Sent!<br>");

        } else {
            Message::message("Failed! :( Message Has not benn sent!<br>");
        }
        Utility::redirect('http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/');

    }
public function view()
{
    //$dataArray = array($this->hall_id, $this->customer_id);
$sql = "SELECT * FROM customer_info ORDER BY id DESC ";

$STH = $this->DBH->query($sql);

$STH->setFetchMode(PDO::FETCH_OBJ);

return $STH->fetchAll();

return $result;
}



}
