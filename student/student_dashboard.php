<?php
    
    if(!isset($_SESSION)) {
        session_start();

        if(isset($_SESSION['status'])) {
            if($_SESSION['status']  !== true) {
                header("Location: student_login.php?error=Please log in first.");
                exit();
            }
        } else {
            header("Location: student_login.php?error=Please log in first.");
            exit();
        }
        
        if(isset($_SESSION['type'])) {
            if($_SESSION['type'] !== "user") {
                header("Location: student_login.php?error=Please log in first.");
                exit();
            }
        } else {
            header("Location: student_login.php?error=Please log in first.");
            exit();
        }

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Antonio Highschool</title>
</head>
<body>
    <h1>Student Dashboard</h1>
    <a href="student_enroll.php">Enroll</a>
    <a href="../php/student_logout.inc.php">Logout</a>
</body>
</html>