<?php
/**
 * Created by PhpStorm.
 * User: sombaat
 * Date: 4/26/2018
 * Time: 10:51 AM
 */

    session_start();



    $body = <<<BODY
     <form action="loginVerify.php" method="post">
        <strong>Email</strong>: <input type="email" name="email" required> <br>
        <strong>Password</strong>: <input type="password" name="password" required>  <br>
        <br>
        <input type="submit" name="submit" value="Login">  
        <br>
        <br>
        <a href="registrationPage.php"> Not registered? Click here</a> 
BODY;
    
    
    echo $body;
    
