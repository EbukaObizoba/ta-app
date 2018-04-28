<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />	
            <meta name="viewport" content="width=device-width, initial-scale=1">	
    </head>
    <body style="margin: 0.5em;">
        <h1>Applicants Table</h1>
        <?php 
            require_once("connectDB.php");
            $db = connectToDB();
            $query = "select * from StudentTable";
            $result = $db->query($query); 
            if (!$result) {
                die("Retrieval failed: ". $db->error);
            } else if($result->num_rows == 0) {
                echo "No applications added.";
            } else {
                echo "<table class='table table-striped'>";
                echo "
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Courses Wanted</th>
                            <th>TAed Before</th>
                            <th>GPA</th> 
                        </tr>
                    </thead>
                    <tbody>
                ";
                $num_rows = $result->num_rows;
                for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                    $result->data_seek($row_index);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $name = $row["fName"]." ".$row["lName"];
                    $email = $row["email"];
                    $type = $row["grad"];
                    $coursesWanted = $row["courseIDs"];
                    $taedB4 = $row["taB4"];
                    $gpa = $row["gpa"];
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$email</td>";
                    echo "<td>$type</td>";
                    echo "<td>$coursesWanted</td>";
                    echo "<td>$taedB4</td>";
                    echo "<td>$gpa</td>";
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