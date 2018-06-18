<?php

namespace App\UserManagement;

use App\Message\Message;
use App\Utility\Utility;
use PDO;
use App\Model\Database as DB;

class UserManagement extends DB
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $phone;
    private $address;
    private $email_token;
    private $role_id;


    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('first_name',$data)){
            $data2=$data['first_name'];
            $data2=trim($data2);
            $data2=stripcslashes($data2);
            $data2=htmlspecialchars($data2);
            $this->first_name=$data2;
        }
        if(array_key_exists('last_name',$data)){
            $this->last_name=$data['last_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }
        if(array_key_exists('role_id',$data)){
            $this->role_id=$data['role_id'];
        }
        return $this;
    }


    public function store(){

        $userDataArray=array($this->first_name,$this->last_name,$this->email,$this->password,$this->phone,$this->address,$this->role_id);
        $query=" insert into users (first_name,last_name,email,password,phone,address,role_id) values (?,?,?,?,?,?,?)";

        $STH=$this->DBH->prepare($query);
        $result=$STH->execute($userDataArray);


        if($result){

            Message::message("Data has been inserted successfull. ");
            return Utility::redirect('http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/admin/index.php');

            // Utility::redirect('verify.php');
        }
        else{

            echo" Registration Error!!";
            return Utility::redirect($_SERVER['HTTP_REFERER']);


        }
    }




    public function view(){
        $query=" SELECT * FROM users WHERE email = '$this->email' ";
        // Utility::dd($query);
        $STH =$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()


    public function validTokenUpdate(){
        $query="UPDATE `hall_management`.`users` SET  `email_verified`='".'Yes'."' WHERE `users`.`email` ='$this->email'";
        $result=$this->DBH->prepare($query);
        $result->execute();

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/iiuc/codemasons/hallroom_reservation/frontPage/index.php');
    }






    public function change_password(){
        $query = "UPDATE `user-hall_management`.`users` SET `password`=:password  WHERE `users`.`email` =:email";
        $result = $this->DBH->prepare($query);
        $result->execute(array(':password' => $this->password, ':email' => $this->email));

        if ($result) {
            Message::message(" Password has been Changed  successfully.");
        } else {
            echo "Error";
            //Message::message("Password Change has been unsuccessful");
            //return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function booking_view(){
        $query="SELECT id, first_name,last_name,email,phone,address FROM `users` WHERE `users`.`email` =:email";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':email'=>$this->email));
        $row=$result->fetch();
        return $row;
    }

    public function emailVerification(){
        $query="UPDATE `hall_management`.`users` SET  `email_token`='".'Yes'."' WHERE `users`.`email` =:email";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':email'=>$this->email));

        if($result){
            Message::message(" Email verification has been successful. Please login now!");
        }
        else {
            echo "Error";
        }
        //return Utility::redirect('signup.php');
    }

    public function index(){

        $sql="select * from users";
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }

    public function userView(){
        $sql="select * from users where id=".$this->id;
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    }

    public function update(){

        $query="UPDATE `hall_management`.`users` SET `first_name`=:first_name, `last_name` =:last_name ,  `email` =:email, `phone` = :phone,
 `address` = :address  WHERE `users`.`email` = :email";

        $result=$this->DBH->prepare($query);

        $result->execute(array(':first_name'=>$this->first_name,':last_name'=>$this->last_name,':email'=>$this->email,':phone'=>$this->phone,
            ':address'=>$this->address,':email_token'=>$this->email_token));

        if($result){
            Message::message("Data has been updated  successfully.");
        }
        else {
            echo "Error";
        }
        //return Utility::redirect($_SERVER['HTTP_REFERER']);
        Utility::redirect('index.php');
    }

    public function delete(){

        $sql= "DELETE from users where id=".$this->id;

        $result = $this->DBH->exec($sql);

        if($result){

            Message::message("Success! :) Data Has Been Parmanently Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Parmanently Deleted!<br>")  ;

        }

        //Utility::redirect('index.php');
    }


    public function indexPaginator($currentPage=1,$itemsPerPage=3){

        $start = (($currentPage-1) * $itemsPerPage);

        $sql = "SELECT * from users LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byUserName']) && isset($requestArray['byEmail']) )  $sql = "SELECT * FROM `users`  AND (`first_name` LIKE '%".$requestArray['search']."%' OR `email` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byUserName']) && !isset($requestArray['byEmail']) ) $sql = "SELECT * FROM `users` AND `first_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byUserName']) && isset($requestArray['byEmail']) )  $sql = "SELECT * FROM `users` AND `email` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()




    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->first_name);
        }

        // $allData = $this->index();


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->first_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->email);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->email);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords


    public function search5($requestArray){
        $sql = "";
        if( isset($requestArray['byUserName']))  $sql = "SELECT * FROM `users` AND (`name` LIKE '%".$requestArray['search']."%')";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()



    public function getAllKeywordsa()
    {
        $_allKeywords = array();
        // $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->first_name);
        }

        // $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->first_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end
        return array_unique($_allKeywords);


    }// get all keywords

}