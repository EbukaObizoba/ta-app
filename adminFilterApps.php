<?php
require ("htmlStructure.php");
require_once ("connectDB.php");

$body = <<<BODY
    <h1>Filter Applications</h1>
    <form action="adminViewApplications.php" method="post">
        <div class='form-group'>
            <label for="type">Student Type</label>
            <select class="form-control" name="type" id="type">
                <option value=""></option>
                <option value="grad">Graduate</option>
                <option value="undergrad">Undergraduate</option>
            </select>
        </div>
        <div class='form-group'>
            <label for="taedB4">Ta'ed Before</label>
            <select class="form-control" name="taedB4" id="taedB4">
                <option value=""></option>
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gpa">GPA</label>
            <input type="number" step="0.01" min="0" max="4" name="gpa" class="form-control" id="gpa">
        </div>
        <div class='form-group'>
            <button type='submit' class="btn btn-default">Submit</button>
        </div>
    </form>
BODY;

echo generatePage($body);