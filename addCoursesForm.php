<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/27/2018
 * Time: 7:12 PM
 */
    require_once("htmlStructure.php");

    $body = <<<BODY
        <form action="addCourses.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="profEmail" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <input type="number" name="course" class="form-control" id="course" placeholder="131" required>
            </div>
            <div class="form-group">
                <label for="section">Section</label>
                <input type="number" name="section" class="form-control" id="section" placeholder="0101" required>
            </div>
            <div class="form-group">
                <label for="numAssigned">Numbers of TAs currently assigned</label>
                <input type="number" name="numAssigned" class="form-control" id="numAssigned" required>
            </div>
            <div class="form-group">
                <label for="numNeeded">Numbers of TA needed</label>
                <input type="number" name="numNeeded" class="form-control" id="numNeeded" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="form-control">
            </div>
        </form>


BODY;

    echo generatePage($body);
