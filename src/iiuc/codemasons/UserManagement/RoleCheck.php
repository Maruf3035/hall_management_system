<?php
namespace App\UserManagement;

use App\Model\Database as DB;
use App\Utility\Utility;


class RoleCheck extends DB{

    private $email = "";
    private $role = "";
    private $pageName="";
    private $module = "";
    private $access="";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('role', $data)) {
            $this->role = $data['role'];
        }
        if (array_key_exists('pageName', $data)) {
            $this->pageName = $data['pageName'];
        }


    }

    public function menuAccess(){
        $pageName=explode(' ',strtoupper($this->pageName));
        $this->module=$pageName[0];
        $this->access=$pageName[1];
        return $this;
    }

    public function checkEmailRole(){
        $query = "SELECT role_id FROM `users` WHERE `email`=:email";
        $STH=$this->DBH->prepare($query);
        $STH->execute(array(':email'=>$this->email));
        $role=$STH->fetchObject();

        if($role->role_id==$this->role['role_id']){
            return TRUE;
        } else{
            return FALSE;
        }
    }

    public function checkPageRole(){
        $query="SELECT role_module FROM `role_rights` WHERE `role_rights`.`role_name` =:role_name";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':role_name'=>$this->role['role_id']));

        $row=$result->fetchAll();
        $row=array_column($row,'role_module');
        //Utility::dd($this->module);
        return in_array($this->module,$row);
    }

    public function pageAccess($page){


    }


}