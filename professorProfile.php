<?php
    require_once("connectDB.php");
    require_once("htmlStructure.php");

    if(session_status() == PHP_SESSION_NONE) session_start();
    $db = connectToDB();
    $entry = $_SESSION["profile"];
    //var_dump();
    $professorCourses = getCoursesProfessorTeaches($db, $entry);
    $courseTAsTable = "";
    $eligibleTAsTable = "";
    if(isset($_GET["coursesButton"])) {
        if(isset($_GET["chosenCourse"])){
            $course = $_GET["chosenCourse"];
            $courseTAsTable .= getTAsTableForCourse($db, $course);
            $eligibleTAsTable .= getEligibleTAsTableForCourse($db, $course);
        }
    }
    $body =<<< EOBODY
            <form method="get">
                <div>
                    <h1>{$entry["fName"]} {$entry["lName"]}</h1>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <h3>Select TAs to view by course</h3><br>
                        <select class="selectpicker" name="chosenCourse">
                            $professorCourses
                        </select>
                        <input type="submit" name="coursesButton" value="Get TAs for selected course">
                    </div>
                    <div>
                        <div class="form-group">
                            $courseTAsTable
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            $eligibleTAsTable
                        </div>
                    </div>
                </div>
            </form>
EOBODY;

    function getEligibleTAsTableForCourse($db, $course){
        $table = "studentTable";
        $course = substr($course, 4);
        $studentIds = [];
        $query = "select id from $table where courseIDs like '%$course%'";
        $result = $db->query($query);
        if (!$result) {
            die("Retrieval failed: ". $db->error);
        } else if($result->num_rows == 0) {
            echo "No entries from studentTable table exist in the database.";
        } else {
            $num_rows = $result->num_rows;
            for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                $result->data_seek($row_index);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                array_push($studentIds, $row["id"]);
            }
        }
        $eligibleIds = getEligibleIds($db, $course, $studentIds);
        $title = "CMSC$course TA Candidates";
        return getStudentsById($db, $eligibleIds, $title);
    }

    function getEligibleIds($db, $course, $studentIds){
        $table = "studentToCourse";
        $ids = [];
        $query = "select studentId from $table where courseId='$course'";
        $result = $db->query($query);
        if (!$result) {
            die("Retrieval failed: ". $db->error);
        } else if($result->num_rows == 0) {
            echo "No entries from studentToCourse table exist in the database.";
        } else {
            $num_rows = $result->num_rows;
            for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                $result->data_seek($row_index);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                array_push($ids, $row["studentId"]);
            }
        }
        return array_diff($studentIds, $ids);
    }

    function getTAsTableForCourse($db, $course){
        $table = "studentToCourse";
        $studentIds = [];
        $course = substr($course, 4);
        $query = "select studentId from $table where courseId='$course'";
        $result = $db->query($query);
        if (!$result) {
            die("Retrieval failed: ". $db->error);
        } else if($result->num_rows == 0) {
            echo "No entries from studentToCourse table exist in the database.";
        } else {
            $num_rows = $result->num_rows;
            for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                $result->data_seek($row_index);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                array_push($studentIds, $row["studentId"]);
            }
        }
        $title = "CMSC$course Teaching Assistants";
        return getStudentsById($db, $studentIds, $title);
    }

    function getStudentsById($db, $studentIds, $title){
        $table = "studentTable";
        $body = "<h3>$title</h3><br>";
        $body .= "<table class='table table-bordered'>";
        $body .= "<thead><tr><td>Student Name</td><td>UID</td><td>GPA</td><td>TA Experience</td><td>Student Level</td></tr></thead>";
        foreach($studentIds as $studentId){
            $query = "select * from $table where id='$studentId'";
            $result = $db->query($query);
            if (!$result) {
                die("Retrieval failed: ". $db->error);
            } else if($result->num_rows == 0) {
                echo "No entries from studentTable exist in the database.";
            } else {
                $num_rows = $result->num_rows;
                for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                    $result->data_seek($row_index);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $body .= "<tr><td><a>$row[fName] $row[lName]</a></td><td>$row[uid]</td>" .
                        "<td>$row[gpa]</td><td>$row[taB4]</td><td>$row[grad]</td></tr>";
                }
            }
        }
        $body .= "</table>";
        return $body;
    }

    function getCoursesProfessorTeaches($db, $entry){
        $table = "professorToCourse";
        $professorId = $entry["profEmail"];
        //var_dump($professorId);
        $courses = [];
        $query = "select courseIDs from $table where profEmail= '$professorId'";
        $result = $db->query($query);
        if (!$result) {
            die("Retrieval failed: ". $db->error);
        } else if($result->num_rows == 0) {
            echo "No course entries exist in the database.";
        } else {
            $num_rows = $result->num_rows;
            $coursesStr = "";
            for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                $result->data_seek($row_index);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $coursesStr = $row["courseIDs"];
            }
            $courses = explode(",", $coursesStr);
            for($pos = 0; $pos < count($courses); $pos++){
                $courses[$pos] = "CMSC" . $courses[$pos];
            }
        }

        return coursesArrayToDropDownHTML($courses);
    }

    function coursesArrayToDropDownHTML($courses){
        $body = "<option selected disabled>Select course</option>";
        foreach($courses as $course){
            $body .= "<option>$course</option>";
        }
        return $body;
    }

    echo generatePage($body);