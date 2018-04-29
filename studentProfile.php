<?php
    require_once("connectDB.php");
    require_once("addPDF.php");
    require_once("htmlStructure.php");

    if(session_status() == PHP_SESSION_NONE) session_start();
    $db = connectToDB();
    $entry = $_SESSION["profile"];
    $courses = getCourses($db);
    $coursesBody = buildCoursesHTML($courses);
    $studentBodyData = "";
    if(isset($_SESSION["student"])){
        $studentBodyData =<<< EODATA
        <div class="form-group">
            <h3>Choose courses to TA:</h3><br>
            <div class="form-group">
                $coursesBody
            </div>
            <input type="submit" name="coursesToTutor" value="Submit Intended Courses"/>
        </div>
        <div class="form-group">
            <h3>Upload student documents:</h3><br>
            <div class="row">
                <div class="col-md-2">Unofficial Transcript</div>
                <div class="col-md-3"><input type="file" name="transcriptFileName" accept=".pdf"></div>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submitDocuments" value="Submit Documents">
            </div>
        </div>
EODATA;


    }
    $body =<<< EOBODY
        <form class="form-group" method="get">
            <div class="form-group">
                <h1>{$entry["fName"]} {$entry["lName"]}</h1>
            </div>
            <div class="form-group">
                <h3>Personal Information</h3><br>
                <div class="row">
                    <div class="col-md-2">Email:</div>
                    <div class="col-md-3">{$entry["email"]}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">University ID:</div>
                    <div class="col-md-3">{$entry["uid"]}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">GPA:</div>
                    <div class="col-md-3">{$entry["gpa"]}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Previous Experience as TA:</div>
                    <div class="col-md-3">{$entry["taB4"]}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Number of Semesters TA'd:</div>
                    <div class="col-md-3">{$entry["numOfSemesters"]}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Student Level:</div>
                    <div class="col-md-3">{$entry["grad"]}</div>
                </div>
            </div>
            $studentBodyData
        </form>
EOBODY;

    if(isset($_GET["submitDocuments"])){
        if(isset($_GET["transcriptFileName"])){
            $transcriptFile = $_GET["transcriptFileName"];
            addTrans($transcriptFile, $entry["email"]);
        }
    }

    if(isset($_GET["coursesToTutor"])){
        $chosenCourses = [];
        foreach($courses as $course){
            if(isset($_GET[$course])){
                array_push($chosenCourses, substr($course, 4));
            }
        }
        $coursesAsString = (count($chosenCourses) > 0) ? implode(",",$chosenCourses) : NULL;
        // Now that we have the chosen courses, the student table can be updated.
        $table = "studenttable";
        $field = "courseIDs";
        $email = $entry["email"];
        $query = "update $table set courseIDs='$coursesAsString' where email='$email'";
        $result = $db->query($query);
        if (!$result) {
            die("Update failed: ". $db->error);
        }

    }

    function getCourses($db){
        $table = "coursetable";
        $query = "select course from $table";
        $result = $db->query($query);
        $courses = [];
        if (!$result) {
            die("Retrieval failed: ". $db->error);
        } else if($result->num_rows == 0) {
            echo "No course entries exist in the database.";
        } else {
            $num_rows = $result->num_rows;
            for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                $result->data_seek($row_index);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                array_push($courses, "CMSC" . $row["course"]);
            }
        }
        return $courses;
    }

    function buildCoursesHTML($courses){
        $body = "";
        foreach((array) $courses as $course){
            $boxes = keepBoxesChecked($course);
            $body .= "$course&nbsp;<input type='checkbox' name=$course $boxes /><br>";
        }
        return $body;
    }
    function keepBoxesChecked($course){
        if(isset($_GET[$course])){
            return "checked";
        } else "";
    }

    echo generatePage($body);
