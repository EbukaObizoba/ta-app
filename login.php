<?php
/**
 * Created by PhpStorm.
 * User: sombaat
 * Date: 4/26/2018
 * Time: 10:51 AM
 */
    require_once("htmlStructure.php");
    session_start();




    $body = <<<BODY
     <form action="loginVerify.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" name="password" required class="form-control" id="password">
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="Login" class="form-control"> 
        </div> 
        </form>
        <a href="registrationPage.php" class="form-control" style="text-align:center"> Not registered? Click here</a>
BODY;
    
    
    echo generatePage($body);
    
