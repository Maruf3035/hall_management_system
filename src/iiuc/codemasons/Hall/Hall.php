<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/8/2017
 * Time: 10:16 PM
 */

namespace App\Hall;


use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Hall extends Database
{
    protected $hall_id;
    protected $hall_name;
    protected $hall_contact;
    protected $hall_rent;
    protected $hall_capacity;
    protected $hall_email;
    protected $hall_address;
    protected $hall_summary;
    protected $hall_floor;
    protected $hall_logo;
    protected $hall_images;
    protected $hall_services;
    protected $soft_deleted;

    function setHallData($post)
    {

        if (array_key_exists('hall_id', $post)) {
            $this->hall_id = $post['hall_id'];
        }

        if (array_key_exists('hall_name', $post)) {
            $this->hall_name = $post['hall_name'];
        }

        if (array_key_exists('hall_contact', $post)) {
            $this->hall_contact = $post['hall_contact'];
        }

        if (array_key_exists('hall_rent', $post)) {
            $this->hall_rent = $post['hall_rent'];
        }


        if (array_key_exists('hall_capacity', $post)) {
            $this->hall_capacity = $post['hall_capacity'];
        }


        if (array_key_exists('hall_email', $post)) {
            $this->hall_email = $post['hall_email'];
        }

        if (array_key_exists('hall_address', $post)) {
            $this->hall_address = $post['hall_address'];
        }

        if (array_key_exists('hall_summary', $post)) {
            $this->hall_summary = $post['hall_summary'];
        }

        if (array_key_exists('hall_floor', $post)) {
            $this->hall_floor = $post['hall_floor'];
        }

        if (array_key_exists('hall_logo', $post)) {
            $this->hall_logo = $post['hall_logo'];
        }

        if (array_key_exists('hall_images', $post)) {
            $this->hall_images = $post['hall_images'];
        }

        if (array_key_exists('hall_services', $post)) {
            $this->hall_services = $post['hall_services'];
        }

        if (array_key_exists('soft_deleted', $post)) {
            $this->soft_deleted = $post['soft_deleted'];
        }

    }


    public function storeHallData()
    {

        $hallDataArray = array($this->hall_name, $this->hall_contact, $this->hall_rent, $this->hall_capacity, $this->hall_email, $this->hall_address, $this->hall_summary, $this->hall_floor, $this->hall_logo, $this->hall_images, $this->hall_services);
        $mysql = "insert into hall(hall_name,hall_contact,hall_rent,hall_capacity,hall_email,hall_address,hall_summary,hall_floor,hall_logo,hall_images,hall_services) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $STH = $this->DBH->prepare($mysql);
        $result = $STH->execute($hallDataArray);

        if ($result) {
            Message::message("Success! :) Data Has Been Inserted!<br>");
        } else {
            Message::message("Failed! :( Data Has Not Been Inserted!<br>");
        }
        Utility::redirect('index.php');

    }


    public function menuData()
    {

        $fetchD = $this->DBH->prepare("SELECT hall_name FROM hall WHERE 1");
        $fetchD->execute();//executing the query
        $resultArr = array();//to store results
        while ($row = $fetchD->fetch()) {
            $resultArr[] = $row['hall_name'];
        }
        return ($resultArr);

    }


    public function index()
    {

        $sql = "select * from hall where soft_deleted='No' ORDER BY hall_id DESC ";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


    public function view()
    {

        $sql = "select * from hall where hall_id=" . $this->hall_id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }

    public function view_by_hall_id($id)
    {

        $sql = "select  hall_images from hall where hall_id=" . $id;

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }

    public function trashed()
    {

        $sql = "select * from hall where soft_deleted='Yes'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();


    }

    public function update()
    {


        $dataArray = array($this->hall_name, $this->hall_contact, $this->hall_rent, $this->hall_capacity, $this->hall_email, $this->hall_address, $this->hall_summary, $this->hall_floor, $this->hall_logo, $this->hall_images, $this->hall_services);

        $sql = "update hall set hall_name=?,hall_contact=?,hall_rent=?,hall_capacity=?,hall_email=?,hall_address=?,hall_summary=?,hall_floor=?,hall_logo=?,hall_images=?,hall_services=? WHERE hall_id=" . $this->hall_id;

        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);


        if ($result) {

            Message::message("Success! :) Data Has Been Updated!<br>");
        } else {
            Message::message("Failed! :( Data Has Not Been Updated!<br>");

        }


        Utility::redirect('index.php');


    }


    public function trash()
    {

        $dataArray = array("Yes");


        $sql = "UPDATE hall SET soft_deleted=? where hall_id=" . $this->hall_id;

        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);


        if ($result) {

            Message::message("Success! :) Data Has Been Soft Deleted!<br>");
        } else {
            Message::message("Failed! :( Data Has Not Been Soft Deleted!<br>");

        }


        //Utility::redirect('trashed.php');


    }


    public function recover()
    {

        $dataArray = array("No");


        $sql = "UPDATE  hall SET soft_deleted=? where hall_id=" . $this->hall_id;

        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($dataArray);


        if ($result) {

            Message::message("Success! :) Data Has Been Recovered!<br>");
        } else {
            Message::message("Failed! :( Data Has Not Been Recovered!<br>");

        }


        //Utility::redirect('index.php');


    }


    public function delete()
    {

        $sql = "DELETE from hall where hall_id=" . $this->hall_id;

        $result = $this->DBH->exec($sql);

        if ($result) {

            Message::message("Success! :) Data Has Been Parmanently Deleted!<br>");
        } else {
            Message::message("Failed! :( Data Has Not Been Parmanently Deleted!<br>");

        }

        Utility::redirect('index.php');
    }


    public function trashMultiple($selectedIDsArray)
    {


        foreach ($selectedIDsArray as $hall_id) {

            $sql = "UPDATE  hall SET soft_deleted='Yes' WHERE hall_id=" . $hall_id;

            $result = $this->DBH->exec($sql);

            if (!$result) break;

        }

        if ($result)
            Message::message("Success! All Seleted Data Has Been Soft Deleted Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Soft Deleted  :( ");


        Utility::redirect('trashed.php?Page=1');


    }


    public function recoverMultiple($markArray)
    {


        foreach ($markArray as $hall_id) {

            $sql = "UPDATE  hall SET soft_deleted='No' WHERE hall_id=" . $hall_id;

            $result = $this->DBH->exec($sql);

            if (!$result) break;

        }


        if ($result)
            Message::message("Success! All Seleted Data Has Been Recovered Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Recovered  :( ");


        Utility::redirect('index.php?Page=1');


    }


    public function deleteMultiple($selectedIDsArray)
    {


        foreach ($selectedIDsArray as $hall_id) {

            $sql = "Delete from hall  WHERE hall_id=" . $hall_id;

            $result = $this->DBH->exec($sql);

            if (!$result) break;

        }


        if ($result)
            Message::message("Success! All Seleted Data Has Been  Deleted Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Deleted  :( ");


        Utility::redirect('index.php?Page=1');


    }


    public function listSelectedData($selectedIDs)
    {


        foreach ($selectedIDs as $hall_id) {

            $sql = "Select * from hall  WHERE hall_id=" . $hall_id;


            $STH = $this->DBH->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $someData[] = $STH->fetch();


        }


        return $someData;


    }

    public function indexPaginator($currentPage = 1, $itemsPerPage = 3)
    {

        $start = (($currentPage - 1) * $itemsPerPage);

        $sql = "SELECT * from hall  WHERE soft_deleted = 'No' ORDER by hall_id DESC LIMIT $start,$itemsPerPage  ";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;

    }

    public function trashedPaginator($currentPage = 1, $itemsPerPage = 3)
    {

        $start = (($currentPage - 1) * $itemsPerPage);

        $sql = "SELECT * from hall  WHERE soft_deleted = 'Yes' LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;

    }


    public function search($requestArray)
    {
        $sql = "";
        if (isset($requestArray['hall_name']) && isset($requestArray['hall_address'])) $sql = "SELECT * FROM hall WHERE soft_deleted='No' AND (`hall_name` LIKE '%" . $requestArray['search'] . "%' OR `hall_address` LIKE '%" . $requestArray['search'] . "%')";
        if (!isset($requestArray['hall_name']) && !isset($requestArray['hall_address'])) $sql = "SELECT * FROM hall WHERE soft_deleted='No' AND (`hall_name` LIKE '%" . $requestArray['search'] . "%' OR `hall_address` LIKE '%" . $requestArray['search'] . "%')";
        if (isset($requestArray['hall_name']) && !isset($requestArray['hall_address'])) $sql = "SELECT * FROM hall WHERE soft_deleted='No' AND `hall_name` LIKE '%" . $requestArray['search'] . "%'";
        if (!isset($requestArray['hall_name']) && isset($requestArray['hall_address'])) $sql = "SELECT * FROM hall WHERE soft_deleted='No' AND `hall_address` LIKE '%" . $requestArray['search'] . "%'";

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// en d of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->hall_name);
        }

        // $allData = $this->index();


        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->hall_name);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "", $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->hall_address);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->hall_address);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "", $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords


}