<?php
/**
 * Created by PhpStorm.
 * User: sombaat
 * Date: 4/26/2018
 * Time: 10:51 AM
 */

    session_start();



    $body = <<<BODY
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />	
    
    </head>
    
    <body>
    <div class="container">
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
    </div>

    <script
          src="http://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
BODY;
    
    
    echo $body;
    
