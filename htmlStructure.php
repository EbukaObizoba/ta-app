<?php

function generatePage($body) {
    $page = <<<MAIN
<!doctype html>
<html>
    <head> 
        <title>ta-app</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />	
        <meta name="viewport" content="width=device-width, initial-scale=1">	
    </head>
            
    <body>
    <div class="container">
        <div class="page-header">
            <img src="images/umdLogo.gif">
        </div>
        <div>
            $body
        </div>
        <hr>
        <footer style="text-align: right">
        <a href="x.html">Home Page</a>
        </footer>
    <script
          src="http://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
MAIN;

    return $page;
}