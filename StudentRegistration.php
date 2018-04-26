<?php
require ("htmlStructure.php");
require_once ("connectDB.php");

$body = <<<BODY

     <div class="container">
        <h1>Student Registration</h1><br>
        <form action="addStudent.php" method="post">
        
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="studentEmail" class="form-control" id="email" placeholder="Enter email" required><br>
            </div>
            
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="studentPassword" class="form-control" id="password" placeholder="Enter password" required><br>
            </div>
            
            <div class="form-group">
                <label for="rePassword">Re-enter Password: </label>
                <input type="password" name="rePassword" class="form-control" id="rePassword" placeholder="Re-Enter password" required><br>
            </div>
            
            <div class="form-group">
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" required><br>
            </div>
            
            <div class="form-group">
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" required><br>
            </div>
            
            <div class="form-group">
                <label for="gpa">GPA: </label>
                <input type="number" step="0.01" min="0" max="4" name="gpa" class="form-control" id="gpa" placeholder="GPA" required><br>
            </div>
            
            <div class="form-group">
                <label for="UID">UID: </label>
                <input type="text" name="uid" class="form-control" id="uid" placeholder="UID" required><br>
            </div>
            
            <div class="form-group" class="radio-inline">
                <label for="taB4">Have you TA'd before? </label><br>
                <em>Yes</em>
                <input class="radio-inline" type="radio" name="taB4" class="form-control" id="taB4" value="Y" required>
                <em>No</em>
                <input class="radio-inline" type="radio" name="taB4" class="form-control" value="N" required><br>
            </div>
            
             <div class="form-group">
                <label for="numOfSemesters">Number of Semesters Ta'd? </label>
                <input type="number" name="numOfSemesters" min="0" class="form-control" id="numOfSemesters" required>
            </div>
            
            <div class="form-group">
                <label for="grad">Are you a graduate student? </label><br>
                <em>Yes</em>
                <input class="radio-inline" type="radio" name="grad" class="form-control" id="grad" value="grad" required>
                <em>No</em>
                <input class="radio-inline" type="radio" name="grad" class="form-control" value="undergrad" required><br>
            </div>
            
            
            <!--<div class="form-group">-->
                <!--<label for="resume">Resume: </label>-->
                <!--<input type="file" name="resumeID" class="form-control" id="resume" required><br><br>-->
            <!--</div>-->
            <!---->
            <!--<div class="form-group">-->
                <!--<label for="transcript">Transcript: </label>-->
                <!--<input type="file" name="transcriptID" class="form-control" id="transcript" required><br><br>-->
            <!--</div>-->
            
            <div class='form-group'>
                    <button type='submit' class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
        <script
          src="http://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
BODY;

echo generatePage($body);