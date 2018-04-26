<?php
require ("htmlStructure.php");
require_once ("connectDB.php");

$body = <<<BODY
    <form action='$_SERVER[PHP_SELF]' method="post">
    <h1>Student Registration</h1>
    
    <strong>Email: </strong><input type="email" required><br><br>
    
    <strong>Password: </strong><input type="password" required><br><br>
    
    <strong>Re-Enter Password: </strong><input type="password" required><br><br>
    
    <strong>First Name: </strong><input type="text" required><br><br>
    
    <strong>Last Name: </strong><input type="text" required><br><br>
    
    <strong>GPA: </strong><input type="number" step="0.01" name="gpa" min="0" max="4" required><br><br>   
    
    <strong>UID: </strong><input type="text" name="uid" required><br><br>
    
    <strong>Have you TA'd before? </strong>&nbsp;<input type="radio" name="taB4" required>Yes &nbsp;<input type="radio" name="taB4" required>No<br><br>
    
    <strong>Number of Semesters Ta'd? </strong><input type="number" name="numOfSemesters" min="0" required><br><br>
    
    <strong>Are you a graduate student?</strong>&nbsp;<input type="radio" name="grad" required>Yes &nbsp;<input type="radio" name="grad" required>No<br><br>
    
    <strong>Courses Interested TA'ing for</strong>
    <select name="studyType">
        <option value="Course 1">Course 1</option>
        <option value="Course 2">Course 2</option>
    </select><br><br>
    
    <strong>Resume</strong><input type="file" name="resumeID" required><br><br>
    
    <strong>Transcript</strong><input type="file" name="transcriptID" required><br><br>
    

    

    </form>
BODY;

echo generatePage($body);