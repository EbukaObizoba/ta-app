<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/28/2018
 * Time: 7:02 PM
 */

    require_once("connectDB.php");


    function addTrans($trans, $email) {
        $db = connectToDB();
        $query = "insert into filesTable (email, file) values ('$email', '$trans')";
        $result = $db->query($query);
        if (!$result) {
            die("Insertion failed: " . $db->error);
        }
        else {
            $db -> close();
        }
    }