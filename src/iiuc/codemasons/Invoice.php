<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 7/16/2017
 * Time: 7:24 PM
 */

namespace App;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use App\bookNow\bookNow;



class Invoice extends DB
{
    public function __construct()
    {

        parent::__construct();
    }

}
class Test extends bookNow{

    protected $booking_id;
    public function setData($postData)
    {
        if (array_key_exists("booking_id", $postData)) {

            $this->booking_id = $postData["booking_id"];
        }
    }
    public function store()



    {
        $dataArray = array($this->hall_id, $this->event_name, $this->customer_id, $this->total_person, $this->floor_number, $this->booking_date, $this->booking_time,$this->hall_contact,$this->hall_name,$this->hall_address,$this->customer_address,$this->customer_email,$this->customer_service,$this->customer_name,$this->phone_number,$this->hall_rent);

        $sql = "insert into invoice(hall_id,event_name,customer_id,total_person,floor_number,booking_date,booking_time,hall_contact,hall_name,hall_address,customer_address,customer_email,customer_service,customer_name,phone_number,hall_rent) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";


        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);

        $getIdSql = "SELECT LAST_INSERT_ID()";
        $STH = $this->DBH->prepare($getIdSql);
        $STH->execute();

    }






}