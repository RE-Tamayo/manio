<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Antonio Highschool</title>
    <link rel="stylesheet" href="../css/student_login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex login_container">
        <div class="m-auto login_form">
            <div class="form_header d-flex flex-row justify-content-between p-3  mt-5"><h4>Student Login</h4><a href="../index.php">Back</a></div>
            <div class="d-flex justify-content-center error"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></div>
            <form action="../php/student_login.inc.php" method="POST" class="form_body p-5">
                <input class="full-width form-control fields" name="uname" type="text" placeholder="Username">
                <input class="full-width form-control fields" name="pwd" type="password" placeholder="Password">
                <div class="full-width d-flex justify-content-center mt-5"><button class="buttons btn btn-success" name="submit" type="submit">Log In</button></div>
                <span class="d-flex justify-content-center full-width">Not yet registered? <a href="student_register.php">Create Account.</a></span>
            </form>
        </div>
    </div>
</body>
</html>