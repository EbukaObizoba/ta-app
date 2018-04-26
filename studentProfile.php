<?php
    require_once("connectDB.php");
    require_once("htmlStructure.php");
    $body =<<< EOBODY

EOBODY;

    echo generatePage($body);
