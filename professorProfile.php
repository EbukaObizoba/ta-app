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
    $body =<<< EOBODY
            <form>
                <div>
                    <h1>{$entry["fName"]} {$entry["lName"]}</h1>
                </div>
                <div>
                    <div>
                        <h3>Select TAs to view by course</h3><br>
                        <select>
                            $professorCourses
                        </select>
                    </div>
                    <div>
                        $courseTAsTable
                    </div>
                    <div>
                        $eligibleTAsTable
                    </div>
                </div>
            </form>
EOBODY;

    function getTAsTableForCourse($course){

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