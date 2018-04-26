<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/26/2018
 * Time: 10:22 AM
 */


session_start();

if(isset($_POST["Student"])) {
    $_SESSION["student"] = "student";
    $_SESSION["professor"] = null;
    header("location:login.php");
    exit();
}
if (isset($_POST["Professor"])) {
    $_SESSION["professor"] = "professor";
    $_SESSION["student"] = null;
    header("location:login.php");
    exit();
}

if (isset($_POST["Admin"])) {
    header("location:admin.php");
    exit();
}



