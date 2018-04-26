<?php 
    require_once("connectDB.php");
    session_start();
    $db = connectToDB();
    $table = "professor";
    $emailCol = "profEmail";
    if (isset($_SESSION["student"])) {
        $table = "StudentTable";
        $emaiCol = "email";
    }
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $query = "select * from $table where $emailCol = '$email' and password = PASSWORD('$pass')";
    $result = $db->query($query); 
    if (!$result) {
        die("Retrieval failed: ". $db->error);
    } else if($result->num_rows == 0) {
       echo "No entry exists in the database for the specified email and password";
    } else {
        echo "User Found";
        $result->data_seek(0);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        var_dump($row);
    }
    $db->close();
?>
