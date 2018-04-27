<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/26/2018
 * Time: 4:34 PM
 */



    if (isset($_POST["TAassigned"])) {
        header("location:adminViewTAassigned.php");
        exit();
    }
    if (isset($_POST["TAunassigned"])) {
        header("location:adminViewTAunassigned.php");
    }

    $body = <<<BODY
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        </head>

        <body>
            <h1 style="text-align: center">Faculty View </h1>
            <div class="container">
                <form action="adminprocess.php" method="post">
                    <div class="form-group">
                        <input type="submit" name="TAassigned" value="TAs Assigned to Courses" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <input type="submit" name="TAunassigned" value="TAs Not Assigned to Courses" class="form-control">
                    </div>
                
                </form>
            </div>
            
            <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
            </script>
        </body>
BODY;



    echo $body;


