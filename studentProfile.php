<?php
    require_once("connectDB.php");
    require_once("htmlStructure.php");

    if(session_status() == PHP_SESSION_NONE) session_start();
    $db = connectToDB();
    $entry = $_SESSION["profile"];
    $body =<<< EOBODY
        <form class="form-group">
            <div class="form-group">
                <h1>Student Name:{$entry["fName"]} {$entry["lName"]}</h1>
            </div>
        </form>
EOBODY;

    echo generatePage($body);
