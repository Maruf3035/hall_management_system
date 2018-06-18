<?php

namespace App\bookNow;

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

class bookNow extends DB

{
    // if a property access modifire is declared as protected then this property only and only able to use in inside this class
    protected $booking_id;
    protected $hall_id;
    protected $customer_id;
    protected $event_name;
    protected $total_person;
    protected $booking_date;
    protected $booking_time;
    protected $customer_email;
    protected $customer_name;
    protected $customer_address;
    protected $floor_number;
    protected $customer_service;
    protected $phone_number;
    protected $hall_name;
    protected $hall_address;
    protected $hall_contact;
    protected $hall_rent;
    protected $amount;
    protected $transaction_id;


    public function setData($postData)
    {

        if (array_key_exists("booking_id", $postData)) {

            $this->booking_id = $postData["booking_id"];
        }
        if (array_key_exists("hall_id", $postData)) {
            $this->hall_id = $postData["hall_id"];
        }

        if (array_key_exists("customer_id", $postData)) {

            $this->customer_id = $postData["customer_id"];
        }

        if (array_key_exists("hall_name", $postData)) {
            $this->hall_name = $postData['hall_name'];
        }

        if (array_key_exists("event_name", $postData)) {
            $this->event_name = $postData["event_name"];
        }

        if (array_key_exists("total_person", $postData)) {
            $this->total_person = $postData["total_person"];
        }
        if (array_key_exists("booking_date", $postData)) {
            $this->booking_date = $postData["booking_date"];
        }

        if (array_key_exists("booking_time", $postData)) {
            $this->booking_time = $postData["booking_time"];
        }

        if (array_key_exists("customer_email", $postData)) {
            $this->customer_email = $postData["customer_email"];
        }
        if (array_key_exists("customer_name", $postData)) {
            $this->customer_name = $postData["customer_name"];
        }
        if (array_key_exists("customer_address", $postData)) {
            $this->customer_address = $postData["customer_address"];
        }
        if (array_key_exists("customer_service", $postData)) {
            $this->customer_service = $postData["customer_service"];
        }
        if (array_key_exists("hall_address", $postData)) {
            $this->hall_address = $postData["hall_address"];
        }
        if (array_key_exists("hall_contact", $postData)) {
            $this->hall_contact = $postData["hall_contact"];
        }
        if (array_key_exists("phone_number", $postData)) {
            $this->phone_number = $postData["phone_number"];
        }
        if (array_key_exists("hall_rent", $postData)) {
            $this->hall_rent = $postData["hall_rent"];
        }
    if (array_key_exists("floor_number", $postData)) {
            $this->floor_number = $postData["floor_number"];
        }if (array_key_exists("amount", $postData)) {
            $this->amount = $postData["amount"];
        }
    if (array_key_exists("transaction_id", $postData)) {
            $this->transaction_id = $postData["transaction_id"];
        }

return;
    }

    public function store()
    {
        $dataArray = array($this->hall_id, $this->event_name, $this->customer_id, $this->total_person, $this->floor_number, $this->booking_date, $this->booking_time,$this->hall_contact,$this->hall_name,$this->hall_address,$this->customer_address,$this->customer_email,$this->customer_service,$this->customer_name,$this->phone_number,$this->hall_rent);

        $sql = "insert into booking(hall_id,event_name,customer_id,total_person,floor_number,booking_date,booking_time,hall_contact,hall_name,hall_address,customer_address,customer_email,customer_service,customer_name,phone_number,hall_rent) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);

        $getIdSql = "SELECT LAST_INSERT_ID()";
        $STH = $this->DBH->prepare($getIdSql);
        $STH->execute();

    }
    public function setPayment()



    {
        $dataArray = array($this->amount, $this->transaction_id );

        $sql = "insert into invoice(amount,transaction_id) VALUES (?,?) where";


        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);

