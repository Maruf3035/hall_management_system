<?php

namespace App\UserManagement;

if(!isset($_SESSION)) session_start();

use App\Model\Database as DB;
use App\Utility\Utility;
use PDO;

class Authentication extends DB
{
    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `users` WHERE `users`.`email` =:email";
        $STH=$this->DBH->prepare($query);
        $STH->execute(array(':email'=>$this->email));

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `users` WHERE `email`=:email AND `password`=:password"; //`email_verified`='" . 'Yes' . "' AND
        $STH=$this->DBH->prepare($query);
        $STH->execute(array(':email'=>$this->email, ':password'=>$this->password));

        $count = $STH->rowCount();
        //echo $count;
        if ($count > 0) {
            return True;
        } else {
            return False;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }





    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }

    public function select_role(){
        $query="SELECT role_id FROM `users` WHERE `users`.`email` =:email";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':email'=>$this->email));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
        //Utility::dd($row);
    }
}
