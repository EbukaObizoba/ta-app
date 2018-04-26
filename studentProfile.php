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
                <table border="2">
                    <thead>Upload student documents:</thead>
                    <tr><td>Document type</td><td>Document selection</td></tr>
                    <tr><td>Resume</td><td><input type="file" name="resumeFileName" accept=".pdf"></td></tr>
                    <tr><td>Unofficial Transcript</td><td><input type="file" name="transcriptFileName" accept=".pdf"></td></tr>
                </table>
                <input type="submit" name="submitDocuments">
            </div>
        </form>
EOBODY;

    echo generatePage($body);
