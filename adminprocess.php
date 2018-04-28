<?php
/**
 * Created by PhpStorm.
 * User: somba
 * Date: 4/26/2018
 * Time: 4:34 PM
 */

 require_once("htmlStructure.php");



    if (isset($_POST["TAassigned"])) {
        header("location:adminViewTAassigned.php");
        exit();
    }
    if (isset($_POST["TAunassigned"])) {
        header("location:adminViewTAunassigned.php");
    }

    $body = <<<BODY
        <h1 style="text-align: center">Faculty View </h1>
        <div class="container">
            <form action="adminViewCourses.php" method="get">
                <div class="form-group">
                    <input type="submit" value="View Courses" class="form-control">
                </div>
            </form>
            <form action="adminFilterApps.php" method="get">
                <div class="form-group">
                    <input type="submit" value="View Applications" class="form-control">
                </div>
            </form>
        </div>
BODY;



    echo generatePage($body);


