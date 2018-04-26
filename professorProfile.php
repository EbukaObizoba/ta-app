<?php
    require_once("connectDB.php");
    require_once("htmlStructure.php");

    if(session_status() == PHP_SESSION_NONE) session_start();
    $db = connectToDB();
    $entry = $_SESSION["profile"];
    $body =<<< EOBODY
            <form>
                <div>
                    <h1>Professor Name:{$entry["fName"]} {$entry["lName"]}</h1>
                </div>
            </form>
EOBODY;

    echo generatePage($body);