<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/26/2018
 * Time: 3:39 PM
 */

session_start();

$user = password_hash("main", PASSWORD_DEFAULT);
$password = password_hash("terps", PASSWORD_DEFAULT);

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    $_SERVER['PHP_AUTH_USER'] = "";
}

if (!isset($_SERVER['PHP_AUTH_PW'])) {
    $_SERVER['PHP_AUTH_PW'] = "";
}

$euser = $_SERVER['PHP_AUTH_USER'];
$epassword = $_SERVER['PHP_AUTH_PW'];

$validated = (password_verify($euser, $user)) && (password_verify($epassword, $password));

if (isset($_SESSION["post"])) {
    if (!$validated) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');

        die("not authorized");
    }
    else {
        header("location: adminprocess.php");
    }
}