<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />	
            <meta name="viewport" content="width=device-width, initial-scale=1">	
    </head>
    <body style="margin: 0.5em;">
        <h1>Courses Table</h1>
        <?php 
            require_once("connectDB.php");
            require_once("htmlStructure.php");
            $db = connectToDB();
            $query = "select * from CourseTable";
            $result = $db->query($query); 
            if (!$result) {
                die("Retrieval failed: ". $db->error);
            } else if($result->num_rows == 0) {
            echo "No courses added.";
            } else {
                echo "<table class='table table-striped'>";
                echo "
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Professor</th>
                            <th># Ta's allowed</th>
                            <th># Ta's needed</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                $num_rows = $result->num_rows;
                for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                    $result->data_seek($row_index);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $name = "CMSC-".$row["course"]."-".$row["section"];
                    $prof = $row["profEmail"];
                    $needed = $row["numNeeded"];
                    $assigned = $row["numAssigned"];
                    $wanted = $needed - $assigned;
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$prof</td>";
                    echo "<td>$needed</td>";
                    echo "<td>$wanted</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }
            $db->close();
        ?>
        <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>