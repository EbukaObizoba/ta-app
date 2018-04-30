<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="CSS/adminView.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1">	
    </head>
    <body class="body" style="margin: 0.5em;">
    <div class="container">
        <h1>Algorithm Results</h1>
        <?php 
            function my_sort($a,$b) {
                $aSize = sizeof($a);
                $bSize = sizeof($b);
                if ($aSize == $bSize) return 0;
                return ($aSize < $bSize) ? -1 : 1;
            }
            function insertInStudentToCourse($db, $key, $assignments) {
                foreach ($assignments as $key => $value) {
                    $query = "insert into studentToCourse (studentId, courseId) values($value, '$key')";
                    $db->query($query);
                }
            }
            function updateStudents($db, $assignments) {
                foreach ($assignments as $key => $value) {
                    $query = "update StudentTable set fulfilled = 'Y' where id = $value";
                    $db->query($query);
                }
            }
            function updateCourses($db, $courseSection, $newAssigned, $newWanted) {
                $idxOfDash = strpos($courseSection, '-');
                $course = intval(substr($courseSection, 0, $idxOfDash));
                $section = intval(substr($courseSection, $idxOfDash + 1));
                $setClause = "set numAssigned = $newAssigned, numNeeded = $newWanted";
                $whereClause = "where course = $course and section = $section";
                $query = "update CourseTable $setClause $whereClause";
                $db->query($query);
            }
            require_once("connectDB.php");
            $db = connectToDB();
            $idToName = [];
            $query = "select fName, lName, id, courseIDs, gpa from StudentTable where courseIds != '' and fulfilled = 'N'";
            $applicants = [];
            $result = $db->query($query); 
            if (!$result) {
                die("Retrieval failed: ". $db->error);
            } else if($result->num_rows == 0) {
                echo "No applications found.";
            } else {
                $num_rows = $result->num_rows;
                for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                    $result->data_seek($row_index);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $idToName[$row["id"]] = $row["fName"]." ".$row["lName"];
                    $courses = explode(",", $row["courseIDs"]);
                    foreach ($courses as &$value) {
                        $applicants[$value][$row["id"]] = $row["gpa"];
                    }
                }
                foreach ($applicants as $key => $value) {
                    asort($applicants[$key]);
                }
                uasort($applicants, 'my_sort');
                $keys = "(".implode(",", array_keys($applicants)).")";
                $query = "select course, section, numAssigned, numNeeded from CourseTable where numNeeded != 0 and course in ".$keys;
                $courses = [];
                $coursesNeeded = [];
                $result = $db->query($query); 
                if (!$result) {
                    die("Retrieval failed: ". $db->error);
                } else if($result->num_rows == 0) {
                    echo "No open courses found.";
                } else {
                    $num_rows = $result->num_rows;
                    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                        $result->data_seek($row_index);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $obj = [];
                        $obj["section"] = str_pad($row["section"], 4, '0', STR_PAD_LEFT);
                        $obj["numNeeded"] = intval($row["numNeeded"]);
                        $obj["numAssigned"] = intval($row["numAssigned"]);
                        $qualifiedName = $row["course"]."-".$obj["section"];
                        $coursesNeeded[$qualifiedName] = array("numNeeded" => $obj["numNeeded"], "numAssigned" => $obj["numAssigned"]);
                        if (array_key_exists($row["course"], $courses)) {
                            array_push($courses[$row["course"]], $obj);
                        } else {
                            $courses[$row["course"]] = [$obj];
                        }
                    }
                    $assignments = [];
                    $done = [];
                    foreach ($applicants as $key => $value) {
                        $value = array_keys($value);
                        $numAvailable = sizeof($value);
                        foreach($courses[$key] as $course) {
                            $filled = 0;
                            while ($filled != $numAvailable && $filled < $course["numNeeded"] && !empty($value)) {
                                $section = $key."-".$course["section"];
                                $curr = array_pop($value);
                                if (!array_key_exists($curr, $done)) {
                                    if (array_key_exists($section, $assignments)) {
                                        array_push($assignments[$section], $curr);
                                    } else {
                                        $assignments[$section] = [$curr];
                                    }
                                    $filled = $filled + 1;
                                    $done[$curr] = TRUE;
                                }
                            }
                        }
                    }
                    foreach ($assignments as $key => $value) {
                        try {
                            $db->begin_transaction();
                            insertInStudentToCourse($db, $key, $value);
                            updateStudents($db, $value);
                            $newAssigned = $coursesNeeded[$key]["numAssigned"] + sizeof($value); 
                            $newWanted = $coursesNeeded[$key]["numNeeded"] - sizeof($value);
                            updateCourses($db, $key, $newAssigned, $newWanted);
                            $db->commit();
                        } catch(Exception $e) {
                            $db->rollback();
                        }
                    }
                    echo "<table class='table table-striped'>";
                    echo "
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    foreach ($assignments as $key => $ids) {
                        foreach ($ids as $id) {
                            echo "<tr>";
                            echo "<td>$idToName[$id]</td>";
                            echo "<td>$key</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</tbody></table>";
                }
            }
            $db->close();
        ?>
        <hr>
        <footer style="text-align: right">
            <a href="x.html">Home Page</a>
        </footer>
        <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </div>
    </body>
</html>