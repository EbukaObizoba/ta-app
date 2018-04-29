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
                <div class="form-group">
                    <label for="rePassword">Re-enter Password</label>
                    <input type="password" name="rePassword" class="form-control" id="rePassword" placeholder="Password" required>
                </div>
                <div class='form-group'>
                    <button type='submit' class="btn btn-default" id="submit">Submit</button>
                </div>
            </form>
                    <script>
            "use strict";
            
            let submit= document.getElementById("submit");
            submit.onclick= formValidate;
            
            function formValidate(){
                let errors= "";
                
                let rePassword= document.getElementById("rePassword").value;
                let password= document.getElementById("password").value;   
                if(rePassword !== password){
                    errors += "Passwords must match\\n";
                }
                
                let email= document.getElementById("email").value;
                let index = email.indexOf("@");
                if(email.substr(index) !== "@umd.edu" &&
                   email.substr(index) !== "@terpmail.umd.edu"){
                    errors+= "Must enter a UMD email(@umd.edu or @terpmail.umd.edu)\\n";
                }
                
                if(errors !== ""){
                    alert(errors);
                    return false;
                }
                
            }
        </script>
  
BODY;
    echo generatePage($body);