        $getIdSql = "SELECT LAST_INSERT_ID()";
        $STH = $this->DBH->prepare($getIdSql);
        $STH->execute();
     //   $this->last_booking_id = $STH->fetch();
/*
        if ($result) {
            Message::message("Success! :) Data Has Been Inserted!<br>");

        } else {
            Message::message("Failed! :( Data Has Not Been Inserted!<br>");
        }
        Utility::redirect('book.php');
*/
}
    public function invoice()




    {
        $dataArray = array($this->hall_id,$this->booking_id, $this->event_name, $this->customer_id, $this->total_person, $this->floor_number, $this->booking_date, $this->booking_time,$this->hall_contact,$this->hall_name,$this->hall_address,$this->customer_address,$this->customer_email,$this->customer_service,$this->customer_name,$this->phone_number,$this->hall_rent,$this->amount,$this->transaction_id);

        $sql = "insert into invoice(hall_id,booking_id,event_name,customer_id,total_person,floor_number,booking_date,booking_time,hall_contact,hall_name,hall_address,customer_address,customer_email,customer_service,customer_name,phone_number,hall_rent,amount,transaction_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);

        $getIdSql = "SELECT LAST_INSERT_ID()";
        $STH = $this->DBH->prepare($getIdSql);
        $STH->execute();


                if ($result) {

                Utility::redirect("final_invoice.php?booking_id=$this->booking_id");

    }}

    public function view_bookings()

    {
        //$dataArray = array($this->hall_id, $this->customer_id);
        $sql = "SELECT * FROM booking  where approve='No' ORDER BY booking_id DESC ";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

        return $result;
    }
    public function view_bookings_by_customer()

    {
        //$dataArray = array($this->hall_id, $this->customer_id);
        $sql = "SELECT * FROM booking where customer_id=.$this->customer_id"  ;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

        return $result;
    }
  public function view_date($hd)

    {
        //$dataArray = array($this->hall_id, $this->customer_id);
        $sql = "select  booking_date from booking where booking_id=".$this->hd;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

        return $result;
    }

    public function view_by_booking_id()
    {

        $sql = "select * from booking where booking_id=".$this->booking_id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }
    public function view_by_booking_id_invoice()
    {

        $sql = "select * from invoice where booking_id=".$this->booking_id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }/*public function booking_view_by_customer()
    {

        $sql = "select * from booking where customer_id=".$this->customer_id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }*/public function booking_view_by_customer($customer_id)
    {

        $sql = "select * from booking where approve='Yes'AND customer_id=".$customer_id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


    public function edit_bookings()
    {
    }

    public function delete_booking(){

        $sql= "DELETE from booking where booking_id=".$this->booking_id;

         $result = $this->DBH->exec($sql);

       if($result){

            Message::message("Success! :) Data Has Been Parmanently Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Parmanently Deleted!<br>")  ;

        }

    //    Utility::redirect('http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/');
    }


    public function date_booking($id)
    {
        //$dataArray = array($this->hall_id, $this->customer_id);
        $sql = "SELECT  * FROM booking WHERE hall_id=".$id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }

    public function date_checking($hall_id,$date){

        $query="SELECT * FROM booking where booking.booking_date =:booking_date AND booking_time=:booking_time AND hall_id=".$hall_id;
        $STH=$this->DBH->prepare($query);
        $STH->execute(array(':booking_date'=>$date,':booking_time'=>$this->booking_time));
        //$STH->execute(array(':booking_date'=>$date) );
        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function approve(){

        $dataArray = array("Yes") ;


        $sql = "UPDATE  booking SET approve=? where booking_id=".$this->booking_id;

        $STH = $this->DBH->prepare($sql);

        $result =  $STH->execute($dataArray);


        if($result){

            Message::message("Success! :) Data Has Been approved!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been approved!<br>")  ;

        }


        Utility::redirect('approved_bookingList.php');


    }public function cancel_request(){

        $dataArray = array("Yes") ;


        $sql = "UPDATE  booking SET booking_cancel=? where booking_id=".$this->booking_id;

        $STH = $this->DBH->prepare($sql);

        $result =  $STH->execute($dataArray);


        if($result){

            Message::message("Success! :) Your Request is pending!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Try again<br>")  ;

        }


        Utility::redirect('http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/user_profile.php');


    }
    public function approved(){

        $sql = "select * from booking where approve='Yes'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }public function cancel_approve(){

        $sql = "select * from booking where booking_cancel='Yes'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


}