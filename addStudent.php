<?php
require_once("connectDB.php");
$db = connectToDB();
$email = $_POST["studentEmail"];
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
//$resumeID= $POST["resumeID"];
$password = $_POST["studentPassword"];
//$transcriptID= $POST["transcriptID"];
$gpa= $_POST["gpa"];
$uid= $_POST["uid"];
$taB4= $_POST["taB4"];
$numOfSemesters= $_POST["numOfSemesters"];
$grad= $_POST["grad"];
//email	fName	lName	resumeID	password	transcriptID	gpa	courseIDs	uid	taB4	id	numOfSemesters	grad

$query = "insert into StudentTable (email, fName, lName, password, gpa, uid, taB4, numOfSemesters, grad) 
          values('$email', '$fName', '$lName', PASSWORD('$password'), '$gpa', '$uid', '$taB4', '$numOfSemesters', '$grad')";
$result = $db->query($query);
if (!$result) {
    die("Insertion failed: " . $db->error);
} else {
    echo "Inserted Successfully.";
    header("location: login.php");
}
?>