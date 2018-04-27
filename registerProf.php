<?php
    require_once("htmlStructure.php");
    $body = <<<BODY
            <h1>Register as a Faculty</h1>
            <form action="addProf.php" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="profEmail" class="form-control" id="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="fName">First Name</label>
                    <input type="text" name="fName" class="form-control" id="fName" placeholder="Enter first name" required>
                </div>
                <div class="form-group">
                    <label for="lName">Last Name</label>
                    <input type="text" name="lName" class="form-control" id="lName" placeholder="Enter last name" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class='form-group'>
                    <button type='submit' class="btn btn-default">Submit</button>
                </div>
            </form>
  
BODY;
    echo generatePage($body);