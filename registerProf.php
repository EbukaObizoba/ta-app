<!doctype html>
<html>
    <head> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />	
    </head>
            
    <body>
        <div class="container">
            <h1>Register as a Professor</h1>
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
        </div>
        <script
          src="http://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
