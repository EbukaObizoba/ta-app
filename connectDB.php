<?php

/*Function that will connect file to the database
   call "require_once(connectDB.php)" in all files that needs to connect to the DB*/
function connectToDB()
{
    $db = mysqli_connect("localhost", "root", "", "TAdb");
    if (mysqli_connect_errno()) {
        echo "Connect failed.\n" . mysqli_connect_error();
        exit();
    }
    return $db;
}
