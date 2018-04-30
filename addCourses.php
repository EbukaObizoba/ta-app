<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/27/2018
 * Time: 6:45 PM
 */

/*insert into CourseTable (course, section, profEmail, numAssigned, numNeeded)
values (132, 0101, "herman@umd.edu", 0, 10);*/


$body = <<<BODY
        <h3>Course Successfully Added</h3>
        <a href="addCoursesForm.php" class="form-control" style="text-align:center"> Add another course</a> <br>
        <a href="adminprocess.php" class="form-control" style="text-align:center"> Back to admin view</a>


BODY;

    require_once("connectDB.php");
    require_once("htmlStructure.php");
    $db = connectToDB();
    $profEmail = $_POST["profEmail"];
    $course = $_POST["course"];
    $section = $_POST["section"];
    $numAssigned = $_POST["numAssigned"];
    $numNeeded = $_POST["numNeeded"];
    $courseID = $_POST["course"] ."-".$_POST["section"];

    $query = "insert into CourseTable(course, section, profEmail, numAssigned,numNeeded) values('$course', '$section', '$profEmail', '$numAssigned', '$numNeeded')";
    $query2 = "insert into professorToCourse(profEmail, courseIDs) values ('$profEmail', '$courseID')";
    $result = $db->query($query);
    $result2 = $db->query($query2);
    if (!$result || !$result2) {
        die("Insertion failed: " . $db->error);
    } else {
        $db -> close();
        echo generatePage($body);

    }

