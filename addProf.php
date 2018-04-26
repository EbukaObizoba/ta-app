<?php 
    require_once("connectDB.php");
    $db = connectToDB();
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["profEmail"];
    $pass = $_POST["password"];
    $query = "insert into professor (profEmail, fName, lName, password) values('$email', '$fName', '$lName', PASSWORD('$pass'))";
    $result = $db->query($query);
    if (!$result) {
        die("Insertion failed: " . $db_connection->error);
    } else {
        echo "Inserted Successfully.";
        header("location: login.php");
    }
?>
