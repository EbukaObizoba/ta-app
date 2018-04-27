<?php
    require_once("connectDB.php");
    require_once("htmlStructure.php");

    if(session_status() == PHP_SESSION_NONE) session_start();
    $db = connectToDB();
    $entry = $_SESSION["profile"];
    $body =<<< EOBODY
        <form class="form-group">
            <div class="form-group" method="post">
                <h1>Student Name:{$entry["fName"]} {$entry["lName"]}</h1>
            </div>
            <div>
                <h3>Upload student documents:</h3><br>
                <div class="row">
                    <div class="col-md-2">Resume</div>
                    <div class="col-md-3"><input type="file" name="resumeFileName" accept=".pdf"></div>
                </div>
                <div class="row">
                    <div class="col-md-2">Unofficial Transcript</div>
                    <div class="col-md-3"><input type="file" name="transcriptFileName" accept=".pdf"></div>
                </div>
                <!--<table border="2">
                    <thead>Upload student documents:</thead>
                    <tr><td>Document type</td><td>Document selection</td></tr>
                    <tr><td>Resume</td><td></td></tr>
                    <tr><td>Unofficial Transcript</td><td></td></tr>
                </table>-->
                <input type="submit" name="submitDocuments">
                <input type="button" name="logout" value="">
            </div>
        </form>
EOBODY;

    echo generatePage($body);
