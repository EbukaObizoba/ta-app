<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/26/2018
 * Time: 11:59 AM
 */

session_start();

if (isset($_SESSION[student])) {
    header("location:StudentRegistration.php");
    exit();
}
if (isset($_SESSION[professor])) {
    header("location:registerProf.php");
    exit();
}
