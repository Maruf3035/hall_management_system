<?php

namespace App\UserManagement;


use App\Message\Message;
use App\Utility\Utility;
use PDO;
use App\Model\Database as DB;

class RoleManagement extends DB
{
    private $id;
    private $role_name;
    private $role_module;
    private $module_create;
    private $module_view;
    private $module_edit;
    private $module_delete;

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array())
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('role_name', $data)) {
            $this->role_name = $data['role_name'];
        }
        if (array_key_exists('role_module', $data)) {
            $this->role_module = $data['role_module'];
        }
        if (array_key_exists('module_create', $data)) {
            $this->module_create = $data['module_create'];
        }
        if (array_key_exists('module_view', $data)) {
            $this->module_view = $data['module_view'];
        }
        if (array_key_exists('module_edit', $data)) {
            $this->module_edit = $data['module_edit'];
        }
        if (array_key_exists('module_delete', $data)) {
            $this->module_delete = $data['module_delete'];
        }

        return $this;
    }
        public function store(){
            $dataArray= array(':role_name'=>$this->role_name,':role_module'=>$this->role_module,':module_create'=>$this->module_create,':module_view'=>$this->module_view,':module_edit'=>$this->module_edit,':module_delete'=>$this->module_delete);

            $query="INSERT INTO `cm_hall_management`.`role_rights` (`role_name`, `role_module`, `module_create`, `module_view`, `module_edit`, `module_delete`)
                VALUES (:role_name, :role_module, :module_create, :module_view, :module_edit, :module_delete)";
            // Utility::dd($query);
            $STH=$this->DBH->prepare($query);
            $result = $STH->execute($dataArray);

            if ($result) {
                Message::message("Role set successful.");
                return Utility::redirect($_SERVER['HTTP_REFERER']);
            }else{
                Message::message("Role set unsuccessful");
                return Utility::redirect($_SERVER['HTTP_REFERER']);
            }
        }

        public function view_menu(){
            $query="SELECT * FROM `role_rights` WHERE `role_rights`.`role_name` =:role_name";
            $result=$this->DBH->prepare($query);
            $result->execute(array(':role_name'=>$this->role_name));
            $row=$result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }

    public function view_roles(){
        $query="SELECT * FROM `role_rights`";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':role_name'=>$this->role_name));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

        public function create_button(){
            $arrayModule = $this->view_menu();
            foreach ($arrayModule as $module) {
                echo "<p><strong>" . $module['role_module'] . "</strong><br>";
                if ($module['module_create'] == "yes") echo "<a href='".$module['create_link']."'><input type='button' value='Create'></a>";
                if ($module['module_view'] == "yes") echo "<a href='".$module['view_link']."'><input type='button' value='View'></a>";
                if ($module['module_edit'] == "yes") echo "<a href='".$module['edit_link']."'><input type='button' value='Edit'></a>";
                //if ($module['module_delete'] == "yes") echo "<a href='".$module['delete_link']."'><input type='button' value='Delete'></a>";
                echo "</p>";
            }
        }

    public function module_array()
    {
        $arrayModule = $this->view_menu();
        return $arrayModule;
    }
}