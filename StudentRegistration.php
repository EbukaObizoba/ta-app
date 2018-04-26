<?php
require ("htmlStructure.php");
require_once ("connectDB.php");

$body = <<<BODY

     <div class="container">
        <h1>Student Registration</h1>
        <form action='$_SERVER[PHP_SELF]' method="post">
        
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="studentEmail" class="form-control" id="email" placeholder="Enter email" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="studentPassword" class="form-control" id="password" placeholder="Enter password" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="rePassword">Re-enter Password: </label>
                <input type="password" name="rePassword" class="form-control" id="rePassword" placeholder="Re-Enter password" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="gpa">GPA: </label>
                <input type="number" step="0.01" min="0" max="4" name="gpa" class="form-control" id="gpa" placeholder="GPA" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="UID">UID: </label>
                <input type="text" name="uid" class="form-control" id="uid" placeholder="UID" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="taB4">Have you TA'd before? </label>
                <input type="radio" name="taB4" class="form-control" id="taB4" required>Yes
                <input type="radio" name="taB4" class="form-control" required>No<br><br>
            </div>
            
             <div class="form-group">
                <label for="numOfSemesters">Number of Semesters Ta'd? </label>
                <input type="number" name="numOfSemesters" min="0" class="form-control" id="numOfSemesters" required>
            </div>
            
            <div class="form-group">
                <label for="grad">Are you a graduate student? </label>
                <input type="radio" name="grad" class="form-control" id="grad" required>Yes
                <input type="radio" name="grad" class="form-control" required>No<br><br>
            </div>
            
            
            <div class="form-group">
                <label for="resume">Resume: </label>
                <input type="file" name="resumeID" class="form-control" id="resume" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="transcript">Transcript: </label>
                <input type="file" name="transcriptID" class="form-control" id="transcript" required><br><br>
            </div>
            
        </form>
    </div>
BODY;

echo generatePage($body);